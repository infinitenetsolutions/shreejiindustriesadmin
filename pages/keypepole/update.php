<?php



$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];

    $select_single_data = "SELECT * FROM `categories` WHERE c_id=$id";
    $result = mysqli_query($connection, $select_single_data);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['c_id'];
        $name = $row['c_name'];
        $status = $row['c_status'];

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

                                        <div class="mb-3 col-sm-4">


                                            <label for="exampleInputEmail1" class="form-label">Categorie Name</label>
                                            <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

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
        header('location: ../../pages/categries/categories.php');
    }
} else {
    header('location: ../../pages/categries/categories.php');
}
if (isset($_POST['Submit'])) {
    $cat = simplename($_POST['name']);
    $status = simplename($_POST['status']);
//     echo "<pre>";
// print_r($_FILES);
    if (!empty($_FILES['img']['tmp_name'])) {
        $images = addslashes(file_get_contents($_FILES['img']['tmp_name']));
        $update_img = "UPDATE `categories` SET `images`='$images' WHERE c_id=$id";
        $result = mysqli_query($connection, $update_img);
    }
    if ($status == 1 || $status == 0) {

        $update = "UPDATE `categories` SET `c_name`='$cat',`c_status`='$status' WHERE c_id=$id";
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
    } else {
        $msg = "Enter status in 1 (Active) & 0 (DeActive)";
        echo $msg;
    }
}
?>