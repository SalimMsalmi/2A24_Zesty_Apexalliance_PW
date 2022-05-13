<?php
	include 'Controller/OffreC.php';
	$offreC=new OffreC();
	$offreC->supprimeroffre($_GET["id"]);
	header('Location:offre_dash.php');
?>