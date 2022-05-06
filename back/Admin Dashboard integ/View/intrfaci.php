<?php
	include '../Controller/ServiceC.php';
	$serviceC=new serviceC();
	$listeservices=$serviceC->afficherservice(); 
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
    <title>Admin-Manage Services</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/545d9736b4.js" crossorigin="anonymous"></script>
    <link rel="icon" href="Zlogo.png">
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

     <!-- Side_bar -->
<div class="sidebar">
    <i class="fa fa-circle-chevron-left close-btn"onclick="hide_sidebar();"></i>
    <div class="content">
        <div class="img"></div>
    <div class="slogon">ZESTY <br><span style="font-size:16px;">Beauté Sans Limite</span></div>
    <button class="dash-btn"onclick="dash()"><img id="dash-icon"src="img/Dashboard.png">Dashboard</button>
    <button class="Prod-btn"><img id="Prod-icon"src="img/Products.png">Products</button>
    <button class="Appoint-btn"onclick="services()"><img id="Appoint-icon"src="img/Appointments.png">Services and<br/>Appointements</button>
    <button class="Users-btn"onclick="Users()"><img id="Users-icon"src="img/Users.svg">Users</button>
    <button class="Services-btn"><img id="Services-icon"src="img/Services.svg">Promos and Offers</button>
    <button class="News-btn"><img id="News-icon"src="img/News.svg">News</button>
    <button class="Feedback-btn"onclick="Feedback()"><img id="Feedback-icon"src="img/Feedback.svg">Feedback</button>
    <button class="Logout-btn"><i id="Logout-icon"class="fa-solid fa-arrow-right-from-bracket"></i>Logout</button>
    <a href="#Settings"><img class="Settings-btn"src="Settings.svg"></a>
    </div>   
</div>
<div class="elements">
    <div class="Top-bar">
        <div class="Profile-img"></div>
        <div class="Name-role"><span class="Name">Belhaj Abdallah Mariem</span><span class="Role">Admin</span></div>
        <div class="Notification-bell"><span>15</span></div>
        <div class="dark-mode-btn"><i class="fa fa-moon"></i></div>
        <div class="Messages"></div>
        <div class="Search"></div>
        <span class="Messages-notif">4</span>
        <input class="Search_area" placeholder="Search here.."></input>
    </div>

<!-- Services -->
  
<div class="services-interface ">
      <div class="cardserv">
         <div class="container-onglets">
         <a class="onglets" href="intrfaci.php">Manage Services <i class="fa fa-angle-right"></i></a>
         <a class="onglets"  href="appoint.php">Manage Appointements <i class="fa fa-angle-right"></i></a>
         <a class="onglets"  href="qrgenerator.php">QR Code Generator <i class="fa fa-angle-right"></i></a>

         </div>
         <p> </p>
        <button class="button-28"><a href="addserv.php">add new service</a></button>

<!--<style>
         .button-28 {
  appearance: none;
  background-color: transparent;
  border: 2px solid #1A1A1A;
  border-radius: 15px;
  box-sizing: border-box;
  color: #3B3B3B;
  cursor: pointer;
  display: inline-block;
  font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
  font-size: 16px;
  font-weight: 600;
  line-height: normal;
  margin: 0;
  min-height: 60px;
  min-width: 0;
  outline: none;
  padding: 16px 24px;
  text-align: center;
  text-decoration: none;
  transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: 14%;
  will-change: transform;
}

.button-28:disabled {
  pointer-events: none;
}

.button-28:hover {
  color: #fff;
  background-color: #1A1A1A;
  box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
  transform: translateY(-2px);
}

.button-28:active {
  box-shadow: none;
  transform: translateY(0);
}
        
</style>-->

        
         
         <table style="width:100%; z-index:1;" border=3;>
            
            <tr style="width:100%;background:#000; color:white">
              <th>Service ID</th>
              
              <th>service Image</th>
              <th>service Name</th>
              <th>service Price</th>
              <th>service type</th>
              <!--<th>Edit</th>
			      	<th>Delete</th>-->
              </tr>
              <?php	foreach($listeservices as $service){	?>
               <tr>
              <td><?php echo $service['idservice']; ?></td>
              <td><img src="<?php echo "../".$service['imgservice']; ?>" width="120" height="120"  /></td>
              <td><?php echo $service['nameservice']; ?></td>
              <td><?php echo $service['priceservice']; ?></td>
              <td><?php echo $service['typeservice']; ?></td>
              <td>
              <form method="POST" action="modifserv.php">
						<input type="submit" name="edit" value="edit">
						<input type="hidden" value=<?PHP echo $service['idservice']; ?> name="idservice">
					</form>
				</td>
				<td>
					<a href="suppserv.php?idservice=<?php echo $service['idservice']; ?>">Supprimer</a>
              </td>
              </tr>
              <?php
				}
			?>
              </table>
       
           
        

         <div class="contenu Contenu" data-anim="2">
          <h3>mimz</h3>
          <hr>
          <p>lmao </p>
        </div>

        <div class="contenu Contenu" data-anim="3">
          <div class="Text-Charts">Charts :</div>
          <canvas id="myChart"style="transition: 0.5s;"></canvas>
        </div>

      </div>

  </div>
  <script src="script.js"></script>
  </body>
  </html>

















