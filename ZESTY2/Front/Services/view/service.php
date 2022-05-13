

<?php 
include_once '../controller/resC.php';
session_start();
$UserC = new ClientC();
if(isset($_SESSION["clientcin"]))
{
    $user=$UserC->recupereruser($_SESSION["clientcin"]);
   
}
/////////affich des services
$mysqli = new mysqli('localhost', 'root', '', 'zesty') or die(mysqli_error($mysqli));
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
        <style>
            .top-nav{
  width: 100%;
  height: 80px;
  font-size: 15px;
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  z-index: 10;
  color: #fff;
  font-family: 'Montserrat';
  font-style: normal;
}
.menu{
  position: absolute;
  width: 459px;
}
.logo{
  position: absolute;
  left: 20px;

}
.logo .content{
  width: 70px;
  height: 70px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: url(../img/Zlogo.png);
  background-size: contain;
  background-repeat: no-repeat;
}
.User{
  position: absolute;
  right: 20px;
}
.User img{
  width: 70px;
  height: 70px;
  border: 2px solid #fff; 
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 100%;
}
.action{
  position: fixed;
  top: 6px;
  left: 96%;
}
.action .User{
  position: relative;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  overflow: hidden;
  cursor: pointer;
}
.action .User img{
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  object-fit: cover;
}
.action .menu-profile{
  position: absolute;
  top: 120px;
  right: -10px;
  width: 200px;
  padding: 10px 20px;
  border-radius: 15px;
  box-sizing: 0 5px 5px black;
  transition: .5s;
  background-color: white;
  visibility: hidden;
  opacity: 0;
  right: 13px;
}
.action .menu-profile.active{
  top: 80px;
  visibility: visible;
  opacity: 1;
}
.action .menu-profile::before{
  position: absolute;
  content: '';
  top: -1px;
  right: 10px;
  width: 1px;
  height: 1px;
  padding: 10px 20px;
  transform: rotate(45deg);
  transition: .5s;
  background-color: white;
}
.action .menu-profile h3{
  width: 100%;
  text-align: center;
  font-size: 18px;
  font-weight: 500px;
  color: #555;
  line-height: 1.2rem;
  margin-bottom: 10px;
  position: relative;
}
.action .menu-profile h3 span{
  font-size: 14px;
  font-weight: 300;
}
.action .menu-profile ul{
  margin-block-start: 0;
  margin-block-end: 0;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  padding-inline-start: 0px;
  flex-direction: column;
  /*color: #555;*/
}
.action .menu-profile ul li{
  list-style: none;
  display: flex;
  justify-content: flex-start;
  align-items: center;
  width: 100%;
  border-top: 1px solid rgb(201, 201, 201);
  opacity: .7;
  color: black;
  margin-top: 5px;
}
.action .menu-profile ul .fa-solid{
  margin-right: 20px;
}
.action .menu-profile ul .fa-solid{
  margin-right: 20px;
}
.action .menu-profile ul li:hover{
  opacity: 1;
}
.ul{
  list-style: none;
  display: flex;
}
.li{
  margin: 0 8px;
  text-transform: capitalize;
  letter-spacing: 1px;
  cursor: pointer;
  color:black;
}

.img{
  width: 40%;
  border-top-right-radius: 50%;
  border-top-left-radius: 50%;
  overflow: hidden;
  position: absolute;
  left: 49.4%;
  
  transform: translateX(-50%) translateY(10%);
  
  top: 120px;
}
.img img{
  width: 100%;
}
.popup{
  position: absolute;
  left: 50%;
}


