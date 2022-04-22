<?php
session_start();
include_once "../../../../controller/commandeC.php";
include_once "../../../../model/commande.php";
require_once "../../../../config.php";
//include "../../../../controller/clientC.php";

 $commandeC=new commandeC();
 //$clientC = new clientC();
 //$listeclient=$clientC->afficherclient();
    $listcommande=$commandeC->affichercommande();
    $N=0;
    $k=0;
   

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Historique des Commandes-Zesty</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <link rel="stylesheet" href="assets/css/custom/style.css">
    <link rel="stylesheet" href="assets/css/responsive/responsive.css">

    <!-- Favicon 
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">-->

    <!-- Font awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">    
    <!-- Date Picker -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datepicker.css">   
     <!-- Gallery Lightbox -->
    <link href="assets/css/magnific-popup.css" rel="stylesheet"> 
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">     

       

   
    <!-- Google Fonts -->

    <!-- Prata for body  -->
    <link href='https://fonts.googleapis.com/css?family=Prata' rel='stylesheet' type='text/css'>
    <!-- Tangerine for small title -->
    <link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>   
    <!-- Open Sans for title -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
  </head>
  <body>

  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>
    </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header section -->
  <?php include "header.php" ?>
 


  <!-- Start Restaurant game -->
  <section id="mu-restaurant-game">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-restaurant-game-area">

            <div class="mu-title">
              <br><br><br>
              <span class="mu-subtitle">Historique</span>
              <br><br>
              <h2>votre commande</h2>
              
               <table class="table">
                <thead class="thead-dark">
                    <tr>
                       
         <th scope="col"style="font-weight: 1000;font-size: 15px"><center>ID commande</center></th>
       
         
        
       
        
            <th scope="col"style="font-weight: 1000;font-size: 15px"><center>Prix total du commande</center></th>
            <th scope="col"style="font-weight: 1000;font-size: 15px"><center>Etat</center></th>
            <th scope="col"style="font-weight: 1000;font-size: 15px"><center>annuler la commande</center></th>
            <th scope="col"style="font-weight: 1000;font-size: 15px"><center>Facture</center></th>


         



                    </tr>


                </thead>
                




	
		
		
				
			
<?php
foreach ($listcommande as $row){
    
  


$l=0;
   


 ?>    
    
        <tr valign="middle">
            
            
            
           
            
            
            
            <td align="center"><?php echo $row["id_commande"]?></td>
            <td align="center"><?php echo $row["prix_tot"].' '.'TND' ?></td>
            <td align="center"><?php echo $row["etat"]?></td>
            
       
           
            
                <td>
                
                    
          <input type="hidden" id="id_commande" name="id_commande" value="<?php echo $row["id_commande"] ?>">
         
          <input type="hidden" id="client" name="client" value="1  ">
          <center> <form action="supprimerlignecommande.php" method="get">
               
                    
               <input type="hidden" id="id_commande" name="id_commande" value="<?php echo $row["id_commande"] ?>">
                        
                       <button  class="btn btn-danger" type="submit" ><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>   </form></center>

          
               
                       <td <center> <form action="imprimercommande1.php" method="get">
                  <input type="hidden" id="id_commande" name="id_commande" value="<?php echo $row["id_commande"] ?>">
                  <input type="hidden" id="client" name="client" value="<?php echo $row["client"] ?>">
                 
                  <input type="hidden" id="prix_tot" name="prix_tot" value="<?php echo $row["prix_tot"] ?>">
                  <input type="hidden" id="etat" name="etat" value="<?php echo $row["etat"] ?>">
                   <button  class="btn btn-light" type="submit" ><span class="fa fa-print fa-2x"></span>Imprimer</button></td>
                </form></center>

            
           
 
         
            
       
            
        </tr>
<?php
} ?>




               </table>
               </br>
                
        
 

  
  <!-- jQuery library -->
  <script src="assets/js/jquery.min.js"></script>  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.js"></script>   
  <!-- Slick slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <!-- Counter -->
  <script type="text/javascript" src="assets/js/simple-animated-counter.js"></script>
  <!-- Gallery Lightbox -->
  <script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
  <!-- Date Picker -->
  <script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script> 
  <!-- Ajax contact form  -->
  <script type="text/javascript" src="assets/js/app.js"></script>
 
  <!-- Custom js -->
  <script src="assets/js/custom.js"></script> 

  </body>
   <!-- Footer-->
 <footer class="py-5 bg-dark">
      <div style="height:20px; width: 10px;;
      width:10000px;" class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Zesty 2022</p>
      </div>
      
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>
