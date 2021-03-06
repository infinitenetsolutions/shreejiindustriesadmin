<?php
include '../../connection.inc.php';

if (isset($_SESSION['username']) && ($_SESSION['username'] != '')) {
  $img = "SELECT * FROM `catagries_images` WHERE 1";
  $imageresult = mysqli_query($connection, $img);



?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Shreeji Industries</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Exta css by dev -->
  <link rel="stylesheet" href="../extra.css">
</head>

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
              <h1>Slider</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Slider</li>
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
                  <h3 class="card-title">All Slider Images</h3>
                </div>
                <!-- /.card-header -->
                <?php

                  include 'insert.php';
                  // include 'update.php';
                  ?>

                <div class="card-body">
                  <a href="" class="btn btn-primary text-center" data-toggle="modal" data-target="#insert">Add new
                    Slider
                  </a>
                  <br>
                  <br>
                  <div class="table-responsive ">
                    <table id="example1" class="table table-bordered table-striped">

                      <thead>
                        <tr>
                          <th>S.NO</th>
                          <th>Product Link</th>
                          <th>Slider Data</th>
                      
                          <th>Images</th>
                          <th>Update</th>
                          <th>Delete</th>
                          <th>Status</th>
                        </tr>
                      </thead>

                      <tbody>

                        <?php
$i=0;
                        if (mysqli_num_rows($imageresult) > 0) {
              
                          while ($rowimage = mysqli_fetch_array($imageresult)) {
                            $ci_id = $rowimage['ci_cat_id'];
        
                      
                            $i++;
                        ?>
                        <tr>
                          <td><?php echo $i; ?></td>

                          <td><?php echo $rowimage['ci_cat_id']; ?></td>
                          <td><?php echo $rowimage['ci_name']; ?></td>
                          <td>
                            <a <?php echo ' href="data:image/jpeg;base64,' . base64_encode($rowimage['ci_images']) . '"' ?>
                              data-toggle="lightbox" data-title="Slider Images">
                              <img height="30px" width="30px"
                                <?php echo ' src="data:image/jpeg;base64,' . base64_encode($rowimage['ci_images']) . '"' ?>
                                class="img-fluid mb-2" alt="Slider Images" />
                            </a>
                          </td>
                          <td><a href="update.php?edit=<?php echo $rowimage['ci_id']; ?>"
                              class="btn btn-warning">Update</a></td>
                          <td> <a href="delete.php?delete=<?php echo $rowimage['ci_id']; ?>"
                              class="btn btn-danger">Delete</a>
                          <td> <?php
                                    if ($rowimage['ci_status'] == 1) {
                                      echo "<a class='btn btn-success' href='activedeactive.php?type=status&operation=deactive&id=" . $rowimage['ci_id'] . "'>Active</a>";
                                    } else {
                                      echo "<a class='btn btn-secondary' href='activedeactive.php?type=status&operation=active&id=" . $rowimage['ci_id'] . "'>Deactive</a>";
                                    }

                                    ?>
                          </td>

                        </tr>
                        <?php }
                        }
                        ?>
                      </tbody>
                      <tfoot>
                      <tr>
                          <th>S.NO</th>
                          <th>Product Link</th>
                          <th>Slider Data</th>
                      
                          <th>Images</th>
                          <th>Update</th>
                          <th>Delete</th>
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
  <script src="../../ckeditor/ckeditor.js"></script>
  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="../../plugins/datatables/jquery.dataTables.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script src="../../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });

  </script>
  <script>
    $(function () {
      $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });

      $('.filter-container').filterizr({
        gutterPixels: 3
      });
      $('.btn[data-filter]').on('click', function () {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
      });
    })

  </script>
</body>

</html>
<?php
} else {
  header('location:./AdminLogin/super_Admin.php');
}
?>
<script type="text/javascript">
  // Initialize CKEditor
  //CKEDITOR.inline( 'short_desc' );

  CKEDITOR.replace('product_name', {

    width: "100%",
    height: "200px"

  });

</script>