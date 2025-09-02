<?php
include("config.php");
error_reporting(0);
 $id=$_GET['id'];
 $query= "DELETE FROM `events` WHERE id ='$id'";
 $run=mysqli_query($conn,$query);
 if($run){
        echo "<script>alert ('Post has been deleted')</script>";
         echo "<script>window.open('dashboard.php','_self')</script>";

 }else{
    echo "not" ;
 }
?>