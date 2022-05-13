<?php
	include '../controller/NewsC.php';
	$NewsC=new NewsC();
	$NewsC->supprimernews($_GET["id"]);
	header('Location:News.php');
?>