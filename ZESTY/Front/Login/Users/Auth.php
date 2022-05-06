<?php
 include '../Controller/UserC.php';
 $error = "";
 $user = null;
 $admin = null;
 $UserC = new ClientC();
 session_start();
 $user=$UserC->recupereruser($_POST["cin"]);
 if($user)
 {
     if($user["pwd"]==$_POST["pwd"])
     {
         $_SESSION["clientcin"]=$_POST["cin"];
         header("Location: ./Landing/Landing.php");
     }
     else {
    $admin=$UserC->recupereradmin($_POST["cin"]);
     if($admin)
     {
         if($admin["pwd"]==$_POST["pwd"])
         {
             $_SESSION["admincin"]=$_POST["cin"];
             header("Location: ../../../Dashboard/Users/dash_user.php");
         }
         else header("Location: Login.php");
     }else header("Location: Login.php");
     }
 }else {
     $admin=$UserC->recupereradmin($_POST["cin"]);
     if($admin)
     {
         if($admin["pwd"]==$_POST["pwd"])
         {
             $_SESSION["admincin"]=$_POST["cin"];
             header("Location: ../../../Dashboard/Users/dash_user.php");
         }
         else header("Location: Login.php");
     }else header("Location: Login.php");
 }
?> 