        <?php
	include 'Controller/OffreC.php';
  //include '../Userss/Controller/UserC.php';
  $userC=new UserC();
	$offreC=new offreC();
	$listeoffre=$offreC->afficheroffre(); 
    $promoC=new promoC();
    $listepromo=$promoC->afficherpromo(); 
    $Admin = null;
    session_start();
    if(isset($_SESSION["admincin"]))
    {
   $Admin=$userC->recupereruser($_SESSION["admincin"]); 
    }
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
    <script src="https://kit.fontawesome.com/545d9736b4.js" crossorigin="anonymous"></script>
    <link rel="icon" href="images/Zlogo.png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js" integrity="sha512-R/QOHLpV1Ggq22vfDAWYOaMd5RopHrJNMxi8/lJu8Oihwi4Ho4BRFeiMiCefn9rasajKjnx9/fTQ/xkWnkDACg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
        <!-- Side_bar -->
<div class="sidebar">
    <i class="fa fa-circle-chevron-left close-btn"onclick="hide_sidebar();"></i>
    <div class="content">
        <div class="img"></div>
    <div class="slogon">ZESTY <br><span style="font-size:16px;">Beauté Sans Limite</span></div>
    <a href="../Userss/Users/dash_user.php"><button class="dash-btn"><img id="dash-icon"src="images/Dashboard.png">Dashboard</button></a>
    <a href="../Products/Crud-Produits.php"><button class="Prod-btn"><img id="Prod-icon"src="images/Products.png">Products</button></a>
    <a href="../Products/commande.php"> <button class="Commande-btn"><img id="Commande-icon"src="images/commande.png">Commande</button></a>
    <a href="../Services/intrfaci.php"><button class="Appoint-btn"><img id="Appoint-icon"src="images/Appointments.png">Services and<br>Appointments</button></a>
    <a href="../Userss/Users/user_dash.php"><button class="Users-btn"><img id="Users-icon"src="images/Users.svg">Users</button></a>
    <button class="Services-btn"><img id="Services-icon"src="images/Services.svg">Promos and Offers</button>
    <a href="../Userss/Users/News.php"><button class="News-btn"><img id="News-icon"src="images/News.svg">News</button></a>
    <button class="Feedback-btn"><img id="Feedback-icon"src="images/Feedback.svg">Feedback</button>
    <a href="../../Front/Login/Users/Login.php"><button class="Logout-btn"><i id="Logout-icon"class="fa-solid fa-arrow-right-from-bracket"></i>Logout</button></a>
    <a href="#Settings"><img class="Settings-btn"src="images/Settings.svg"></a>
    </div>   
