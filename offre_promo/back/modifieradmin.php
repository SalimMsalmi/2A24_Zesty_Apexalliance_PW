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
        isset($_POST["date_naissance"])&&
        isset($_POST["submit"])
    ) {
        if (
			!empty($_POST['nom']) &&
            !empty($_POST["prenom"]) && 
			!empty($_POST["pwd"]) && 
            !empty($_POST["email"]) && 
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
    <title>Login</title>
</head>
<body>
    <section>
    <div class="Title"style="top: 50px;">Modify Admin Info of <?php echo "Oussema Ayari"?></div>
    <div class="container"style="height: 600px; top: 130px;">
        <div class="user">
            <div class="form_bx">
                <?php
                if (isset($_POST['cin'])){
                    $user = $UserC->recupereruser($_POST['cin']);
                ?>
                <form method="POST"enctype="multipart/form-data">
                    <h2>Modify Admin Info</h2>
                    <input type="text"placeholder="First Name"name="prenom"value="<?php echo $user['prenom']; ?>">
                    <input type="text"placeholder="Last Name"name="nom"value="<?php echo $user['nom']; ?>">
                    <input type="text"placeholder="CIN"name="cin"value="<?php echo $user['cin']; ?>">
                    <input type="email"placeholder="Email Address"name="email"value="<?php echo $user['email']; ?>">
                    <input type="date"placeholder="Date of Birth"name="date_naissance"value="<?php echo $user['date_naissance']; ?>">
                    <input type="password"placeholder="Create Password"name="pwd">
                    <input type="password"placeholder="Confirm Password"name="confirm_pwd">
                    <input type="file"placeholder="choose pdp"name="file"value="<?php echo $user['img']; ?>">
                    <input type="submit"value="Modify"style="max-width: 150px"name="submit">
                    <p class="sign_up">Go back to dashboard<a href="user_dash.php" style="color:red;"> here</a></p>
                </form>
                <?php
		}
		?>
            </div>
            <iframe class="img_bx"src='https://my.spline.design/hands3diconscopy-8568f84aa91f016c37f7d53a29ae1738/' frameborder='0' width='100%' height='100%'></iframe>
            <div class="hide-icon-2"style="top: 540px"></div>
        </div>
    </div>
    </section>
</body>
</html>