<?php
/* include_once '../../Controller/UserC.php';
 $user = null;
 session_start();
 $UserC = new ClientC();
 if(isset($_SESSION["clientcin"]))
 {
 	$user=$UserC->recupereruser($_SESSION["clientcin"]);
	
 }
*/


/*------------------BERGILA----------------------------*/
include_once "../../config.php";
$DB=new config();
$bdd = new PDO('mysql:host=localhost;dbname=zesty', 'root', '');
$products=$bdd->query('SELECT * FROM produit order by `prix` DESC');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<!-- <link rel="icon" href="#"> -->
<script src="https://kit.fontawesome.com/545d9736b4.js" crossorigin="anonymous"></script>
<title>ZESTY</title>
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400italic,300italic,300,700,700italic' rel='stylesheet' type='text/css'>

</head>
<body class="frontpage">

<div id="loader-wrapper">
<div id="loader"></div>
<div class="loader-section section-left"></div>
<div class="loader-section section-right"></div>
</div>


<div class="top-nav">
	<div class="logo">
		<div class="content">
		</div>
	</div>
	<div class="menu">
		<ul class="ul"	>
			<li class="li"><a  style="  text-decoration: none; color: white;"href="#"> services</a></li>
			<li class="li"><a  style="  text-decoration: none; color: white;" href="../front/produit.2/produit/index.PHP">products</a> </li>
			<li class="li"><a  style="  text-decoration: none; color: white;" href="#">blogs</a> </li>
			<li class="li"><a  style="  text-decoration: none; color: white;" href="#">Offers</a> </li>
			<li class="li"><a  style="  text-decoration: none; color: white;" href="#">about</a> </li>
			<li class="li"><a  style="  text-decoration: none; color: white;" href="#">contact</a> </li>
		</ul>
	</div>
	<div class="User">
		
		<img src="<?php echo "../".$user['img']; ?>" />
	
	</div>
	
</div>


<div class="fixedcallicon">
	<i class="fa fa-phone"></i><span class="hide">Book Now - 23398991</span>
</div>
<div class="container">
	<section class="background">
		<div class="img">
			<img src="./img/bg1.jpg" alt="">
	</div>
	<div class="main-heading">
		<div class="hed-text">
			<h1 class="hed">the real</h1>
			<i class="fas fa-arrow-right"></i>
			<h1 class="hed">beauty</h1>
		</div>
	</div>
	<div class="tag">
		<div class="tag-text"><h1>beauty</h1></div>
		<div class="tag-text"><h1>comes from</h1></div>
		<div class="tag-text"><h1>nature</h1></div>
	</div>
	
	<div class="des">
		<div class="des-text"><p>You're Beautiful!</p></div>
		<div class="des-text"><p> You're Powerful!</p></div>
		<div class="des-text"><p> You're Amazing!</p></div>
	</div>
	<div class="btn-box-explore">
		<a href="#Serv" class="btn">explore</a>
	</div>
	
	</section>
	<section class="background">
	<div class="content-wrapper">
		<div class="about">
			<div class="aboutbadge">
				<span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><br/>
				<span class="border">Awarded Salon</span><br/>
				Est. 2007</span>
			</div>
			<div class="aboutbadge black">
				<span>Upbeat, chic, and funky salon. We are based on twenty-five years of experience. We specialize in couture cuts and blowouts, men's cuts, natural and funky hair colors, and highlights. </span>
			</div>
		</div>
	</div>
	</section>
	<section class="background">
	<div class="content-wrapper">
		<div class="voucher">
			<div class="voucher-whitetransparent">
				<h2><i class="fa fa-gift"></i><br/>REDEEM YOUR VOUCHER<br/>20% OFF IN 2016<br/><a href="#slide6">Book Now</a></h2>
			</div>
		</div>
	</div>
	</section>
	<section class="background">
        <div class="content-wrapper">
          <div class="pricingbadge">
            <h4>High Quality, Low Prices</h4>
            <ul class="pricing_menu__list">
           <?php
			while ($row= $products->fetch() ){
         ?>
			<li class="pricing_menu__row">
                <div class="pricing_menu__meal">
                  <span><?php echo $row['nom'];?></span>
                </div>
                <span class="pricing_menu__price"><?php echo $row['prix'];?> TND</span>
              </li>
             <?php } ?>
           
              <a class="fullpricelist" href="Products/view/front/produit.2/produit/index.PHP"
                ><i class="fa fa-file-pdf-o"></i> View our full pricing list</a
              >
            </ul>
          </div>
        </div>
      </section>	
	<section class="background">
	<div class="content-wrapper">
		<div class="testimonialarea">
			<div class="testimonialarea-bubble">
				<div class="testimonial-widget">
					<h3 class="uppercase">BEAUTTIO MADE ME BEAUTIFUL</h3>
					<div class="testimonial">
						<p>
							 "They took care of my wedding, everyone asked me who was my stylist. Great prices, great staff!"
						</p>
						<p>
							<strong>Cindy, New York</strong>
						</p>
					</div>
					<div class="testimonial">
						<p>
							 "I am a regular customer of their services, once I pay them a visit I am a different person."
						</p>
						<p>
							<strong>Layana, Munchen</strong>
						</p>
					</div>
					<div class="testimonial">
						<p>
							 "Thank you so much, Beauttio, you have one of the best hairstylists aroung, I give it 5 <i class="fa fa-star"></i>."
						</p>
						<p>
							<strong>Jane, London</strong>
						</p>
					</div>
					<button class="prev-testimonial">Prev</button>
					<button class="next-testimonial">Next</button>
				</div>
			</div>
			<div class="contactform-bubble">
				<form autocomplete="off" class="contactform" method="post" action="contact.php" id="contactform">
					<input name="name" type="text" placeholder="Name">
					<input name="email" type="text" placeholder="E-mail">
					<textarea name="comment" placeholder="Message" rows="4"></textarea>
					<input value="SEND" type="submit" id="submit" class="btnsend">
					<div class="done">
						<div class="alert-box success">
							<i>Message sent! We'll answer shortly.</i>
						</div>
					</div>
				</form>
			</div>
			<div class="contactaddress-bubble">
				<div class="contactaddress">
					 1044 Madison Avenue, New York, NY 10075, US<br/>
					<a class="map" href="#">Map</a>
				</div>
			</div>
		</div>
	
</div>


	</section>
</div>


<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/common.js"></script>
<script src="js/home.js"></script>
<script src="js/testimonials.js"></script>

</body>
</html>