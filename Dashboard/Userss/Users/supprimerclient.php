<?php
  include '../../Front/Login/Controller/UserC.php';
  $userC=new clientC();
	$userC->supprimerusers($_GET["id"]);
	header('Location:user_dash.php');
?>