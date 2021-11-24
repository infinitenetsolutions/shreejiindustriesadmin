<?php

include '../../connection.inc.php';

if (isset($_SESSION['username']) && ($_SESSION['username'] != '') || isset($select['email']) && ($_SESSION['email'] != '')) {
  $select = "SELECT * FROM `categories`";
  $result1 = mysqli_query($connection, $select);
} else {
  header('location:./AdminLogin/super_Admin.php');
}

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
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="../../plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="../extra.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php
    include '../navfootersider/nav.php';
    include '../navfootersider/aside.php';
    ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Gallery</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Career</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                  <div class="card-title">
                    Career
                    <?php include 'insert.php'; ?>
                    <a name="additem" href="#" data-toggle="modal" data-target="#insert"> <button class="btn btn-primary but">Add images</button></a>
                  </div>
                </div>
                <div class="card-body">
                  <div>
                    <div class="btn-group w-100 mb-2">
                      <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All items </a>
                      <?php

                      if (mysqli_num_rows($result1) > 0) {
                        while ($rows = mysqli_fetch_array($result1)) {

                      ?>

                          <a class="btn btn-info" href="javascript:void(0)" data-filter="<?php echo $rows['c_id']; ?>"><?php echo $rows['c_name']; ?></a>
                        <?php } ?>
                    </div>
                    <div class="mb-2">
                      <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                      <div class="float-right">
                        <select class="custom-select" style="width: auto;" data-sortOrder>
                          <option value="index"> Sort by Position </option>
                          <option value="sortData"> Sort by Custom Data </option>
                        </select>
                        <div class="btn-group">
                          <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                          <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <?php $select = "SELECT * FROM `catagries_images` WHERE 1";
                        $iresult = mysqli_query($connection, $select);
                        while ($srow = mysqli_fetch_array($iresult)) {
                    ?>
                      <div class="filter-container p-0 row cat_img">
                        <div class="filtr-item col-sm-2" data-category="<?php echo $srow['ci_cat_id']; ?>" data-sort="white sample">
                          <a <?php echo ' href="data:image/jpeg;base64,' . base64_encode($srow['ci_images']) . '"' ?> data-toggle="lightbox" data-title="Slider Images">
                            <img <?php echo ' src="data:image/jpeg;base64,' . base64_encode($srow['ci_images']) . '"' ?> class="img-fluid mb-2" alt="Slider Images" />
                          </a>
                        </div>
                      <?php } ?>

                      </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include '../navfootersider/footer.php'; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery UI -->
  <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Ekko Lightbox -->
  <script src="../../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>

  <!-- Filterizr-->
  <script src="../../plugins/filterizr/jquery.filterizr.min.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });

      $('.filter-container').filterizr({
        gutterPixels: 3
      });
      $('.btn[data-filter]').on('click', function() {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
      });
    })
  </script>
</body>

</html>
<?php } ?>