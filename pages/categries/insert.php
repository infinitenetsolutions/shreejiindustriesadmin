<?php
$msg = "";
include '../../AdminLogin/function.inc.php';


if (isset($_POST['add'])) {
    $cat = simplename($_POST['cat']);
    $images=addslashes(file_get_contents($_FILES['img']['tmp_name']));
    $status = $_POST['status'];
    if ($cat != null) {


        $insert = "INSERT INTO `categories`(`c_name`,`images`, `c_status`) VALUES ('$cat','$images','$status')";
        $result = mysqli_query($connection, $insert);
        if ($result > 0) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> Your Data Successfully Added into the Database
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';

            echo "<script>
            setTimeout(function() {
                window.location.replace('categories.php')
              }, 1000);

        </script>";
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Alert!</strong> Data Already Exits Please Check Your Input Data
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
    $cat = " ";
    $status = " ";
    // } else {
    //     $msg = "Enter status in 1 (Active) & 0 (DeActtive)";
    // }
}

?>

<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Categories</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container">
                    <div class="">
                        <div class="row modal-body mx-3">
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Categories Name</label>
                                <input name="cat" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">

                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Categories Name</label>
                                <input name="img" type="file" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="exampleFormControlSelect1">Select Status</label>
                                <select name="status" class="form-control" id="exampleFormControlSelect1">

                                    <option value='1'>Active</option>
                                    <option value='0'>DeActive</option>

                                </select>
                            </div>
                            <?php echo $msg; ?>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button name="add" class="btn btn-default">Add Categorie</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>