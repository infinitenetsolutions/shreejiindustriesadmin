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
        $image1 = $row['images'];
        $link = $row['youtube'];
        $description = $row['description'];
        $status = $row['status'];
        $url='';

         echo    $url = $_SESSION['url'];


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
                        <div class="container">

                            <form method="post" enctype="multipart/form-data">
                                <div class="row">


                                    <div class="mb-3 col-sm-6">


                                        <label for="exampleInputEmail1" class="form-label">Title</label>
                                        <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    </div>
                                    <div class="mb-3 col-sm-6">


                                        <label for="exampleInputEmail1" class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    </div>
                                    <div class="mb-3 col-sm-6">


                                        <label for="exampleInputEmail1" class="form-label">Link</label>
                                        <input type="text" name="link" value="<?php echo $link; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="exampleFormControlSelect1">Select Status</label>
                                        <select name="status" class="form-control" id="exampleFormControlSelect1">

                                            <option value='1'>Active</option>
                                            <option value='0'>DeActive</option>

                                        </select>
                                    </div>
                                    <div class="mb-3 col-sm-12">


                                        <label for="exampleInputEmail1" class="form-label">Description</label>
                                        <textarea name="msg" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"><?php echo $description; ?></textarea>

                                    </div>

                                    <button type="submit" name="Submit" class="btn btn-primary centre">Submit</button>
                                    <h3><?php echo $msg; ?></h3>
                                </div>
                            </form>

                        </div>

                    </section>
                </div>


                <?php include '../navfootersider/foot.php'; ?>
                <?php include '../navfootersider/footer.php'; ?>
        </body>
        <script src="../../ckeditor/ckeditor.js"></script>

        </html>
<?php

    } else {
        header('location: ../../pages/keypepole/keypepole.php');
    }
} else {
    header('location: ../../pages/keypepole/keypepole.php');
}
if (isset($_POST['Submit'])) {
    $title = simplename($_POST['name']);
    $link = $_POST['link'];
   echo $url =$url;

    $description = $_POST['msg'];
    $status = $_POST['status'];
    // updating only image
    if (!empty($_FILES['image']['tmp_name'])) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $update = "UPDATE `about_us` SET `images`='$image' WHERE  id=$id";
        $result = mysqli_query($connection, $update);
    }

    // updating all data except image
    if ($status == 1 || $status == 0) {

        $update = "UPDATE `about_us` SET `title`='$title',`description`='$description',`youtube`='$link',`status`='$status' WHERE  id=$id";
        $result = mysqli_query($connection, $update);
        if ($result > 0) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> Your Data Successfully Added into the Database
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            echo $url;
                echo "<script>
                setTimeout(function() {
                   window.location.replace('$url');

               }, 1000);

             </script>";
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Alert</strong> Data already Exits
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

<script type="text/javascript">
    // Initialize CKEditor
    //CKEDITOR.inline( 'short_desc' );

    CKEDITOR.replace('msg', {

        width: "100%",
        height: "200px"

    });
</script>