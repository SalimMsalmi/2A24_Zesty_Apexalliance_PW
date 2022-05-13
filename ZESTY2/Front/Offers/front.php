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
        <div class="top-nav">
	<div class="logo">
		<div class="content">
		</div>
	</div>
	<div class="menu">
    <link href="style.css" rel="stylesheet" />

		<ul>
        <a href="../..\Front\Login\users\landing/landing.php"><li style="color:white;">Home</li></a>
            <a href="../../Front/Services/view/service.php"><li class="li" style="color:white;">services</li></a>
			<a href="../../Front/Products/produit.2/produit/index.PHP"> <li class="li" style="color:white;">products</li></a>
			<a href="../../Front\News\view\Newsfront.php"><li class="li" style="color:white;">blogs</li></a>
			<a style="color:white;text-decoration:none;" href="../../Front/Offers/front.php"><li class="li">Offers</li></a>
		</ul>
	</div>
    <img src="images/play.png" id="music_icon">
    <form class="d-flex">
                        <a class="btn btn-outline-dark" style="margin-left:1000px"href="index.php" type="submit">
                            <i class="bi bi-percent"></i>
                            Quiz
                            
                        </a>
                    </form>
	
	</div>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white"  style="font-family:Montserrat; font-style: normal;">
                    <h1 class="display-4 fw-bolder">Promo et Offres</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Zesty</p>
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
                    <div class="col mb-5" style="font-family:Montserrat; font-style: normal;">
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
                                    <?php 

                                    echo ($promo['prix']-(($promo['prix']*$promo['por_promo'])/100)); ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="../../Front/Services/view/rdv.php">Add to cart</a></div>
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
            <!-- <div class="container"><p class="m-0 text-center text-white"> &copy; </p></div> -->
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