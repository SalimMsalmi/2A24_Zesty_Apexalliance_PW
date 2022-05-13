
<?php 


/*-------------------------------------------CRUD.php---------------------------*/

include "controller/commandeC.php";
include_once "model/commande.php";
//include "../../../../controller/clientC.php";
require_once "../../config.php";

/***************oussema login***************/
$userC=new userC();
$Admin = null;
session_start();
if(isset($_SESSION["admincin"]))
{
$Admin=$userC->recupereruser($_SESSION["admincin"]); 
}
$commandeC = new commandeC();
$listecommande=$commandeC->affichercommande();

    $mysqli = new mysqli('localhost', 'root', '', 'zesty') or die(mysqli_error($mysqli));
$id=0;
$nom='';
    $categorie='';
    $prix='';
    $image='';
    $update=false;
   
/*-----------------------------AJOUT PRODUIT---------------------*/

  /* if (isset($_POST['nom']) && isset($_POST['prix'])&& isset($_POST["categorie"]) && isset($_POST['image'])) 
         { 
            
            if( !empty($_POST['nom']) &&
             
             
             !empty($_POST['prix']) &&
             !empty($_POST['categorie']) &&
  
             !empty($_POST['image']) 
             )
                {
                  
                $produit= new produit($_POST['nom'],$_POST['prix'],$_POST['categorie'],$_POST['image']);
                $produitC->ajoutProduit($produit);
                header('Location:Crud-Produits.php');
                }
           else 
               {
                   echo"3aslema";
               }
               
          }*/
         
         
         if (isset($_POST[ 'save'])){
            $nom=$_POST['nom'];
            $categorie=$_POST['categorie'];
            $prix=$_POST['prix'];
            $image=$_POST['image'];
          
          
            $_SESSION['message']="Etudiant bien enregistré";
            $_SESSION['msg_type']="success";
          
            header("location:Crud-Produits.php");
          
            $mysqli->query("INSERT INTO produit (`nom`, `categorie`, `prix`, `image`) VALUES('$nom','$categorie','$prix','$image')") or
                     die($mysqli->error);
          }
/*------------------------------UPDATE-------------------*/
if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT `id`, `nom`, `categorie`, `prix`,`image` FROM `produit` WHERE id=$id") or die($mysqli->error());

   
        $row = $result->fetch_array();
        $nom=$row['nom'];
        $categorie=$row['categorie'];
        $prix=$row['prix'];
        $image=$row['image'];


}


if (isset($_POST['update'])){
  $id=$_POST['id'];
  $nom=$_POST['nom'];
  $categorie=$_POST['categorie'];
  $prix=$_POST['prix'];
  $image=$_POST['image'];
  $query="UPDATE `produit` SET `nom`='$nom',`categorie`='$categorie',`prix`='$prix',`image`='$image' WHERE id=$id";
  $init=$mysqli->prepare($query);
$init->execute();


header("location:Crud-Produits.php");
}
/*--------------------Delete----------------*/
if (isset($_GET['delete'])){
  $id =$_GET['delete'];
 
 $_SESSION['message']="Etudiant est Suprimé";
 $_SESSION['msg_type']="danger";
  
 header("location:Crud-Produits.php");
  $mysqli->query("DELETE FROM produit WHERE id=$id") or die($mysqli->error());
}
$result= $mysqli->query("SELECT * FROM produit") or die($mysqli->error);           
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

$query = "select * from produit limit $start_from,$num_per_page";
$result = mysqli_query($mysqli,$query);
                
                
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
    <style>
      .Prev-btn,.Next-btn,.Page-Num-btn{
      background-color: #000000;
      color: #fafafa;
      border: 1px black solid;
      padding: 5px;
      margin-left: 5px;
      text-align: center;
      font-family: 'Montserrat';
font-style: normal;
  }
  .Prev-btn:hover,.Next-btn:hover,.Page-Num-btn:hover{
    background-color: #fafafa;
    color: #000000;
}

.navigation-btn{
    /* left: 50px; */
    display: flex;
    justify-content: center;
    margin-top: 10%;
    left: 50%;
    position: absolute;
}
.navigation-btn-admin{
    /* left: 50px; */
    display: flex;
    justify-content: center;
    margin-top: 19.5%;
    left: 50%;
    position: absolute;
}
.navigation-btn-admin .Prev-btn,.navigation-btn-admin .Next-btn,.navigation-btn-admin .Page-Num-btn{
    padding: 3px;
}
    </style>
  </head>
<body style="background-color:#F2F2F2;">
        <!-- Side_bar -->
