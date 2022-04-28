<?php 

/////////affich des services
$mysqli = new mysqli('localhost', 'root', '', 'zestymar') or die(mysqli_error($mysqli));
$result= $mysqli->query("SELECT * FROM services") or die($mysqli->error);
$filter= $mysqli->query("SELECT * FROM typeservice") or die($mysqli->error);
$idservice=0;
$nameservice='';
$priceservice='';
 $imgservice='';
$error = "";

/////////////categories 
/*$conn= mysqli_connect('localhost', 'root', '', 'zestymar');
if(isset($_GET['idtype']))
{
    $idtype=$_GET['idtype'];
}else{
    header("location:service.php");
}
*/


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Zesty - Services</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/Zlogo.png" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet"> 
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top Bar Start -->
        <div class="top-bar d-none d-md-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="top-bar-left">
                            <div class="text">
                                <i class="far fa-clock"></i>
                                <h2>8:00AM - 9:00PM</h2>
                                <p>Mon - Fri</p>
                            </div>
                            <div class="text">
                                <i class="fa fa-phone-alt"></i>
                                <h2>+216 98663542</h2>
                                <p>For more!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="top-bar-right">
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                
                <a href="index.html" class="logoz"><img  src="img/Zlogo.png"></a>
                <label class="logo">Zesty</label>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        
                        
                        <a href="service.html" class="nav-item nav-link active">Service</a>
                        
                        <a href="rdv.php" class="nav-item nav-link">Book now</a>
                        
                        <div class="nav-item dropdown">
                           
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->


        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Services & Appointements</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Services & Appointements</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Service Start -->
        <div class="service">
            <div class="container">
            <div class="class-wrap">
                        <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <p>What we offer</p>
                    <h2>Our services</h2>
                </div>
                </div>
                </div>


                <div class="row class-container">
                  
                <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-1 wow fadeInUp" data-wow-delay="0.0s">
                <div class="class-wrap">
                        <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <p>What we offer</p>
                    <h2>Our services</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                    <?PHP while ($row = $filter->fetch_assoc()): ?> 
                        <ul id="class-filter">
                            <li data-filter=".filter-1"><a href="./categories.php?idtype=<?php echo $row['idtype'] ?>"><?php echo $row['nomtype'];?></li>
                        </ul>
                        <?php endwhile;?>    
                        
                    </div>
                        </div>
                        </div>

                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 class-item  wow fadeInUp" data-wow-delay="0.2s">


                     <!-- <?php 
                      //get serv based on selected categ
                      $sql2="SELECT * FROM services WHERE typeservice=$idtype ";
                      $res2= mysqli_query($conn,$sql2);
                      while($row2=mysqli_fetch_assoc($res2))
                      {
                          $imgservF=$row2['imgservice'];
                          $nameservF=$row2['nameservice'];
                          $priceservF=$row2['priceservice'];
                      }
                       ?>

<div class="class-wrap">
                            <div class="class-img">
                                <img src="<?php echo $imgservF; ?>" alt="Image">
                            </div>
                            <div class="class-text">
                                <div class="class-teacher">
                                    <img src="img/panier.png" alt="Image">
                                    <h3> <?php echo  $priceservF;?></h3>
                                    <a class="+">+</a>
                                       
                                  
                                </div>
                                <h2> <?php echo $nameservF;?></h2>
                                <div class="class-meta">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>

                                </div>
                            </div>
                        </div>-->






