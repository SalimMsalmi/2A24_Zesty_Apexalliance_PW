<?php
    include_once '../Model/Service.php';
    include_once '../Controller/ServiceC.php';

    //**************************************************method okhra ajout 

    $mysqli = new mysqli('localhost', 'root', '', 'zestymar') or die(mysqli_error($mysqli));
    $idservice=0;
    $nameservice='';
        $priceservice='';
        $imgservice='';

    $error = "";
    $img="./images/default.jpg";
    // create service
    $service = null;

    // create an instance of the controller
    
    if (isset($_POST[ 'submit'])){
      $idservice=$_POST['idservice'];
      $nameservice=$_POST['nameservice'];
      $priceservice=$_POST['priceservice'];
      $imgservice=$_POST['imgservice'];
    
    
      $_SESSION['message']="service saved!";
      $_SESSION['msg_type']="success";
    
      header("location:intrfaci.php");
    
      $mysqli->query("INSERT INTO services ( nameservice, priceservice , imgservice) VALUES('$nameservice','$priceservice','$imgservice')") or
               die($mysqli->error);
    } 



   /*if (
     
		isset($_POST["idservice"]) &&		
        isset($_POST["nameservice"]) &&
		isset($_POST["priceservice"]) && 
        isset($_POST["imgservice"])
    ) 
    {
        if (
          
			!empty($_POST["idservice"]) &&
            !empty($_POST["nameservice"]) && 
			!empty($_POST["priceservice"]) && 
            !empty($_POST["imgservice"])
        )
         {
            $service = new service(
               
				$_POST['idservice'],
                $_POST['nameservice'], 
				$_POST['priceservice'],
                $_POST['imgservice']
            );
             
            $serviceC = new serviceC();
            $serviceC->ajouterservice($service);
            header("location:affichserv.php");
        }
        else
            $error = "Missing information";
            
    }*/


    
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
  
   
</head>

  <body>
    
 <!--<form action ="" method="post">

<div class="mb-3">
  <label for="idservice">Service ID</label>
  <input id="idservice" name="idservice" class="form-control" placeholder="Enter id" >
</div>
<div class="mb-3">
         <label for="nameservice">Service Name</label>
            <input  type="text" id="nameservice" name="nameservice" class="form-control" placeholder="Enter Name" >
        </div>
        <div class="mb-3">
       <label for="priceservice">Service Price</label>
       <input type="text" id="priceservice" name="priceservice" class="form-control" placeholder="Enter Price" >
        </div>
      <div class="mb-3">
       <label for="imgservice" >Service image</label>
        <input  type="file" ="imgservice" class="form-control" accept="image/png, image/jpg, image/jpeg"  >
        </div>
        <button value ="envoyer" >Submit</button>
    </form> --> 

    <section>
    
    <div class="container"style="height: 600px; top: 130px;">
        
                <form method="POST"enctype="multipart/form-data" id="myForm">
                    <h2>Create new service</h2>
                    
                    <input id ="nameservice" type="text"placeholder="Name" name="nameservice">
                    <span><p id="error_nameservice"style="color:red"></p></span>
                    
                    <input  id ="priceservice" type="text"placeholder="price"name="priceservice">
                    <span><p id="error_priceservice"style="color:red"></p></span>

                    <input type="file"placeholder="choose pdp"name="imgservice">
                    <input type="submit"value="Add new service"style="max-width: 150px"name="submit">
                    
                </form>
            
            
       <script src="script.js">
            /*  let myForm = document.getElementbyid('myForm');
              myForm.addEventListener('submit', function(e)){
                  let myInput = document.getElementById('nameservice');
                  if(myInput.value.trim()=""){
                    let myError = document.getElementbyid('error_nameservice')  ;
                    myError.innerHTML= "input required!" ; 
                    e.preventDefault();
                  }
              }); */
        </script>
        
    </div>
    </section> 


    

  </body>
</html> 

