<?php
 include_once '../../Controller/UserC.php';
 $user = null;
 session_start();
 $UserC = new ClientC();
 if(isset($_SESSION["clientcin"]))
 {
 	$user=$UserC->recupereruser($_SESSION["clientcin"]);
	
 }
 $UserC->modifieroffline($_SESSION["clientcin"]);
 header("Location: ../Login.php");
?>