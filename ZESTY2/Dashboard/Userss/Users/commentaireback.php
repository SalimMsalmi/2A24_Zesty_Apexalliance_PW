<?php
	include '../controller/CommentaireC.php';
	$commentaire=new CommentaireC();
	$listecommentaire=$commentaire->affichercommentaire($_GET["id"]); 
?>
<?php
  $userC=new userC();
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
    <link rel="stylesheet" href="css/style.css">
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
    <a href="dash_user.php"><button class="dash-btn"><img id="dash-icon"src="images/Dashboard.png">Dashboard</button></a>
    <button class="Prod-btn"><img id="Prod-icon"src="images/Products.png">Products</button>
    <a href="../../Products/commande.php"> <button class="Commande-btn"><img id="Commande-icon"src="images/commande.png">Commande</button></a>
    <button class="Appoint-btn"><img id="Appoint-icon"src="images/Appointments.png">Services and<br>Appointments</button>
    <a href="user_dash.php"><button class="Users-btn"><img id="Users-icon"src="images/Users.svg">Users</button></a>
    <button class="Services-btn"><img id="Services-icon"src="images/Services.svg">Promos and Offers</button>
     <a href="News.php"><button class="News-btn"><img id="News-icon"src="images/News.svg">News</button></a>
    <button class="Feedback-btn"><img id="Feedback-icon"src="images/Feedback.svg">Feedback</button>
    <a href="../../Front/Login/Users/Login.php"><button class="Logout-btn"><i id="Logout-icon"class="fa-solid fa-arrow-right-from-bracket"></i>Logout</button></a>
    <a href="#Settings"><img class="Settings-btn"src="images/Settings.svg"></a>
    </div>   
</div>
<div class="elements">
    <div class="Top-bar">
        <div class="Profile-img"style="background: url(<?php echo $Admin["img"]?>);background-size: cover;"></div>
        <div class="Name-role"><span class="Name"><?php echo $Admin["prenom"]." ".$Admin["nom"] ?></span><span class="Role">Admin</span></div>
        <div class="Notification-bell"style="background: url(./images/Notification_bell.svg);background-size: cover;"><span>15</span></div>
        <div class="dark-mode-btn"><i class="fa fa-moon"></i></div>
        <div class="Messages"style="background: url(./images/Message.svg);background-size: cover;"></div>
        <div class="Search"style="background: url(./images/Search.svg);background-size: cover;"></div>
        <span class="Messages-notif">4</span>
        <input class="Search_area" placeholder="Search here.."></input>
    </div>
    <div class="News-interface">
        <?php
				foreach($listecommentaire as $commentaire){
			?>
        <div class="article">
            <div class="right">
            <a href="supprimercommentaire.php?id=<?php echo $commentaire['idcom']; ?>"><div class="delete"><i class="fa-solid fa-trash-can"></i></div></a>
                <p class="date"><?php echo $commentaire['Datecom']; ?></p>
                <p class="date"><?php echo $commentaire['iduser']; ?></p>
                <p class="description"><?php echo $commentaire['descriptioncom']; ?></p>
            </div>
        </div> 
        <?php
				}
			?> 
    </div>
    </div>
</div>
<script src="script_dash.js"></script>
</body>
</html>

<style>
    .article{
        display: inline-flex;
        width: 100%;
    font-family: 'Montserrat';
    width: 80%;
    border: thick double black;
    padding : 1em;
    margin-top: 50px;
    flex-wrap: wrap;
    margin-bottom: 30px;
    margin-left: 20px;
    background-color: white;
</style>