<?php
$msg = "";
$cat = " ";
$status = " ";
include '../../AdminLogin/function.inc.php';


if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $status = $_POST['status'];
                $sql = "INSERT INTO `jobtype`(`name`, `description`, `status`) VALUES ('$name','$desc','$status')";

                $current_id = mysqli_query($connection, $sql);
           
                if ($current_id) {

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

<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">Job</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="container">
          <div class="row">
            <div class="form-group col-sm-6">
              <lavel class="a-color" for="exampleFormControlSelect1"> <b>Job name</b></lavel>
              <input name="name" type="text" class="form-control" id="exampleFormControlSelect1">
            </div>

            <div class="form-group col-sm-6">
              <lavel class="a-color" for="exampleFormControlSelect1"> <b>Select Status</b></lavel>
              <select name="status" class="form-control" id="exampleFormControlSelect1">

                <option value='1'>Active</option>
                <option value='0'>DeActive</option>

              </select>
            </div>
            <div class="form-group col-sm-12">
              <lavel class="a-color" for="exampleFormControlSelect1"> <b>Job Description</b></lavel>
              <textarea name="desc" class="form-control" id="exampleFormControlSelect1">
              </textarea>


            </div>

          </div>
        </div>



        <div class="modal-footer d-flex justify-content-center">
          <button name="add" class="btn btn-default">Add Images</button>
        </div>
      </form>
    </div>
  </div>
</div>
