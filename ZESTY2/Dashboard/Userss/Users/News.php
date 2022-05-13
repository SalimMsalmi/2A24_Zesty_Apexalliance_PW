<?php
	include '../controller/NewsC.php';
	$news=new NewsC();
	$listenews=$news->affichernews(); 

include '../../../Front/Login/Controller/UserC.php';
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
    <a href="../../Products/Crud-Produits.php"> <button class="Prod-btn"><img id="Prod-icon"src="images/Products.png">Products</button></a>
    <a href="../../Products/commande.php"> <button class="Commande-btn"><img id="Commande-icon"src="images/commande.png">Commande</button></a>
    <a href="../../Services/intrfaci.php"><button class="Appoint-btn"><img id="Appoint-icon"src="images/Appointments.png">Services and<br>Appointments</button></a>
    <a href="user_dash.php"><button class="Users-btn"><img id="Users-icon"src="images/Users.svg">Users</button></a>
    <a href="../../Promo/offre_dash.php"><button class="Services-btn"><img id="Services-icon"src="images/Services.svg">Promos and Offers</button></a>
     <a href="News.php"><button class="News-btn"><img id="News-icon"src="images/News.svg">News</button></a>
     <a href="../../Feedback/dash_user.php"><button class="Feedback-btn"><img id="Feedback-icon"src="images/Feedback.svg">Feedback</button></a>
    <a href="../../../Front/Login/Users/Login.php"><button class="Logout-btn"><i id="Logout-icon"class="fa-solid fa-arrow-right-from-bracket"></i>Logout</button></a>
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
    <div class="ajout">
        
            <button class="ajoutarticle-btn"><a href="Addarticle.php"><img id="ajoutarticle-icon"src="images/ajoutarticle.png">Add article</button></a>
            <button type="button" class="btn btn-sm btn-outline-secondary" style="background:transparent;border:none;100px;width:100px;height:20px;margin-top:5px;margin-left:1200px;background-color:black;border-radius:5px"onclick=" window.print();">Export</button>
        </div>
        <?php
				foreach($listenews as $news){
			?>
        <div class="article">
            <div class="left">
            <img src="<?php echo $news['imageblog']; ?>" />
            </div>
            <div class="right">
            <form id="form-modif"method="POST" action="modifiernews.php"style="margin-left:200px;padding:0;background:transparent;">
                  <input type="submit"name="Modif"id="modif-btn"style="background:transparent;border:none;width:20px;height:20px;background: url('images/modif-btn.svg');margin-top:5px;margin-left:400px;background-color:rgba(255, 194, 82, 0.689);border-radius:5px"value="">
                  <input type="hidden" value=<?PHP echo $news['idblog']; ?> name="idblog">
					        </form>
            <a href="supprimernews.php?id=<?php echo $news['idblog']; ?>"><div class="delete"><i class="fa-solid fa-trash-can"></i></div></a>
                <p class="date"><?php echo $news['dateblog']; ?></p>
                <p class="date"><?php echo $news['idblog']; ?></p>
                <h1>Title</h1>
                <p class="description"><?php echo $news['descriptionblog']; ?></p>
                <p> <?php echo $news['idadmin']; ?></p>  
                <a href="commentaireback.php?id=<?php echo $news['idblog'];?>" class="commentaire-btn"><img id="commentaire-icon"src="images/commentaire.png">comment</a>
            </div>
        </div> 
        <?php
				}
			?> 
         
    </div>
</div>
<script src="script_dash.js"></script>
</body>
</html>
<style>
    .commentaire-btn{
        border: 0.2rem solid;

    }
    .News-interface .ajout .ajoutarticle-btn{
        border: 0.2rem solid;
    }
    .News-interface .ajout .ajoutarticle-btn:hover{
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    }
    .News-interface{
    width: 1350px;
    border:flex;
    height: 83%;
    margin-top: 100px;
    margin-left: -10px;
    position: absolute;
    transition:.5s;
    padding: 0;
    display: inline-block;


}
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

    
    }
    .article .left img{
    height: 300px;
    width: 400px;
    vertical-align: middle;
    display: inline-flex;
}
    .article .right {
    max-width: 50%;
    margin-left: 15px;
    margin-top:-50px;
    display: inline-block;
    
    }
    .article .right .delete{
    color: black;
    margin-top:-30px;
    }
</style>