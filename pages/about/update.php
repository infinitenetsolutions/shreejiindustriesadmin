<?php

use function PHPSTORM_META\elementType;

$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];

    $select_single_data = "SELECT * FROM `about_us` WHERE id=$id";
    $result = mysqli_query($connection, $select_single_data);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $name = $row['title'];
        $status = $row['status'];

?>


        <!doctype html>
        <html lang="en">

        <?php include '../navfootersider/head.php'; ?>

        <body class="hold-transition sidebar-mini">
            <?php
            include '../navfootersider/nav.php';
            include '../navfootersider/aside.php';
            ?>
            <div class="wrapper">

                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Update</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Update</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->

                    </section>
                    <section class="card-body">
                        <form method="post" enctype="multipart/form-data">

                            <div class="mb-3">


                                <label for="exampleInputEmail1" class="form-label">Id</label>
                                <input disabled type="text" value="<?php echo $id; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" pattern="[A-Za-z0-9]+">

                            </div>
                            <div class="mb-3">


                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                            </div>
                            <div class="mb-3">


                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <textarea name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"><?php echo $name; ?></textarea>

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Status</label>
                                <select name="status" class="form-control" id="exampleFormControlSelect1">

                                    <option value='1'>Active</option>
                                    <option value='0'>DeActive</option>

                                </select>
                            </div>
                            <button type="submit" name="Submit" class="btn btn-primary centre">Submit</button>
                            <h3><?php echo $msg; ?></h3>
                        </form>
                    </section>
                    <?php include '../navfootersider/foot.php'; ?>
        </body>

        </html>
<?php

    } else {
        header('location: ../../pages/keypepole/keypepole.php');
    }
} else {
    header('location: ../../pages/keypepole/keypepole.php');
}
if (isset($_POST['Submit'])) {
    $cat = simplename($_POST['name']);
    $status = simplename($_POST['status']);
    if ($status == 1 || $status == 0) {

        $update = "UPDATE `keypepole` SET `name`='$cat',`status`='$status' WHERE id=$id";
        $result = mysqli_query($connection, $update);
        if ($result > 0) {
            header('location: ../../pages/keypepole/keypepole.php');
        } else {
            echo "<p class='col'>data already exits</p>";
        }
    } else {
        $msg = "Enter status in 1 (Active) & 0 (DeActive)";
        echo $msg;
    }
}
?>