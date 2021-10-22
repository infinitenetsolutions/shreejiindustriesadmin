<?php

use function PHPSTORM_META\elementType;

$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];

    $select_single_data = "SELECT * FROM `categories_sub` WHERE id=$id";
    $result = mysqli_query($connection, $select_single_data);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $name = $row['sc_name'];
        $sub_categories_name = $row['sc_categories_name'];
        $status = $row['status'];

        $select1 = "SELECT * FROM `categories`";
        $result2 = mysqli_query($connection, $select1);
?>


        <!doctype html>
        <html lang="en">

        <?php include '../navfootersider/head.php'; ?>

        <body class="hold-transition sidebar-mini">
            <?php
            include '../navfootersider/nav.php';
            include '../navfootersider/aside.php';
            ?>
            <div class="content-wrapper">
                <!-- Navbar -->


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

                <section class="content  ">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <!-- /.card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">All Categries of The Product</h3>
                                    </div>

                                    <div class="card-body">



                                        <form method="post" enctype="multipart/form-data" class="">
                                            <div class="container">
                                                <div class="row">


                                                    <div class="md-form col-sm-4  ">
                                                        <label class="" data-error="wrong" data-success="right" for="defaultForm-email">Categories Name</label>
                                                        <select name="cat_id" class="form-control" placeholder="Enter Caregorie Name">
                                                            <?php if ($sub_categories_name == '') { ?>
                                                                <option selected disabled>Choose Categries..</option>
                                                            <?php } else { ?>
                                                                <option selected value="<?php echo $sub_categories_name ?>"><?php echo $sub_categories_name ?></option>
                                                            <?php } ?>
                                                            <?php

                                                            if (mysqli_num_rows($result2) > 0) {
                                                                while ($row = mysqli_fetch_array($result2)) {

                                                            ?>
                                                                    <option value="<?php echo $row['c_name']; ?>"><?php echo $row['c_name']; ?></option>

                                                            <?php }
                                                            } ?>
                                                        </select>

                                                    </div>
                                                    <div class="col-sm-4 mb-3">


                                                        <label for="exampleInputEmail1" class="form-label">Sub Categories Name</label>
                                                        <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                                    </div>
                                                    <div class="form-group  col-sm-4 ">
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
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

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
    $categories_name = simplename($_POST['cat_id']);
    $status = simplename($_POST['status']);
    if ($status == 1 || $status == 0) {

        $update = "UPDATE `categories_sub` SET `sc_name`='$cat',`status`='$status',`sc_categories_name`='$categories_name' WHERE `id`='$id'";
        $result = mysqli_query($connection, $update);
        if ($result > 0) {
            echo "
           <script>
               window.location.replace('../../pages/subcategries/categories.php')
           </script>";
        } else {
            echo "
            <script>
                alert('data already exits')
            </script>";
        }
    } else {
        $msg = "Enter status in 1 (Active) & 0 (DeActive)";
        echo $msg;
    }
}
?>