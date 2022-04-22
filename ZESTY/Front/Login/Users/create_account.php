<?php
    include_once '../Controller/Client.php';
    include_once '../Controller/UserC.php';
    $error = "";
    $img="images/default.jpg";
    $user = null;
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
        else
            $error = "Missing information";
    }
?>
