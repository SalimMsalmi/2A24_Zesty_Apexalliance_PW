<?php

 // CONFIG BASE DONNEES
 $con = mysqli_connect("localhost", "root","","zesty");
 if(!$con){
 echo "Not connected";
 }
if(isset($_POST['min_price'])&& isset($_POST['max_price']))
{
    $min_price=$_POST['min_price'];
    $max_price=$_POST['max_price'];
 
    $query="SELECT * FROM produit where  `prix` between '$min_price' and '$max_price' And categorie='soin de la peau' ";
 
    $r = mysqli_query($con, $query);
    $count = mysqli_num_rows ($r);
    if($count==0){
    echo "Sorry No data found!";
    }
    
}

?> <div
class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"
>

 <?PHP
      while ($row=mysqli_fetch_assoc  ($r) ){
   ?>  
  
    
 <div class="col mb-5">
      <div class="card h-100">
        <!-- Product image-->
        <img
          class="card-img-top"
          src="../../img/produits/<?php echo $row['image'];?>" alt="..." />
        <!-- Product details-->
        <div class="card-body p-4">
          <div class="text-center">
            <!-- Product Category-->
            <h4 class="fw-bolder"> <?php echo $row['categorie'];?></h4>
            <!-- Product name-->
            <p class="fw"> <?php echo $row['nom'];?></p>
            <!-- Product price-->
            <a href="#"style="text-decoration:none;
            color:#17a2b8;"><?php echo $row['prix'];?>  TND</a>
          </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
          <div class="text-center">
          <form action="ajouterpanier.php" method="POST">
          <button class="btn btn-outline-dark mt-auto" onclick="incrementButton()"
              >Add To Cart</button
            >
                        <input type="hidden" id="id" name="id" value="<?php echo $row['id'];?>">
                        <input type="hidden" id="	img" name="img" value="<?php echo $row['image'];?>">
                        <input type="hidden" id="	categorie" name="categorie" value=" <?php echo $row['categorie'];?>">
                        <input type="hidden" id="	nom" name="nom" value="<?php echo $row['nom'];?> ">
                        <input type="hidden" id="prix" name="prix" value="<?php echo $row['prix'];?>">
          
        </form>
          </div>
        </div>
      </div>
    </div> 
    <?PHP 
     }
    ?>
    </div>

