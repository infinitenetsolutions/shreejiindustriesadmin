<?php



$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];

    $select_single_data = "SELECT * FROM `jobtype` WHERE id=$id";
    $result = mysqli_query($connection, $select_single_data);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        $name = $row['name'];
        $desc = $row['description'];
        $status = $row['status'];

?>


<!doctype html>
<html lang="en">
<!doctype html>
<html lang="en">

<?php include '../navfootersider/head.php'; ?>

<body class="hold-transition sidebar-mini">
  <?php
            include '../navfootersider/nav.php';
            include '../navfootersider/aside.php';
            ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Update Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content card ">
      <div class="col-12">
        <div class="card-body">
          <form method="post" enctype="multipart/form-data">
            <div class="container">
              <div class="row">

                <div class="mb-3 col-sm-6">


                  <label for="exampleInputEmail1" class="form-label">Categorie Name</label>
                  <input type="text" name="name" value="<?php echo $name; ?>" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
                <div class="form-group col-sm-6">
                  <label for="exampleFormControlSelect1">Select Status</label>
                  <select name="status" class="form-control" id="exampleFormControlSelect1">

                    <option value='1'>Active</option>
                    <option value='0'>DeActive</option>

                  </select>
                </div>

                <div class="mb-3 col-sm-12">


                  <label for="exampleInputEmail1" class="form-label">Categorie Name</label>
                  <textarea name="desc" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp"> <?php echo $desc ?> </textarea>

                </div>
                <button type="submit" name="Submit" class="btn btn-primary centre">Submit</button>
                <h3><?php echo $msg; ?></h3>
              </div>
            </div>
          </form>

        </div>
    </section>
  </div>
  </div>

  <?php include '../navfootersider/footer.php'; ?>
  <?php include '../navfootersider/foot.php'; ?>
</body>

</html>
<?php

    } else {
        header('location: ../../pages/jobtype');
    }
} else {
    header('location: ../../pages/jobtype');
}
if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $status = $_POST['status'];


        $update = "UPDATE `jobtype` SET `name`='$name',`description`='$desc',`status`='$status' WHERE `id`='$id'";
        $result = mysqli_query($connection, $update);
        if ($result) {

            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> Your Data Successfully Added into the Database
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';

            echo "<script>
            setTimeout(function() {
                window.location.replace('index.php');

              }, 1000);

        </script>";
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Alert!</strong>  ' . $connection->error . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
  
    }

?>
