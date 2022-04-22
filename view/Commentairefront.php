<?php
	include '../controller/CommentaireC.php';
	$commentaire=new CommentaireC();
	$listecommentaire=$commentaire->affichercommentaire($_GET["id"]); 
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
		
        <?php
				foreach($listecommentaire as $commentaire){
			?>
      <a href="supprimercommentaire.php?id=<?php echo $commentaire['idcom']; ?>" class="readmore" style="margin-left: 500px;">Delete</a>
		<h1 class="entry-title"><?php echo $commentaire['Datecom']; ?></h1>
        
			<p><?php echo $commentaire['descriptioncom']; ?></br>
			
                <?php
				}
			?> 
		
        	<a href="addcommentairefront.php?id=<?php echo $commentaire['idblog']; ?>" class="readmore">Add Comment</a>
			<a href="tricommentaire.php?id=<?php echo $commentaire['idblog']; ?>"class="readmore" style="margin-left:500px;margin-top:300px;" >Sort</a>

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
