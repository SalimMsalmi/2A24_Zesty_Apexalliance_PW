
<?php
require 'header.php';
?>
<?php


?>
<?php 


     
$id=0;
$nom='';
    $categorie='';
    $prix='';
    $image='';
    
?>


 
    <!-- Section-->
    <section class="py-5">
      <div class="container px-4 px-lg-5 mt-5">
        <div
          class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"
        >
        <?php $products=$DB->query('SELECT * FROM produit');
        $products1=$DB->query('SELECT * FROM produit order by `categorie`');
        $products2=$DB->query('SELECT * FROM produit order by `prix`');
       ?>
         <?PHP
         if(isset($_POST['tri']))
         {
           if(isset($_POST['tcategorie'])=="Tri par categorie")
           
          $products=$products1;
          }
           
          foreach ($products as $row ):
         ?>  
       <div class="col mb-5">
            <div class="card h-100">
              <!-- Product image-->
              <img
                class="card-img-top"
                src="../../img/produits/<?php echo $row->image;?>"
                alt="..."
              />
              <!-- Product details-->
              <div class="card-body p-4">
                <div class="text-center">
                  <!-- Product Category-->
                  <h4 class="fw-bolder"> <?php echo $row->categorie;?></h4>
                  <!-- Product name-->
                  <p class="fw"> <?php echo $row->nom;?></p>
                  <!-- Product price-->
                  <a href="#"style="text-decoration:none;
                  color:;"><?php echo $row->prix;?>  TND</a>
                </div>
              </div>
              <!-- Product actions-->
              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center">
                <form action="ajouterpanier.php" method="POST">
                <button class="btn btn-outline-dark mt-auto" onclick="incrementButton()"
                    >Add To Cart</button
                  >
                              <input type="hidden" id="id" name="id" value="<?php echo $row->id;?>">
                              <input type="hidden" id="	img" name="img" value="<?php echo $row->image;?>">
                              <input type="hidden" id="	categorie" name="categorie" value=" <?php echo $row->categorie;?>">
                              <input type="hidden" id="	nom" name="nom" value="<?php echo $row->nom;?> ">
                              <input type="hidden" id="prix" name="prix" value="<?php echo $row->prix;?>">
                
              </form>
                </div>
              </div>
            </div>
          </div>
          <?PHP  endforeach ?>
        </div>
      </div>
    </section>
   <script src="panier.js"></script>
<?php require 'footer.php'; ?>