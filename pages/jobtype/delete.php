<?php

if(isset($_GET['delete'])){
    include '../../connection.inc.php';
$id=$_GET['delete'];
$delete="delete from categories where c_id=$id";
$result=mysqli_query($connection,$delete);
if($result){
    header('location:categories.php');
}
else{
    echo "data not deleted here";
}
}
?>