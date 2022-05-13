<?php
 include_once '../../Controller/UserC.php';
 $user = null;
 session_start();
 $UserC = new ClientC();
 if(isset($_SESSION["clientcin"]))
 {
 	$user=$UserC->recupereruser($_SESSION["clientcin"]);
	
 }
 $UserC->modifieronline($_SESSION["clientcin"]);
 /*------------------BERGILA----------------------------*/
include_once "../../../../config.php";
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
<link rel="icon" href="../images/Zlogo.png" type="image/x-icon">
<script src="https://kit.fontawesome.com/545d9736b4.js" crossorigin="anonymous"></script>
<title>ZESTY</title>
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400italic,300italic,300,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/jquery.convform.css">
<!-- <link rel="stylesheet" type="text/css" href="css_chat/style.css"> -->

<!-- ChatBot -->
<link rel="stylesheet" type="text/css" href="css_chat/jquery.convform.css">
<script type="text/javascript" src="js_chat/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js_chat/jquery.convform.js"></script>
<script type="text/javascript" src="js_chat/custom.js"></script>
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
		<ul class="ul">
            <a><li class="li" style="color:white;">home</li></a>
            <a href="../../../Services/view/service.php"><li class="li" style="color:white;">services</li></a>
			<a href="../../../Products/produit.2/produit/index.PHP"> <li class="li" style="color:white;">products</li></a>
			<a href="../../..\News\view\Newsfront.php"><li class="li" style="color:white;">blogs</li></a>
			<a style="color:white;text-decoration:none;" href="../../../Offers/front.php"><li class="li">Offers</li></a>
		</ul>
	</div>
	<div class="action">
        <div class="User">
            <img src="<?php echo "../".$user['img']; ?>" alt=""onclick="menuToggle()">
        </div>
        <div class="menu-profile">
            <h3><?php echo $user["prenom"]." ".$user["nom"];; ?></span></h3>
            <ul>
                <li class="Profile-popup"><i class="fa-solid fa-user"></i><a>Profile</a></li>
                <li class="Modif-popup"><i class="fa-solid fa-pen-to-square"></i><a>Edit Profile</a></li>
                <li><i class="fa-solid fa-inbox"></i><a href="Chat/bergila/index.php"style="text-decoration:none;color:#555;">Inbox</a></li>
                <li><i class="fa-solid fa-circle-info"></i><a>Help</a></li>
                <li><i class="fa-solid fa-arrow-right-from-bracket"></i><a href="Logout.php"style="color:black">Logout</a></li>
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
    <!-- ChatBot -->
<div class="chat_icon">
	<i class="fa fa-comments" aria-hidden="true"></i>
</div>
<div class="chat_box"style="margin-bottom:50px;width:450px">
<div class="my-conv-form-wrapper">
		<form action="" method="GET" class="hidden">

      <select data-conv-question="Hey there i am Sprita your favourite chatbot 😃 i will give you the best selling products and services and offers our beauty center have just tell me what you need and i will lead the way 😃 ps:close me if you are not interested" name="category">
        <option value="WebDevelopment">good Product offer</option>
        <option value="DigitalMarketing">good service offer</option>
      </select>
     
      <input data-conv-question="Enter your e-mail so we can send you the new offers" data-pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" type="email" name="email" required placeholder="What's your e-mail?">

      <div data-conv-fork="category">
        <div data-conv-case="WebDevelopment">
        <input type="text" name="flous" data-conv-question="please tell me how much budget you have " data-pattern="^[0-9]*$">
        <input type="text" data-conv-question="How lucky are you ? we have elseve 70cl keratine shampoo and loreal CC Cream they are both in promotion i am sure they are around  {flous}DT ." data-no-answer="true">
  
        </div>
        <div data-conv-case="DigitalMarketing">
        <input type="text" name="name" data-conv-question="please tell me how much budget you have " data-pattern="^[0-9]*$">
        <input type="text" data-conv-question="How lucky are you ? we have a service packs in promotions they are around {name}DT brushing+sauna+harkous ." data-no-answer="true">
          
        </div>
      </div>

      <select data-conv-question="😃">
        <option value="Yes">thanks i will check it</option>
        <option value="no">no need</option>
      </select>

  	</form>
	
</div>
<!-- ChatBot end -->


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
	<div class="img-2">
			<img src="./img/img2.jpg" alt="">
	</div>
		<div class="about">
			<div class="aboutbadge">
				<span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><br/>
				<span class="border">Awarded Salon</span><br/>
				Est. 2007</span>
			</div>
			<div class="aboutbadge black"style=" background-color: rgba(121, 121, 121, 0.5);color: white;">
				<span>Upbeat, chic, and funky salon. We are based on twenty-five years of experience. We specialize in couture cuts and blowouts, men's cuts, natural and funky hair colors, and highlights. </span>
			</div>
		</div>
	</div>
	</section>
	<section class="background">
	<div class="content-wrapper">
		<div class="voucher">
			<div class="voucher-whitetransparent">
				<h2><i class="fa fa-gift"></i><br/>REDEEM YOUR VOUCHER<br/>20% OFF IN 2016<br/><a href="../../../Services/view/service.php">Book Now</a></h2>
			</div>
		</div>
	</div>
	</section>
	<section class="background">
	<div id="#Serv"class="content-wrapper">
		<div class="pricingbadge">
			<h4>High Quality, Low Prices</h4>
			<ul class="pricing_menu__list">
            <?php
			while ($row= $products->fetch() ){
         ?>
				<li class="pricing_menu__row">
				<div class="pricing_menu__meal">
					<span><?php echo $row["nom"]; ?></span>
				</div>
				<span class="pricing_menu__price"><?php echo $row["prix"]; ?>DNT</span>
				</li>
				<?php } ?>
				<a class="fullpricelist" href="../../../Products/produit.2/produit/index.PHP"><i class="fa fa-file-pdf-o"></i> View our full pricing list</a>
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
<script src="shortcut.js"></script>
<!-- <script>
    document.addEventListener("keydown",e=>{
        e.preventDefault();
        if(
            e.key.toLowerCase() === "s" 
           
      ){
        location.href="../../../Services/view/service.php"
        }

        if(
            e.key.toLowerCase() === "o" 
           
      ){
        location.href="../../../Offers/front.php"
        }
        if(
            e.key.toLowerCase() === "b" 
           
      ){
        location.href="../../../News/view/Newsfront.php"
        }
        if(
            e.key.toLowerCase() === "p" 
           
      ){
        location.href="../../../Products/produit.2/produit/index.PHP"
        }
    });
                                    
