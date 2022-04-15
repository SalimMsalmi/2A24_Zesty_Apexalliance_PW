
<?php 





 



/*-------------------------------------------CRUD.php---------------------------*/


session_start();
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
</head>
<body>
        <!-- Side_bar -->
<div class="sidebar">
    <i class="fa fa-circle-chevron-left close-btn"onclick="hide_sidebar();"></i>
    <div class="content">
        <div class="img"></div>
    <div class="slogon">ZESTY <br><span style="font-size:16px;">Beauté Sans Limite</span></div>
    <button class="dash-btn"onclick="dash()"><img id="dash-icon"src="Dashboard.png">Dashboard</button>
    <a  href="Crud-Produits.php"class="Prod-btn"><img id="Prod-icon"src="Products.png">Products</a>
    <button class="Appoint-btn"onclick="services()"><img id="Appoint-icon"src="Appointments.png">Services and<br>Appointments</button>
    <button class="Users-btn"onclick="Users()"><img id="Users-icon"src="Users.svg">Users</button>
    <button class="Services-btn"><img id="Services-icon"src="Services.svg">Promos and Offers</button>
    <button class="News-btn"><img id="News-icon"src="News.svg">News</button>
    <button class="Feedback-btn"onclick="Feedback()"><img id="Feedback-icon"src="Feedback.svg">Feedback</button>
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
    <div class="Users-interface hidden">
      <div class="Percentage-card">
        <div class="Text-Percentage">Percentage :</div>
        <canvas id="myPiechart"style="transition: 0.5s;"></canvas>
    </div>
    <div class="Smthng-card">
      <div class="Text-Smthng">Smthng idk :</div>
  </div>
        <div class="Accounts-card">
            <div class="Text-Accounts">Accounts : </div>
            <table class="table">
              <tr class="tr">
              <th class="">#</th>
              <th class="">Profile Picture</th>
              <th class="">Name</th>
              <th class="">Surname</th>
              <th class="">CIN </th>
              <th class="">date of birth </th>
              <th class="">Role</th>
              <th class="">Action</th>
              </tr>
               <tr class="tr">
              <td class="td">1</td>
              <td class="td"><img src="Oussema.svg" /></td>
              <td class="td">Ayari</td>
              <td class="td">Oussema</td>
              <td class="td">001</td>
              <td class="td">31/10/2001</td>
              <td class="td">Admin</td>
              <td class="td">
                <div class="Action">
                  <div class="delete"><i class="fa-solid fa-trash-can"></i></div>
                  <div class="modify"><i class="fa-solid fa-pen-to-square"></i></div>
                  
                  
                </div>
              </td>
              </tr>
              <tr class="tr">
              <td class="td">2</td>
              <td class="td"><img src="chehata.jpg" /></td>
              <td class="td">Chehata</td>
              <td class="td">Aziz</td>
              <td class="td">002</td>
              <td class="td">21/11/2001</td>
              <td class="td">Admin</td>
              <td class="td">
                <div class="Action">
                  <div class="delete"><i class="fa-solid fa-trash-can"></i></div>
                  <div class="modify"><i class="fa-solid fa-pen-to-square"></i></div>
                  
                  
                </div>
              </td>
              </tr>
              <tr >
              <td class="td">3</td>
              <td class="td"><img src="mariem.jpg" /></td>
              <td class="td">Belhaj Abdallah</td>
              <td class="td">Mariem</td>
              <td class="td">003</td>
              <td class="td">02/09/2001</td>
              <td class="td">Admin</td>
              <td class="td">
                <div class="Action">
                  <div class="delete"><i class="fa-solid fa-trash-can"></i></div>
                  <div class="modify"><i class="fa-solid fa-pen-to-square"></i></div>
                  
                  
                </div>
              </td>
              </tr>
              <tr >
              <td class="td">4</td>
              <td class="td"><img src="bouzid.jpg" /></td>
              <td class="td">Bouzid</td>
              <td class="td">Med Aziz</td>
              <td class="td">004</td>
              <td class="td">18/05/2001</td>
              <td class="td">Admin</td>
              <td class="td">
                <div class="Action">
                  <div class="delete"><i class="fa-solid fa-trash-can"></i></div>
                  <div class="modify"><i class="fa-solid fa-pen-to-square"></i></div>
                  
                  
                </div>
              </td>
              </tr>
              <tr class="tr">
              <td class="td">5</td>
              <td class="td"><img src="jaballah.jpg" /></td>
              <td class="td">Jaballah</td>
              <td class="td">Aziz</td>
              <td class="td">005</td>
              <td class="td">01/01/2002</td>
              <td class="td">Admin</td>
              <td class="td">
                <div class="Action">
                  <div class="delete"><i class="fa-solid fa-trash-can"></i></div>
                  <div class="modify"><i class="fa-solid fa-pen-to-square"></i></div>
                  
                  
                </div>
              </td>
              </tr>
              </table>
        </div>
    </div>
    <div class="Feedback-interface hidden">
            <div class="container">
            <div class="messaging">
                  <div class="inbox_msg">
                    <div class="inbox_people">
                      <div class="headind_srch">
                        <div class="recent_heading">
                          <h4>Recent</h4>
                        </div>
                        <div class="srch_bar">
                          <div class="stylish-input-group">
                            <input type="text" class="search-bar"  placeholder="Search" >
                            <span class="input-group-addon">
                            <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                            </span> </div>
                        </div>
                      </div>
                      <div class="inbox_chat">
                        <div class="chat_list active_chat">
                          <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                              <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                              <p>Test, which is a new approach to have all solutions 
                                astrology under one roof.</p>
                            </div>
                          </div>
                        </div>
                        <div class="chat_list">
                          <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                              <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                              <p>Test, which is a new approach to have all solutions 
                                astrology under one roof.</p>
                            </div>
                          </div>
                        </div>
                        <div class="chat_list">
                          <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                              <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                              <p>Test, which is a new approach to have all solutions 
                                astrology under one roof.</p>
                            </div>
                          </div>
                        </div>
                        <div class="chat_list">
                          <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                              <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                              <p>Test, which is a new approach to have all solutions 
                                astrology under one roof.</p>
                            </div>
                          </div>
                        </div>
                        <div class="chat_list">
                          <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                              <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                              <p>Test, which is a new approach to have all solutions 
                                astrology under one roof.</p>
                            </div>
                          </div>
                        </div>
                        <div class="chat_list">
                          <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                              <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                              <p>Test, which is a new approach to have all solutions 
                                astrology under one roof.</p>
                            </div>
                          </div>
                        </div>
                        <div class="chat_list">
                          <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                              <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                              <p>Test, which is a new approach to have all solutions 
                                astrology under one roof.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="mesgs">
                      <div class="msg_history">
                        <div class="incoming_msg">
                          <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                          <div class="received_msg">
                            <div class="received_withd_msg">
                              <p>Test which is a new approach to have all
                                solutions</p>
                              <span class="time_date"> 11:01 AM    |    June 9</span></div>
                          </div>
                        </div>
                        <div class="outgoing_msg">
                          <div class="sent_msg">
                            <p>Test which is a new approach to have all
                              solutions</p>
                            <span class="time_date"> 11:01 AM    |    June 9</span> </div>
                        </div>
                        <div class="incoming_msg">
                          <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                          <div class="received_msg">
                            <div class="received_withd_msg">
                              <p>Test, which is a new approach to have</p>
                              <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
                          </div>
                        </div>
                        <div class="outgoing_msg">
                          <div class="sent_msg">
                            <p>Apollo University, Delhi, India Test</p>
                            <span class="time_date"> 11:01 AM    |    Today</span> </div>
                        </div>
                        <div class="incoming_msg">
                          <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                          <div class="received_msg">
                            <div class="received_withd_msg">
                              <p>We work directly with our designers and suppliers,
                                and sell direct to you, which means quality, exclusive
                                products, at a price anyone can afford.</p>
                              <span class="time_date"> 11:01 AM    |    Today</span></div>
                          </div>
                        </div>
                      </div>
                      <div class="type_msg">
                        <div class="input_msg_write">
                          <input type="text" class="write_msg" placeholder="Type a message" />
                          <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  
                 
                </div></div>
    </div>
    <div class="services-interface hidden">
      <div class="cardserv">
         <div class="container-onglets">
           <div class="onglets active" data-anim="1">Manage Services</div>
           <div class="onglets"data-anim="2">Appointements</div>
           <div class="onglets"data-anim="3">Statistics</div>
         </div>

         <div class="contenu activeContenu" data-anim="1">
           <h3>mia</h3>
           <hr>
           <p>hhhhhhhhhhhhhhhh </p>
         </div>
         <div class="contenu Contenu" data-anim="2">
          <h3>mimz</h3>
          <hr>
          <p>lmao </p>
        </div>
        <div class="contenu Contenu" data-anim="3">
          <h3>mar</h3>
          <hr>
          <p>lol </p>
        </div>
      </div>
    </div>
    <div class="Products-interface ">
     
          <div class="row justify-content-center">
          <table style="margin-top:-500px;border-radius: 2%; " class="table">
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
                  height:52px" src="../../front/img/produits/<?php echo $row['image'];?>"  alt=""></td>
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
      <div class="Ajout-card "style="margin-top:20px;">
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
                    <td><input type="text" id="nom" name="nom" value="<?php echo $nom;?>" placeholder="Nom..."required />
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

