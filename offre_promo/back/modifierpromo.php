<?php
    include_once '../Model/promo.php';
    include_once '../Controller/OffreC.php';

    $error = "";

    // create promo
    $promo = null;

    // create an instance of the controller
    $promoC = new promoC();
    if (
      
		isset($_POST["id_promo"]) &&		
        isset($_POST["nom_promo"]) &&
		isset($_POST["prix"]) && 
        isset($_POST["por_promo"]) && 
        isset($_POST["img_promo"])
    ) {
        if (
          
			!empty($_POST['id_promo']) &&
            !empty($_POST["nom_promo"]) && 
			!empty($_POST["prix"]) && 
            !empty($_POST["por_promo"]) && 
            !empty($_POST["img_promo"])
        ) {
            $promo = new promo(
               
				$_POST['id_promo'],
                $_POST['nom_promo'], 
				$_POST['prix'],
                $_POST['por_promo'],
                $_POST['img_promo']
            );
            $promoC->modifierpromo($promo, $_POST["id_promo"]);
            header('Location:offre_dash.php');
        }
        else
            $error = "Missing information";
    }    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="newoffre.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
    <button><a href="offre_dash.php">Retour à la liste des promo</a></button>
        <section>
        
        <?php
			if (isset($_POST['id_promo'])){
				$promo = $promoC->recupererpromo($_POST['id_promo']);
				
		?>
        <div class="Title"style="top: 50px;">Modify promo Info of <?php echo $promo['nom_promo']; ?></div>
        <?php
            }
            ?>
        <hr>
        <div class="container"style="height: 600px; top: 130px;">
        <div class="user">
            <div class="form_bx">
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['id_promo'])){
				$promo = $promoC->recupererpromo($_POST['id_promo']);
				
		?>
        
        <form action="" method="POST">
            <table >
                
				<tr>
                    <td>
                        <label for="id_promo">id_promo:
                        </label>
                    </td>
                    <td><input type="text" name="id_promo" id="id_promo" value="<?php echo $promo['id_promo']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nom_promo">nom_promo:
                        </label>
                    </td>
                    <td><input type="text" name="nom_promo" id="nom_promo" value="<?php echo $promo['nom_promo']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prix">prix:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="prix" value="<?php echo $promo['prix']; ?>" id="prix">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="por_promo"> porsentage:
                        </label>
                    </td>
                    <td>
                        <input type="por_promo" name="por_promo" id="por_promo" value="<?php echo $promo['por_promo']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="img_promo">img promo:
                        </label>
                    </td>
                    <td>
                        <input type="file" name="img_promo" id="img_promo" value="<?php echo $promo['img_promo']; ?>">
                    </td>
                </tr>              
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                       <!-- <input type="reset" value="Annuler" >-->
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
        <iframe class="img_bx"src='https://my.spline.design/hands3diconscopy-8568f84aa91f016c37f7d53a29ae1738/' frameborder='0' width='100%' height='100%'></iframe>
            <div class="hide-icon-2"style="top: 540px"></div>
        </div>
        </div>
        </div>
        </section>
    </body>
</html>
<style>
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
    
</style>