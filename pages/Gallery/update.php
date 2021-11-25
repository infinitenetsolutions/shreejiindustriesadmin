<?php



$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];

    $select_single_data = "SELECT * FROM `catagries_images` WHERE `ci_id`='$id'";
    $result = mysqli_query($connection, $select_single_data);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['ci_id'];
        $product_name = $row['ci_name'];
        $images = $row['ci_images'];
        $product_link = $row['ci_cat_id'];
        $status = $row['ci_status'];

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
            <h1>Slider</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Slider</li>
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
                <div class="md-form col-sm-4">
                  <label data-error="wrong" data-success="right" for="defaultForm-email">Slider Image</label>
                  <div class=" col-4">
                    <?php echo '<img class="mini" src="data:image/jpeg;base64,' . base64_encode($row['ci_images']) . '"/>'; ?>
                  </div>
                  <div class=" col-sm-6">

                    <input name="img" type="file" id="defaultForm-email" accept="image/*" class="form-control validate"
                      placeholder="Enter Caregorie Name">
                  </div>

                </div>
                <div class="mb-3 col-sm-4">


                  <label for="exampleInputEmail1" class="form-label">Product Link</label>
                  <input type="text" name="link" value="<?php echo $product_link; ?>" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>

                <div class="form-group col-sm-4">
                  <label for="exampleFormControlSelect1">Slider Status</label>
                  <select name="status" class="form-control" id="exampleFormControlSelect1">

                    <option value='1'>Active</option>
                    <option value='0'>DeActive</option>

                  </select>
                </div>

                <div class="md-form col-sm-12">
                  <label data-error="wrong" data-success="right" for="defaultForm-email">Slider Data </label>
                  <textarea name="product_name" class="form-control">
                       <?php echo $product_name ?> 
                      </textarea>

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
  <script src="../../ckeditor/ckeditor.js"></script>
</body>

</html>
<?php

    } else {
        header('location: ../../pages/Gallery/categoriesData.php');
    }
} else {
    header('location: ../../pages/Gallery/categoriesData.php');
}
if (isset($_POST['Submit'])) {
    $link = $_POST['link'];
    $product_name = $_POST['product_name'];

    $status = simplename($_POST['status']);
//     echo "<pre>";
// print_r($_FILES);
    if (!empty($_FILES['img']['tmp_name'])) {
        $images = addslashes(file_get_contents($_FILES['img']['tmp_name']));
        $update_img = "UPDATE `catagries_images` SET `ci_images`='$images' WHERE `ci_id`='$id'";
        $result = mysqli_query($connection, $update_img);
    }


        $update = "UPDATE `catagries_images` SET `ci_name`='$product_name',`ci_status`='$status',`ci_cat_id`='$link' WHERE ci_id=$id";
        $result1 = mysqli_query($connection, $update);
    
     
        if ($result > 0) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> Your Data Successfully Added into the Database
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';

            echo "<script>
            setTimeout(function() {
                window.location.replace('categoriesData.php')
              }, 1000);

        </script>";
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Alert!</strong> '.$connection->error.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
 
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