<div class="sidebar">
    <i class="fa fa-circle-chevron-left close-btn"onclick="hide_sidebar();"></i>
    <div class="content">
        <div class="img"></div>
    <div class="slogon">ZESTY <br><span style="font-size:16px;">Beauté Sans Limite</span></div>
    <a href="../Userss/Users/dash_user.php"><button class="dash-btn"><img id="dash-icon"src="Dashboard.png">Dashboard</button></a>
    <a href="#"> <button class="Prod-btn"><img id="Prod-icon"src="Products.png">Products</button></a>
    <a href="commande.php"> <button class="Commande-btn"><img id="Commande-icon"src="commande.png">Commande</button></a>
    <a href="#">  <button class="Appoint-btn"><img id="Appoint-icon"src="Appointments.png">Services and<br>Appointments</button></a>
    <a href="../Userss/Users/user_dash.php"><button class="Users-btn"><img id="Users-icon"src="Users.svg">Users</button></a>
    <a href="../Promo/offre_dash.php"><button class="Services-btn"><img id="Services-icon"src="Services.svg">Promos and Offers</button></a>
    <a href="../Userss/Users/News.php"><button class="News-btn"><img id="News-icon"src="News.svg">News</button></a>
    <a href="../Feedback/dash_user.php" class="Feedback-btn"><img id="Feedback-icon"src="Feedback.svg">Feedback</a>
    <a href="../../Front/Login/Users/Login.php"><button class="Logout-btn"><i id="Logout-icon"class="fa-solid fa-arrow-right-from-bracket"></i>Logout</button></a>

    <a href="#Settings"><img class="Settings-btn"src="Settings.svg"></a>
    </div>   
</div>
<div class="elements">
<div class="Top-bar">
        <div class="Profile-img"style="background: url(<?php echo"../../Dashboard/Userss/Users/".$Admin["img"]?>);background-size: cover;"></div>
        <div class="Name-role"><span class="Name"><?php echo $Admin["prenom"]." ".$Admin["nom"] ?></span><span class="Role">Admin</span></div>
        <div class="Notification-bell"style="background: url(../../Dashboard/Userss/Users/images/Notification_bell.svg);background-size: cover;"><span>15</span></div>
        <div class="dark-mode-btn"><i class="fa fa-moon"></i></div>
        <div class="Messages"style="background: url(../../Dashboard/Userss/Users/images/Message.svg);background-size: cover;"></div>
        <div class="Search"style="background: url(../../Dashboard/Userss/Users//images/Search.svg);background-size: cover;"></div>
        <span class="Messages-notif">4</span>
        <input class="Search_area" placeholder="Search here.."></input>
    </div>
    <div class="Cards">
        <div class="Profit-card">
        <div class="Text-profit">Profit : <br>400$</div>
        <div class="Profit-img"></div>
    </div>
    <div class="Statistics-card">
        <div class="Text-Statistics">Statistics :</div>
        <div class="Numbers">
             <div class="Prod-dash">
                 <div class="Prod-icon">99<br><span>Products</span></div>
             </div>
             <div class="Customers-dash">
                <div class="Customers-icon">800<br><span>Customers</span></div>
             </div>
             <div class="Feedback-dash">
              <div class="Feedback-icon">69<br><span>Feedbacks</span></div>
           </div>
             <div class="Revenue-dash">
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
  
    <div class="Products-interface ">
     
          <div class="row justify-content-center">
            
            

         <?php ?> <table style="margin-top:220px;border-radius: 2%; " class="table" id="myTable">
             <thead>
                 <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Image</th>
                   <th colspan="2">Action</th>
                 </tr>
             </thead>
             <tbody>
                <?PHP
                   while ($row = $result->fetch_assoc()): ?>
    
               <tr>
                 <td><?PHP echo $row['id']; ?></td>
                <td><?PHP echo $row['nom']; ?></td>
                <td><?PHP echo $row['categorie']; ?></td>
                <td><?PHP echo $row['prix']; ?></td>
                <td   ><img style="width:52px; 
                  height:52px" src="produits/<?php echo $row['image'];?>"  alt=""></td>
                  <td> <a  href="Crud-Produits.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit </a>
                  <a href="Crud-Produits.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete </a></td>
                </tr>
                <?PHP
                endwhile;
                ?>
             </tbody>
             </table>

        
       <!-- </table> -->
       </div>
      </div>    
   
      <div class="Ajout-card "style="margin-top:0px;">
      <div style="margin-left:100px;" id="google_translate_element"></div>
      <form action="Crud-Produits.php"id="myForm" method="POST" class="form-group" >
              <input type="hidden" name="id"value="<?php echo $id;?>">
              <table>
              <?php if($update==false):?>
                <p style="text-align:center"> <b>Ajouter Produit</b> </p>

              <?php else:?>
                <p style="text-align:center"> <b>Modifier Produit</b> </p>
