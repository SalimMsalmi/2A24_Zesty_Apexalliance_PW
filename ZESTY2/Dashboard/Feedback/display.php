<?php
 include 'connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD OPERATION</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
</head>
<body>
     <nav class="container my-5">
         <button class="btn btn-primary"><a href="reclamation.php"
         class="text-light">ADD Complaint</a>
         </button> 
         <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Username</th>
      <th scope="col">Type</th>
      <th scope="col">Description</th>
      <th scope="col">Specification</th>
      <th scope="col">Status</th>
      <th scope="col">DATErec</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
      <?php

      $sql="Select * from `crudrec`";
      $result=mysqli_query($con,$sql);
      if($result){
          while($row=mysqli_fetch_assoc($result)){
              $ID=$row['ID'];
              $Username=$row['Username'];
              $type=$row['type'];
              $Specification=$row['Specification'];
              $Description=$row['Description'];
              $Status=$row['Status'];
              $DATErec=$row['DATErec'];
              echo '<tr>
              <th scope="row">'.$ID.'</th>
              <td>'.$Username.'</td>
              <td>'.$type.'</td>
              <td>'.$Specification.'</td>
              <td>'.$Description.'</td>
              <td>'.$Status.'</td>
              <td>'.$DATErec.'</td>
              <td>
              <a href="update.php?updateid='.$ID.'"
              class="btn btn-outline-warning " role="button" aria-pressed="true"
              >Update</a>

              <a href="delete.php?deleteid='.$ID.'"
              class="btn btn-outline-danger " role="button" aria-pressed="true"
              >Delete</a>
              
             </td>
            </tr>';


          }
          
      }

      ?>

    </tbody>
</table>
    
    </nav>
</body>
</html>

    