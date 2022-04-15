<?php
    include_once '../model/News.php';
    include_once '../controller/NewsC.php';

    $error = "";

    // create offre
        $img="default.jpg";
    // create an instance of the controller
    $NewsC = new NewsC();
  if (
      
		isset($_POST["idadmin"]) &&		
       isset($_POST["dateblog"]) &&
		isset($_POST["descriptionblog"])
    ) {
        if (
          
			!empty($_POST['idadmin']) &&
          !empty($_POST["dateblog"]) && 
			!empty($_POST["descriptionblog"]) 
        )
        if(!empty($_FILES["file"]["name"]))    
        {
        $img="".$_FILES["file"]["name"];
        print_r($_FILES["file"]);
        move_uploaded_file($_FILES["file"]["tmp_name"],$img);
        }
         {            
				 $news = new news(
              $_POST['idblog'], 
                $_POST['dateblog'], 
			    $_POST['descriptionblog'],
                $img,
              	$_POST['idadmin']
            );
        $NewsC->modifiernews($news,$_POST["idblog"]);
        //print_r($news);
        header('Location:news.php');
        }
       
    }    
    else
    $error = "Missing information";
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
    <a href="News.php"><button class="News-btn"><img id="News-icon"src="News.svg">News</button></a>
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
    <div class="addarticle-interface">
    <?php
			if (isset($_POST['idblog'])){
				$news = $NewsC->recuperernews($_POST['idblog']);
		?>
        <form method="POST"enctype="multipart/form-data">
            <h1>Contact-us</h1>
            <div class="separation"></div>
            <div class="corps-formulaire">
              <div class="gauche">
                <div class="groupe">
                  <label>Name</label>
                  <input name="idadmin" type="text" value="<?php echo $news['idadmin']; ?>" />
                  <i class="fas fa-user"></i>
                </div>
                <div class="groupe">
                  <label>id</label>
                  <input name="idblog" type="text" value="<?php echo $news['idblog']; ?>" />
                  <i class="fas fa-user"></i>
                </div>
                <div class="groupe">
                  <label>dateblog</label>
                  <input name="dateblog" type="date" value="<?php echo $news['dateblog']; ?>" />
                  <i class="fas fa-image"></i>
                </div>
                <div class="groupe">
                    <label>image</label>
                    <input type="file" name="file" value="<?php echo $news['imageblog']; ?> "/>
                    <i class="fas fa-upload"></i>
                  </div>
              </div>
              <div class="droite">
                <div class="groupe">
                  <label>description</label>
                  <textarea placeholder="<?php echo $news['descriptionblog']; ?> " name="descriptionblog"></textarea>
                </div>
              </div>
            </div>
      
            <div class="pied-formulaire"style="text-align:center">
            <button>modifier article</button>
            </div>
          </form>
          <?php
            }
          ?>
    </div>
    </div>

   <script src="../script_dash.js"></script>
</body>
</html>