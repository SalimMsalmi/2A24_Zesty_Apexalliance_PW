

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
            <form action="create_account.php" method="POST"enctype="multipart/form-data"name="signup"id="signup">
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
                    <input type="submit"value="Sign up"id="signup-btn"style="max-width: 150px"onclick="sendEmail();reset();return false;">
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
    
    function sendEmail(){
    var email=document.getElementById("email_signup").value;
    console.log(email);
        Email.send({
        Host : "smtp.gmail.com",
        Username : "oussama.ayari1@esprit.tn",
        Password : "201JMT3063",
        To : email,
        From :'oussama.ayari1@esprit.tn',
        Subject : "ZESTY Welcomes you with its best offers",
        Body : "Mailing works!!"
    }).then(
      message => alert(message)
    );
    }
    
</script>
</body>
</html>