<?php
//include "../config.php";
    include_once "Model/Service.php";
    include_once "Controller/ServiceC.php";
    $service = null;
    $serviceC = new serviceC();
    $error = "";
    //$db = config::getConnexion();



    $mysqli = new mysqli('localhost', 'root', '', 'zesty') or die(mysqli_error($mysqli));
    $idservice=0;
    $nameservice='';
        $priceservice='';
        $imgservice='';
        $typeservice='';


        if (isset($_POST['modify'])){
            $idservice=$_POST['idservice'];
            $nameservice=$_POST['nameservice'];
            $priceservice=$_POST['priceservice'];
            $imgservice=$_POST['imgservice'];
            move_uploaded_file($_FILES["imgservice"]["tmp_name"],$img);
            $img="../../img/".$_FILES["imgservice"]["name"];
            $typeservice=$_POST['typeservice'];
          
            $query="UPDATE `services` SET `nameservice`='$nameservice',`priceservice`='$priceservice', `imgservice`='$imgservice' WHERE `idservice`=$idservice";

            $init=$mysqli->prepare($query);
         $init->execute();
            header('Location:intrfaci.php');
          
           
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
    <title>Modify service</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/545d9736b4.js" crossorigin="anonymous"></script>
    <link rel="icon" href="Zlogo.png">
  
   
</head>

  <body>
    
    <section>

    <button><a href="intrfaci.php">Back</a></button>

    <div class="addmariem" style="top: 50px;">Modify service</div>

    <?php
			if (isset($_POST['idservice'])){
				$service = $serviceC->recupererservice($_POST['idservice']);
            	
		?>

    <div class="addservice" style="height: 600px; top: 130px;">
        
                <form method="POST"enctype="multipart/form-data" id="myForm">
                    
                    <input value="<?php echo $service['idservice']; ?>" type="text"name="idservice" id ="nameservice">
                    <input value="<?php echo $service['nameservice']; ?>" type="text"name="nameservice">
                    <span><p id="error_nameservice"style="color:red"></p></span>
                    
                    <input value="<?php echo $service['priceservice']; ?>" type="text"name="priceservice"  id ="priceservice">
                    <span><p id="error_priceservice"style="color:red"></p></span>

                    <input value="<?php echo $service['imgservice']; ?>" type="file"name="imgservice">
                    <input value="<?php echo $service['typeservice']; ?>" type="text"name="typeservice"  id ="priceservice">
                    <span><p id="error_priceservice"style="color:red"></p></span>

                    <input  type="submit"value="modify service"style="max-width: 150px" onclick="verif()" name="modify">  
                </form>
                <?php
		}
		?>
            
           
        
    </div>
    </section> 


   <!-- <script src="controlesaisie.js">
             
             </script>-->
  </body>
</html> 