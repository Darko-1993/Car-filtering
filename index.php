<?php include 'db.php'; ?>
<?php include 'inc/inc-header.php'; ?>

<div class="search-car">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 offset-2">
                <h2>Search car</h2>
                <form action="carInfo.php" method="get">
                    <div class="input-group input-search">
                        <input type="text" name="search" class="form-control" style="text-transform: capitalize" placeholder="<?php if(isset($_GET['error'])){
                            echo "No match found. Try again!";
                        }else{
                            echo "Search";
                        }?>">
                        <div class="input-group-append">
                            <button type="submit" name="subBtn" class="btn btn-info">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <?php foreach($db as $car): ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 box-car">
                            <a href="carInfo.php?id=<?php echo $car['id']; ?>">
                                <div class="card text-center">
                                    <div class="card-header" style="text-transform: capitalize"><?php echo $car['brend'];?></div>
                                    <div class="card-body" style="text-transform: capitalize"><?php echo $car['name'];?></div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary btn-sm"><?php echo $car['price']."$"; ?></button>
                                        <button class="btn btn-<?php if($car['used']){
                                            echo "warning";
                                        }else{
                                            echo "success";
                                        } ?> btn-sm"><?php if($car['used']){
                                            echo "Used";
                                        }else{
                                            echo "New";
                                        } ?></button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/inc-footer.php'; ?>
    