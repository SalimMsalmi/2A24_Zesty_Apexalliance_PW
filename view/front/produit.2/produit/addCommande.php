<?php
session_start();

include "../../../../controller/commandeC.php";
include "../../../../model/commande.php";
include "../../../../controller/panierC.php";


$panierC=new panierC();

if (isset($_POST["client"]))
   $panierC->supprimertout($_POST["client"]);
    $commande= new commande($_POST["client"],$_POST["prix_tot"],$_POST["etat"]);
    $commandeC= new commandeC();
    $commandeC->ajoutercommande($commande);
      header("location:methodedepayment.php");
      //header("location:../../view/back/commande.php");

?>	