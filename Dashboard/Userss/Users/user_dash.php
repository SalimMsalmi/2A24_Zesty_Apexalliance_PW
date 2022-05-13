<?php
	include '../Controller/UserC.php';
  include '../../../Front/Login/Controller/UserC.php';
  $con = mysqli_connect('localhost','root','','zesty');
    if(!$con)
    {
        echo ' Please Check Your Connection ';
    }
	$userC=new userC();
	$listeusers=$userC->afficheruser(); 
$clientC=new clientC();
$clients=$clientC->afficheruser();
 $Admin = null;
 session_start();
 if(isset($_SESSION["admincin"]))
 {
$Admin=$userC->recupereruser($_SESSION["admincin"]); 
 }
 $Clientt=new ClientC();
 $females=$Clientt->count_female();
$nb_female=0;
 foreach($females as $person){
  $nb_female++;
 }
 $males=$Clientt->count_male();
 $nb_male=0;
  foreach($males as $person){
   $nb_male++;
  }
  if(isset($_GET['page']))
  {
      $page = $_GET['page'];
  }
  else
  {
      $page = 1;
  }

  $num_per_page = 03;
  $start_from = ($page-1)*03;
  
  $query = "select * from client limit $start_from,$num_per_page";
  $result = mysqli_query($con,$query);

  if(isset($_GET['page_admin']))
  {
      $page_admin = $_GET['page_admin'];
  }
  else
  {
      $page_admin = 1;
  }

  $num_per_page_admin = 02;
  $start_from_admin = ($page_admin-1)*02;
  
  $query_admin = "select * from users limit $start_from_admin,$num_per_page_admin";
  $result_admin = mysqli_query($con,$query_admin);

  
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
    <button class="Appoint-btn"><img id="Appoint-icon"src="images/Appointments.png">Services and<br>Appointments</button>
    <button class="Users-btn"><img id="Users-icon"src="images/Users.svg">Users</button>
    <a href="../../Promo/offre_dash.php"><button class="Services-btn"><img id="Services-icon"src="images/Services.svg">Promos and Offers</button></a>
    <a href="News.php"><button class="News-btn"><img id="News-icon"src="images/News.svg">News</button></a>
    <button class="Feedback-btn"><img id="Feedback-icon"src="images/Feedback.svg">Feedback</button>
    <a href="../../../Front/Login/Users/Login.php"><button class="Logout-btn"><i id="Logout-icon"class="fa-solid fa-arrow-right-from-bracket"></i>Logout</button></a>
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
      <div class="Percentage-card">
        <div class="Text-Percentage">Percentage :</div>
        <canvas id="myPiechart"style="transition: 0.5s;"></canvas>
    </div>
    <div class="Smthng-card">
      <div class="Text-Smthng"style="display:flex;justify-content:space-between;">Admin Accounts:<a href="newadmin.php"><button style="background:transparent;border:none;"><i class="fa-solid fa-user-plus"></i>Add new Admin</button></a></div>
      <table>
              <tr>
              <th>#</th>
              <th>Profile Picture</th>
              <th>Name</th>
              <th>Surname</th>
              <th>CIN </th>
              <th>date of birth </th>
              <th>Role</th>
              <th>Gender</th>
              <th>Action</th>
              </tr>
              <tr>
                <?php 
                    while($row_admin=mysqli_fetch_assoc($result_admin))
                    {
                ?>
              <td><?php echo $row_admin['id']; ?></td>
              <td><img src="<?php echo $row_admin['img']; ?>" /></td>
              <td><?php echo $row_admin['nom']; ?></td>
              <td><?php echo $row_admin['prenom']; ?></td>
              <td><?php echo $row_admin['cin']; ?></td>
              <td><?php echo $row_admin['date_naissance']; ?></td>
              <td><?php echo $row_admin['rol']; ?></td>
              <td><?php echo $row_admin['Gender']; ?></td>
              <td>
                <div class="Action">
                  <a href="supprimerclient.php?id=<?php echo $row_admin['id']; ?>"><div class="delete"><i class="fa-solid fa-trash-can"></i></div></a>
                  <form id="form-modif"method="POST" action="modifieradmin.php"style="margin:0;padding:0;background:transparent;">
                  <input type="hidden" value=<?PHP echo $row_admin['cin']; ?> name="cin">
					        </form>
                  <div class="details"><i class="fa-solid fa-circle-info"></i></div>
                </div>
              </td>
            </tr>
         <?php 
                }
                ?>
              </table>
              <div class="navigation-btn-admin">
              <?php 
        
        $pr_query_admin = "select * from users";
        $pr_result_admin = mysqli_query($con,$pr_query_admin);
        $total_record_admin = mysqli_num_rows($pr_result_admin);
        
        $total_page_admin = ceil($total_record_admin/$num_per_page_admin);

        if($page_admin>1)
        {
            echo "<a style='text-decoration: none;'href='user_dash.php?page_admin=".($page_admin-1)."' class='Prev-btn'>Previous</a>";
        }

        
        for($i=1;$i<$total_page_admin;$i++)
        {
            echo "<a style='text-decoration: none;'href='user_dash.php?page_admin=".$i."' class='Page-Num-btn'>$i</a>";
        }

        if($i>$page_admin)
        {
            echo "<a style='text-decoration: none;'href='user_dash.php?page_admin=".($page_admin+1)."' class='Next-btn'>Next</a>";
        }

