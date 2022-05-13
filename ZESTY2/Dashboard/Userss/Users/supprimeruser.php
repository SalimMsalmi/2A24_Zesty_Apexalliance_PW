<?php
	include '../Controller/UserC.php';
	$userC=new UserC();
	$userC->supprimerusers($_GET["id"]);
	header('Location:user_dash.php');
?>