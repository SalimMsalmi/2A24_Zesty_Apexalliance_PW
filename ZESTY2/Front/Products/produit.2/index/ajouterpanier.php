<?php
session_start();
require '../../../../controller/panierC.php';
require '../../../../controller/produitC.php';


 

if (isset($_POST["id"])){

    $panier= new panier($_POST["img"],$_POST["nom"],(int) $_POST["prix"],1 ,(int)$_POST["id"]);
    $panierC= new panierC();
    $panierC->ajouterpanier($panier);
    header("location:index.php");
    }
    
?>	