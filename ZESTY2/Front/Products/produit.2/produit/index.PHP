<?php
 
require 'header.php';




/*OUSEEMA*/
$user = null;

 $UserC = new ClientC();
 if(isset($_SESSION["clientcin"]))
 {
 	$user=$UserC->recupereruser($_SESSION["clientcin"]);
	
 }







 
 $maquillage="";
        $products2=$bdd->query('SELECT * FROM produit order by prix DESC');
        if(isset($_GET["s"]) AND !empty ($_GET["s"]))
{

   $recherche=htmlspecialchars($_GET['s']);
   $products2=$bdd->query('SELECT * FROM produit where nom like "%'.$recherche.'%" ');
}
if(isset($GET["Trier"]))
{if ($GET["Trier"]=="Tri par nom")
  $products2=$bdd->query('SELECT * FROM produit order by nom DESC');

}



       ?>
<?php 


     
$id=0;
$nom='';
    $categorie='';
    $prix='';
    $image='';
   
    
?>

<?php



?>

<nav style="background-color:grey;"  class="navbar navbar-expand-lg navbar-light bg-light">

  

  

   <div style="
  height: 70px;
  width: 90%;
  font-family:Montserrat;
   font-style: normal;
  display: flex;
  flex-direction: row;
  justify-content: space-evenly;
  align-items: center;">
   <table>
     
   <tr>
     <form  method="GET">
     <td><h6>Chercher Produit:</h6></td>
    <td><input name="s" style="margin-left:50px"type="search"placeholder="Chercher par nom"></td>
    <td><input type='submit' name="envoyer" value="Chercher" class="btn btn-dark"></td>
    </form>

  </tr></table> 
    </div>
</nav>
    <!-- Section-->
        <section class="py-5">




      <div class="container px-4 px-lg-5 mt-5">
            <!--PRICE RANGE-->
            <div class="row"> 
              <h3 style="color:white">Prix:</h3>
              <div class="price-range-block">
              <div id="slider-range" class="price-filter-range" name="rangeInput"></div>

                          <div style="margin:30px auto">
                    <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" value='0'/>
                    <input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_price" class="price-range-field"value='10000' />
                    </div>
                       
                </div>
                </div>
   
   
   
   
   
                <div id="searchResults" class="search-results-block">
   
                  <div
          class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"
          style="font-family:Montserrat; font-style: normal;">
       
         <?PHP
       if($products2-> rowCount()> 0 )
          {
            while ($row= $products2->fetch() ){
         ?>  
        
          
       <div class="col mb-5">
            <div style="   opacity:0.9 ;" class="card h-100">
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
          <?PHP  }
          }
          else { echo "<p style='color:white;'>Aucun produit trouvé </p>";}?>
        </div>
        </div>  
      </div>
     
    </section>
   <script src="panier.js"></script>
   <script src="price-range.js"></script>
   <script type="text/javascript">
     $(document).ready(function(){
     
   
      function filterPorducts(){
        $("#searchResults").html("<p>Loading... </p>");
        var min_price=$("#min_price").val();
        var max_price=$("#max_price").val();
        //alert(min_price+max_price);
        $.ajax({
            url:"price-range.php",
            type:"POST",
            data:{min_price:min_price,max_price:max_price},
            success:function(data){
              $("#searchResults").html(data);
              
            }
        });

      }
      $("#min_price,#max_price").on('keyup',function(){

        filterPorducts();
      });

      $("#slider-range").slider({
          range: true,
          orientation: "horizontal",
          min: 0,
          max: 1000,
          values: [0, 1000],
          step: 10,
  
          slide: function (event, ui) {
            if (ui.values[0] == ui.values[1]) {
                return false;
            }
            
            $("#min_price").val(ui.values[0]);
            $("#max_price").val(ui.values[1]);
            filterPorducts();
          }
        });

        $("#min_price").val($("#slider-range").slider("values", 0));
        $("#max_price").val($("#slider-range").slider("values", 1));
     });
   </script>
<?php require 'footer.php'; ?>