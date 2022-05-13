<?php
	include '../controller/CommentaireC.php';
	$commentaire=new CommentaireC();
	$listecommentaire=$commentaire->affichercommentaire($_GET["id"]); 
?>
<?php
 include_once '../Controller/UserC.php';
 $user = null;
 session_start();
 $UserC = new ClientC();
 if(isset($_SESSION["clientcin"]))
 {
 	$user=$UserC->recupereruser($_SESSION["clientcin"]);
	
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

<div class="top-nav">
	<div class="logo">
		<div class="content">
		</div>
	</div>
	<div class="menu">
		<ul>
        <a href="../..\login\users\landing/landing.php"><li style="color:white;">Home</li></a>
			<li>services</li>
			<li>products</li>
			<a href="Newsfront.php"><li style="color:white;">blogs</li></a>
			<li>Offers</li>
			<li>about</li>
			<li>contact</li>
		</ul>
	</div>
	<div class="action">
        <div class="User">
            <img src="<?php echo "../".$user['img']; ?>" alt=""onclick="menuToggle()">
        </div>
        <div class="menu-profile">
            <h3><?php echo $user['prenom']." ".$user['nom']; ?></span></h3>
            <ul>
                <li class="Profile-popup"><i class="fa-solid fa-user"></i><a>Profile</a></li>
                <li class="Modif-popup"><i class="fa-solid fa-pen-to-square"></i><a>Edit Profile</a></li>
                <li><i class="fa-solid fa-inbox"></i><a>Inbox</a></li>
                <li><i class="fa-solid fa-circle-info"></i><a>Help</a></li>
                <li><i class="fa-solid fa-arrow-right-from-bracket"></i><a href="../../login/users/Login.php"style="color:black">Logout</a></li>            </ul>
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
	<i class="fa fa-phone"></i><span class="hide">Book Now - 897.645.223</span>
</div>
<div class="container">
<div class="logoarea">
<div class="intro">
			<h1><span class="smaller wow zoomIn" data-wow-duration="2s" data-wow-delay="0.5">1044 Madison Avenue, New York, NY 10075, US</span>
			<span class="big wow pulse" data-wow-duration="1s" data-wow-delay="0s">Comments</span>
			<span class="small wow fadeIn" data-wow-duration="2s" data-wow-delay="0.5s">- HAIR SALON -</span>
			</h1>
		</div>
		</div>
		<div class="pagearea">
		<h1 class="page-headline"style=" margin-top: 80px;">BLOG</h1>                           		
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