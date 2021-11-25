<?php



$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];

    $select_single_data = "SELECT * FROM `keypepole` WHERE `id`=$id";
    $result = mysqli_query($connection, $select_single_data);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];

        $address = $row['address'];
        $Categries = $row['Categries'];
        $post = $row['post'];

        $description = $row['description'];
        $image = $row['image'];
        $priority = $row['priority'];
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
            <h1>Update Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Update Member</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content card ">
      <div class="col-12">
        <div class="card-body">
          <form action="" method="POST" enctype="multipart/form-data">

            <div class="modal-body mx-3">
              <div class="container">
                <div class="row">


                  <div class="md-form col-sm-4">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Member Name</label>
                    <input value="<?php echo $name ?> " name="name" type="text" id="defaultForm-email"
                      class="form-control validate" placeholder="Enter Member Name">

                  </div>


                  <div class="md-form col-sm-4">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Member Email</label>
                    <input value="<?php echo $email ?> " name="email" type="text" id="defaultForm-email"
                      class="form-control validate" placeholder="Enter Member Email id">

                  </div>
                  <div class="md-form col-sm-4">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Member Phone Number</label>
                    <input value="<?php echo $phone ?> " value="<?php echo $name ?> " name="phone" type="text"
                      id="defaultForm-email" class="form-control validate" placeholder="Enter Member Number">

                  </div>
                  <div class="md-form col-sm-4">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Address</label>
                    <input value="<?php echo $address ?> " name="address" type="text" id="defaultForm-email"
                      class="form-control validate" placeholder="Enter Member Address">

                  </div>
                  <div class="md-form col-sm-4">
                    <label data-error="wrong" data-success="right" for="defaultForm-email"> Member Post </label>
                    <input value="<?php echo $post ?> " name="post" type="text" id="defaultForm-email"
                      class="form-control validate" placeholder="Enter Post">

                  </div>
                  <div class="md-form col-sm-4 ">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Member Image</label>
                    <div class=" col-4">
                      <?php echo '<img class="mini" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"/>'; ?>
                    </div>
                    <div class=" col-sm-6">

                      <input name="image" type="file" id="defaultForm-email" accept="image/*"
                        class="form-control validate" placeholder="Enter Caregorie Name">
                    </div>
                  </div>
                  <div class="form-group col-sm-4 ">
                    <label for="exampleFormControlSelect1">Select priority</label>
                    <select name="priority" class="form-control" id="exampleFormControlSelect1">
                      <?php if ($priority != '') { ?>
                      <option selected value='<?php echo $priority ?>'><?php echo $priority ?></option>
                      <?php } ?>
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
                    <textarea name="description" class="form-control">
                <?php echo $description ?> 
            </textarea>

                  </div>
                </div>
              </div>
              <?php echo $msg; ?>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button name="Submit" class="btn btn-warning">Update Member</button>
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
        header('location: ../../pages/keypepole/pepole.php');
    }
} else {
    header('location: ../../pages/keypepole/pepole.php');
}
if (isset($_POST['Submit'])) {
    echo "<pre>";
    print_r($_POST);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $post = $_POST['post'];
    $priority = $_POST['priority'];
    $description = $_POST['description'];

    $status = $_POST['status'];
    //     echo "<pre>";
    // print_r($_FILES);
    if (!empty($_FILES['image']['tmp_name'])) {
        $images = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $update_img ="UPDATE `keypepole` SET `image`='$images' WHERE id=$id";
        $result = mysqli_query($connection, $update_img);
    }
    if ($status == 1 || $status == 0) {

        $update = "UPDATE `keypepole` SET `name`='$name',`email`='$email',`phone`='$phone',`address`='$address',`post`='$post',`description`='$description',`priority`='$priority',`status`='$status' WHERE id='$id' ";
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
                window.location.replace('pepole.php')
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
    } else {
        $msg = "Enter status in 1 (Active) & 0 (DeActive)";
        echo $msg;
    }
}
?>