</div>
<div class="elements">
<div class="Top-bar">
        <div class="Profile-img"style="background: url(<?php echo $Admin["img"]?>);background-size: cover;">
      </div>
     
        <div class="Name-role"><span class="Name"><?php echo $Admin["prenom"]." ".$Admin["nom"] ?></span><span class="Role">Admin</span></div>
        <div class="Notification-bell"style="background: url(./images/Notification_bell.svg);background-size: cover;"><span>15</span></div>
        <div class="dark-mode-btn"><i class="fa fa-moon"></i></div>
        <div class="Messages"style="background: url(./images/Message.svg);background-size: cover;"></div>
        <div class="Search"style="background: url(./images/Search.svg);background-size: cover;"></div>
        <span class="Messages-notif">4</span>
        <input class="Search_area" placeholder="Search here.."></input>
    </div>
    <div class="Users-interface">
     
    
        <div class="Accounts-card">
            <div class="Text-Accounts">Accounts : <a href="newoffre.php"><button><i class="fa-solid fa-user-plus"></i>Add new offre</button></a></div>
            <table>
              <tr>
              <th>#</th>
              <th>Profile Picture</th>
              <th>Name</th>
              <th>description</th>
              <th>code_promo </th>
              <th>Action</th>
              </tr>
              <?php
				foreach($listeoffre as $offre){
			?>
               <tr>
              <td><?php echo $offre['id_offre']; ?></td>
              <td><img src="<?php echo $offre['img_offre']; ?>" /></td>
              <td><?php echo $offre['nom_offre']; ?></td>
              <td><?php echo $offre['description_offre']; ?></td>
              <td><?php echo $offre['code_promo']; ?></td>
              
              <td>
                <div class="Action">
                  <!---->
                  <form id="form-modif"method="POST" action="addpromotooffre.php"style="margin:0;padding:0;background:transparent;">
                  <!-- <div class="modify"onclick="document.getElementById('form-modif').submit();"><i class="fa-solid fa-pen-to-square"></i></div> -->
                  <input type="submit"name="Modif"id="modif-btn"style="width:20px;height:20px;background: url('https://fontawesome.com/v6/icons/barcode?s=solid');margin-top:5px;border-radius:5px"value="">
                  <input type="hidden" value=<?PHP echo $offre['id_offre']; ?> name="id_offre">
					        </form>
                <!---->
                  <a href="supprimeroffre.php?id=<?php echo $offre['id_offre']; ?>"><div class="delete"><i class="fa-solid fa-trash-can"></i></div></a>
                  <form id="form-modif"method="POST" action="modifieroffre.php"style="margin:0;padding:0;background:transparent;">
                  <!-- <div class="modify"onclick="document.getElementById('form-modif').submit();"><i class="fa-solid fa-pen-to-square"></i></div> -->
                  <input type="submit"name="Modif"id="modif-btn"style="background:transparent;border:none;width:20px;height:20px;background: url('images/modif-btn.svg');margin-top:5px;background-color:rgba(255, 194, 82, 0.689);border-radius:5px"value="">
                  <input type="hidden" value=<?PHP echo $offre['id_offre']; ?> name="id_offre">
					        </form>
                <!--  <div class="details"><i class="fa-solid fa-circle-info"></i></div>-->
                </div>
              </td>
              </tr>
              <?php
				}
			?>
              </table>
              <!--table promo-->
              <div class="Text-Accounts2">Accounts : <a href="newpromo.php"><button><i class="fa-solid fa-user-plus"></i>Add new promo</button></a></div>
            <div class="tablepromo">
              <table>
              <tr>
              <th>#</th>
              <th>promo Ppicture</th>
              <th>Name</th>
              <th>prix</th>
              <th>porsentage promo </th>
              <th>Action</th>
              </tr>
              <?php
				foreach($listepromo as $promo){
			?>
               <tr>
              <td><?php echo $promo['id_promo']; ?></td>
              <td><img src="./images/<?php echo $promo['img_promo']; ?>" /></td>
              <td><?php echo $promo['nom_promo']; ?></td>
              <td><?php echo $promo['prix']; ?>d</td>
              <td><?php echo $promo['por_promo']; ?>%</td>
              
              <td>
                <div class="Action">
                  <a href="supprimerpromo.php?id=<?php echo $promo['id_promo']; ?>"><div class="delete"><i class="fa-solid fa-trash-can"></i></div></a>
                  <form id="form-modif"method="POST" action="modifierpromo.php"style="margin:0;padding:0;background:transparent;">
                  <!-- <div class="modify"onclick="document.getElementById('form-modif').submit();"><i class="fa-solid fa-pen-to-square"></i></div> -->
                  <input type="submit"name="Modif"id="modif-btn"style="background:transparent;border:none;width:20px;height:20px;background: url('images/modif-btn.svg');margin-top:5px;background-color:rgba(255, 194, 82, 0.689);border-radius:5px"value="">
                  <input type="hidden" value=<?PHP echo $promo['id_promo']; ?> name="id_promo">
					        </form>
                <!--  <div class="details"><i class="fa-solid fa-circle-info"></i></div>-->
                </div>
              </td>
              </tr>
              <?php
				}
			?>
              </table>
              </div>
             
             
        </div>
        
        
      <!--  <div class="Accounts-card2">
       
        </div>-->
    </div>
   
</div>
<script src="script_user.js"></script>
<script>
    document.addEventListener("keydown",e=>{
        e.preventDefault();
        if(
            e.key.toLowerCase() === "a" 
           
      ){
        location.href="newoffre.php"
        }

        if(
            e.key.toLowerCase() === "p" 
           
      ){
        location.href="offre_dash.php"
        }
        if(
            e.key.toLowerCase() === "u" 
           
      ){
        location.href="user_dash.php"
        }
        if(
            e.key.toLowerCase() === "d" 
           
      ){
        location.href="dash_user.php"
        }
        if(
            e.key.toLowerCase() === "m" 
           
      ){
        location.href="modifieroffre.php"
        }
        if(
            e.key.toLowerCase() === "f" 
           
      ){
        location.href="../front/front.php"
        }
    });
                                    
</script>
</body>
</html>

<style>
    .Users-interface .Accounts-card{
position: absolute;
width: 1305px;
height: 687px;
top: 2%;
transition: .5s;
background: #FFFFFF;
border: 1px solid #000000;
box-sizing: border-box;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 28px;
margin-left: 16px;
}
table{
    position: absolute;
    left: 50%;
    top: 21.8%;
    transform: translate(-49.9%,-50%);
    width: 97%; 
    
    border: .5px black solid;
    overflow: hidden;
   margin-top: 5px;
   }
   body{
    background-color: #f2f2f2;
   }
   .Users-interface .Text-Accounts2 {
    font-family: 'Montserrat';
    font-style: normal;
    display: flex;
    justify-content: space-between;
    font-size: 32px;
    line-height: 60px;
    padding-left: 31px;
    margin-top:305px;
    color: #000000;
}
button{
    border: none;
    background-color: transparent;
}
.Users-interface .Accounts-card .tablepromo{
    position: absolute;
    left: 50%;
    top: 71.8%;
   transform: translate(-49.9%,-50%);
    width: 97%; 
    
   /*  border: .5px black solid;
    overflow: hidden;
   margin-top: 5px;*/
}
</style>