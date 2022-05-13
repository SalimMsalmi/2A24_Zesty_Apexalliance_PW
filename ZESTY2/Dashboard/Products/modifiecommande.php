<?php
include "../Products/controller/commandeC.php";

require_once "../../config.php";
$id_commande=$_POST["id_commande"];
$etat=$_POST["etat"];


$commandeC=new commandeC();
$commandeC->modifiercommande($id_commande,$etat);
header("location:Commande.php");
?>