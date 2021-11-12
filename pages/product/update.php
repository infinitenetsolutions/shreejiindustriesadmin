<?php



$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];

    $select_single_data = "SELECT * FROM `our_clients` WHERE id=$id";
    $result = mysqli_query($connection, $select_single_data);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $name = $row['name'];
        $images = $row['images'];
        $status = $row['status'];


        $select1 = "SELECT * FROM `categories`";
        $result2 = mysqli_query($connection, $select1);

        $qury = "SELECT * FROM `product` WHERE `p_id`='$id' ";
$ressult1 = mysqli_query($connection, $qury);
$row = mysqli_fetch_array($ressult1);
$p_origin_country='India';
$product_name = $row['p_name'];
$p_code = $row['p_code'];
$model_no = $row['model_no'];
$make = $row['make'];
$grade = $row['grade'];
$materialtype   = $row['materialtype'];
$size = $row['size'];
$con_width = $row['con_width'];
$thickness = $row['thickness'];
$cylinder_size = $row['cylinder_size'];
$pressure = $row['pressure'];
$heating = $row['heating'];
$pack_type   = $row['pack_type'];
$pack_accuracy = $row['pack_accuracy'];
$seal_time   = $row['seal_time'];
$product_selling_price = $row['book_amount'];
$production_rete   = $row['production_rete'];
$food_con_body = $row['food_con_body'];
$frame_body = $row['frame_body'];
$motor   = $row['motor'];
$power_require = $row['power_require'];
$power_consumption = $row['power_consumption'];
$power_supply = $row['power_supply'];
$temperature = $row['temperature'];
$machine_size   = $row['machine_size'];
$weight = $row['weight'];
$space = $row['space'];
$man_power = $row['man_power'];
$p_item_warranty = $row['p_item_warranty'];
$p_short_desc = $row['p_short_desc'];
$product_description = $row['p_long_desc'];
$p_mete_title = $row['p_mete_title'];
$p_meta_desc = $row['p_meta_desc'];
$p_meta_keyword = $row['p_meta_keyword'];
$p_categries_name = $row['p_categries_name'];
$BROCHURE = $row['BROCHURE'];

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

                <div class="md-form col-sm-4">
                  <sub class="a-color" data-error="wrong" data-success="right" for="defaultForm-email">CATEGRIES
                    NAME</sub>
                  <select onchange="changeSubCategories(this.value)" name="cat" class="form-control validate"
                    placeholder="Enter Caregorie Name">
                    <option selected disabled>Choose Categries..</option>
                    <?php if($p_categries_name==''){

                                    if (mysqli_num_rows($result2) > 0) {
                                        while ($row = mysqli_fetch_array($result2)) {

                                    ?>
                    <option value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></option>

                    <?php }
                                    } }  else{ ?>
                                    <option value="<?php echo $p_categries_name ?>"><?php echo $p_categries_name ?></option>
                                   <?php } ?>
                  </select>

                </div>
                <!-- <div class="md-form col-sm-4">
                                <sub class="a-color" data-error="wrong" data-success="right" for="defaultForm-email">Categories Name</sub>
                                <select id="all_sub_cat" name="cat" class="form-control validate" placeholder="Enter Caregorie Name">
                                    <option selected disabled>Choose Categries..</option>

                                </select>

                            </div> -->

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">PRODUCT NAME</sub>
                  <input name="name" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Name">


                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">PRODUCT CODE</sub>
                  <input name="p_code" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter Product code">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">MODEL NO</sub>
                  <input name="p_model_no" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Model no">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">MAKE</sub>
                  <input name="make" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Electric Motor">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">GRADE</sub>
                  <input name="grade" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter Number of product color ">
                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">MATERIAL TYPE</sub>
                  <input name="materialtype" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter number of product ">

                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">SIZE</sub>
                  <input name="size" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Dona Size">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">CONVEYOR WIDTH</sub>
                  <input name="con_width" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Dona Size">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">Thickness</sub>
                  <input name="thickness" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Thickness">
                </div>


                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">CYLINDER SIZE</sub>
                  <input name="cylinder_size" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Dona Size">


                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">PRESSURE</sub>
                  <input name="pressure" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Dona Size">


                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">HEATING AREA</sub>
                  <input name="heating" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Dona Size">


                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">PACKING TYPE</sub>
                  <input name="pack_type" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Dona Size">


                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">PACKING ACCURACY</sub>
                  <input name="pack_accuracy" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Dona Size">


                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">SEALING TIME</sub>
                  <input name="seal_time" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Dona Size">


                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">PRODUCTION RATE</sub>
                  <input name="production_rete" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Production Rate">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">FOOD CONTACT BODY</sub>
                  <input name="food_con_body" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Dona Size">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">FRAME BODY</sub>
                  <input name="frame_body" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Dona Size">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">MOTOR</sub>
                  <input name="motor" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Name">
                </div>


                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">POWER REQUIREMENT</sub>
                  <input name="power_require" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Power Source">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">POWER CONSUMPTION</sub>
                  <input name="power_consumption" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Power Source">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">POWER SUPPLY</sub>
                  <input name="power_supply" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Power Source">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">TEMPERATURE</sub>
                  <input name="temperature" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Power Source">


                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">MACHINE SIZE</sub>
                  <input name="machine_size" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Power Source">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">WEIGHT</sub>
                  <input name="weight" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Weight of Machine">


                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">SPACE REQUIRED </sub>
                  <input name="space" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Space ">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">MAN POWER </sub>
                  <input name="man_power" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Man Power">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">WARRANTY</sub>
                  <input name="p_item_warranty" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter product Warranty or no">
                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">ORIGIN COUNTRY</sub>
                  <input name="p_origin_country" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter the country of the product ">
                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">DESCRIPTION</sub>
                  <textarea name="p_long_desc" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter Long Description of the product"></textarea>
                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">Product meta title</sub>
                  <input name="p_mete_title" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter Meta title of the product ">
                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">Extra meta Description </sub>
                  <input name="p_meta_desc" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter meta Descrtption of the product">
                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">Enter keyword of the product </sub>
                  <input name="p_meta_keyword" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter Keyword of the product">
                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1"> Upload BROCHURE </sub>
                  <input name="BROCHURE" type="file" class="form-control" id="exampleFormControlSelect1"
                    placeholder="upload BROCHURE">
                </div>

                <div class="form-group">
                  <sub class="a-color" for="exampleFormControlSelect1">Select Status</sub>
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
$url = $_SERVER['HTTP_REFERER'];
if (isset($_POST['Submit'])) {
    $cat = simplename($_POST['name']);
    $status = simplename($_POST['status']);
    if ($_FILES > 0) {
     echo   $images = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    }
    if ($status == 1 || $status == 0) {

        $update = "UPDATE `our_clients` SET `name`='$cat',`images`='$images',`status`='$status' WHERE id=$id";
        $result = mysqli_query($connection, $update);
        if ($result > 0) {
            echo "<script>
          window.location.replace('index.php')
      </script>";
        } else {
            echo "<p class='col'>data already exits</p>";
        }
    } else {
        $msg = "Enter status in 1 (Active) & 0 (DeActive)";
        echo $msg;
    }
}
?>
