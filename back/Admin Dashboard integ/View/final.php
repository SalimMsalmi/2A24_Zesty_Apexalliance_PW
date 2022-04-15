<?php
	include '../Controller/ServiceC.php';
	$serviceC=new serviceC();
	$listeservices=$serviceC->afficherservice(); 
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
    <link rel="icon" href="img/Zlogo.png">
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
        <!-- Side_bar -->
<div class="sidebar">
    <i class="fa fa-circle-chevron-left close-btn"onclick="hide_sidebar();"></i>
    <div class="content">
        <div class="img"></div>
    <div class="slogon">ZESTY <br><span style="font-size:16px;">Beauté Sans Limite</span></div>
    <button class="dash-btn"onclick="dash()"><img id="dash-icon"src="img/Dashboard.png">Dashboard</button>
    <button class="Prod-btn"><img id="Prod-icon"src="img/Products.png">Products</button>
    <button class="Appoint-btn"onclick="services()"><img id="Appoint-icon"src="img/Appointments.png">Services and<br/>Appointements</button>
    <button class="Users-btn"onclick="Users()"><img id="Users-icon"src="img/Users.svg">Users</button>
    <button class="Services-btn"><img id="Services-icon"src="img/Services.svg">Promos and Offers</button>
    <button class="News-btn"><img id="News-icon"src="img/News.svg">News</button>
    <button class="Feedback-btn"onclick="Feedback()"><img id="Feedback-icon"src="img/Feedback.svg">Feedback</button>
    <button class="Logout-btn"><i id="Logout-icon"class="fa-solid fa-arrow-right-from-bracket"></i>Logout</button>
    <a href="#Settings"><img class="Settings-btn"src="img/Settings.svg"></a>
    </div>   
</div>
<div class="elements">
    <div class="Top-bar">
        <div class="Profile-img"></div>
        <div class="Name-role"><span class="Name">Belhaj Abdallah Mariem</span><span class="Role">Admin</span></div>
        <div class="Notification-bell"><span>15</span></div>
        <div class="dark-mode-btn"><i class="fa fa-moon"></i></div>
        <div class="Messages"></div>
        <div class="Search"></div>
        <span class="Messages-notif">4</span>
        <input class="Search_area" placeholder="Search here.."></input>
    </div>

    <!-- Dashboard -->
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

    <!-- users -->
    <div class="Users-interface hidden">
        <div class="Profit-card">
            <div class="Text-profit">This is Users : <br>400$</div>
            <div class="Profit-img"></div>
        </div>
        <div class="Charts-card">
            <div class="Text-Charts">Charts :</div>
            <canvas id="myyChart"style="transition: 0.5s;"></canvas>   
        </div>
    </div>

    <!-- feedback -->
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
                            <div class="chat_img"> <img src="https://ptetutorials.com/img/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                              <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                              <p>Test, which is a new approach to have all solutions 
                                astrology under one roof.</p>
                            </div>
                          </div>
                        </div>
                        <div class="chat_list">
                          <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/img/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                              <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                              <p>Test, which is a new approach to have all solutions 
                                astrology under one roof.</p>
                            </div>
                          </div>
                        </div>
                        <div class="chat_list">
                          <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/img/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                              <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                              <p>Test, which is a new approach to have all solutions 
                                astrology under one roof.</p>
                            </div>
                          </div>
                        </div>
                        <div class="chat_list">
                          <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/img/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                              <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                              <p>Test, which is a new approach to have all solutions 
                                astrology under one roof.</p>
                            </div>
                          </div>
                        </div>
                        <div class="chat_list">
                          <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/img/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                              <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                              <p>Test, which is a new approach to have all solutions 
                                astrology under one roof.</p>
                            </div>
                          </div>
                        </div>
                        <div class="chat_list">
                          <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/img/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                              <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                              <p>Test, which is a new approach to have all solutions 
                                astrology under one roof.</p>
                            </div>
                          </div>
                        </div>
                        <div class="chat_list">
                          <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/img/user-profile.png" alt="sunil"> </div>
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
                          <div class="incoming_msg_img"> <img src="https://ptetutorials.com/img/user-profile.png" alt="sunil"> </div>
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
                          <div class="incoming_msg_img"> <img src="https://ptetutorials.com/img/user-profile.png" alt="sunil"> </div>
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
                          <div class="incoming_msg_img"> <img src="https://ptetutorials.com/img/user-profile.png" alt="sunil"> </div>
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

  <!-- Services -->
  
    <div class="services-interface hidden">
      <div class="cardserv">
         <div class="container-onglets">
           <div class="onglets active" data-anim="1">Manage Services</div>
           <div class="onglets"data-anim="2">Appointements</div>
           <div class="onglets"data-anim="3">Statistics</div>
         </div>
         <button><a href="addserv.php">add</a></button>
         <div class="contenu activeContenu" data-anim="1">


        
         
            <table style="width:100%; z-index:1;" border=1>
              <tr>
              <th>#</th>
              <th>Service ID</th>
              <th>service Image</th>
              <th>service Name</th>
              <th>service Price</th>
              <!--<th>Edit</th>
			      	<th>Delete</th>-->
              </tr>
              <?php	foreach($listeservices as $service){	?>
               <tr>
              <td><?php echo $service['idservice']; ?></td>
              <td><img src="<?php echo $service['imgservice']; ?>" /></td>
              <td><?php echo $service['nameservice']; ?></td>
              <td><?php echo $service['priceservice']; ?></td>
              <td>
              <form method="POST" action="">
						<input type="submit" name="edit" value="edit">
						<input type="hidden" value=<?PHP echo $service['idservice']; ?> name="idservice">
					</form>
				</td>
				<td>
					<a href="suppserv.php?idservice=<?php echo $service['idservice']; ?>">Supprimer</a>
              </td>
              </tr>
              <?php
				}
			?>
              </table>
        </div>
           
        

         <div class="contenu Contenu" data-anim="2">
          <h3>mimz</h3>
          <hr>
          <p>lmao </p>
        </div>

        <div class="contenu Contenu" data-anim="3">
          <div class="Text-Charts">Charts :</div>
          <canvas id="myChart"style="transition: 0.5s;"></canvas>
        </div>

      </div>

  </div>
  <script src="script.js"></script>
  </html>











</div>
<style>




</style>