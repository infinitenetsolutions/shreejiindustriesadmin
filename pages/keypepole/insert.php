<?php
$msg = "";

include '../../AdminLogin/function.inc.php';


if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $post = $_POST['post'];
    $priority = $_POST['priority'];
    $categries = $_POST['Categries'];
    $description = $_POST['description'];
    $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    echo  "<br>";

    $status = $_POST['status'];

    if ($name != null) {


        $insert = "INSERT INTO `keypepole`(`name`, `email`, `phone`, `address`, `Categries`, `post`, `description`, `image`, `priority`, `status`)  VALUES ('$name','$email','$phone','$address','$categries','$post','$description','$imgData','$priority','$status')";
        $result = mysqli_query($connection, $insert);
        if ($result > 0) {
          

            echo '<script>
                        window.location.replace("pepole.php")
                        </script>';
        } else {
            echo "<p class='col'>data already exits</p>";
        }
    }
}
$categrie = "SELECT * FROM `categories`";
$cat_r = mysqli_query($connection, $categrie);
?>

<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add Member</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="container">
                        <div class="row">


                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Member Name</label>
                                <input name="name" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Member Name">

                            </div>


                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Member Email</label>
                                <input name="email" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Member Email id">

                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Member Phone Number</label>
                                <input name="phone" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Member Number">

                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Address</label>
                                <input name="address" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Member Address">

                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email"> Member Post </label>
                                <input name="post" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Post">

                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Member Image</label>
                                <input name="image" type="file" id="defaultForm-email" accept="image/*" class="form-control validate" placeholder="Enter Caregorie Name">

                            </div>
                            <div class="form-group col-sm-4 ">
                                <label for="exampleFormControlSelect1">Select priority</label>
                                <select name="priority" class="form-control" id="exampleFormControlSelect1">

                                    <option value='high'>High</option>
                                    <option value='medium'>medium</option>
                                    <option value='low'>low</option>

                                </select>
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="exampleFormControlSelect1">Select Status</label>
                                <select name="status" class="form-control" id="exampleFormControlSelect1">

                                    <option value='1'>Active</option>
                                    <option value='0'>DeActive</option>

                                </select>
                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Member Description</label>
                                <textarea name="description" id="defaultForm-email" class="form-control validate">



                             </textarea>

                            </div>
                        </div>
                    </div>
                    <?php echo $msg; ?>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button name="add" class="btn btn-default">Add Member</button>
                </div>
            </form>
        </div>
    </div>
</div>