
<?php 



include "../../../controller/commandeC.php";
include_once "../../../model/commande.php";
//include "../../../../controller/clientC.php";
require_once "../../../config.php";
$commandeC=new commandeC();
 
    $listcommande=$commandeC->affichercommandetri();
//$clientC = new clientC();
//$listeclient=$clientC->afficherclient();

 



/*-------------------------------------------CRUD.php---------------------------*/



                
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="https://kit.fontawesome.com/545d9736b4.js" crossorigin="anonymous"></script>
    <link rel="icon" href="Zlogo.png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js" integrity="sha512-R/QOHLpV1Ggq22vfDAWYOaMd5RopHrJNMxi8/lJu8Oihwi4Ho4BRFeiMiCefn9rasajKjnx9/fTQ/xkWnkDACg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
   <!--DATATABLES-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script language="javascript"src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" type="text/javascript"></script>
   <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
xmlhttp.send();
</script>
</head>
<body>
        <!-- Side_bar -->
<div class="sidebar">
    <i class="fa fa-circle-chevron-left close-btn"onclick="hide_sidebar();"></i>
    <div class="content">
        <div class="img"></div>
    <div class="slogon">ZESTY <br><span style="font-size:16px;">Beauté Sans Limite</span></div>
    <button  class="dash-btn"onclick="dash()"><img id="dash-icon"src="Dashboard.png">Dashboard</button>
    <a href="Crud-Produits.php"class="Prod-btn"><img id="Prod-icon"src="Products.png">Products</a>
    <button  class="Appoint-btn"onclick="services()"><img id="Appoint-icon"src="Appointments.png">Services and<br>Appointments</button>
    <button  class="Users-btn"onclick="Users()"><img id="Users-icon"src="Users.svg">Users</button>
    
    <button  class="Services-btn"><img id="Services-icon"src="Services.svg">Promos and Offers</button>
    <button  class="News-btn"><img id="News-icon"src="News.svg">News</button>
    <button  class="Feedback-btn"onclick="Feedback()"><img id="Feedback-icon"src="Feedback.svg">Feedback</button>
    <button href="Commande.php" class="Logout-btn"><i id="Logout-icon"class="fa-solid fa-arrow-right-from-bracket"></i>Commande</button>

    <button href="#Settings"><img class="Settings-btn"src="Settings.svg"></button>
    </div>   
</div>
<div class="elements">
    <div class="Top-bar">
        <div class="Profile-img"></div>
        <div class="Name-role"><span class="Name">Oussema Ayari</span><span class="Role">Admin</span></div>
        <div class="Notification-bell"><span>15</span></div>
        <div class="dark-mode-btn"><i class="fa fa-moon"></i></div>
        <div class="Messages"></div>
        <div class="Search"></div>
        <span class="Messages-notif">4</span>
        <input class="Search_area" placeholder="Search here.."></input>
    </div>
    <div class="Cards hidden">
        <div class="Profit-card">
        <div class="Text-profit">Profit : <br>400$</div>
        <div class="Profit-img"></div>
    </div>
    <div class="Statistics-card hidden">
        <div class="Text-Statistics">Statistics :</div>
        <div class="Numbers">
             <div class="Prod-dash hidden">
                 <div class="Prod-icon">99<br><span>Products</span></div>
             </div>
             <div class="Customers-dash hidden">
                <div class="Customers-icon">800<br><span>Customers</span></div>
             </div>
             <div class="Feedback-dash hidden">
              <div class="Feedback-icon">69<br><span>Feedbacks</span></div>
           </div>
             <div class="Revenue-dash hidden">
                <div class="Revenue-icon">$785<br><span>Revenue</span></div>
             </div>
        </div>
        
    </div>
    <div class="Charts-card">
        <div class="Text-Charts">Charts :</div>
        <canvas id="myChart"style="transition: 0.5s;"></canvas>   
    </div>
    <div class="Appoint-card">
        <div class="Text-Appoint">Appointments : <br>350</div>
        <div class="Appoint-img"></div>
    </div>
    </div>
    <div class="Users-interface ">
    <div class="main-content">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						
						<div class="row">
                            <div class="col-lg-9">
								<br>
                                <h2 class="title-1 m-b-25">Informations Gérer Commandes</h2> 
                                <div id="google_translate_element"></div>
         <script type="text/javascript">
             function googleTranslateElementInit() {
                 new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
             }
         </script>

         <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
         
                                <div class="table-responsive table--no-card m-b-40">
                                <table style="margin-top:300px;height:300px;"id="myTable" class=" table-earning" >
                                   

                                    <thead class="thead-dark">
    <tr>
       
        <th scope="col">ID Commande</th>
        
        <th scope="col">etat</th>
         <th scope="col">client</th>
       
        <th> <li> total 
    </li></th>
      <th scZ="col">supression</th>
       
        


    </tr>
</thead>

<?php

foreach ($listcommande as $row)
{
   $l=0;
   


 ?>    
    
        <tr valign="middle">
            
            <td ><?php echo $row["id_commande"] ?></td>
            
           
            
             <td >
             <form action="modifiecommande.php" method="post" style="position: relative;top: 10px">
                   
             <input type="hidden" id="id_commande" name="id_commande" value="<?php echo $row["id_commande"] ?>">
                   <select name="etat" id="etat" >
                   
    <option value="en cours de traitement"<?php if ($row["etat"]=="en cours de traitement") echo "selected" ; ?>>en cours de traitement</option>
       <option value="traitée" <?php if ($row["etat"]=="traitée") echo "selected" ; ?>>traitée</option>
       
    </select>
    <button type="submit" class="badge badge-info">update</button>
               </form>
           </td>
            <td><?php echo $row["client"] ?></td>
       
           
            <td ><?php echo $row["prix_tot"].' '.'TND' ?></td>
                <td>
                
                    
          <input type="hidden" id="id_commande" name="id_commande" value="<?php echo $row["id_commande"] ?>">
          <input type="hidden" id="prix_tot" name="prix_tot" value="<?php echo $row["prix_tot"] ?>">
         
          <input type="hidden" id="client" name="client" value="<?php echo $row["client"] ?>">

          
              <form action="supprimercommande.php" method="get">
               
                    
          <input type="hidden" id="id_commande" name="id_commande" value="<?php echo $row["id_commande"] ?>">
                   
                  <button  class="btn btn-danger" type="submit" ><i class="fa fa-trash-o" aria-hidden="true"></i>Supprimer</button>   </form>
                 
                  
              

                  <td<form action="imprimercommande1.php" method="get">
                  <input type="hidden" id="id_commande" name="id_commande" value="<?php echo $row["id_commande"] ?>">
                  <input type="hidden" id="client" name="client" value="<?php echo $row["client"] ?>">
                  <input type="hidden" id="prix_tot" name="prix_tot" value="<?php echo $row["prix_tot"] ?>">
                  <input type="hidden" id="etat" name="etat" value="<?php echo $row["etat"] ?>">
                </form>


 
         
            
       
            
        </tr>
       
    <?php
}

  
?>    


                                      
                                    </table>
                                </div>
                            </div>
						   
					
					</div>
				</div>
			</div>
		</div>
    </div>
   
<script src="controle.js"></script>

<style>.Ajout-card
{ margin-left: 10%;
  
   margin-top:0px;
   
position: absolute;
width: 600px;
height: 35  0px;
top: 10%;
transition: .5s;
background: #FFFFFF;
border: 1px solid #000000;
box-sizing: border-box;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 28px;
}</style>
</body>
<script src="script.js"></script>

</html>

