
<?php 

include 'connect.php';


 if(isset($_POST['submit'])){
   $Username=$_POST['Username'];
   $type=$_POST['type'];
   $Specification=$_POST['Specification'];
   $Description=$_POST['Description'];
   $Status=$_POST['Status'];
   $DATErec=$_POST['DATErec'];

      $sql="insert into `crudrec`(Username,type,Specification,Description,Status,DATErec)
   values('$Username','$type','$Specification','$Description','$Status','$DATErec')";
   $result=mysqli_query($con,$sql);
   if($result){
    echo "Data insert complete soldier";
    //header('location:display.php');
  }
  else{
    die(mysqli_error($con));
  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>reclamation crud</title>
  </head>
  <body>
     

<div class="container my-5">
  <form method="post" id="myform">
     <div class="form-group"> 
       <label autocomplete="off" >Username</label>

       <input type="text" class="form-control" 
     placeholder="Enter your Username" name="Username"id="username" autocomplete="off" >
     <span id="cmon"></span>
     </div>

     <label >type:</label>
                    <select name="type" autocomplete="off"  >
                        <option value="Produits">
                            Produits
                        </option>
                        <option value="Services">
                            Services
                        </option>
                    </select>



 <div class="form-group">
    <label>product or service name</label>
    <input type="text" class="form-control" 
     placeholder="Enter your Specification" autocomplete="off" name="Specification">
    
 </div>
 <div class="form-group">
    <label>Description</label>
    <input type="text" class="form-control" 
     placeholder="Enter your Description" autocomplete="off"  name="Description">
 </div>

 <div class="form-group">
    <label>Date</label>
    <input type="Date" class="form-control" 
     placeholder="Enter DATE" autocomplete="off"  name="DATErec">
 </div>

 <label >Status:</label>
                     <select name="Status" autocomplete="off"  >
                        <option value="traité">
                            traité
                        </option>
                        <option value="en cours">
                            en cours
                        </option>
                        <option value="non traité">
                            non traité
                        </option>
                    </select>


 <button type="submit" onclick="verif()" class="btn btn-primary" name="submit">
      submit
 </button>
  </form>
 </div>
     
 <script src="controle.js"></script>
    
  </body>
</html>







