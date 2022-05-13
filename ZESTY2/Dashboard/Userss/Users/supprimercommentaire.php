<?php
	include '../controller/CommentaireC.php';
	$CommentaireC=new CommentaireC();
	$CommentaireC->supprimercommentaire($_GET["id"]);
	header("Location:News.php");
	?> 