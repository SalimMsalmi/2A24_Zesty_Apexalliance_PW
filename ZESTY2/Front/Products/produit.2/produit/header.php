<?php

require 'bd.php';
require '../../controller/panierC.php';
require_once '../../../../config.php';
$DB=new config();
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=zesty', 'root', '');


$panierC1=new panierC();

$idpanier= isset($idpanier);
$list = $panierC1->calculerpanier($idpanier);
$N=0;
$N=$list['nb'];

?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&family=Montserrat:wght@500&family=Ms+Madi&family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="icon" href="../../../back/integration/Zlogo.png">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage -ZESTY</title>
    <!--Jquery ui css file-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" 
    integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />

    <!--Price Range-->
    <link rel="stylesheet" href="price-range.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
    
  </head>
  <body style="background-color:#313233;   opacity:0.9 ;" >
 
    <!-- Navigation-->
    <div class="top-nav">

	<div class="logo">
		<div class="content">
		</div>
	</div>
	<div class="menu">
  <link rel="stylesheet" href="../css/stylenav.css">

  <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                id="navbarDropdown"
                style="margin-left:700px;color:white;"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                >Shop</a
              >
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="index.php">All Products</a></li>
                <li><hr class="dropdown-divider" /></li>
               
                <li><a class="dropdown-item" name="maquillage" href="maquillage.php">Maquillage</a></li>
                <li><a class="dropdown-item"name="soin" href="soin.php">Soin de la peau</a></li>
                <li><a class="dropdown-item"name="coloration" href="coloration.php">Coloration</a></li>
              
              </ul>
            </li>
            
            
          </ul>
		<ul style="color:white;margin-left:-30px;font-size: 14px;">
    
      <a href="../../..\login\users\landing/landing.php"><li style="color:white;">Home</li></a>
      <a href="../../../Services/view/service.php"><li style="color:white;">services</li></a>
      <a href=""><li style="color:white;">products</li></a>
     <a href="../../../News/view/Newsfront.php"><li style="color:white;">blogs</li></a>
     <a href="../../../Offers/front.php"><li style="color:white;">offers</li></a>
		</ul>

	</div>
	</div>

    <!-- Header-->
    <header class="bergila-back py-5" style="font-family:Montserrat; font-style: normal;">
    
   <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
          <h1 class="display-4 fw-bolder"style="font-family: 'Montserrat';font-style:normal;
          font-size: 100px;
          color:grey;"> ZESTY</h1>
          
          <p class="lead fw-normal text-white-50 mb-0" style="font-size: 30px; ">
            Beauté sans limite.
          </p>
          <form class="d-flex">
           <div >
          <a href="showpanier.php"class="btn btn-outline-dark" type="submit">
              <i class="bi-cart-fill me-1"></i>
              Cart
              <span id="nb_produit" class="badge bg-dark text-white ms-1 rounded-pill"><?php  echo $N; ?></span>
          </a>
          </form>
          </div>
        </div>
      </div>
    </header>
   <style>
     .bergila-back{
  background-color: black;
  background-image: url('https://www.loreal-paris.fr/-/media/oap/feature/homepage-slider/desktop/fr20237-banniere-midnight-serum_desktop-1680x430_v2-1.ashx');
    background-repeat:no-repeat;
    background-position-x: center;
}
   </style>
    
    <script src="panier.js"></script>
    <!--Jquery ui js file-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" 
    integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>