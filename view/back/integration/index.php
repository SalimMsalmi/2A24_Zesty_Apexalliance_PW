
<?php 

class produit
    {
		private  $id = null;
		private  $nom = null;
	
		private  $prix = null;
		private  $categorie = null;	
		private  $img = null;	
		function __construct(string $nom, float $prix, string $categorie, string $img)
        {
			$this->nom=$nom;
		
			$this->prix=$prix;
			$this->categorie=$categorie;
			$this->img=$img;
		}
		function getId(): int{
			return $this->id;
		}
		function getImg(): string{
			return $this->img;
		}
		function getNom(): string{
			return $this->nom;
		}
		function getDescription(): string{
			return $this->description;
		}
		function getprix(): float{
			return $this->prix;
		}
		function getCategorie(): int{
			return $this->categorie;
		}
		function setNom(string $nom): void
        {
			$this->$nom=$nom;
		}
		function setImg(string $img): void
        {
			$this->img=$img;
		}
		
		function setPrix(int $prix): void
        {
			$this->prix=$prix;
		}
		function setCategorie(string $categorie): void
        {
			$this->categorie=$categorie;
		}
		
    }
class config{
    private static $pdo=NULL;
    public static function getConnexion(){
        if(!isset(self::$pdo))
        {
            try{
                self::$pdo=new PDO('mysql:host=localhost;dbname=zesty','root','',
                [
                    PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            }
            catch(Exception $e)
            {
                die('Erreur:'.$e->getMessage());
            }
        }
        return self::$pdo;
    }
}
class produitC{

  function afficherProduit()
  {
    $sql = " SELECT * FROM produit ORDER BY prix ASC";
    $db = config::getConnexion();
    try {
      $liste= $db->query($sql);
      return $liste;
    } catch(Exception $e) {
        die('Erreur: ' .$e->getMessage());
    }
  }



  

  function ajoutProduit($produit)
  {
      
     $sql = "INSERT INTO produit (nom,  categorie,prix, image)
     values(:nom, :categorie :prix, :image)";
     $db = config::getConnexion();
     try {
      $query = $db->prepare($sql);
      $query->execute([
          'nom' => $produit->getNom(),
           'prix' => $produit->getprix(),
          
           'categorie' => $produit->getCategorie(),
    'image' => $produit->getImg()
          
      ]);
      
    } catch(Exception $e) {
        die('Erreur: ' .$e->getMessage());
    }
  }
}

$produitC = new produitC();
	$listepproduit= $produitC->afficherProduit();


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
    <a  href="products.php"class="Prod-btn"><img id="Prod-icon"src="Products.png">Products</a>
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
    <div class="Products-interface hidden">
      <div class="Crud-card" >
          <div class="Ajout-card">
            <form action="index.php" method="POST" class="form-group" id="myForm">
              <input type="hidden" name="id"value="">
              <table>
              
                <p style="text-align:center"> <b>Ajouter Produit</b> </p>
                
                <div class="form-group">
                  <tr>
                    <td style="text-align:center">Nom du Produit</td>
                    <td><input type="text" name="nom"  placeholder="Nom..." /></td>
                  </tr>
                </div>
                <div class="form-group">
                  <tr>
                    <td style="text-align:center">Catégorie</td>
                    
                    <td>
                    <br>
                      <select name="categorie"  placeholder="Catégorie..." >
                  <option>Maquillage</option>
                  <option>Soin de la peau</option>
                  <option>Coloration</option>
                  
                    </td>
                  </tr>
                </div>
                <div class="form-group">
                  <tr>
                    <td style="text-align:center">Prix</td>
                    <td>
                    <br>
                      <input type="text" name="prix"  placeholder="Prix..." />
                      <br />
                     
                    </td>
                  </tr>
                </div>
                <div class="form-group">
                  <tr>
                    <td style="text-align:center">Image</td>
                    <td>
                    <br>
                      <input
                        type="file"
                        
                      />
                    </td>
                  </tr>
                </div>
                <div class="form-group">
                  <tr>
                    
                      <td>
        
                      <button class="btn btn-primary" type="submit" name="Ajout" value="Ajout">
                        Ajouter
                      </button>
                    </td>
                 
                  </tr>
                </div>
              </table>
            </form>
          </div>
      </div>
      <div class="Afficher-card">
          <div class="row justify-content-center">
          <table style="margin-left:0;margin-top:-200px; border-radius: 20%; " class="table">
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
foreach($listepproduit as $produit){
?>
               <tr>
                 <td><?PHP echo $produit['id']; ?></td>
                <td><?PHP echo $produit['nom']; ?></td>
                <td><?PHP echo $produit['categorie']; ?></td>
                <td><?PHP echo $produit['prix']; ?></td>
                <td   ><img style="width:52px; 
                  height:52px"  src="../../front/img/maquillage/<?php echo $produit["image"]; ?>" alt=""></td>
                <td> <a  href="index.php?edit=<?php echo $produit['id']; ?>" class="btn btn-info">Edit </a>
                  <a href="" class="btn btn-danger">Delete </a></td>
                </tr>
                <?PHP
}
?>
             </tbody>
             </table>
       <!-- </table> -->
       </div></div>    
      </div>
</div>
<script src="script.js"></script>
<script src="controle.js"></script>
</body>
</html>

