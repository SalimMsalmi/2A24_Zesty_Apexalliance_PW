<?php
    include_once 'Model/Offre.php';
    include_once 'Controller/OffreC.php';

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
            $offreC->modifieroffre($offre, $_POST["id_offre"]);
            header('Location:offre_dash.php');
        }
        else
            $error = "Missing information";
    }    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="newadmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

    <body>
    <button><a href="offre_dash.php">Retour à la liste des offres</a></button>
    <section>
       
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['id_offre'])){
				$offre = $offreC->recupereroffre($_POST['id_offre']);
				
		?>
         <div class="Title"style="top: 50px;">Modify offre Info of <?php echo $offre['nom_offre']; ?></div>
         <div class="container"style="height: 600px; top: 130px;">
        <div class="user">
            <div class="form_bx">
        <form action="" method="POST">
            <table >
                
				<tr>
                    <td>
                        <label for="id_offre">id_offre:
                        </label>
                    </td>
                    <td><input type="text" name="id_offre" id="id_offre" value="<?php echo $offre['id_offre']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nom_offre">nom_offre:
                        </label>
                    </td>
                    <td><input type="text" name="nom_offre" id="nom_offre" value="<?php echo $offre['nom_offre']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="description_offre">description_offre:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="description_offre" value="<?php echo $offre['description_offre']; ?>" id="description_offre">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="code_promo">code promo:
                        </label>
                    </td>
                    <td>
                        <input type="code_promo" name="code_promo" id="code_promo" value="<?php echo $offre['code_promo']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="img_offre">offre photo:
                        </label>
                    </td>
                    <td>
                        <input type="file" name="img_offre" id="img_offre" value="<?php echo $offre['img_offre']; ?>">
                    </td>
                </tr>              
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" onclick="" value="Modifier"> 
                    </td>
                   
                </tr>
            </table>
        </form>
		<?php
		}
		?>
        </div> 
    </div>
        </div>
        </section>
        <script src="control.js"></script>
        
    </body>
</html>

<style>
    section{
    position:relative;
    min-height: 100vh;
    background: rgb(246, 246, 246);
    display: flex;
  /*  justify-content: center;*/
    padding: 20px;
    transition: 0.5s;
    flex-direction: row;
}
 button
    {
    background: #e3979e;
    color: #fff;
    /*cursor: pointer;*/
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 1px;
    transition: .5s;
    border-radius: 15px;
}
section .container .user .form_bx input{
    width: 100%;
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
   
    height: 40px;
}
</style>