
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Manage Appointements</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/545d9736b4.js" crossorigin="anonymous"></script>
    <link rel="icon" href="Zlogo.png">
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

<!--  -->
  
<div class="services-interface ">
      <div class="cardserv">
         <div class="container-onglets">
         <a class="onglets" href="intrfaci.php">Manage Services <i class="fa fa-angle-right"></i></a>
         <a class="onglets"  href="appoint.php">Manage Appointements <i class="fa fa-angle-right"></i></a>
         <a class="onglets"  href="qrgenerator.php">QR Code Generator <i class="fa fa-angle-right"></i></a>
 
        </div>
        

        
        <div class="wrapper" >
        
        <h1>QR Code Generator</h1>
        <p> enter text to create QR code</p>
        <!--<form  action="addqrcode.php" method="post" id="formqr">-->
      <div class="form">
        <input  name="qrvalue" type="text" spellcheck="false" placeholder="Enter text or url">
        <button id="submitbtn">Generate QR Code</button>
      </div>
     <!-- </form>-->

     <!-- <script>
       $(document).ready(function(){
   $("#formqr").on("submitbtn", function () {
        var hvalue = $('.form').text();
        $(this).append("<input type='hidden' name='qrvalue' value=' " + hvalue + " '/>");
    });
}); 
</script>-->



      <div class="qr-code">
        <img src="" alt="qr-code">
      </div>
       
     </div> 
        
</div>

</div>
<script>
  const wrapper = document.querySelector(".wrapper"),
qrInput = wrapper.querySelector(".form input"),
generateBtn = wrapper.querySelector(".form button"),
qrImg = wrapper.querySelector(".qr-code img");
let preValue;
generateBtn.addEventListener("click", () => {
    let qrValue = qrInput.value.trim();
    if(!qrValue || preValue === qrValue) return;
    preValue = qrValue;
    generateBtn.innerText = "Generating QR Code...";
    qrImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${qrValue}`;
    qrImg.addEventListener("load", () => {
        wrapper.classList.add("active");
        generateBtn.innerText = "Generate QR Code";
    });
});
qrInput.addEventListener("keyup", () => {
    if(!qrInput.value.trim()) {
        wrapper.classList.remove("active");
        preValue = "";
    }
});
</script>
  <script src="script.js"></script>
  </body>
  </html>