.popup{
  background: #fff;
  padding: 25px;
  border-radius: 15px;
  top: -150%;
  max-width: 380px;
  width: 100%;
  opacity: 0;
  pointer-events: none;
  box-shadow: 0px 10px 15px rgba(0,0,0,0.1);
  transform: translate(-50%, -50%) scale(1.2);
  transition: top 0s 0.2s ease-in-out,
              opacity 0.2s 0s ease-in-out,
              transform 0.2s 0s ease-in-out;
}
.popup.show{
  top: 293%;
  opacity: 1;
  pointer-events: auto;
  transform:translate(-50%, -50%) scale(1);
  transition: top 0s 0s ease-in-out,
              opacity 0.2s 0s ease-in-out,
              transform 0.2s 0s ease-in-out;

}
.popup :is(header, .icons, .field){
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.popup header{
  padding-bottom: 15px;
  border-bottom: 1px solid #ebedf9;
  color:black;
}
header span{
  font-size: 21px;
  font-weight: 600;
}
header .close, .icons a{
  display: flex;
  align-items: center;
  border-radius: 50%;
  justify-content: center;
  transition: all 0.3s ease-in-out;
}
header .close{
  color: #878787;
  font-size: 17px;
  background: #f2f3fb;
  height: 33px;
  width: 33px;
  cursor: pointer;
}
header .close:hover{
  background: #ebedf9;
}
.popup .content{
  margin: 20px 0;
  color:black;
}
.popup .icons{
  margin: 15px 0 20px 0;
}
.content p{
  font-size: 16px;
}
.content .icons a{
  height: 50px;
  width: 50px;
  font-size: 20px;
  text-decoration: none;
  border: 1px solid transparent;
}

.content span{
  font-weight: 800;
}
.content .field{
  margin: 12px 0 -5px 0;
  height: 45px;
  border-radius: 4px;
  padding: 0 5px;
  border: 1px solid #e1e1e1;
  background-color: black;
  color: white;
  display: flex;
  justify-content: center;
}


.popup-modif{
  position: absolute;
  left: 50%;
}


.popup-modif{
  background: #fff;
  padding: 25px;
  border-radius: 15px;
  top: -150%;
  max-width: 380px;
  width: 100%;
  opacity: 0;
  pointer-events: none;
  box-shadow: 0px 10px 15px rgba(0,0,0,0.1);
  transform: translate(-50%, -50%) scale(1.2);
  transition: top 0s 0.2s ease-in-out,
              opacity 0.2s 0s ease-in-out,
              transform 0.2s 0s ease-in-out;
}
.popup-modif.show{
  top: 504%;
  opacity: 1;
  pointer-events: auto;
  transform:translate(-50%, -50%) scale(1);
  transition: top 0s 0s ease-in-out,
              opacity 0.2s 0s ease-in-out,
              transform 0.2s 0s ease-in-out;

}
.popup-modif :is(header, .icons, .field-modif){
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.popup-modif header{
  padding-bottom: 15px;
  border-bottom: 1px solid #ebedf9;
  color:black;
}
header span{
  font-size: 21px;
  font-weight: 600;
}
header .close-modif, .icons a{
  display: flex;
  align-items: center;
  border-radius: 50%;
  justify-content: center;
  transition: all 0.3s ease-in-out;
}
header .close-modif{
  color: #878787;
  font-size: 17px;
  background: #f2f3fb;
  height: 33px;
  width: 33px;
  cursor: pointer;
}
header .close-modif:hover{
  background: #ebedf9;
}
.popup-modif .content{
  margin: 20px 0;
  color:black;
}
.popup-modif .icons{
  margin: 15px 0 20px 0;
}
.content p{
  font-size: 16px;
}
.content .icons a{
  height: 50px;
  width: 50px;
  font-size: 20px;
  text-decoration: none;
  border: 1px solid transparent;
}

.content span{
  font-weight: 800;
}
.content .field{
  margin: 12px 0 -5px 0;
  height: 45px;
  border-radius: 4px;
  padding: 0 5px;
  border: 1px solid #e1e1e1;
  background-color: black;
  color: white;
  display: flex;
  justify-content: center;
}
.content input{
  font-family: "Montserrat";
  font-size: 14px;
  border: none;
  border-bottom: 1px solid rgb(123, 123, 123);
  width: 100%;
}
.content .field-modif{
  margin: 12px 0 -5px 0;
  height: 45px;
  border-radius: 4px;
  padding: 0 5px;
  border: 1px solid #e1e1e1;
  background-color: black;
  color: white;
  display: flex;
  justify-content: center;
}
        </style>
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>

    <body>
<div class="top-nav">
	<div class="logo">
		<div class="content">
		</div>
	</div>
	<div class="menu">
		<ul class="ul">
            <a href="../../Login/Users/Landing/Landing.php"><li class="li" style="color:black;">home</li></a>
            <a href="../../Services/view/service.php"><li class="li" style="color:black;">services</li></a>
			<a href="../../Products/produit.2/produit/index.PHP"> <li class="li" style="color:black;">products</li></a>
			<a href="../../News\view\Newsfront.php"><li class="li" style="color:black;">blogs</li></a>
			<a style="color:black;text-decoration:none;" href="../../Offers/front.php"><li class="li">Offers</li></a>
		</ul>
	</div>
	<div class="action">
        <div class="User">
            <img src="<?php echo $user['img']; ?>" alt=""onclick="menuToggle()">
        </div>
        <div class="menu-profile">
            <h3><?php echo $user["prenom"]." ".$user["nom"];; ?></span></h3>
            <ul>
                <li class="Profile-popup"><i class="fa-solid fa-user"></i><a>Profile</a></li>
                <li class="Modif-popup"><i class="fa-solid fa-pen-to-square"></i><a>Edit Profile</a></li>
                <li><i class="fa-solid fa-inbox"></i><a href="Chat/bergila/index.php"style="text-decoration:none;color:#555;">Inbox</a></li>
                <li><i class="fa-solid fa-circle-info"></i><a>Help</a></li>
                <li><i class="fa-solid fa-arrow-right-from-bracket"></i><a href="../../Login/Users/Landing/Logout.php"style="color:black">Logout</a></li>
            </ul>
        </div>
        
    </div>
	<div class="popup">
    <header>
      <span>Your details: </span>
      <div class="close"><i class="fa-solid fa-xmark"></i></div>
    </header>
    <div class="content">
      <span>Full Name</span>: <?php echo $user['prenom']." ".$user['nom']; ?><br>
	  <span>Email</span>: <?php echo $user['email']; ?><br>
	  <span>Gender</span>: <?php echo $user['Gender']; ?><br>
	  <span>Date of Birth</span>: <?php echo $user['date_naissance']; ?><br>
	  <span>CIN</span>: <?php echo $user['cin']; ?><br>
      <div class="field">
		  Please Enjoy our platform
      </div>
    </div>
  </div>

  <div class="popup-modif">
    <header>
      <span>Modify your details: </span>
      <div class="close-modif"><i class="fa-solid fa-xmark"></i></div>
    </header>
	<form action="modifierclient.php"method="POST"enctype="multipart/form-data"name="signup"id="signup">
    <div class="content">
					<span>First Name:</span><input type="text"placeholder="First Name"name="prenom"value="<?php echo $user['prenom']; ?>"id="prenom_signup">
                    <div id="error_prenom" style="color:red;" ></div>
                    <span>Last Name:</span><input type="text"placeholder="Last Name"name="nom"value="<?php echo $user['nom']; ?>"id="nom_signup">
                    <div id="error_nom" style="color:red;" ></div>
                    <input type="text"placeholder="CIN"name="cin"value="<?php echo $user['cin']; ?>"id="cin_signup"style="display:none">
                    <div id="error_cin" style="color:red;" ></div>
                    <span>Email:</span><input type="email"placeholder="Email Address"name="email"value="<?php echo $user['email']; ?>"id="email_signup">
                    <div id="error_email" style="color:red;" ></div>
                    <span>Date of Birth:</span><input type="date"placeholder="Date of Birth"name="date_naissance"value="<?php echo $user['date_naissance']; ?>"id="date_naissance_signup">
                    <div id="error_date_naissance" style="color:red;" ></div>
                    <span>Gender:</span><select name="Gender" id="gender"style=" width: 100%;
    padding: 10px;
    color: #333;
    border: none;
    border-bottom: .8px solid rgb(190, 190, 190);
    outline: none;
    box-shadow: none;
    font-size: 14px;
    margin: 8px 0;
    letter-spacing: 1px;
    font-weight: 300;
   
    height: 40px;">
                        <option value="Female">
                            Female
                        </option>
                        <option value="Male">
                            Male
                        </option>
                    </select> 
                    <div id="error_Gender" style="color:red;" ></div>
                    <span style="position:absolute;cursor: pointer;transform:translate(0,90%) translateX(353px);">
                        <i class="fa-solid fa-eye eye-signup"onclick="showpsdw_signup();"></i>
                    </span>
                    <span>Password:</span><input type="password"placeholder="Enter Password"name="pwd"id="pwd_signup">
                    <div id="error_pwd" style="color:red;" ></div>
                    <span>Confirm password:</span><input type="password"placeholder="Confirm Password"name="confirm_pwd"id="confirm_pwd_signup">
                    <div id="error_confirm_pwd" style="color:red;" ></div>
                    <span>Profile picture:</span><input type="file"placeholder="choose pdp"name="file">
      <div class="field-modif">
	  <input type="submit"value="Modify"style="max-width: 150px ;height:100%;background:black;color:white"name="submit">
      </div>
    </div>
	</form>
  </div>
</div>
        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                
                <a href="index.html" class="logoz"><img  src="img/Zlogo.png"></a>
                <label class="logo">Zesty</label>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                
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
                    <div class="navbar-nav ml-auto"style="margin-top:20px">
                        
                        
                        
                        
                        <a href="rdv.php" class="nav-item nav-link">Book now</a>
                        
                     
                       
                    </div>
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
                    <p>Filter by services</p>
                   
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
                                    <a href= "rdv.php" class="+">+</a>
                                       
                                  
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
                   
                   

                      <!-- QRCODE ANNONCEMENT Start -->
         <div class="discount wow zoomIn" data-wow-delay="0.1s" style="margin-bottom: 90px;">
            <div class="container">
                <div class="section-header text-center">
                    <p>New Feature! </p>
                    <h2>Get <span>50%</span> Discount By Scanning Your QRCODE</h2>
                </div>
                <div class="container discount-text">
                    <p>
Scan the Discount Qrcode and book your appointement with a discount of 50%! Try it NOW!                  </p>
                    <a  href="qrcode.php" class="btn">Scan Qrcode</a>
                </div>
            </div>
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
        <script>
            function menuToggle(){
                document.querySelector(".menu-profile").classList.toggle("active");
            }
            document.getElementById('port_pop_pic_bg').addEventListener('click',function(){
			document.getElementById('port_pop_pic_bg').classList.remove("active")
			document.getElementById('port_pop_pic').classList.remove("active")
	});
    
        </script>
<script>
    const viewBtn = document.querySelector(".Profile-popup");
    popup = document.querySelector(".popup");
    close = popup.querySelector(".close");
    field = popup.querySelector(".field");
    input = field.querySelector("input");
    copy = field.querySelector("button");

	const modifBtn = document.querySelector(".Modif-popup");
    popup_modif = document.querySelector(".popup-modif");
    close_modif = popup_modif.querySelector(".close-modif");
    field_modif = popup_modif.querySelector(".field-modif");
    input_modif = field.querySelector("input");
    copy_modif = field.querySelector("button");
    viewBtn.onclick = ()=>{
      popup.classList.toggle("show");
    }
    close.onclick = ()=>{
      viewBtn.click();
    }

	
	modifBtn.onclick = ()=>{
		popup_modif.classList.toggle("show");
    }
    close_modif.onclick = ()=>{
		console.log("close");
		modifBtn.click();
    }
	</script>
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
<style>

</style>