<?php
 include 'connect.php';
 if(isset($_GET['deleteid'])){
     $ID=$_GET['deleteid'];
     $sql="delete from crudrec where ID=$ID";
     $result=mysqli_query($con,$sql);
     if($result){
         echo "deleted successfull";
         header("Location: dash_user.php");
     }
     else{
         die(mysqli_error($con));
     }
 }

 ?>