<!--affich kol-->
                    <?PHP while ($row = $result->fetch_assoc()): ?> 
                  <div class="class-wrap">
                            <div class="class-img">
                                <img src="<?php echo $row['imgservice']; ?>" alt="Image">
                            </div>
                            <div class="class-text">
                                <div class="class-teacher">
                                    <img src="img/panier.png" alt="Image">
                                    <h3> <?php echo $row['priceservice'];?></h3>
                                    <a class="+">+</a>
                                       
                                  
                                </div>
                                <h2> <?php echo $row['nameservice'];?></h2>
                                <div class="class-meta">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>

                                </div>
                            </div>
                        </div>
                        <?php endwhile;?>   
                    
        
                    </div>
                   
                    <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-3 wow fadeInUp" data-wow-delay="0.4s">

                      <!-- Book now Start -->
         <div class="discount wow zoomIn" data-wow-delay="0.1s" style="margin-bottom: 90px;">
            <div class="container">
                <div class="section-header text-center">
                    <p>Zesty </p>
                    <h2>Get <span>10%</span> Discount for booking online</h2>
                </div>
                <div class="container discount-text">
                    <p>
Book your appointement online and get a discount! What are you waiting for                  </p>
                    <a  href="rdv.php" class="btn">Book Now</a>
                </div>
            </div>
        </div>
        <!-- Book now End --> 
                      
                    </div>
                   <!-- <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-4 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="class-wrap">
                            <div class="class-img">
                                <img src="img/facial.jpg" alt="Image">
                            </div>
                            <div class="class-text">
                                <div class="class-teacher">
                                    <img src="img/panier.png" alt="Image">
                                    <h3>480DT</h3>
                                    <a class="+">+</a>
                                </div>
                                <h2>Facial treatement Pack</h2>
                                <div class="class-meta">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-1 wow fadeInUp" data-wow-delay="0.8s">
                        <div class="class-wrap">
                            <div class="class-img">
                                <img src="img/3.jpg" alt="Image">
                            </div>
                            <div class="class-text">
                                <div class="class-teacher">
                                    <img src="img/panier.png" alt="Image">
                                    <h3>480DT</h3>
                                    <a class="+">+</a>
                                </div>
                                <h2>Facial treatement Pack</h2>
                                <div class="class-meta">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-2 wow fadeInUp" data-wow-delay="1s">
                        <div class="class-wrap">
                            <div class="class-img">
                                <img src="img/hair.jpg" alt="Image">
                            </div>
                            <div class="class-text">
                                <div class="class-teacher">
                                    <img src="img/panier.png" alt="Image">
                                    <h3>500DT</h3>
                                    <a class="+">+</a>
                                </div>
                                <h2>Keratin treatement </h2>
                                <div class="class-meta">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-5 wow fadeInUp" data-wow-delay="1s">
                        <div class="class-wrap">
                            <div class="class-img">
                                <img src="img/bride.jpg" alt="Image">
                            </div>
                            <div class="class-text">
                                <div class="class-teacher">
                                    <img src="img/panier.png" alt="Image">
                                    <h3>1800DT</h3>
                                    <a class="+">+</a>
                                </div>
                                <h2>Bridal Makeup and Hair</h2>
                                <div class="class-meta">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-5 wow fadeInUp" data-wow-delay="1s">
                        <div class="class-wrap">
                            <div class="class-img">
                                <img src="img/b.jpg" alt="Image">
                            </div>
                            <div class="class-text">
                                <div class="class-teacher">
                                    <img src="img/panier.png" alt="Image">
                                    <h3>3800DT</h3>
                                    <a class="+">+</a>
                                </div>
                                <h2>Full Bridal Styling</h2>
                                <div class="class-meta">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    

                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>     
                   
        <!-- Service End -->




  </div>


  
 





        <!-- Footer Start -->
        <div class="footer wow fadeIn" data-wow-delay="0.3s">
            <div class="container-fluid">
                <div class="container">
                    <div class="footer-info">
                      
                        <h3>123 Street, Tunis, Tunisia</h3>
                        <div class="footer-menu">
                            <p>+216 98663542</p>
                            <p>zesty@gmail.com</p>
                        </div>
                        <div class="footer-social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="container copyright">
                    <div class="row">
                        <div class="col-md-6">
                            <p>&copy; <a href="#">Zesty</a>, All Right Reserved.</p>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
