<?php
require 'panierClass.php';
require 'bd.php';
$panier=new panierYoutube();
$DB=new DB();



if(isset($_GET['id'])){
$product=$DB->query('SELECT id FROM produit WHERE id=:id',array('id'=> $_GET['id']));

if(empty($product)){
    die("Ce Produit n'existe pas");

}

$panier->add($product[0]->id);
die('Le porduit a bien ete ajoute a votre panier <a href="javascript:history.back()">retourner au catalogue</a>');

}
else{
    die("Vous n'avez pas selectionné de produit à ajouter");
}