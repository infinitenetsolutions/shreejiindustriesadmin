<?php
$msg = "";
$cat = '';
$all_sub_cat = '';
$status = " ";
include '../../AdminLogin/function.inc.php';


if (isset($_POST['add'])) {
    $cat = $_POST['cat'];
    // $all_sub_cat = $_POST['all_sub_cat'];

    $name = $_POST['name'];
    $p_code = $_POST['p_code'];
    $p_model_no = $_POST['p_model_no'];
    $p_dona_size = $_POST['p_dona_size'];
    $p_thickness = $_POST['p_thickness'];
    $p_rate = $_POST['p_rate'];
    $p_source = $_POST['p_source'];
    $p_electric_motor = $_POST['p_electric_motor'];
    $p_motor_make = $_POST['p_motor_make'];
    $p_weight = $_POST['p_weight'];
    $p_power_consumption = $_POST['p_power_consumption'];
    $p_space_required = $_POST['p_space_required'];
    $p_man_power = $_POST['p_man_power'];
    $p_accessories = $_POST['p_accessories'];
    $mrp = $_POST['mrp'];
    $price = $_POST['price'];
    $qty = $_POST['color'];
    $p_item_warranty = $_POST['p_item_warranty'];
    $p_origin_country = $_POST['p_origin_country'];
    $p_shop_fee = $_POST['p_shop_fee'];
    $p_short_desc = $_POST['p_short_desc'];
    $p_long_desc = $_POST['p_long_desc'];

    $p_mete_title = $_POST['p_mete_title'];
    $p_meta_desc = $_POST['p_meta_desc'];
    $p_meta_keyword = $_POST['p_meta_keyword'];
    $p_long_desc = $_POST['p_long_desc'];
    $BROCHURE = addslashes(file_get_contents($_FILES['BROCHURE']['tmp_name']));

    $status = $_POST['status'];


    if ($cat != '') {
        echo   $insert_p = "INSERT INTO `product`(`p_name`, `p_code`, `model_no`, `p_thickness`, `p_production_rate`, `p_power_sourse`, `p_electricity_moter`, `p_power_consumsion`, `p_space_required`, `p_man_power`, `p_accessories`, `p_maked`, `p_mrp`, `p_s_price`, `p_color`, `p_quantity`, `p_item_weigth`, `p_item_warranty`, `p_size`, `p_origin_country`, `p_shop_fee`, `p_extra_sp`, `p_short_desc`, `p_long_desc`, `p_mete_title`, `p_meta_desc`, `p_meta_keyword`,`BROCHURE`, `p_status`,`p_categries_name`, `p_categries_sub_name`) VALUES
         ('$name','$p_code','$p_model_no','$p_thickness','$p_rate','$p_source','$p_electric_motor','$p_power_consumption','$p_space_required','$p_man_power','$p_accessories','$p_motor_make','$mrp','$price','NULL','NULL','$p_weight','$p_item_warranty','$p_dona_size','$p_origin_country','$p_shop_fee','NULL','$p_short_desc','$p_long_desc','$p_mete_title','$p_meta_desc','$p_meta_keyword','$BROCHURE','$status','$cat','NULL')";
        $p_result = mysqli_query($connection, $insert_p);
        if ($p_result) {

            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> Your Data Successfully Added into the Database
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';

            echo "<script>
            setTimeout(function() {
                window.location.replace('uploadimages.php');

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
                    <h4 class="modal-title w-100 font-weight-bold">Categories</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="container">
                        <div class="row">
                            <div class="md-form col-sm-4">
                                <sub class="a-color" data-error="wrong" data-success="right" for="defaultForm-email">Categories Name</sub>
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
                                <sub class="a-color" for="exampleFormControlSelect1">Name</sub>
                                <input required name="name" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Name">


                            </div>

                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Product code</sub>
                                <input required name="p_code" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Name">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Model no</sub>
                                <input required name="p_model_no" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Name">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Paper Dona Size</sub>
                                <input required name="p_dona_size" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Name">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Thickness</sub>
                                <input required name="p_thickness" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Name">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Production Rate</sub>
                                <input required name="p_rate" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Name">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Power Source</sub>
                                <input required name="p_source" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Name">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Electric Motor</sub>
                                <input required name="p_electric_motor" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Name">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Motor Make</sub>
                                <input required name="p_motor_make" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Name">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Weight of Machine</sub>
                                <input required name="p_weight" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Name">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Power Consumption</sub>
                                <input required name="p_power_consumption" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Name">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Space Required</sub>
                                <input required name="p_space_required" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Name">


                            </div>




                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Man Power</sub>
                                <input required name="p_man_power" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Name">


                            </div>




                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1"> Accessories </sub>
                                <input required name="p_accessories" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Name">


                            </div>






















                            <div class="form-group col-sm">
                                <sub class="a-color" for="exampleFormControlSelect1">MRP</sub>
                                <input required name="mrp" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Price MRP">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Selling Price</sub>
                                <input required name="price" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Real price">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Quantity</sub>
                                <input required name="qty" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter number of product ">


                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Color</sub>
                                <input required name="color" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Number of product color ">
                            </div>


                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Item Warranty</sub>
                                <input required name="p_item_warranty" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter product Warranty or no">
                            </div>

                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Origin Country</sub>
                                <input required name="p_origin_country" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter the country of the product ">
                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Shopping fee </sub>
                                <input required name="p_shop_fee" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Shopping fee of the product or no ">
                            </div>


                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Short Description</sub>
                                <input required name="p_short_desc" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter short Descrition of the product">
                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Long Description</sub>
                                <textarea name="p_long_desc" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Long Description of the product"></textarea>
                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Product meta title</sub>
                                <input required name="p_mete_title" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Meta title of the product ">
                            </div>

                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Extra meta Description </sub>
                                <input required name="p_meta_desc" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter meta Descrtption of the product">
                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1">Enter keyword of the product </sub>
                                <input required name="p_meta_keyword" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Keyword of the product">
                            </div>
                            <div class="form-group col-sm-4">
                                <sub class="a-color" for="exampleFormControlSelect1"> Upload BROCHURE </sub>
                                <input required name="BROCHURE" type="file" class="form-control" id="exampleFormControlSelect1" placeholder="upload BROCHURE">
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