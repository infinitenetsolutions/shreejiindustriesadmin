<?php
$msg = "";
$cat = '';
$all_sub_cat = '';
$status = " ";
include '../../AdminLogin/function.inc.php';


if (isset($_POST['add'])) {
    $cat = $_POST['cat'];

    // $all_sub_cat = $_POST['all_sub_cat'];
    // echo "<pre>";
    // print_r($_POST);
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
    $BROCHURE = addslashes(file_get_contents($_FILES['BROCHURE']['tmp_name']));

    $status = $_POST['status'];


    if ($cat != '') {
        $insert_p = "INSERT INTO `product`(`p_name`, `p_code`, `model_no`, `make`, `grade`, `materialtype`, `size`, `con_width`, `thickness`, `cylinder_size`, `pressure`, `heating`, `pack_type`, `pack_accuracy`, `seal_time`, `production_rete`, `food_con_body`, `frame_body`, `motor`, `power_require`, `power_consumption`, `power_supply`, `temperature`, `machine_size`, `weight`, `space`, `man_power`, `p_item_warranty`, `p_short_desc`, `p_long_desc`, `p_mete_title`, `p_meta_desc`, `p_meta_keyword`, `BROCHURE`, `p_status`, `p_categries_name`, `p_categries_sub_name`) VALUES
         ('$name','$p_code','$p_model_no','$make','$grade','$materialtype','$size','$con_width','$thickness','$cylinder_size','$pressure','$heating','$pack_type','$pack_accuracy','$seal_time','$production_rete','$food_con_body','$frame_body','$motor','$power_require','$power_consumption','$power_supply','$temperature','$machine_size','$weight','$space','$man_power','$p_item_warranty','$p_short_desc','$p_long_desc','$p_mete_title','$p_meta_desc','$p_meta_keyword','$BROCHURE','$status','$cat','NULL')";
        
        $p_result = mysqli_query($connection, $insert_p);
        if ($p_result) {

            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> Your Data Successfully Added into the Database
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            $get_product_id = "SELECT MAX(p_id) as id FROM `product` WHERE 1";
            $get_p_result = mysqli_query($connection, $get_product_id);
            $data = mysqli_fetch_array($get_p_result);
            $pro_id = $data['id'];
            echo "<script>
            setTimeout(function() {
                window.location.replace('uploadimages.php?pro=$pro_id');

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
}

// $selectid="SELECT * FROM `catagries_images` WHERE 1";



$select1 = "SELECT * FROM `categories`";
$result2 = mysqli_query($connection, $select1);


?>

<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="container">
                        <div class="row">
                            <div class="md-form col-sm-4">
                                <sub class="a-color" data-error="wrong" data-success="right" for="defaultForm-email">CATEGRIES NAME</sub>
                                <select onchange="changeSubCategories(this.value)" name="cat" class="form-control validate" placeholder="Enter Caregorie Name">
                                    <option selected disabled>Choose Categries..</option>
                                    <?php

                                    if (mysqli_num_rows($result2) > 0) {
                                        while ($row = mysqli_fetch_array($result2)) {

                                    ?>
                                            <option value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></option>

                                    <?php }
                                    } ?>
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
                                <input name="name" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Name">


                            </div>

                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">PRODUCT CODE</sub>
                                <input name="p_code" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Product code">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">MODEL NO</sub>
                                <input name="p_model_no" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Model no">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">MAKE</sub>
                                <input name="make" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Electric Motor">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">GRADE</sub>
                                <input name="grade" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Number of product color ">
                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">MATERIAL TYPE</sub>
                                <input name="materialtype" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter number of product ">

                            </div>

                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">SIZE</sub>
                                <input name="size" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">CONVEYOR WIDTH</sub>
                                <input name="con_width" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Thickness</sub>
                                <input name="thickness" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Thickness">
                            </div>


                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">CYLINDER SIZE</sub>
                                <input name="cylinder_size" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                            </div>

                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">PRESSURE</sub>
                                <input name="pressure" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                            </div>

                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">HEATING AREA</sub>
                                <input name="heating" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                            </div>

                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">PACKING TYPE</sub>
                                <input name="pack_type" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                            </div>

                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">PACKING ACCURACY</sub>
                                <input name="pack_accuracy" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                            </div>

                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">SEALING TIME</sub>
                                <input name="seal_time" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                            </div>

                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">PRODUCTION RATE</sub>
                                <input name="production_rete" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Production Rate">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">FOOD CONTACT BODY</sub>
                                <input name="food_con_body" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">FRAME BODY</sub>
                                <input name="frame_body" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Dona Size">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">MOTOR</sub>
                                <input name="motor" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Name">
                            </div>


                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">POWER REQUIREMENT</sub>
                                <input name="power_require" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Power Source">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">POWER CONSUMPTION</sub>
                                <input name="power_consumption" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Power Source">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">POWER SUPPLY</sub>
                                <input name="power_supply" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Power Source">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">TEMPERATURE</sub>
                                <input name="temperature" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Power Source">


                            </div>

                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">MACHINE SIZE</sub>
                                <input name="machine_size" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Power Source">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">WEIGHT</sub>
                                <input name="weight" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Weight of Machine">


                            </div>

                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">SPACE REQUIRED </sub>
                                <input name="space" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Space ">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">MAN POWER </sub>
                                <input name="man_power" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Man Power">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">WARRANTY</sub>
                                <input name="p_item_warranty" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Warranty or no">
                            </div>

                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">ORIGIN COUNTRY</sub>
                                <input name="p_origin_country" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter the country of the product ">
                            </div>

                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">DESCRIPTION</sub>
                                <textarea name="p_long_desc" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Long Description of the product"></textarea>
                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Product meta title</sub>
                                <input name="p_mete_title" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Meta title of the product ">
                            </div>

                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Extra meta Description </sub>
                                <input name="p_meta_desc" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter meta Descrtption of the product">
                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Enter keyword of the product </sub>
                                <input name="p_meta_keyword" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Keyword of the product">
                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1"> Upload BROCHURE </sub>
                                <input name="BROCHURE" type="file" class="form-control" id="exampleFormControlSelect1" placeholder="upload BROCHURE">
                            </div>

                            <div class="form-group">
                                <sub class="a-color" for="exampleFormControlSelect1">Select Status</sub>
                                <select name="status" class="form-control" id="exampleFormControlSelect1">

                                    <option value='1'>Active</option>
                                    <option value='0'>DeActive</option>

                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button name="add" class="btn btn-default">Add Images</button>
                </div>
            </form>
        </div>
    </div>
</div>