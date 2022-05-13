<?php
include_once '../../Controller/Client.php';
include_once '../../Controller/UserC.php';
$error = "";
$img="images/default.jpg";
$user_mod = null;
$UserC_mod = new ClientC();
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
    $img="../../../../Profile_imgs/".$_FILES["file"]["name"];
	move_uploaded_file($_FILES["file"]["tmp_name"],$img);
	$img="../../Profile_imgs/".$_FILES["file"]["name"];
    }
        $user_mod = new Client(
            $_POST['nom'],
            $_POST['prenom'], 
            $_POST['pwd'],
            $_POST['email'],
            "Client",
            $_POST['cin'],
            $_POST['date_naissance'],
            $img,
            $_POST['Gender']
        );
        
        $UserC_mod->modifieradmin($user_mod,$_POST['cin']);
        header("Location: Landing.php");
	    }
    else
        $error = "Missing information";
}


?>