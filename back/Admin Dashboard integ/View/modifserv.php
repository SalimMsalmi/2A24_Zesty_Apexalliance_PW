<?php
    include_once "../Model/Service.php";
    include_once "../Controller/ServiceC.php";
    $service = null;
    $serviceC = new serviceC();
    $error = "";


    $mysqli = new mysqli('localhost', 'root', '', 'zestymar') or die(mysqli_error($mysqli));
    $idservice=0;
    $nameservice='';
        $priceservice='';
        $imgservice='';
        $typeservice='';


        if (isset($_POST[ 'modify'])){
            $idservice=$_POST['idservice'];
            $nameservice=$_POST['nameservice'];
            $priceservice=$_POST['priceservice'];
            $imgservice=$_POST['imgservice'];
            $typeservice=$_POST['typeservice'];
          
            $query="UPDATE services SET `nameservice`='$nameservice',`priceservice`='$priceservice', `imgservice`='$imgservice',`typeeservice`='$typeservice' WHERE idservice=$idservice";
           
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
                    
                    <input value="<?php echo $service['idservice']; ?>" type="text"placeholder="Name"name="idservice" id ="nameservice">
                    <input value="<?php echo $service['nameservice']; ?>" type="text"placeholder="Name"name="nameservice">
                    <span><p id="error_nameservice"style="color:red"></p></span>
                    
                    <input value="<?php echo $service['priceservice']; ?>" type="text"placeholder="price"name="priceservice"  id ="priceservice">
                    <span><p id="error_priceservice"style="color:red"></p></span>

                    <input value="<?php echo $service['imgservice']; ?>" type="file"placeholder="choose img"name="imgservice">
                    <input value="<?php echo $service['typeservice']; ?>" type="text"placeholder="type"name="typeservice"  id ="priceservice">
                    <span><p id="error_priceservice"style="color:red"></p></span>

                    <input  type="submit"value="modify service"style="max-width: 150px" onclick="verif()" name="submit">  
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