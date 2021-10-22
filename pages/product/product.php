<?php
include '../../connection.inc.php';

if (isset($_SESSION['username']) && ($_SESSION['username'] != '')) {
  $select = "SELECT * FROM `product`";
  $result = mysqli_query($connection, $select);
} else {
  header('location:./AdminLogin/super_Admin.php');
}



?>
<!DOCTYPE html>
<html>
<?php include '../navfootersider/head.php' ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php
    include '../navfootersider/nav.php';
    include '../navfootersider/aside.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Categries</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Categries</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <!-- /.card -->

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">All Categries of The Product</h3>
                </div>
                <!-- /.card-header -->
                <?php

                include 'insert.php';
                // include 'uploadimages.php';
                // include 'update.php';
                ?>

                <div class="card-body">
                  <a href="" class="btn btn-primary text-center" data-toggle="modal" data-target="#insert">Add new item
                  </a>
                  <div class="table-responsive ">
                    <table id="example1" class="table table-bordered table-striped">

                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>MRP</th>
                          <th>PRICE</th>
                          <th>Quantity</th>
                          <th>color</th>
                          <th>Details</th>
                          <th>Status</th>
                          <th>Action</th>

                        </tr>
                      </thead>

                      <tbody>

                        <?php

                        if (mysqli_num_rows($result) > 0) {
                          while ($rows = mysqli_fetch_array($result)) {

                        ?>
                            <tr>
                              <td><?php echo $rows['p_id']; ?></td>
                              <td><?php echo $rows['p_name']; ?></td>
                              <td><?php echo $rows['p_mrp']; ?></td>
                              <td><?php echo $rows['p_s_price']; ?></td>
                              <td><?php echo $rows['p_quantity']; ?></td>

                              <td><?php echo $rows['p_color']; ?></td>
                              <td> <a href="details.php?read=<?php echo $rows['p_id']; ?>" class="text-success">More..</a>
                              <td> <?php
                                    if ($rows['p_status'] == 1) {
                                      echo "<a class='btn btn-success' href='activedeactive.php?type=status&operation=deactive&id=" . $rows['p_id'] . "'>Active</a>";
                                    } else {
                                      echo "<a class='btn btn-secondary' href='activedeactive.php?type=status&operation=active&id=" . $rows['p_id'] . "'>Deactive</a>";
                                    }

                                    ?>
                              </td>
                              <td> <a href="delete.php?delete=<?php echo $rows['p_id']; ?>" class="btn btn-danger">Delete</a> </td>
                            </tr>
                        <?php }
                        } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>MRP</th>
                          <th>PRICE</th>
                          <th>Quantity</th>
                          <th>color</th>
                          <th>Details</th>
                          <th>Status</th>
                          <th>Action</th>

                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include '../navfootersider/footer.php';   ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <?php include '../navfootersider/foot.php' ?>
  <script src="./js/ajax.js"></script>
</body>

</html>