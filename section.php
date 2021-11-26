<?php


if (isset($_SESSION['username']) && ($_SESSION['username'] != '')) {

    $totalorder = "SELECT * FROM `user_order_history` WHERE 1";
    $totaluser = "SELECT * FROM `categories` WHERE 1";
    $uniquevisiter = "SELECT * FROM `product` WHERE 1 ";
    $uniquevisiter1 = "SELECT * FROM `keypepole` WHERE 1 ";
    $totaluser = mysqli_query($connection, $totaluser);
    $totalorder = mysqli_query($connection, $totalorder);
    $uniquevisiter = mysqli_query($connection, $uniquevisiter);
    $uniquevisiter1 = mysqli_query($connection, $uniquevisiter1);

?>
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo mysqli_num_rows($totalorder); ?></h3>

            <p>New Orders</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="./pages/user-master/user-history.php" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
          <h3><?php echo mysqli_num_rows($totaluser); ?></h3>

            <p> Categories</p>
          </div>
          <div class="icon">
          <i class="nav-icon far fa-list-alt"></i>
          </div>
          <a href="./pages/categries/categories.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?php echo mysqli_num_rows($uniquevisiter);  ?></h3>
            <p>Product</p>
          </div>
          <div class="icon">
            <i class="fab fa-product-hunt"></i>
          </div>
          <a href="./pages/product/product.php" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?php  echo mysqli_num_rows($uniquevisiter1); ?></h3>

            <p>Member</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-friends"></i>
          </div>
          <a href="./pages/keypepole/pepole.php" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->

  </div><!-- /.container-fluid -->
</section>
<?php } else {
    header('location:./AdminLogin/super_Admin.php');
} ?>