</script> -->
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
<script>
        function menuToggle(){
            document.querySelector(".menu-profile").classList.toggle("active");
        }
    </script>
<script>
        var state =false;
        function showpsdw_signup(){
    if(state)
    {
        document.querySelector(".eye-signup").style.color="rgb(133, 125, 125)";
        document.getElementById("pwd_signup").setAttribute("type","password"); 
        state=false;
    }
    else if(!state)
    {
        document.querySelector(".eye-signup").style.color="black";
        document.getElementById("pwd_signup").setAttribute("type","text");
        state=true;
    }
}

   document.forms["signup"].addEventListener("submit",function (e){
       //inputs
    prenom=document.getElementById("prenom_signup");
    nom=document.getElementById("nom_signup");
    email=document.getElementById("email_signup");
    pwd=document.getElementById("pwd_signup");
    confirm_pwd=document.getElementById("confirm_pwd_signup");
    date_naissance=document.getElementById("date_naissance_signup");
    Gender=document.getElementById("gender");
    //errors
    cnom=document.getElementById("error_nom");
    cemail=document.getElementById("error_email");
    cpwd=document.getElementById("error_pwd");
    cconfirm_pwd=document.getElementById("error_confirm_pwd");
    cdate_naissance=document.getElementById("error_date_naissance");
    cGender=document.getElementById("error_Gender");
    cprenom=document.getElementById("error_prenom");
    //empty error spaces
    cnom.innerHTML="";
    cemail.innerHTML="";
    cpwd.innerHTML="";
    cconfirm_pwd.innerHTML="";
    cdate_naissance.innerHTML="";
    cGender.innerHTML="";
    cprenom.innerHTML="";
    if(!prenom.value){
        cprenom.innerHTML="Missing First name";
        e.preventDefault();
    }
    var letters = /^[A-Za-z]+$/;
    if(!prenom.value.match(letters)&&prenom.value)
    {
        cprenom.innerHTML="First name has to be letters!";
        e.preventDefault();
    }
    if(!nom.value){
        cnom.innerHTML="Missing Last name";
        e.preventDefault();
    }
    if(!nom.value.match(letters)&&nom.value)
    {
        cnom.innerHTML="Last name has to be letters!";
        e.preventDefault();
    }
    if(!email.value){
        cemail.innerHTML="Missing email";
        e.preventDefault();
    }
    if(!Gender.value){
        cGender.innerHTML="Missing Gender";
        e.preventDefault();
    }
    if(!date_naissance.value){
        cdate_naissance.innerHTML="Missing Birth date";
        e.preventDefault();
    }
    
    if(!pwd.value){
        cpwd.innerHTML="Missing password";
        e.preventDefault();
    }
    if(pwd.value.length!=8 && pwd.value)
    {
        cconfirm_pwd.innerHTML="Password has to be 8 characters";
        e.preventDefault();
    }
    if(pwd.value!="<?php echo $user["pwd"] ?>" && pwd.value)
    {
        cpwd.innerHTML="Wrong password";
        e.preventDefault();
    }
    if(!confirm_pwd.value){
        cconfirm_pwd.innerHTML="Missing confirm password";
        e.preventDefault();
    }
    if(confirm_pwd.value!=pwd.value)
    {
        cconfirm_pwd.innerHTML="Passwords don't match";
        e.preventDefault();
    }
    
    });
</script>
<!-- Scripts -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<script src="js/common.js"></script>
<script src="js/home.js"></script>
<script src="js/testimonials.js"></script>
<script type="text/javascript">
	// portfolioList = document.querySelectorAll('.portfolio-box');
	// portfolioList.forEach(function(portfolioPic) {
	// 	portfolioPic.addEventListener('click',function(){
	// 		bg = this.style.backgroundImage;
	// 		document.getElementById('port_pop_pic_bg').classList.add("active")
	// 		document.getElementById('port_pop_pic').style.backgroundImage = bg
	// 		document.getElementById('port_pop_pic').classList.add("active")
	// 	});	
	// })
	document.getElementById('port_pop_pic_bg').addEventListener('click',function(){
			document.getElementById('port_pop_pic_bg').classList.remove("active")
			document.getElementById('port_pop_pic').classList.remove("active")
	});
</script>
</body>
</html>