<?php



$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];

    $select_single_data = "SELECT * FROM `faq` WHERE id=$id";
    $result = mysqli_query($connection, $select_single_data);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $name = $row['quation'];
        $ans = $row['answare'];
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


                                            <label for="exampleInputEmail1" class="form-label">Question name</label>
                                            <input type="text" name="question" value="<?php echo $name; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                        </div>
                                        <div class="md-form col-sm-4">
                                            <label data-error="wrong" data-success="right" for="defaultForm-email">Answare Name</label>
                                            <input name="ans" type="text" value="<?php echo $ans ?>" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">

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
    $question = $_POST['question'];
    $ans = $_POST['ans'];
    $status = simplename($_POST['status']);
    echo "<pre>";
    print_r($_POST);



    $update = "UPDATE `faq` SET `quation`='$question',`answare`='$ans',`status`='$status' WHERE  id=$id";
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
                window.location.replace('index.php')
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

?>