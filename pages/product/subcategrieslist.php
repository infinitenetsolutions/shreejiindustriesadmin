<?php
include '../../connection.inc.php';
 echo $cat_name= $_GET['data'];
$get_sub_categries="SELECT * FROM `categories_sub` WHERE `sc_categories_name`='$cat_name'";
$result=mysqli_query($connection,$get_sub_categries);
while($data=mysqli_fetch_array($result)){
    echo '<option value="'.$data['sc_name'].'">'.$data['sc_name'].'</option>';
}

?>
