<?php
require 'panierClass.php';
require 'bd.php';
require '../../../../controller/panierC.php';
$panier=new panierYoutube();
$DB=new DB();
?>
<?php
$mysqli = new mysqli('localhost', 'root', '', 'zesty') or die(mysqli_error($mysqli));
if(isset($_POST['tri']))
{if(isset($_POST['tnom']))
  
  
  header("location:index.php");
}
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
                <li><a class="dropdown-item" href="#!">Maquillage</a></li>
                <li><a class="dropdown-item" href="#!">Soin de la peau</a></li>
                <li><a class="dropdown-item" href="#!">Coloration</a></li>
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div style="
  height: 70px;
  width: 90%;


  display: flex;
  flex-direction: row;
  justify-content: space-evenly;
  align-items: center;">
   <table><tr><td><h6>Chercher Produit:</h6></td>
    <td><input style="margin-left:50px"type="text"placeholder="Search"></td>
<form method="post"action="index.php">
    <td><select style="height:30px" value="Trier" name="Trier" id="Trier">
    <option name="tnom"  >Tri par nom</option>
    <option name="tprix" >Tri par prix</option>
    <option name="tcategorie" >Tri par categorie</option>
    </td>
    <td><button value="tri">Trier</button></td>
    </form>
  </tr></table> 
    </div>
</nav>
    <script src="panier.js"></script>