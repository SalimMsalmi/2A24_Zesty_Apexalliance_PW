<?php
    include_once '../Model/Promo.php';
    include_once '../Model/Offre.php';
    include_once '../Controller/OffreC.php';

    $error = "";

    // create promo
    $promo = null;
    $offre = null;

    // create an instance of the controller
    $promoC = new promoC();
    $offreC = new offreC();
    if (
        isset($_POST["id_offre"]) &&	
		isset($_POST["id_promo"]) &&		
        isset($_POST["nom_promo"]) &&
		isset($_POST["prix"]) && 
        isset($_POST["por_promo"]) && 
        isset($_POST["img_promo"])
    ) {
        if (
            !empty($_POST["id_offre"]) &&
			!empty($_POST['id_promo']) &&
            !empty($_POST["nom_promo"]) && 
			!empty($_POST["prix"]) && 
            !empty($_POST["por_promo"]) && 
            !empty($_POST["img_promo"])
        ) {
            $promo = new promo(
                $_POST['id_offre'],

				$_POST['id_promo'],
                $_POST['nom_promo'], 
				$_POST['prix'],
                $_POST['por_promo'],
                $_POST['img_promo']
            );
            $promoC->ajouterpromo($promo);
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
    <div class="Title"style="top: 50px;">Add promo to offre</div>
    <div class="container"style="height: 600px; top: 130px; margin-left: 300px;">
        <div class="user" style=" margin-left: 100px;">
        <div class="button">
        <form action="offre_dash.php">
    <input  style="background: #e3979e;
    color: #fff;
    /*cursor: pointer;*/
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 1px;
    transition: .5s;
    border-radius: 15px;"  type="submit" value="Go to promo list" />
</form>
        </div>
            <div class="form_bx">
              
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        <?php
			if (isset($_POST['id_offre'])){
				$offre = $offreC->recupereroffre($_POST['id_offre']);
				
		?>
     
         <div class>
         <form action="addpromotooffre.php"  name="form"id="myForm" method="POST">
            <table>
            <tr>
                    <td>
                        <label for="id_offre">id_offre:
                        </label>
                    </td>
                    <td><input type="text" name="id_offre" id="id_offre" value="<?php echo $offre['id_offre']; ?>" maxlength="20"></td>
                </tr>
               
				<tr>
                    <td>
                        <label for="id_promo">Id_promo:
                        </label>
                    </td>
                    <td><input type="number" name="id_promo" id="id_promo" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nom_promo">Nom_promo:
                        </label>
                    </td>
                    <td><input type="text" name="nom_promo" id="nom_promo" value="<?php echo $offre['nom_offre']; ?>" maxlength="20">
                    <span  id ="cmon"></span></td>
                    
                </tr>
                <tr>
                    <td>
                        <label for="prix">prix:
                        </label>
                    </td>
                    <td>
                        <input type="number" step="0.01" name="prix" id="prix">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="por_promo">porsentage promo:
                        </label>
                    </td>
                    <td>
                        <input type="number" step="0.01" name="por_promo" id="por_promo">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="img_promo">img promo:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="img_promo" id="img_promo" value="<?php echo $offre['img_offre']; ?>">
                    </td>
                </tr>              
                <tr>
                    <td></td>
                    <td>
                        <input  type="submit" onclick="verif();sendemail()"value="Envoyer" > 
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
         </div>
         </div>
         </div>
         </div>
        
        <!---->
                        </section>
                        <script src="controlp.js"></script>
                        <script src="https://smtpjs.com/v3/smtp.js"></script>
                       <script>
                            function sendemail(){ 
                                Email.send({
    Host : "smtp.gmail.com",
    Username : "zesty4256@gmail.com",
    Password : "ZESTY15951",
    To : 'azizchehata47@gmail.com',
    From : "zesty4256@gmail.comm",
    Subject : "New promo",
    Body : "ta3rafha ninini"
}).then(
  message => alert(message)
);
                            }
                        </script>
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
