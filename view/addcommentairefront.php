<?php
    include_once '../controller/CommentaireC.php';
    include_once '../model/Commentaire.php';
    $error = "";
    $commentaire= null;
    $img="default.jpg";
    $CommentaireC = new CommentaireC();
    if (
		isset($_POST["name"]) &&		
        isset($_POST["date"]) &&
		isset($_POST["description"])
    ) {
        if (
			!empty($_POST['name']) &&
            !empty($_POST["date"]) && 
			!empty($_POST["description"])
        ) {
            $Commentaire = new Commentaire(
                 0,
                $_POST['name'],
                $_GET["id"],
			        	$_POST['description'],
              	$_POST['date']
            );
            $CommentaireC->ajoutercommentaire($Commentaire);
            $id=$_GET["id"];
            header("Location:commentairefront.php?id=$id");
        }
        else
            $error = "Missing information";
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="#">
<title>Zesty - HTML Template</title>
<!-- CSS -->
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400italic,300italic,300,700,700italic' rel='stylesheet' type='text/css'>
</head>
<body style="background-image:url(img/bg7.jpg);background-attachment:fixed;background-size:cover;">

<div id="loader-wrapper">
<div id="loader"></div>
<div class="loader-section section-left"></div>
<div class="loader-section section-right"></div>
</div>

<div class="menu-outer">
    <div class="menu-icon">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
    <nav>
        <ul>
           <li><a href="index.html">Home</a></li>
           <li><a href="Newsfront.php">Blog</a></li>
           <li><a target="_blank" href="https://www.wowthemes.net/themes/beauttio/">WP Version</a></li>
       </ul>
   </nav>
</div>
<a class="menu-close" onClick="return true">
    <div class="menu-icon">
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
</a>

<div class="fixedcallicon">
	<i class="fa fa-phone"></i><span class="hide">Book Now - 897.645.223</span>
</div>
<div class="container">
<div class="logoarea">
<div class="intro">
			<h1><span class="smaller wow zoomIn" data-wow-duration="2s" data-wow-delay="0.5">1044 Madison Avenue, New York, NY 10075, US</span>
			<span class="big wow pulse" data-wow-duration="1s" data-wow-delay="0s">ZESTY</span>
			<span class="small wow fadeIn" data-wow-duration="2s" data-wow-delay="0.5s">- HAIR SALON -</span>
			</h1>
		</div>
		</div>
		<div class="pagearea">
		<h1 class="page-headline">BLOG</h1>
		<i class="iconstartitle textmagenta fa fa-star"></i>
        <div class="addarticle-interface">
        <form id="myform" method="POST"enctype="multipart/form-data">
            <h1>Contact-us</h1>
            <div class="separation"></div>
            <div class="corps-formulaire">
              <div class="gauche">
                <div class="groupe">
                  <label>ID</label>
                  <input id="name" name="name" type="text" autocomplete="off" />
                  <span id="cmon"></span>
                </div>
                <div class="groupe">
                  <label>Date</label>
                  <input name="date" type="date" autocomplete="off" />
                </div>
              </div>
              <div class="droite">
                <div class="groupe">
                  <label>Description</label>
                  <textarea placeholder="Start writing..." name="description"></textarea>
                </div>
              </div>
            </div>
      
            <div class="pied-formulaire"style="text-align:center">
            <button  onclick="verif();">add commentaire</button>
            </div>
          </form>
    </div>
		</div>
	
</div>
<div class="clearfix"></div>
<footer class="footer">
<div class="container">
<div class="pull-left">&copy; Template by WowThemes.net.</div>
<div class="pull-right"> 
	<div class="footericons">
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-yelp"></i></a></a>
		<a href="#"><i class="fa fa-google-plus"></i></a>
	</div>
</div>
<div class="clearfix"></div>
</div>
</footer>	
<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/nicescroll.js"></script>
<script src="js/common.js"></script>
</body>
</html>
<style>
    form .corps-formulaire .groupe {
    position: relative; /* Pour mettre positionner l’élément dans le flux normal de la page */
    margin-top: 20px;
    display: flex;
    flex-direction: column;
  }
  form .corps-formulaire .gauche .groupe input {
    margin-top: 5px;
    padding: 10px 5px 10px 30px;
    border: 1px solid #f8f5f5;
    outline-color: #000000;
    border-radius: 5px;
  }
  form .corps-formulaire .gauche .groupe i {
    position: absolute; 
    left: 0;
    top: 41px;
    padding: 9px 8px;
    color: #000000;
  }
  form .corps-formulaire .droite {
    margin-left: 40px;
  }
  form .corps-formulaire .droite .groupe {
    height: 100%;
  }
  form .corps-formulaire .droite .groupe textarea {
      margin-left:50px;
    margin-top: 5px;
    padding: 10px;
    background-color: #f1f1f1;
    border: 2px solid #000000;
    outline: none;
    border-radius: 5px;
    resize: none;
    height:200px;
    width: 400px;
  }
  form .pied-formulaire button {
    margin-top: 10px;
    background-color: white;
    color: black;
    font-size: 15px;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    outline: none;
    cursor: pointer;
    transition: transform 0.5s;
  }
</style>