<?php



$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];

    $qury = "SELECT * FROM `product` WHERE `p_id`='$id' ";
    $ressult1 = mysqli_query($connection, $qury);
    $row = mysqli_fetch_array($ressult1);
    $p_origin_country = 'India';
    $product_name = $row['p_name'];
    $p_code = $row['p_code'];
    $model_no = $row['model_no'];
   


    $select_cat = "SELECT * FROM `booking` WHERE `product_id`=$id ";
    $result_cat = mysqli_query($connection, $select_cat);
    $row = mysqli_fetch_array($result_cat);

    $payment = $row['payment'];
    $delivery_time = $row['delivery_time'];
    $policy   = $row['policy'];
    $avaible = $row['avaible'];
    $details = $row['details'];
    $market = $row['market'];
   
?>
    <?php
    // updating data here

    if (isset($_POST['Submit'])) {
        $payment = $_POST['payment'];
        $delivery_time = $_POST['delivery_time'];
        $policy = $_POST['policy'];
       
        $avaible = $_POST['avaible'];
        $details = $_POST['details'];
        $market = $_POST['market'];


        $update_data = "UPDATE `booking` SET `payment`='$payment',`delivery_time`='$delivery_time',`policy`='$policy',`avaible`='$avaible',`details`='$details',`market`='$market' WHERE  `product_id`='$id'";


        $result_data = mysqli_query($connection, $update_data);
        if ($result_data) {

            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success</strong> Your Data Successfully Added into the Database
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';

        echo "<script>
        setTimeout(function() {
            window.location.replace('product.php');

          }, 3000);

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
                            <h1>Update Booking Details</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                                <li class="breadcrumb-item active">Update Booking Details</li>
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




                                    <div class="form-group col-sm-4">
                                        <label class="a-color" for="exampleFormControlSelect1">PRODUCT NAME</label>
                                        <input disabled value="<?php echo $product_name ?>" name="name" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Name">


                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label class="a-color" for="exampleFormControlSelect1">PRODUCT CODE</label>
                                        <input disabled value="<?php echo $p_code ?>" name="p_code" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Product code">


                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label class="a-color" for="exampleFormControlSelect1">MODEL NO</label>
                                        <input disabled value="<?php echo $model_no ?>" name="p_model_no" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Product Model no">


                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label class="a-color" for="exampleFormControlSelect1">Payment Terms </label>
                                        <input value="<?php echo $payment ?>" name="payment" class="form-control" id="exampleFormControlSelect1" placeholder="Payment Terms	">


                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label class="a-color" for="exampleFormControlSelect1">Delivery Time</label>
                                        <input value="<?php echo $delivery_time ?>" name="delivery_time" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Delivery Time">


                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label class="a-color" for="exampleFormControlSelect1">Sample Policy</label>
                                        <input value="<?php echo $policy ?>" name="policy" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Sample Policy">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label class="a-color" for="exampleFormControlSelect1">Sample Available</label>
                                        <input value="<?php echo $avaible ?>" name="avaible" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Sample Available">

                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label class="a-color" for="exampleFormControlSelect1">Packaging Details </label>
                                        <input value="<?php echo $details ?>" name="details" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Packaging Details	">


                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label class="a-color" for="exampleFormControlSelect1">Main Domestic Market</label>
                                        <input value="<?php echo $market ?>" name="market" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Main Domestic Market">


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
?>