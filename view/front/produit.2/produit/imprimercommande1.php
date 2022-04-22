<?PHP
    include "../../../../controller/commandeC.php";
	//include "../../../../controller/clientC.php";
    require_once "../../../../config.php";
	$commandeC = new commandeC();
	$listecommande=$commandeC->affichercommande();
	//$clientC = new clientC();
	//$listeclient=$clientC->afficherclient();
	$F=$_GET['prix_tot'];
$K=0.15;
$T=$F*$K;
$P=$T+$F;
			
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="au theme template">
	<meta name="author" content="Hau Nguyen">
	<meta name="keywords" content="au theme template">

	<!-- Title Page-->
	<title>Produit</title>

	<!-- Fontfaces CSS-->
	<link href="css/font-face.css" rel="stylesheet" media="all">
	<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
	<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

	<!-- Bootstrap CSS-->
	<link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

	<!-- Vendor CSS-->
	
	<link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
	<link href="vendor/wow/animate.css" rel="stylesheet" media="all">
	<link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
	<link href="vendor/slick/slick.css" rel="stylesheet" media="all">
	<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

	<!-- Main CSS-->
	<link href="css/theme.css" rel="stylesheet" media="all">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <a class="logo" href="afficherlignecommande.php">
        <img src="../../../back/integration/Zlogo.png" alt="Cool Admin">                   Num Facture : 45
        </a>

        
		<title> Facture </title>
    </head>
    <body onload="window.print()">
	<h5 class="title-1 m-b-25">Facture</h5>

		<hr>
		<div class="table-responsive table--no-card m-b-40">
                                <table id="dataTable" class="table table-borderless table-striped table-earning" >
			<tr>
                <th style="color:red">id commande</th>
				<th></th>
				<th style="color:red">etat</th>
				<th></th>
          
				<th></th>
               
				<th></th>
                <th style="color:red">prix total</th>
			
               
                
				
			</tr>

			
            		<tr>
                    
		    <th><?PHP echo $_GET['id_commande']; ?></th>
			<th></th>
		    <th><?PHP echo $_GET['etat']; ?></th>
			<th></th>
					<th></th>
					<th></th>
                    <th><?PHP echo $_GET['prix_tot']; ?>TND</th>
              
					
	
				</tr>
</div>
			












<table id="dataTable" class="table table-borderless table-striped table-earning" >
			<tr>
                
                <th style="color:red">ID Client</th>
			
               
                
				
			</tr>

		
            		<tr>
                    <th><?PHP echo $_GET['client']; ?></th>
                   
					
              
					
					
				</tr>
			
		</table>
                                


		
	</body>
</html>