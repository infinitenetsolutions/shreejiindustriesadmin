<?php
$msg='';
include '../../connection.inc.php';

if (isset($_SESSION['username']) && ($_SESSION['username'] != '')) {
    $select = "SELECT * FROM `product`";
    $result = mysqli_query($connection, $select);
} else {
    header('location:./AdminLogin/super_Admin.php');
}
$product_id=$_GET['pro'];



if (isset($_POST['submit'])) {
  
    $num_img = count($_FILES['img']['name']);
    $delete_img=mysqli_query($connection,"DELETE FROM `product_images` WHERE `product_img_id`='$product_id'");
   
    for ($i = 0; $i < $num_img; $i++) {
        $img_name = $_FILES['img']['name'][$i];
        $images = addslashes(file_get_contents($_FILES['img']['tmp_name'][$i]));
        $img_qury = "INSERT INTO `product_images`(`name`, `images`, `product_img_id`) VALUES ('$img_name','$images','$product_id')";
        $result = mysqli_query($connection, $img_qury);

    }
    if ($result) {
        $msg= '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> Your Data Successfully Added into the Database
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';

        echo "<script>
        setTimeout(function() {
            window.location.replace('product.php');

          }, 1000);

    </script>";
    } else {
        $msg= '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Alert!</strong>  ' . $connection->error . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | DataTables</title>
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
  <link rel="stylesheet" href="./css/imgupload.css">
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
                <?php echo $msg; ?>
                <!-- /.card-header -->
                <?php

                                include 'insert.php';

                                ?>
                <br>
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-2 imgUp">
                        <div class="imagePreview"></div>
                        <label class="btn btn-primary">
                          Upload<input type="file" name="img[]" class="uploadFile img" value="Upload Photo"
                            style="width: 0px;height: 0px;overflow: hidden;">
                        </label>
                      </div><!-- col-2 -->
                      <i class="fa fa-plus imgAdd"></i>
                    </div><!-- row -->
                  </div><!-- container -->
                  <div class="text-center mb-2 mt-1">
                    <button class="btn btn-success mr-5" type="submit" name="submit">Submit</button>
                    <a href="product.php" class="ml-5  btn btn-warning"> Go To Product</a>

                  </div>
                </form>

                <!-- //here to add some extra data -->
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

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="../../plugins/datatables/jquery.dataTables.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
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
    $(".imgAdd").click(function () {
      $(this).closest(".row").find('.imgAdd').before(
        '<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" name="img[]" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>'
        );
    });
    $(document).on("click", "i.del", function () {
      // 	to remove card
      $(this).parent().remove();
      // to clear image
      // $(this).parent().find('.imagePreview').css("background-image","url('')");
    });
    $(function () {
      $(document).on("change", ".uploadFile", function () {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test(files[0].type)) { // only image file
          var reader = new FileReader(); // instance of the FileReader
          reader.readAsDataURL(files[0]); // read the local file

          reader.onloadend = function () { // set image data as background of div
            //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
            uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url(" + this.result +
              ")");
          }
        }

      });
    });

  </script>
</body>

</html>
