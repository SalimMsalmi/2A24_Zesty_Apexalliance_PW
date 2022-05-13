<?php
	include 'Controller/OffreC.php';
    $offreC=new offreC();
	$listeoffre=$offreC->afficheroffre(); 
    $promoC=new promoC();
    $listepromo=$promoC->afficherpromo(); 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Zesty Offers</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="stylee.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img style=" width: 50px;border: 1px solid #000000;
    box-sizing: border-box;
    border-radius: 900px;
  height: 50px;"class="img-thumbnail" src="images/Zlogo.png" alt="">

            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Zesty</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="../../Front/Login/Users/Landing/Landing.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <a class="btn btn-outline-dark" href="index.php" type="submit">
                            <i class="bi bi-percent"></i>
                            Quiz
                            
                        </a>
                    </form>
                    <img src="images/play.png" id="music_icon">
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Zesty</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Beauté Sans Limite</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                   
                    <!---->
                    <?php
				  foreach($listeoffre as $offre){
			?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                           <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>-->
                            <!-- Product image-->
                            <img class="card-img-top" src="images/<?php echo $offre['img_offre']; ?>" alt="..." />
                           
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $offre['nom_offre']; ?></h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                   <!-- <span class="text-muted text-decoration-line-through">$20.00</span>-->
                                   <?php echo $offre['id_offre']; ?>                                </div>
                             </div>
                             <!-- Product actions-->
                             <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                            
                
                        </div>
                    </div>
                    <?php
                 }
                    ?>
                                <?php
				  foreach($listepromo as $promo){
			?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="images/<?php echo $promo['img_promo']; ?>" alt="..." />
                           
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $promo['nom_promo']; ?></h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">$<?php echo $promo['prix']; ?></span>
                                    <?php echo $promo['prix']; ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <?php
                 }
                    ?>
                    
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white"> &copy; </p></div>
        </footer>

        <audio id="mySong">
            <source src="song.mp3" type="audio/mp3">
        </audio>
        <script>
            var mySong=document.getElementById("mySong");
            var music_icon=document.getElementById("music_icon");
            mySong.play();
            music_icon.src="images/pause.png";
            music_icon.onclick= function(){
                if(mySong.paused){
                    mySong.play();
                    music_icon.src="images/pause.png"
                }else{
                    mySong.pause();
                    music_icon.src="images/play.png"
                }
            }
        </script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
         <!--  <script src="js/scripts.js"></script>
     <script src="shortcut.js"></script>-->
    
      
    </body>
</html>
<style>

    #music_icon{

        width: 50px;
        cursor: pointer;

    }
</style>