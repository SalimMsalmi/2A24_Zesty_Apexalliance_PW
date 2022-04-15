<?php
	include '../Controller/UserC.php';
 

	$userC=new userC();
	$listeusers=$userC->afficheruser(); 
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
    <a href="dash_user.php"><button class="dash-btn"><img id="dash-icon"src="images/Dashboard.png">Dashboard</button></a>
    <button class="Prod-btn"><img id="Prod-icon"src="images/Products.png">Products</button>
    <button class="Appoint-btn"><img id="Appoint-icon"src="images/Appointments.png">Services and<br>Appointments</button>
    <button class="Users-btn"><img id="Users-icon"src="images/Users.svg">Users</button>
    <a href="offre_dash.php"><button class="Services-btn"><img id="Services-icon"src="images/Services.svg">Promos and Offers</button></a>
    <button class="News-btn"><img id="News-icon"src="images/News.svg">News</button>
    <button class="Feedback-btn"><img id="Feedback-icon"src="images/Feedback.svg">Feedback</button>
    <button class="Logout-btn"><i id="Logout-icon"class="fa-solid fa-arrow-right-from-bracket"></i>Logout</button>
    <a href="#Settings"><img class="Settings-btn"src="images/Settings.svg"></a>
    </div>   
</div>
<div class="elements">
    <div class="Top-bar">
        <div class="Profile-img"></div>
        <div class="Name-role"><span class="Name">Med Aziz Chehata</span><span class="Role">Admin</span></div>
        <div class="Notification-bell"style="background: url(./images/Notification_bell.svg);background-size: cover;"><span>15</span></div>
        <div class="dark-mode-btn"><i class="fa fa-moon"></i></div>
        <div class="Messages"style="background: url(./images/Message.svg);background-size: cover;"></div>
        <div class="Search"style="background: url(./images/Search.svg);background-size: cover;"></div>
        <span class="Messages-notif">4</span>
        <input class="Search_area" placeholder="Search here.."></input>
    </div>
    <div class="Users-interface">
      <div class="Percentage-card">
        <div class="Text-Percentage">Percentage :</div>
        <canvas id="myPiechart"style="transition: 0.5s;"></canvas>
    </div>
    <div class="Smthng-card">
      <div class="Text-Smthng">Client details:</div>
  </div>
        <div class="Accounts-card">
            <div class="Text-Accounts">Accounts : <a href="newadmin.php"><button><i class="fa-solid fa-user-plus"></i>Add new Admin</button></a></div>
            <table>
              <tr>
              <th>#</th>
              <th>Profile Picture</th>
              <th>Name</th>
              <th>Surname</th>
              <th>CIN </th>
              <th>date of birth </th>
              <th>Role</th>
              <th>Action</th>
              </tr>
              <?php
				foreach($listeusers as $user){
			?>
               <tr>
              <td><?php echo $user['id']; ?></td>
              <td><img src="<?php echo $user['img']; ?>" /></td>
              <td><?php echo $user['nom']; ?></td>
              <td><?php echo $user['prenom']; ?></td>
              <td><?php echo $user['cin']; ?></td>
              <td><?php echo $user['date_naissance']; ?></td>
              <td><?php echo $user['rol']; ?></td>
              <td>
                <div class="Action">
                  <a href="supprimeruser.php?id=<?php echo $user['id']; ?>"><div class="delete"><i class="fa-solid fa-trash-can"></i></div></a>
                  <form id="form-modif"method="POST" action="modifieradmin.php"style="margin:0;padding:0;background:transparent;">
                  <!-- <div class="modify"onclick="document.getElementById('form-modif').submit();"><i class="fa-solid fa-pen-to-square"></i></div> -->
                  <input type="submit"name="Modif"id="modif-btn"style="background:transparent;border:none;width:20px;height:20px;background: url('images/modif-btn.svg');margin-top:5px;background-color:rgba(255, 194, 82, 0.689);border-radius:5px"value="">
                  <input type="hidden" value=<?PHP echo $user['cin']; ?> name="cin">
					        </form>
                  <div class="details"><i class="fa-solid fa-circle-info"></i></div>
                </div>
              </td>
              </tr>
              <?php
				}
			?>
              </table>
        </div>
    </div>
   
</div>
<script src="script_user.js"></script>
</body>
</html>

