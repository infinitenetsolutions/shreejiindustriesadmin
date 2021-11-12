<?php



$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];

  


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

$select_cat = "SELECT * FROM `categories` WHERE `c_id`='$p_categries_name' ";
$result_cat = mysqli_query($connection, $select_cat);
$cat_data=mysqli_fetch_array($result_cat);
?>
<?php 
// updating data here

if (isset($_POST['Submit'])) {
  $name = $_POST['name'];
  $p_code = $_POST['p_code'];
  $p_model_no = $_POST['p_model_no'];
  $make = $_POST['make'];
  $grade = $_POST['grade'];
  $materialtype = $_POST['materialtype'];
  $size = $_POST['size'];
  $con_width = $_POST['con_width'];
  $thickness = $_POST['thickness'];
  $cylinder_size = $_POST['cylinder_size'];
  $pressure = $_POST['pressure'];
  $heating = $_POST['heating'];
  $pack_type = $_POST['pack_type'];
  $pack_accuracy = $_POST['pack_accuracy'];
  $seal_time = $_POST['seal_time'];
  $production_rete = $_POST['production_rete'];
  $food_con_body = $_POST['food_con_body'];

  $frame_body = $_POST['frame_body'];
  $motor = $_POST['motor'];
  $power_require = $_POST['power_require'];
  $power_consumption = $_POST['power_consumption'];
  $power_supply = $_POST['power_supply'];
  $temperature = $_POST['temperature'];
  $machine_size = $_POST['machine_size'];
  $weight = $_POST['weight'];
  $space = $_POST['space'];
  $man_power = $_POST['man_power'];

  $p_item_warranty = $_POST['p_item_warranty'];
  $p_origin_country = $_POST['p_origin_country'];
  // $p_shop_fee = $_POST['p_shop_fee'];
  $p_short_desc = $_POST['p_short_desc'];
  $p_long_desc = $_POST['p_long_desc'];

  $p_mete_title = $_POST['p_mete_title'];
  $p_meta_desc = $_POST['p_meta_desc'];
  $p_meta_keyword = $_POST['p_meta_keyword'];
  $p_long_desc = $_POST['p_long_desc'];
  

  $status = $_POST['status'];
$update_data='';
if(!empty($_FILES['BROCHURE']['tmp_name'])){
  $BROCHURE = addslashes(file_get_contents($_FILES['BROCHURE']['tmp_name']));
  $update_data = "UPDATE `product` SET  `BROCHURE`='$BROCHURE' WHERE `p_id`='$id' ";
  $result_data = mysqli_query($connection, $update_data);
}
       $update_data = "UPDATE `product` SET `p_name`='$product_name',`p_code`='$p_code',`model_no`='$model_no',`make`='$make',`grade`='$grade',`materialtype`='$materialtype',`size`='$size',`con_width`='$con_width',`thickness`='$thickness',`cylinder_size`='$cylinder_size',`pressure`='$pressure',`heating`='$heating',`pack_type`='$pack_type',`pack_accuracy`='$pack_accuracy',`seal_time`='$seal_time',`production_rete`='$production_rete',`food_con_body`='$food_con_body',`frame_body`='$frame_body',`motor`='$motor',`power_require`='$power_require',`power_consumption`='$power_consumption',`power_supply`='$power_supply',`temperature`='$temperature',`machine_size`='$machine_size',`weight`='$weight',`space`='$space',`man_power`='$man_power',`p_item_warranty`='$p_item_warranty',`p_short_desc`='$p_short_desc',`p_long_desc`='$p_long_desc',`p_mete_title`='$p_mete_title',`p_meta_desc`='$p_meta_desc',`p_meta_keyword`='[value-34]',`p_status`='$status',`book_amount`='0',`p_categries_name`='$p_categries_name' WHERE `p_id`='$id' ";
     
  
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
            window.location.replace('updateimages.php?pro=$id');
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


                    <option disabled>Choose Categries..</option>
                    <?php  if($cat_data['c_name']!=''){ ?>
                    <option selected selected value="<?php echo $p_categries_name ?>"><?php echo $cat_data['c_name'] ?>
                    </option>
                    <?php } ?>

                    <?php 
                                    if (mysqli_num_rows($result2) > 0) {
                                        while ($row = mysqli_fetch_array($result2)) {

                                    ?>
                    <option value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></option>

                    <?php }
                                    }  ?>

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
                  <input value="<?php echo $product_name ?>" name="name" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Name">


                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">PRODUCT CODE</sub>
                  <input value="<?php echo $p_code ?>" name="p_code" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter Product code">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">MODEL NO</sub>
                  <input value="<?php echo $p_model_no ?>" name="p_model_no" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Model no">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">MAKE</sub>
                  <input value="<?php echo $make ?>" name="make" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Electric Motor">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">GRADE</sub>
                  <input value="<?php echo $grade ?>" name="grade" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter Number of product color ">
                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">MATERIAL TYPE</sub>
                  <input value="<?php echo $materialtype ?>" name="materialtype" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter number of product ">

                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">SIZE</sub>
                  <input value="<?php echo $size ?>" name="size" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">CONVEYOR WIDTH</sub>
                  <input value="<?php echo $con_width ?>" name="con_width" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">Thickness</sub>
                  <input value="<?php echo $thickness ?>" name="thickness" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Thickness">
                </div>


                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">CYLINDER SIZE</sub>
                  <input value="<?php echo $cylinder_size ?>" name="cylinder_size" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">PRESSURE</sub>
                  <input value="<?php echo $pressure ?>" name="pressure" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">HEATING AREA</sub>
                  <input value="<?php echo $heating ?>" name="heating" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">PACKING TYPE</sub>
                  <input value="<?php echo $pack_type ?>" name="pack_type" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">PACKING ACCURACY</sub>
                  <input value="<?php echo $pack_accuracy ?>" name="pack_accuracy" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">SEALING TIME</sub>
                  <input value="<?php echo $seal_time ?>" name="seal_time" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">PRODUCTION RATE</sub>
                  <input value="<?php echo $production_rete ?>" name="production_rete" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Production Rate">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">FOOD CONTACT BODY</sub>
                  <input value="<?php echo $food_con_body ?>" name="food_con_body" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">FRAME BODY</sub>
                  <input value="<?php echo $p_categries_name ?>" name="frame_body" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">MOTOR</sub>
                  <input value="<?php echo $motor ?>" name="motor" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Name">
                </div>


                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">POWER REQUIREMENT</sub>
                  <input value="<?php echo $p_categries_name ?>" name="power_require" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Power Source">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">POWER CONSUMPTION</sub>
                  <input value="<?php echo $power_consumption ?>" name="power_consumption" type="text"
                    class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Power Source">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">POWER SUPPLY</sub>
                  <input value="<?php echo $power_supply ?>" name="power_supply" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Power Source">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">TEMPERATURE</sub>
                  <input value="<?php echo $temperature ?>" name="temperature" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Power Source">


                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">MACHINE SIZE</sub>
                  <input value="<?php echo $machine_size ?>" name="machine_size" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Power Source">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">WEIGHT</sub>
                  <input value="<?php echo $weight ?>" name="weight" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Weight of Machine">


                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">SPACE REQUIRED </sub>
                  <input value="<?php echo $space ?>" name="space" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Space ">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">MAN POWER </sub>
                  <input value="<?php echo $man_power ?>" name="man_power" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Man Power">


                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">WARRANTY</sub>
                  <input value="<?php echo $p_item_warranty ?>" name="p_item_warranty" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter product Warranty or no">
                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">ORIGIN COUNTRY</sub>
                  <input value="<?php echo $p_origin_country ?>" name="p_origin_country" type="text"
                    class="form-control" id="exampleFormControlSelect1" placeholder="Enter the country of the product ">
                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">DESCRIPTION</sub>
                  <textarea name="p_long_desc" type="text" class="form-control" id="exampleFormControlSelect1"
                    placeholder="Enter Long Description of the product">
                    <?php echo $p_long_desc ?>
                  </textarea>
                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">Product meta title</sub>
                  <input value="<?php echo $p_mete_title ?>" name="p_mete_title" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter Meta title of the product ">
                </div>

                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">Extra meta Description </sub>
                  <input value="<?php echo $p_meta_desc ?>" name="p_meta_desc" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter meta Descrtption of the product">
                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1">Enter keyword of the product </sub>
                  <input value="<?php echo $p_meta_keyword ?>" name="p_meta_keyword" type="text" class="form-control"
                    id="exampleFormControlSelect1" placeholder="Enter Keyword of the product">
                </div>
                <div class="form-group col-sm-4">
                  <sub class="a-color" for="exampleFormControlSelect1"> Upload BROCHURE <span style="color: red;">(only
                      PDF )</span> </sub>
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
?>
