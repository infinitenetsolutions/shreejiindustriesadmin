<?php
$msg = "";
$cat = " ";
$status = " ";
include '../../AdminLogin/function.inc.php';


if (isset($_POST['add'])) {
 // $cat = simplename($_POST['cat']);
    $status = $_POST['status'];
    if ($cat != null) {



        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {

                $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
                $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

                $sql = "INSERT INTO `catagries_images`(`ci_name`,`ci_images`, `ci_cat_id`) VALUES ('{$imageProperties['mime']}','{$imgData}','{$cat}')";

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
}
// $selectid="SELECT * FROM `catagries_images` WHERE 1";



$select1 = "SELECT * FROM `categories`";
$result2 = mysqli_query($connection, $select1);


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

                <div class="modal-body mx-3">
                    <!-- <div class="md-form mb-5">
                        <label class="a-color" data-error="wrong" data-success="right" for="defaultForm-email">Gallery Image title</label>
                        <select name="cat" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">
                            <option selected disabled>Choose Categries..</option>
                            <?php

                            if (mysqli_num_rows($result2) > 0) {
                                while ($row = mysqli_fetch_array($result2)) {

                            ?>
                                    <option value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></option>

                            <?php }
                            } ?>
                        </select>

                    </div> -->

                    <div class="form-group">
                        <label class="a-color" for="exampleFormControlSelect1">Select Slider</label>
                        <input name="userImage" type="file" class="form-control" id="exampleFormControlSelect1">


                    </div>
                    <div class="form-group">
                        <label class="a-color" for="exampleFormControlSelect1">Select Status</label>
                        <select name="status" class="form-control" id="exampleFormControlSelect1">

                            <option value='1'>Active</option>
                            <option value='0'>DeActive</option>

                        </select>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button name="add" class="btn btn-default">Add Images</button>
                </div>
            </form>
        </div>
    </div>
</div>