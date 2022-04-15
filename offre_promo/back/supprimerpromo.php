<?php
	include '../Controller/OffreC.php';
	$promoC=new PromoC();
	$promoC->supprimerpromo($_GET["id"]);
	header('Location:offre_dash.php');
?>