<?php
	include '../Controller/ServiceC.php';
	$serviceC=new serviceC();
	$serviceC->supprimerservice($_GET["idservice"]);
	header('Location:intrfaci.php');
?>