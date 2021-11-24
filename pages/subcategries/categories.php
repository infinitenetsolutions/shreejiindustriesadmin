<?php
include '../../connection.inc.php';

if (isset($_SESSION['username']) && ($_SESSION['username'] != '')) {
  $select = "SELECT * FROM `categories_sub`";
  $result1 = mysqli_query($connection, $select);
} else {
  header('location:./AdminLogin/super_Admin.php');
}



?>
<!DOCTYPE html>
<html>

<?php include '../navfootersider/head.php'; ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php
    include '../navfootersider/nav.php';
    include '../navfootersider/aside.php';
    ?>
    <!-- end navbar -->
    <!-- Main Sidebar Container -->




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
                // include 'update.php';
                ?>
          
                <div class="card-body">
                <a href="" class="btn btn-primary md-5" data-toggle="modal" data-target="#insert">Add new item
                </a>
                <div class="table-responsive ">
                  <table id="example1" class="table table-bordered table-striped">

                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Sub Categries</th>
                        <th>Categries</th>
                        <th>Action1</th>
                        <th>Action2</th>
                        <th>Status</th>
                      </tr>
                    </thead>

                    <tbody>

                      <?php

                      if (mysqli_num_rows($result1) > 0) {
                        while ($rows = mysqli_fetch_array($result1)) {

                      ?>
                          <tr>
                            <td><?php echo $rows['id']; ?></td>
                            <td><?php echo $rows['sc_name']; ?></td>
                            <td><?php echo $rows['sc_categories_name']; ?></td>
                            <td><a href="update.php?edit=<?php echo $rows['id']; ?>" class="btn btn-warning">Update</a></td>
                            <td> <a href="delete.php?delete=<?php echo $rows['id']; ?>" class="btn btn-danger">Delete</a>
                            <td> <?php
                                  if ($rows['status'] == 1) {
                                    echo "<a class='btn btn-success' href='activedeactive.php?type=status&operation=deactive&id=" . $rows['id'] . "'>Active</a>";
                                  } else {
                                    echo "<a class='btn btn-secondary' href='activedeactive.php?type=status&operation=active&id=" . $rows['id'] . "'>Deactive</a>";
                                  }

                                  ?>
                            </td>

                          </tr>
                      <?php }
                      } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Sub Categries</th>
                        <th>Categries</th>
                        <th>Action1</th>
                        <th>Action2</th>
                        <th>Status</th>
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

  <?php include '../navfootersider/foot.php'; ?>
</body>

</html>