?>
              </div>
  </div>
        <div class="Accounts-card">
            <div class="Text-Accounts">Client Accounts : </div>
            <table>
              <tr>
              <th>#</th>
              <th>Profile Picture</th>
              <th>Name</th>
              <th>Surname</th>
              <th>CIN </th>
              <th>date of birth </th>
              <th>Role</th>
              <th>Gender</th>
              <th>Action</th>
              </tr>
              <tr>
                <?php 
                    while($row=mysqli_fetch_assoc($result))
                    {
                ?>
              <td><?php echo $row['id']; ?></td>
              <td><img src="<?php echo $row['img']; ?>" /></td>
              <td><?php echo $row['nom']; ?></td>
              <td><?php echo $row['prenom']; ?></td>
              <td><?php echo $row['cin']; ?></td>
              <td><?php echo $row['date_naissance']; ?></td>
              <td><?php echo $row['rol']; ?></td>
              <td><?php echo $row['Gender']; ?></td>
              <td>
                <div class="Action">
                  <a href="supprimerclient.php?id=<?php echo $row['id']; ?>"><div class="delete"><i class="fa-solid fa-trash-can"></i></div></a>
                  <form id="form-modif"method="POST" action="modifieradmin.php"style="margin:0;padding:0;background:transparent;">
                  <input type="hidden" value=<?PHP echo $row['cin']; ?> name="cin">
					        </form>
                  <div class="details"><i class="fa-solid fa-circle-info"></i></div>
                </div>
              </td>
            </tr>
         <?php 
                }
                ?>
              </table>
              <div class="navigation-btn">
              <?php 
        
        $pr_query = "select * from client";
        $pr_result = mysqli_query($con,$pr_query);
        $total_record = mysqli_num_rows($pr_result );
        
        $total_page = ceil($total_record/$num_per_page);

        if($page>1)
        {
            echo "<a style='text-decoration: none;'href='user_dash.php?page=".($page-1)."' class='Prev-btn'>Previous</a>";
        }

        
        for($i=1;$i<$total_page;$i++)
        {
            echo "<a style='text-decoration: none;'href='user_dash.php?page=".$i."' class='Page-Num-btn'>$i</a>";
        }

        if($i>$page)
        {
            echo "<a style='text-decoration: none;'href='user_dash.php?page=".($page+1)."' class='Next-btn'>Next</a>";
        }

?>
              </div>
              
        </div>
    </div>
   
</div>





<script >
  var side_bar_c= document.querySelector(".content");
var aux=side_bar_c;
function hide_sidebar(){
    var side_bar= document.querySelector(".sidebar");
    var elements=document.querySelector(".elements");
    var content= document.querySelector(".content");
    side_bar.classList.toggle("closed");
    elements.classList.toggle("closed");
    if(side_bar.classList.value=="sidebar closed")
    {
        content.style.display="none"; 
    }
    else if(side_bar.classList.value=="sidebar")
    {
        content.style.display=""; 
    }
    
}
document.querySelector(".Users-interface").style.animation="show .5s forwards ease";
let pie=document.getElementById("myPiechart").getContext('2d');
let labels_gender=["Male","Female"];
let color_pie_gender=["#08b3e9","pink"];
let Gender_Pie=new Chart(pie,{
  type:"pie",
  data: {
    datasets:[{
      data:[<?php echo $nb_male; ?>,<?php echo $nb_female; ?>],
      backgroundColor: color_pie_gender
    }],
    labels:labels_gender
  },
  options:{
    responsive:true,
    plugins:{
      tooltip: {enabled: true}
    }
  },
  
});
 
      document.getElementById('myPiechart').style.maxHeight="180px"; 

      var form = document.getElementById("form-modif");

      document.getElementById("modif-btn").addEventListener("click", function () {
        form.submit();
      });

</script>
</body>
</html>

