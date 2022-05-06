<?php
    include_once '../Model/Service.php';
    include_once '../Controller/ServiceC.php';

    //**************************************************method okhra ajout 

    $mysqli = new mysqli('localhost', 'root', '', 'zestymar') or die(mysqli_error($mysqli));
    $idservice=0;
    $nameservice='';
        $priceservice='';
        $imgservice='';
        $typeservice='';

    $error = "";

    // create service
    $service = null;

    // create an instance of the controller
    
    if (isset($_POST[ 'submit'])){
      $idservice=$_POST['idservice'];
      $nameservice=$_POST['nameservice'];
      $priceservice=$_POST['priceservice'];
      $imgservice=$_POST['imgservice'];
     $imgservice=$_FILES['imgservice'];
     $typeservice=$_POST['typeservice'];
      
      $img="../../../img/".$_FILES["imgservice"]["name"];
      //print_r($_FILES["imgservice"]);
      move_uploaded_file($_FILES["imgservice"]["tmp_name"],$img);
      $img="../../img/".$_FILES["imgservice"]["name"];
    
      //$_SESSION['message']="service saved!";
      //$_SESSION['msg_type']="success";
    
      header("location:intrfaci.php");
    
      $mysqli->query("INSERT INTO services ( nameservice, priceservice , imgservice, typeservice) VALUES('$nameservice','$priceservice','$img','$typeservice')") or
               die($mysqli->error);
    } 



    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Add service</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/545d9736b4.js" crossorigin="anonymous"></script>
    <link rel="icon" href="Zlogo.png">
  
    <style>
body {
 background-image: url('../img/2.png');
 /*background-color:red;*/
}
</style>
</head>

  <body>
    
    <section>
    <div class="addmariem">Create new service</div>
    <div class="addservice"  style="height: 600px; top: 130px;">
        
                <form method="POST"enctype="multipart/form-data" id="myForm">
                   
                    <input id ="nameservice" type="text"placeholder="Name" name="nameservice">
                    <span><p id="error_nameservice"style="color:red"></p></span>
                    
                    <input  id ="priceservice" type="text"placeholder="price"name="priceservice">
                    <span><p id="error_priceservice"style="color:red"></p></span>

                    <input type="file" name="imgservice">
                    <input  id ="priceservice" type="text"placeholder="type"name="typeservice">
                    <span><p id="error_priceservice"style="color:red"></p></span>
                    <input class="addbtn" type="submit"value="Add new service"style="max-width: 150px" onclick="verif()" name="submit">
                   
                    
                </form>
                <button class="button-28"><a href="intrfaci.php">Back to Dashboard</a></button>
            
      
        
    </div>
    </section> 


    
      
    <script src="controlesaisie.js">
             
        </script>
  </body>
 
</html> 

