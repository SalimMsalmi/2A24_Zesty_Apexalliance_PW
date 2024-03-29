<?php
    include_once '../Controller/Client.php';
    include_once '../Controller/UserC.php';
    $error = "";
    $img="images/default.jpg";
    $user = null;
    $user_mail = null;
    $user_cin = null;
    $admin = null;
    $UserC = new ClientC();
    if (
		isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
		isset($_POST["pwd"]) && 
        isset($_POST["email"])&& 
        isset($_POST["cin"])&& 
        isset($_POST["date_naissance"])&&
        isset($_POST["Gender"])
    ) {
        if (
			!empty($_POST['nom']) &&
            !empty($_POST["prenom"]) && 
			!empty($_POST["pwd"]) && 
            !empty($_POST["email"]) && 
            !empty($_POST["cin"])&& 
            !empty($_POST["date_naissance"])&&
            !empty($_POST["Gender"])
        ) {
            
        if(!empty($_FILES["file"]["name"]))    
        {
        $img="../../../Profile_imgs/".$_FILES["file"]["name"];       
        move_uploaded_file($_FILES["file"]["tmp_name"],$img);
        }
        $email=$_POST["email"];
        $user_mail=$UserC->recupereruser_email($email);
        $user_cin=$UserC->recupereruser($_POST["cin"]);
        if(!empty($user_mail)){
            echo "<script>alert(\"mail has to be unique\")</script>";
        }
        if(!empty($user_cin)){
            echo "<script>alert(\"cin has to be unique\")</script>";
            $test=0;
            //echo $user["cin"];
            //header("Location: Login.php");
        }if(empty($user_cin)&&empty($user_mail)){
            $user = new Client(
                $_POST['nom'],
                $_POST['prenom'], 
                $_POST['pwd'],
                $_POST['email'],
                "Client",
                $_POST['cin'],
                $_POST['date_naissance'],
                $img,
                $_POST["Gender"]
            );
            
                $UserC->ajouteradmin($user);
                header("Location: Login.php");
        }
         
        }
        else
            $error = "Missing information";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Login.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="images/Zlogo.png" type="image/x-icon">
    <title>Login</title>
</head>
<body>
    <section>
    <div class="Title"><img src="images/Zlogo.svg"></div>
    <div class="container"style="height: 730px; top: 50px;">
        <div class="user sign_in">
            <iframe class="img_bx"src='https://my.spline.design/hairbrushcopy-3975fa7fd9786cb2e12e1d909414aa04/' frameborder='0'></iframe>
            <div class="hide-icon"></div>
            <div class="form_bx">
                <form action="Auth.php" method="POST"id="Login_form">
                    <h2>Log in</h2>
                    <input type="text"placeholder="CIN"name="cin"id="cin">
                    <div id="ccin" style="color:red;" ></div>
                    <input type="password"placeholder="Password"id="password"name="pwd"id="password">
                    <span style="position:absolute;cursor: pointer;transform:translate(0,90%) translateX(-30px);">
                        <i class="fa-solid fa-eye"onclick="showpsdw();"></i>
                    </span>
                    <div id="cpassword" style="color:red;" ></div>
                    <input type="submit"value="Login"onclick='verif();'>
                    <p class="sign_up">Don't have an account?
                        <a onclick="toggleForm();"> Sign Up.</a>
                    </p>
                    <a href=""class="Forget-Password"> Forget Password?</a>
                </form>
            </div>
        </div>
        
        <div class="user sign_upbx">
            <div class="form_bx">
            <form method="POST"enctype="multipart/form-data"name="signup"id="signup">
                    <h2>Create new Account</h2>
                    <input type="text"placeholder="First Name"name="prenom"id="prenom_signup">
                    <div id="error_prenom" style="color:red;" ></div>
                    <input type="text"placeholder="Last Name"name="nom"id="nom_signup">
                    <div id="error_nom" style="color:red;" ></div>

                    <input type="email"placeholder="Email Address"name="email"id="email_signup">
                    <div id="error_email" style="color:red;" ></div>

                    <input type="text"placeholder="CIN"name="cin"id="cin_signup">
                    <div id="error_cin" style="color:red;" ></div>

                    <input type="date"placeholder="Date of Birth"name="date_naissance"id="date_naissance_signup">
                    <div id="error_date_naissance" style="color:red;" ></div>

                    <select name="Gender" id="gender"style=" width: 100%;
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
   
    height: 40px;"id="Gender_signup">
                        <option value="Female">
                            Female
                        </option>
                        <option value="Male">
                            Male
                        </option>
                    </select>
                    <div id="error_Gender" style="color:red;" ></div>
                    <span style="position:absolute;cursor: pointer;transform:translate(0,90%) translateX(390px);">
                        <i class="fa-solid fa-eye eye-signup"onclick="showpsdw_signup();"></i>
                    </span>
                    <input type="password"placeholder="Create Password"name="pwd"id="pwd_signup">
                    <div id="error_pwd" style="color:red;" ></div>
                    
                    <input type="password"placeholder="Confirm Password"name="confirm_pwd"id="confirm_pwd_signup">
                    <div id="error_confirm_pwd" style="color:red;" ></div>

                    <input type="file"placeholder="choose pdp"name="file">
                    <input type="submit"value="Sign up"id="signup-btn"style="max-width: 150px"onclick="verif_signup();">
                    <p class="sign_up">Already have an account? <a onclick="toggleForm();"style="color:red;"> Login</a></p>
                </form>
            </div>
            <iframe class="img_bx"src='https://my.spline.design/facialcreamboxcopy-97879616629099393d51c292d5f72f17/' frameborder='0' width='100%' height='100%'></iframe>
            <div class="hide-icon-2"></div>
        </div>
        
    </div>
</section>
<script src="Login.js"></script>
<script src="https://smtpjs.com/v3/smtp.js"></script>
<script>
    function toggleForm(){
    container= document.querySelector('.container');
    section= document.querySelector('section');
    container.classList.toggle('active');
    section.classList.toggle('active');
}
var state=false;
function showpsdw(){
    if(state)
    {
        document.querySelector(".fa-eye").style.color="rgb(133, 125, 125)";
        document.getElementById("password").setAttribute("type","password"); 
        state=false;
    }
    else if(!state)
    {
        document.querySelector(".fa-eye").style.color="black";
        document.getElementById("password").setAttribute("type","text");
        state=true;
    }
}
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


function verif_signup(){
    var test=true;

    cin=document.getElementById("cin_signup");
    prenom=document.getElementById("prenom_signup");
    nom=document.getElementById("nom_signup");
    email=document.getElementById("email_signup");
    pwd=document.getElementById("pwd_signup");
    confirm_pwd=document.getElementById("confirm_pwd_signup");
    date_naissance=document.getElementById("date_naissance_signup");
    Gender=document.getElementById("gender");
    //errors
    ccin=document.getElementById("error_cin");
    cnom=document.getElementById("error_nom");
    cemail=document.getElementById("error_email");
    cpwd=document.getElementById("error_pwd");
    cconfirm_pwd=document.getElementById("error_confirm_pwd");
    cdate_naissance=document.getElementById("error_date_naissance");
    cGender=document.getElementById("error_Gender");
    cprenom=document.getElementById("error_prenom");
    //empty error spaces
    ccin.innerHTML="";
    cnom.innerHTML="";
    cemail.innerHTML="";
    cpwd.innerHTML="";
    cconfirm_pwd.innerHTML="";
    cdate_naissance.innerHTML="";
    cGender.innerHTML="";
    cprenom.innerHTML="";

    
    if(!cin.value){
        ccin.innerHTML="Missing cin";
        test=false;
        // e.preventDefault();
        
    }
    if(cin.value.length!=8 && cin.value)
    {
            ccin.innerHTML="Cin has to be 8 characters";
            test=false;
        //    e.preventDefault();
           
    }
    if(!prenom.value){
        cprenom.innerHTML="Missing First name";
        test=false;
        // e.preventDefault();
        
    }
    var letters = /^[A-Za-z]+$/;
    if(!prenom.value.match(letters)&&prenom.value)
    {
        cprenom.innerHTML="First name has to be letters!";
        test=false;
        // e.preventDefault();
    }
    if(!nom.value){
        cnom.innerHTML="Missing Last name";
        test=false;
        // e.preventDefault();
    }
    if(!nom.value.match(letters)&&nom.value)
    {
        cnom.innerHTML="Last name has to be letters!";
        test=false;
        // e.preventDefault();
    }
    if(!email.value){
        cemail.innerHTML="Missing email";
        test=false;
        // e.preventDefault();
    }
    if(!Gender.value){
        cGender.innerHTML="Missing Gender";
        test=false;
        // e.preventDefault();
        
    }
    if(!date_naissance.value){
        cdate_naissance.innerHTML="Missing Birth date";
        test=false;
        // e.preventDefault();
    }
    
    if(!pwd.value){
        cpwd.innerHTML="Missing password";
        test=false;
        // e.preventDefault();
    }
    if(pwd.value.length<8 && pwd.value)
    {
        cconfirm_pwd.innerHTML="Password has to be 8 characters or more";
        test=false;
        // e.preventDefault();
    }
    if(!confirm_pwd.value){
        cconfirm_pwd.innerHTML="Missing confirm password";
        test=false;
        // e.preventDefault();
    }
    if(confirm_pwd.value!=pwd.value)
    {
        cconfirm_pwd.innerHTML="Passwords don't match";
        test=false;
        // e.preventDefault();
    }
    if(test)
         {
             console.log("send mail");
             sendEmail();return false;
         }
   document.forms["signup"].addEventListener("submit",function (e){
       //inputs
        if(!test){
         e.preventDefault();
        }else document.getElementById("signup").submit();

        console.log("test inside submit: ",test);
    });
          
    //sendEmail();reset();return false;
}


function verif(){
    
        cin=document.getElementById("cin");
        password=document.getElementById("password");
        Login_form=document.getElementById("Login_form");
         ccin=document.getElementById("ccin")
         ccin.innerHTML=""
         cpassword=document.getElementById("cpassword")
         cpassword.innerHTML=""
        Login_form.addEventListener("submit",function (e){
            if(!cin.value)
        {
            ccin.innerHTML="Missing cin"
           e.preventDefault();
        }
        if(cin.value.length!=8 && cin.value)
        {
            ccin.innerHTML="Cin has to be 8 characters";
           e.preventDefault();
        }
        if(!password.value)
        {
           e.preventDefault();
           cpassword.innerHTML="Missing password"
        }
        });
    
   
    
}

date_naissance=document.getElementById("date_naissance_signup");
var today=new Date;
    var dd=String(today.getDate()).padStart(2,'0');
    var yyyy=String(today.getFullYear()-18);
    var mm=String(today.getMonth()+1).padStart(2,'0');
    date_naissance.max=yyyy+"-"+mm+"-"+dd;



    function sendEmail(){
    var email=document.getElementById("email_signup").value;
    //console.log(email);
        Email.send({
        Host : "smtp.gmail.com",
        Username : "oussama.ayari1@esprit.tn",
        Password : "201JMT3063",
        To : email,
        From :'oussama.ayari1@esprit.tn',
        Subject : "ZESTY Welcomes you with its best offers",
        Body : "We thank you for making an account on our platform please respect our guidelines ! Confirm your email here"
    });
    }
    
</script>
</body>
</html>