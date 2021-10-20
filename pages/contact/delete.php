<?php

if(isset($_GET['delete'])){
    include '../../connection.inc.php';
$id=$_GET['delete'];
$delete="delete from contact where con_id=$id";
$result=mysqli_query($connection,$delete);
if($result){
    header('location:contact.php');
}
else{
    echo "data not deleted here";
}
}
?>