<?php
$msg = "";
$cat = " ";
$status = " ";
include '../../AdminLogin/function.inc.php';


if (isset($_POST['add'])) {

    $product_name = $_POST['product_name'];
    $link = $_POST['link'];
    $status = $_POST['status'];

        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {

                $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
                $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

                $sql = "INSERT INTO `catagries_images`(`ci_name`,`ci_images`, `ci_cat_id`) VALUES ('$product_name','{$imgData}','$link')";

                $current_id = mysqli_query($connection, $sql); 
                if (isset($current_id)) {
                    // header("Location: listImages.php");
                }
                if ($current_id) {

                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success</strong> Your Data Successfully Added into the Database
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
        
                    echo "<script>
                    setTimeout(function() {
                        window.location.replace('categoriesData.php');
        
                      }, 1000);
        
                </script>";
                } else {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong>  '.$connection->error.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                }
            }
        }
    }

?>

<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">Slider</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div class="container">
          <div class="row">
            <div class="form-group col-sm-5">
              <label class="a-color" for="exampleFormControlSelect1"> Slider Images</label>
              <input name="userImage" type="file" class="form-control" id="exampleFormControlSelect1">


            </div>
            <div class="form-group col-sm-5">
              <label class="a-color" for="exampleFormControlSelect1">Product Link</label>
              <input name="link" type="text" class="form-control" id="exampleFormControlSelect1">
            </div>

            <div class="form-group col-2">
              <label class="a-color" for="exampleFormControlSelect1">Select Status</label>
              <select name="status" class="form-control" id="exampleFormControlSelect1">

                <option value='1'>Active</option>
                <option value='0'>DeActive</option>

              </select>
            </div>
            <div class="md-form col-sm-12">
              <label data-error="wrong" data-success="right" for="defaultForm-email">Slider Data </label>
              <textarea name="product_name" class="form-control">

                      </textarea>

            </div>


          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center ">
          <button name="add" class="btn btn-default">Add Images</button>
        </div>
      </form>
    </div>
  </div>
</div>
