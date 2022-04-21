<?php
    include_once '../Model/offre.php';
    include_once '../Controller/OffreC.php';

    $error = "";

    // create offre
    $offre = null;

    // create an instance of the controller
    $offreC = new offreC();
    if (
     
		isset($_POST["id_offre"]) &&		
        isset($_POST["nom_offre"]) &&
		isset($_POST["description_offre"]) && 
        isset($_POST["code_promo"]) && 
        isset($_POST["img_offre"])
    ) {
        if (
          
			!empty($_POST['id_offre']) &&
            !empty($_POST["nom_offre"]) && 
			!empty($_POST["description_offre"]) && 
            !empty($_POST["code_promo"]) && 
            !empty($_POST["img_offre"])
        ) {
            $offre = new offre(
               
				$_POST['id_offre'],
                $_POST['nom_offre'], 
				$_POST['description_offre'],
                $_POST['code_promo'],
                $_POST['img_offre']
            );
            $offreC->ajouteroffre($offre);
            header('Location:offre_dash.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="newoffre.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="images/Zlogo.png" type="image/x-icon">
   
</head>

    <body>
    <section>
    <div class="Title"style="top: 50px;">Add New offre</div>
    <div class="container"style="height: 600px; top: 130px; margin-left: 300px;">
        <div class="user" style="margin-left:0px">
        <div class="button">
        <button><a href="offre_dash.php">Retour à la liste des offres</a></button>
        </div>
            <div class="form_bx">
              
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
     
         <div class>
         <form name="form"id="myForm" method="POST">
            <table >
               
				<tr>
                    <td>
                        <label for="id_offre">Id_offre:
                        </label>
                    </td>
                    <td><input type="text" name="id_offre" id="id_offre" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nom_offre">Nom_offre:
                        </label>
                    </td>
                    <td><input type="text" name="nom_offre" id="nom_offre" maxlength="20">
                    <span  id ="cmono"></span></td>

                </tr>
                <tr>
                    <td>
                        <label for="description_offre">description_offre:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="description_offre" id="description_offre">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="code_promo">Code promo:
                        </label>
                    </td>
                    <td>
                        <input type="code_promo" name="code_promo" id="code_promo">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="img_offre">img offre:
                        </label>
                    </td>
                    <td>
                        <input type="file" name="img_offre" id="img_offre" >
                    </td>
                </tr>              
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" onclick="verif()" value="Envoyer"> 
                    </td>
                    <td>
                       <!-- <input type="reset" value="Annuler" >-->
                    </td>
                </tr>
            </table>
         </form>
         </div>
         </div>
         </div>
         </div>
        
        <!---->
                        </section>
                        <script src="controlo.js"></script>
    </body>
</html>
<style>
    button
    {
    background: #e3979e;
    color: #fff;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 1px;
    transition: .5s;
    border-radius: 15px;
}
section .container .user {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    margin-left: 200px;
}
</style>