<?php endif;?>
                
                <div class="form-group">
                  <tr>
                    <td style="text-align:center">Nom du Produit</td>
                    <td><input type="text" id="nom" name="nom" value="<?php echo $nom;?>" placeholder="Nom..." />
                    <span id="cmon" style="color:#FF0000"> </span>                   
                  </tr>
                  
                </div>
                <div class="form-group">
                  <tr>
                    <td style="text-align:center">Catégorie</td>
                    
                    <td>
                    <br>
                      <select name="categorie" id="categorie" value="<?php echo $categorie;?>" required>
                       
                        <option  >Maquillage</option>
                        <option  >Soin de La peau</option>
                        <option  >Coloration</option>
                       
                   
                    </td>
                  </tr>
                </div>
                <div class="form-group">
                  <tr>
                    <td style="text-align:center">Prix</td>
                    <td>
                    <br>
                      <input type="text" name="prix"  value="<?php echo $prix;?>"placeholder="Prix..."required />
                      <br />
                     
                    </td>
                  </tr>
                </div>
                <div class="form-group">
                  <tr>
                  <br>
                    <td style="text-align:center">Image</td>
                    <td>
                    <br>
                   <input type="file" name="image" value="<?php echo $prix;?>">
                

                     
                     
                    </td>
                  </tr>
                </div>
                <div class="form-group">
                  <tr>
                    
                      <td>
        
                      <?php if($update== true):?>
              <td>
              <input class="btn btn-info" type="submit" id="update"name="update"onclick="verif()" value="Update">
            </td>
            <?php else:?>
              <td>

              <input class="btn btn-primary" type="submit" name="save"onclick="verif()" value="Save">
       
            </td>
            <?php endif;?>
                    </td>
                 
                  </tr>
                </div>
              </table>
            </form>
            <div class="navigation-btn">
              <?php 
        
        $pr_query = "select * from produit";
        $pr_result = mysqli_query($mysqli,$pr_query);
        $total_record = mysqli_num_rows($pr_result );
        
        $total_page = ceil($total_record/$num_per_page);

        if($page>1)
        {
            echo "<a style='text-decoration: none;'href='Crud-Produits.php?page=".($page-1)."' class='Prev-btn'>Previous</a>";
        }

        
        for($i=1;$i<$total_page;$i++)
        {
            echo "<a style='text-decoration: none;'href='Crud-Produits.php?page=".$i."' class='Page-Num-btn'>$i</a>";
        }

        if($i>$page)
        {
            echo "<a style='text-decoration: none;'href='Crud-Produits.php?page=".($page+1)."' class='Next-btn'>Next</a>";
        }

?>
              </div>
        
          </div>
         
      </div>
      
      </div>
</div>

<script type="text/javascript">
             function googleTranslateElementInit() {
                 new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
             }
         </script>

         <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
         <script >function verif() {
    let myForm=document.getElementById('myForm');
  
    myForm.addEventListener('submit', function(e) {
    var nom=document.getElementById("nom").value
  
   
  
    // span condition
  var cmon=document.getElementById("cmon")
  //var ccat=document.getElementById("ccat")
  
  
 
  //initialisation
  cmon.innerHTML=""
  //ccat.innerHTML=""
  //cimg.innerHTML=""
  
  //nom condition   
  //var letters = /^[A-Za-z]+$/;
  for(i=0;i<nom.length;i++){
    if(!nom.charAt(i).toUpperCase()>="A"&&nom.charAt(i).toUpperCase()<="Z")
    {
        cmon.innerHTML="Nom doit etre aziz chaine!";
        e.preventDefault();
    }
  }
  
  
  
  if(!(nom.charAt(0)>="A" && nom.charAt(0)<="Z"))
  {e.preventDefault()
      cmon.innerHTML=("Nom commence par majuscule!!")
  }
  /*
  //categorie condition
  for (let i=0;i<categorie.length;i++)
  {
      if (!(categorie.charAt(i).toUpperCase()>="A" && categorie.charAt(i).toUpperCase()<="Z"))
      {e.preventDefault()
      ccat.innerHTML="categorie doit etre chaine!!"
      break
      }
  }
  if(!(categorie.charAt(0)>="A" && categorie.charAt(0)<="Z"))
  {e.preventDefault()
      ccat.innerHTML=("categorie commence par majuscule!!")
  }*/
  //mail condition
  
        })
        }</script>
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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

