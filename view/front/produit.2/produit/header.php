<?php

require 'bd.php';
require '../../../../controller/panierC.php';
require_once '../../../../config.php';
$DB=new config();
?>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=zesty', 'root', '');

?>



<?php
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
  <body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      
      <a href="index.php"> <img style=" width: 50px;border: 1px solid #000000;
    box-sizing: border-box;
    border-radius: 900px;
  height: 50px;"class="img-thumbnail" src="../../img/zesty.png" alt=""></a> 
   
        
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../../index.html ">Home</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="../../blog.html">Blog</a></li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                id="navbarDropdown"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                >Shop</a
              >
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">All Products</a></li>
                <li><hr class="dropdown-divider" /></li>
               
                <li><a class="dropdown-item" name="maquillage" href="#!">Maquillage</a></li>
                <li><a class="dropdown-item"name="soin" href="#!">Soin de la peau</a></li>
                <li><a class="dropdown-item"name="coloration" href="#!">Coloration</a></li>
              
              </ul>
            </li>
          </ul>
          <form class="d-flex">
           <div > <input type="text"placeholder="Search">  
          <a href="showpanier.php"class="btn btn-outline-dark" type="submit">
              <i class="bi-cart-fill me-1"></i>
              Cart
              <span id="nb_produit" class="badge bg-dark text-white ms-1 rounded-pill"><?php  echo $N; ?></span>
          </a>
          </form>
          </div>
        </div>
      </div>
    </nav>
    <!-- Header-->
    <header style="  background-image: none;"class="bg-dark py-5">
    
   <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
          <h1 class="display-4 fw-bolder"> ZESTY</h1>
          <p class="lead fw-normal text-white-50 mb-0">
            Beauté sans limite.
          </p>
        </div>
      </div>
    </header>
   
    
    <script src="panier.js"></script>
    <!--Jquery ui js file-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" 
    integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>