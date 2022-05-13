<?php
	include '../controller/resC.php';
	$resC=new resC();
	$resC->supprimerres($_GET["idres"]);
	header('Location:service.php');
?>