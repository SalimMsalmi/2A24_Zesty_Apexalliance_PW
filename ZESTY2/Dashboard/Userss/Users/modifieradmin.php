<?php
    include_once '../Model/User.php';
    include_once '../Controller/UserC.php';
    $error = "";
    $img="images/default.jpg";
    $user = null;
    $UserC = new UserC();
    if (
		isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
		isset($_POST["pwd"]) && 
        isset($_POST["email"])&&  
        isset($_POST["date_naissance"])&&
        isset($_POST["Gender"])&&
        isset($_POST["submit"])
    ) {
        if (
			!empty($_POST['nom']) &&
            !empty($_POST["prenom"]) && 
			!empty($_POST["pwd"]) && 
            !empty($_POST["email"]) && 
            !empty($_POST["date_naissance"])&&
            !empty($_POST["Gender"])
        ) {
            
        if(!empty($_FILES["file"]["name"]))    
        {
        $img="../../Profile_imgs/".$_FILES["file"]["name"];
        print_r($_FILES["file"]);
        move_uploaded_file($_FILES["file"]["tmp_name"],$img);
        }
            $user = new User(
				$_POST['nom'],
                $_POST['prenom'], 
				$_POST['pwd'],
                $_POST['email'],
                "Admin",
                $_POST['cin'],
                $_POST['date_naissance'],
                $img,
                $_POST['Gender']
            );
            
            $UserC->modifieradmin($user,$_POST['cin']);
            print_r($UserC);
            print_r($user);
            header('Location:user_dash.php');
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
    <link rel="stylesheet" type="text/css" href="newadmin.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="images/Zlogo.png" type="image/x-icon">
    <title>Modify Admin info</title>
</head>
<body>
    <section>
    <div class="Title"style="top: 50px;">Modify Admin Info</div>
    <div class="container"style="height: 650px; top: 130px;">
        <div class="user">
            <div class="form_bx">
                <?php
                if (isset($_POST['cin'])){
                    $user = $UserC->recupereruser($_POST['cin']);
                ?>
                <form method="POST"enctype="multipart/form-data"name="signup"id="signup">
                    <h2>Modify Admin Info</h2>
                    <input type="text"placeholder="First Name"name="prenom"value="<?php echo $user['prenom']; ?>"id="prenom_signup">
                    <div id="error_prenom" style="color:red;" ></div>
                    <input type="text"placeholder="Last Name"name="nom"value="<?php echo $user['nom']; ?>"id="nom_signup">
                    <div id="error_nom" style="color:red;" ></div>
                    <input type="text"placeholder="CIN"name="cin"value="<?php echo $user['cin']; ?>"id="cin_signup"style="display:none">
                    <div id="error_cin" style="color:red;" ></div>
                    <input type="email"placeholder="Email Address"name="email"value="<?php echo $user['email']; ?>"id="email_signup">
                    <div id="error_email" style="color:red;" ></div>
                    <input type="date"placeholder="Date of Birth"name="date_naissance"value="<?php echo $user['date_naissance']; ?>"id="date_naissance_signup">
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
   
    height: 40px;">
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
                    <input type="password"placeholder="Enter your Password"name="pwd"id="pwd_signup">
                    <div id="error_pwd" style="color:red;" ></div>
                    <input type="password"placeholder="Confirm Password"name="confirm_pwd"id="confirm_pwd_signup">
                    <div id="error_confirm_pwd" style="color:red;" ></div>
                    <input type="file"placeholder="choose pdp"name="file">
                    <input type="submit"value="Modify"style="max-width: 150px"name="submit">
                    <p class="sign_up"style="margin-top: 10px;">Go back to dashboard<a href="user_dash.php" style="color:#e3979e;"> here</a></p>
                </form>
                <?php
		}
		?>
            </div>
            <iframe class="img_bx"src='https://my.spline.design/hands3diconscopy-8568f84aa91f016c37f7d53a29ae1738/' frameborder='0' width='100%' height='100%'></iframe>
            <div class="hide-icon-2"style="top: 590px"></div>
        </div>
    </div>
    </section>
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
        e.preventDefault();
    }
    if(cin.value.length!=8 && cin.value)
    {
            ccin.innerHTML="Cin has to be 8 characters";
           e.preventDefault();
    }
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
</body>
</html>