<?php

if(isset($_GET['delete'])){
    include '../../connection.inc.php';
$id=$_GET['delete'];
$delete="delete from catagries_images where ci_id=$id";
$result=mysqli_query($connection,$delete);
if($result){
    header('location:categoriesData.php');
}
else{
    echo "data not deleted here";
}
}
?>