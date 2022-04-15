<?php
	include '../controller/NewsC.php';
	$news=new NewsC();
	$listenews=$news->affichernews(); 
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
    <link rel="icon" href="Zlogo.png">
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
    <a href="dash_user.php"><button class="dash-btn"><img id="dash-icon"src="Dashboard.png">Dashboard</button></a>
    <button class="Prod-btn"><img id="Prod-icon"src="Products.png">Products</button>
    <button class="Appoint-btn"><img id="Appoint-icon"src="Appointments.png">Services and<br>Appointments</button>
    <button class="Users-btn"><img id="Users-icon"src="Users.svg">Users</button>
    <button class="Services-btn"><img id="Services-icon"src="Services.svg">Promos and Offers</button>
    <button class="News-btn"><img id="News-icon"src="News.svg">News</button>
    <button class="Feedback-btn"><img id="Feedback-icon"src="Feedback.svg">Feedback</button>
    <button class="Logout-btn"><i id="Logout-icon"class="fa-solid fa-arrow-right-from-bracket"></i>Logout</button>
    <a href="#Settings"><img class="Settings-btn"src="Settings.svg"></a>
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
    <div class="News-interface">
        <div class="ajout">
            <button class="ajoutarticle-btn"><a href="Addarticle.php"><img id="ajoutarticle-icon"src="ajoutarticle.png">Add article</button></a>
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
                  <input type="submit"name="Modif"id="modif-btn"style="background:transparent;border:none;width:20px;height:20px;background: url('modif-btn.svg');margin-top:5px;background-color:rgba(255, 194, 82, 0.689);border-radius:5px"value="">
                  <input type="hidden" value=<?PHP echo $news['idblog']; ?> name="idblog">
					        </form>
            <a href="supprimernews.php?id=<?php echo $news['idblog']; ?>"><div class="delete"><i class="fa-solid fa-trash-can"></i></div></a>
                <p class="date"><?php echo $news['dateblog']; ?></p>
                <p class="date"><?php echo $news['idblog']; ?></p>
                <h1>Title</h1>
                <p class="description"><?php echo $news['descriptionblog']; ?></p>
                <p> <?php echo $news['idadmin']; ?></p>  
                <button class="commentaire-btn"><img id="commentaire-icon"src="commentaire.png">comment</button>
            </div>
        </div> 
        <?php
				}
			?> 
    </div>
</div>
</div>

   <script src="../script_dash.js"></script>
</body>
</html>
<style>
    .article .right {
    max-width: 50%;
    margin-left: 15px;
    margin-top:-60px;
    }
    .article .right .delete{
    color: black;
    margin-top:-30px;
    }
</style>