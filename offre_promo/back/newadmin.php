<?php
    include_once '../Model/User.php';
    include_once '../Controller/UserC.php';
    $error = "";
    $img="./images/default.jpg";
    $user = null;
    $UserC = new UserC();
    if (
		isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
		isset($_POST["pwd"]) && 
        isset($_POST["email"])&& 
        isset($_POST["cin"])&& 
        isset($_POST["date_naissance"])&&
        isset($_POST["submit"])
    ) {
        if (
			!empty($_POST['nom']) &&
            !empty($_POST["prenom"]) && 
			!empty($_POST["pwd"]) && 
            !empty($_POST["email"]) && 
            !empty($_POST["cin"])&& 
            !empty($_POST["date_naissance"])
        ) {
            
        if(!empty($_FILES["file"]["name"]))    
        {
        $img="images/".$_FILES["file"]["name"];
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
                $img
            );
            $UserC->ajouteradmin($user);
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
    <title>Login</title>
</head>
<body>
    <section>
    <div class="Title"style="top: 50px;">Add New Admin</div>
    <div class="container"style="height: 600px; top: 130px;">
        <div class="user">
            <div class="form_bx">
                <form method="POST"enctype="multipart/form-data">
                    <h2>Create new Admin</h2>
                    <input type="text"placeholder="First Name"name="prenom">
                    <input type="text"placeholder="Last Name"name="nom">
                    <input type="email"placeholder="Email Address"name="email">
                    <input type="text"placeholder="CIN"name="cin">
                    <input type="date"placeholder="Date of Birth"name="date_naissance">
                    <input type="password"placeholder="Create Password"name="pwd">
                    <input type="password"placeholder="Confirm Password"name="confirm_pwd">
                    <input type="file"placeholder="choose pdp"name="file">
                    <input type="submit"value="Add new admin"style="max-width: 150px"name="submit">
                    <p class="sign_up">Go back to dashboard<a href="user_dash.php" style="color:red;"> here</a></p>
                </form>
            </div>
            <iframe class="img_bx"src='https://my.spline.design/hands3diconscopy-8568f84aa91f016c37f7d53a29ae1738/' frameborder='0' width='100%' height='100%'></iframe>
            <div class="hide-icon-2"style="top: 540px"></div>
        </div>
    </div>
    </section>
</body>
</html>