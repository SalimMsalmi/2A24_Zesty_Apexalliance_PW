<?php
session_start();
require '../../../../controller/panierC.php';
require '../../../../controller/produitC.php';


//if(!isset($_SESSION['idc'])){   header('Location:connexion.php'); } else{

if (isset($_POST["id"])){

    $panier= new panier($_POST["img"],$_POST["nom"],(int) $_POST["prix"],1 ,(int)$_POST["id"],1);
    $panierC= new panierC();
    $panierC->ajouterpanier($panier);
    header("location:index.php");
    }
//}
    
?>	