<?php
    include 'db.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $cars = array_filter($db, function ($el)
        {
            global $id;
            return $el['id'] == $id;
        });
    }elseif($_GET['search']){
        $search = $_GET['search'];
        $cars = array_filter($db, function ($el)
        {
            global $search;
            return $el['brend'] == $search || $el['name'] == $search || $el['price'] == $search;
        });
        if(count($cars)==0){
            header("Location: index.php?error=1");
        }
    }
?>

<?php include 'inc/inc-header.php'; ?>

    <div class="jumbotron text-center">
        <h2>
            <?php foreach($cars as $car): ?>
                <span style="text-transform: uppercase"><?php echo $car['brend']; ?></span>
            <?php endforeach; ?>
        </h2>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 offset-2">    
                <div class="row">
                    <?php foreach($cars as $car): ?>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 car-info">
                            <h3 class="display=4" style="text-transform: capitalize"><?php echo $car['name']; ?></h3>
                            <hr>
                            <p><?php echo $car['info']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>            
<?php include 'inc/inc-footer.php'; ?>
