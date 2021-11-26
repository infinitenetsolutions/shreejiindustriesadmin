<?php
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';
echo $prarity= $_GET['data'];
echo $id=$_GET['id'];
$prarity1=$prarity+1;
  $update_data = "UPDATE `product` SET `p_categries_sub_name`='$prarity1' WHERE `p_categries_sub_name`='$prarity' ";
  $result_data = mysqli_query($connection, $update_data);


  $update_data = "UPDATE `product` SET `p_categries_sub_name`='$prarity' WHERE `p_id`='$id' ";
  $result_data = mysqli_query($connection, $update_data);
