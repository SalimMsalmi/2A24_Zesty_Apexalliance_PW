<?php
require 'header.php';

?>


<?php
$panier=new panierC();
$idpanier='';
$idpanier= isset($idpanier);
$list = $panier->calculerpanier($idpanier);
$N=0;
$N=$list['nb'];
?>









<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../../../front/css/bootstrap.min.css" />
<section id="mu-restaurant-game">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-restaurant-game-area">
          <div class="mu-title">
            <br /><br /><br />
            <span class="mu-subtitle"></span>

           
            <h3 class="section-subheading text-muted"></h3>
            
          </div>

          <div class="row text-center">
            <a href="afficherlignecommande.php">
              <button class="btn btn-info">Historique Du Panier</button>
            </a>
            <center>
              <form action="confirmerpanier.php"  method="post"    style="position: relative; top: 50px"    ></form>
            </center>
            <table class="table">
              <thead class="thead-dark">
              <div class="cart-row"><tr>
                  <th class="text-center">Image de produits</th>
                  <th class="text-center">Nom produit</th>

                  <th class="cart-price text-center">Prix</th>
                  <th class="text-center">Quantite</th>
                  <th class="text-center">Total</th>
                  <th class="text-center">Suppression</th>

                  <th class="text-center"></th>
                  <th class="text-right"></th>
                </tr>
      </div>
              
              </thead>
              <?php
             $panier=$DB->query('SELECT * FROM panier') ; 
               
                
                ?>
                <?php 
                
$C='';
$S=0;
$S1=0;

                foreach ($panier as $row )
               
   {    $S=(intval($row->prix)*intval($row->qte));
    $S1=$S1+(intval($row->prix)*intval($row->qte));
  
    $C=$C.$row->qte.'x'.' '.$row->nomproduit.'</br>';
        ?>                <tbody >
                  <div class="cart-items"> 
                      <tr valign="middle">
                                  
                                  <td valign="middle"><center><img width="200px" src="../../../front/img/produits/<?php echo $row->imgproduit;?> "></center></td>
                                    <th><center><h5 style="position: relative;top: 50px"><?php echo $row->nomproduit;?></h5></center></th>


                                  <td style="margin: auto"><center><h5 class="cart-price"style="position: relative;top: 50px"><?php echo $row->prix;?> TND</h5></center></td>
                              
                          
                              
                                  <td align="center">
                                  <form action="modifierpanier.php" method="post" style="position: relative;top: 10px">

                                <input type="hidden" id="idpanier" name="idpanier" value="<?php echo $row->idPanier;?>">
                                <br>
                                <select name="qte" id="qte" >
                   
    <option value="1"   <?php if ($row->qte==1) echo "selected" ; ?>>1</option>
       <option value="2"  <?php if ($row->qte==2) echo "selected" ; ?>>2</option>
       <option value="3"  <?php if ($row->qte==3) echo "selected" ; ?>>3</option>
       <option value="4"  <?php if ($row->qte==4) echo "selected" ; ?>>4</option>
       <option value="5"  <?php if ($row->qte==5) echo "selected" ; ?>>5</option>
       <option value="6"  <?php if ($row->qte==6) echo "selected" ; ?>>6</option>
       <option value="7"  <?php if ($row->qte==7) echo "selected" ; ?>>7</option>
       
    </select>
                        
                               <button type="submit" class="badge badge-info">update</button>
                                </form>           
                      </td>
                              
                      <td><center><h5 style="position: relative;top: 50px"><?php echo $S.' '.'TND' ; ?></h5></center></td>
                                
                     
                                  <td align="center">
                                <form action="supprimerpanier.php" method="POST" style="position: relative;top: 50px">
                           
                                <input type="hidden" id="idpanier" name="idpanier" value="<?php echo $row->idPanier ?>">
                                      
      <button class="btn btn-danger" value="supprimer" name="supprimer" type="submit"><i class="fa fa-trash-o" aria-hidden="true">Supprimer</i></button>
                                    </form></center>
                                </td>
                            
                                
                            </tr>    </div>  
                
                                      
              
        </tbody>
              
        <?php
} ?>

              
            </table>

            <form
              action="localLiv.php"
              method="post"
              style="position: relative; top: 10px"
            >
              <input type="hidden" id="panier" name="panier" value="138" />

              

          
            </form>

            
            <center><h3 ><?php echo 'Total:'.'    '.'  '. $S1.' '.'TND' ?></h3>
              <form action="ajoutercommande.php"  action="supprimertout.php" method="post">
              <button class="btn btn-info">Passer Commande</button>    
                    <input type="hidden" id="id_commande" name="id_commande" value=" ">
                    <input type="hidden" id="nomproduit" name="nomproduit" value="<?php echo  $row["nomproduit"] ?> ">
                    <input type="hidden" id="prix_tot" name="prix_tot" value="<?php echo $S1 ?>">
                    <input type="hidden" id="qte" name="qte" value=" <?php echo  $row["qte"] ?>">
              
          <input type="hidden" id="client" name="client" value="<?php echo  $row["client"] ?> ">
          
                    <input type="hidden" id="etat" name="etat" value="en cours de traitement"> 
                  
                
                    
                    
                </form>
            <table>
              <tbody>
                <tr></tr>
                <tr>
                  <form action="ajoutercommande.php" method="post"></form>

                  <input
                    type="hidden"
                    id="id_commande"
                    name="id_commande"
                    value=" "
                  />
                  <input
                    type="hidden"
                    id="nomproduit"
                    name="nomproduit"
                    value="New Worlds  "
                  />
                  <input
                    type="hidden"
                    id="prix_tot"
                    name="prix_tot"
                    value="33"
                  />
                  <input type="hidden" id="qte" name="qte" value=" 3" />

                  <input type="hidden" id="client" name="client" value="12 " />

                  <input
                    type="hidden"
                    id="etat"
                    name="etat"
                    value="en cours de traitement"
                  />
                </tr>

                <tr>
                  <form action="ajouterlivraison.php" method="post"></form>

                  <input type="hidden" id="id" name="id" value=" " />
                  <input
                    type="hidden"
                    id="frais_livraison"
                    name="frais_livraison"
                    value="33"
                  />

                  <input type="hidden" id="local" name="local" value="47 " />

                  <input type="hidden" id="client" name="client" value="12 " />

                  <input
                    type="hidden"
                    id="etat"
                    name="etat"
                    value="en cours de traitement"
                  />
                </tr>
              
              </tbody>
            </table>

            <div>
              <div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
require 'footer.php';?>