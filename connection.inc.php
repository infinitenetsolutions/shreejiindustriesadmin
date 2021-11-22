<?php
session_start();
if($_SERVER['HTTP_HOST']=='localhost'){
$connection=mysqli_connect("localhost","root","","shreejiindustries_db");
}
else{
    $connection=mysqli_connect("localhost","shreejiindustries_db","Raja83013@#","shreejiindustries_db");
}
if($connection){
    // echo"Connection Establish successfully";
}
else{
    echo"Somthing is error";
}

?>