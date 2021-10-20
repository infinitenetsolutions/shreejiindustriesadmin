<?php
session_start();
$connection=mysqli_connect("localhost","root","","shreeji_ind_db");
if($connection){
    // echo"Connection Establish successfully";
}
else{
    echo"Somthing is error";
}

?>