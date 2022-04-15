<?php 


$mysqli = new mysqli('localhost', 'root', '', 'zesty') or die(mysqli_error($mysqli));
$id=0;
$result= $mysqli->query("SELECT * FROM produit") or die($mysqli->error);           

$nom='';
    $categorie='';
    $prix='';
    $image='';
    $update=false;?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Shop-Zesty</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    <link rel="icon" href="../img/zesty.png" />
    <link href="../css/cart.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
    
    <link
      href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body style="background: #f2f2f2">
    <link
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
      rel="stylesheet"
    />
   
   


    <div style="background-color:#ff21bb"class="menu-outer">
      <div class="menu-icon">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
      </div>
      <nav>
        <ul>
          <li  ><a href="../index.html" style="text-decoration: none ">Home </a></li>
          <li><a href="../blog.html" style="text-decoration: none">Blog</a></li>
          <li>
            <a href="#" style="text-decoration: none">Products</a>
          </li>
          <li><a href="" style="text-decoration: none">Sign UP</a></li>
        </ul>
      </nav>
    </div>
    <a style="background-color:white"class="menu-close" onClick=" true">
      <div class="menu-icon">
        <div style="background-color:black" class="bar"></div>
        <div style="background-color:black" class="bar"></div>
      </div>
    </a>
   <a href="produithtml.html"> <img style=" width: 100px;border: 1px solid #000000;
    box-sizing: border-box;
    border-radius: 900px;
  height: 100px;"class="img-thumbnail" src="../img/zesty.png" alt=""></a>
  <div class="col-lg-1 col-md-2 cartCol col-3">
    <a href="panier.php" class="cart">
        
        <i class="icofont icofont-cart-alt"></i>
    </a>
</div>
    <div class="container bootdey">
    
    <div class="col-md-3 ">
        <section class="panel" >
          <div class="panel-body">
            <input
              type="text"
              placeholder="Keyword Search"
              class="form-control"
            />
          </div>
        </section>
        <section class="panel">
          <header class="panel-heading"><b> Categories</b></header>
          <div class="panel-body">
            <form action="produithtml.html" method="post">
            <ul class=" nav prod-cat">
              <li>
             
                <a  href="maquillage.html"    type="submit" name="maquillage"><i class="fa fa-angle-right" ></i> Maquillage</a>
              </li>
              <li>
                <a  href="soin.html" name="soin"><i class="fa fa-angle-right"></i> Soin de la peu</a>
              </li>
              <li>
                <a href="coloration.html"   name="coloration"><i class="fa fa-angle-right"></i> Coloration</a>
              </li>
              
            </ul>
          </form>
          </div>
        </section>
        <section class="panel">
          <header class="panel-heading"><b> Price Range</b></header>
          <div class="panel-body sliders">
           
       <div class="price-input">
        <div class="field">
          <span>Min</span>
          <input type="number" class="input-min" value="10">
        </div>
        <div class="separator">-</div>
        <div class="field">
          <span>Max</span>
          <input type="number" class="input-max" value="500">
        </div>
        </div>
        <div class="slider">
        <div class="progress"></div>
        <div class="range-input">
          <input type="range" class="range-min" min=0 max=1000 value=200 step="1">
          <input type="range" class="range-max" min=0 max=1000 value=800 step="1">
        </div>
        </div>

          </div>
        </section>
        <section class="panel">
          <header class="panel-heading"><b>
           Filter </b></header>
          <div class="panel-body">
            <form role="form product-form">
           
              
              <div class="form-group">
                <label>Type</label>
                <select
                  class="form-control hasCustomSelect"
                  style="
                    -webkit-appearance: menulist-button;
                    width: 231px;
                    position: absolute;
                    opacity: 0;
                    height: 34px;
                    font-size: 12px;
                  "
                >
                  <option>Maquillage</option>
                  <option>Soin de la peau</option>
                  <option>Coloration</option>
                  
                </select>
                <span
                  class="customSelect form-control"
                  style="display: inline-block"
                  ><span
                    class="customSelectInner"
                    style="width: 209px; display: inline-block"
                    >select</span
                  ></span
                >
              </div>
              <button style="background-color:#ff21bb;" class="btn btn-secondary" type="submit">Filter</button>
            </form>
          </div>
        </section>
        <section class="panel">
          <header class="panel-heading"><b> Best Seller</b></header>
          <div class="panel-body">
            <div class="best-seller">
        
            <article class="media">
                <a class="pull-left thumb p-thumb">
                  <img
                    src="../img/maquillage/9.jpg"
                  />
                  
                </a>
            

              </article>
            <section class="panel">                <div style="display: flex ; flex-direction:row ; justify-content: space-between;">
                   <p style=" color:black ;  font-size: 15px; text-decoration: line-through ;">$79.50 </p>
                  <p style=" color:#fc5959 ;
                  font-size: 15px;">$67.15</p>
                  </div> </section>
            
            </div>
          </div>
       
        </section>
      </div>
     
      <div class="col-md-9">
        <section class="panel">
          <div class="panel-body">
            <div class="pull-right">
            
            <ul class="pagination pagination-sm pro-page-list">
                <li><a href="#" class="adtocart fa fa-shopping-cart">  </a>  </li>
               
              </ul>
            </div>
          </div>
        </section>
        <div class="col-md-9"> 
        <div class="row product-list">
        <?PHP while ($row = $result->fetch_assoc()): ?> 
        
          <section class="col-md-4">
             <section class="panel"> 
               <div class="pro-img-box">
                <img class="shop-img"src="../img/produits/<?php echo $row['image'];?>" alt="" />
                <button href="#" class="adtocart fa fa-shopping-cart">        
              </button>
              </div>

              <div class="panel-body text-center">
                <h6><b class="catégorie"> <?php echo $row['categorie'];?></b></h6>
                <h4>
                  <a href="#" class="pro-title"> <?php echo $row['nom'];?> </a>
                </h4>
                <p class="price"><?php echo $row['prix'];?>$</p>
              </div>
          </section>
        </section>
       
        <?php endwhile;?>
         
        </div>
           
         
          <section class="container content-section">
      <h2 class="section-header">CART</h2>
      <div class="cart-row">
        <span class="cart-item cart-header cart-column">ITEM</span>
        <span class="cart-quantity cart-header cart-column">CATEGORY</span>
        <span class="cart-price cart-header cart-column">PRICE</span>
        <span class="cart-quantity cart-header cart-column">QUANTITY</span>
      </div>
      <div class="cart-items">
      <?php
             $panier=$DB->query('SELECT * FROM panier') ; 
               
                
                ?>
                <?php foreach ($panier as $row ):?>
              
                  <tbody >
                  <div class="cart-items"> 
                      <tr valign="middle">
                                  
                                  <td valign="middle"><center><img width="200px" src="../../../front/img/produits/<?php echo $row->imgproduit;?> "></center></td>
                                    <th><center><h5 style="position: relative;top: 50px"><?php echo $row->nomproduit;?></h5></center></th>
                          

                                  <td style="margin: auto"><center><h5 class="cart-price"style="position: relative;top: 50px"><?php echo $row->prix;?> TND</h5></center></td>
                              
                          
                              
                                  <td align="center">
                                  <form action="" method="post" style="position: relative;top: 10px">

                                <input type="hidden" id="idpanier" name="idpanier" value="<?php echo $row->idpanier;?>">
                                <br>
                                <input class="cart-quantity-input" type="number" value="<?php echo $row->qte;?>">
                        
                      <?php //<button type="submit" class="badge badge-info">update</button>?>
                                  </center></form>
                              </center></td>
                              
                      
                                
                              
                                  <td align="center">
                                <form action="" method="get" style="position: relative;top: 50px">
                                      
                                        <input type="hidden" id="idpanier" name="idpanier" value="1">
                                      <input type="hidden" id="id" name="id" value="12">
                                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o" aria-hidden="true">Supprimer</i></button>
                                    </form></center>
                                </td>
                            
                                
                            </tr>    </div>  
                
                                      
              
        </tbody>
              
        <?PHP endforeach ?>

      </div>
      <div class="cart-total">
        <strong class="cart-total-title">Total</strong>
        
        <span class="cart-total-price">$0</span>
      </div>
      <button class="btn btn-primary btn-purchase" type="button">
        PURCHASE
      </button>
    </section>  
       
          
          
        

    <style type="text/css">
      body {
        margin-top: 20px;
        background: #f1f2f7;
      }

      /*panel*/
      .panel {
        border:   none;
        box-shadow:#5a5a5a ;
        border-radius: 10%;
        
      }

      .panel-heading {
        border-color: #eff2f7;
        font-size: 16px;
        font-weight: 300;
      }

      .panel-title {
        color: #2a3542;
        font-size: 14px;
        font-weight: 400;
        margin-bottom: 0;
        margin-top: 0;
        font-family: "Open Sans", sans-serif;
      }

      /*product list*/

      .prod-cat li a {
        border-bottom: 1px dashed #d9d9d9;
      }

      .prod-cat li a {
        color: #3b3b3b;
      }

      .prod-cat li ul {
        margin-left: 30px;
      }

      .prod-cat li ul li a {
        border-bottom: none;
      }
      .prod-cat li ul li a:hover,
      .prod-cat li ul li a:focus,
      .prod-cat li ul li.active a,
      .prod-cat li a:hover,
      .prod-cat li a:focus,
      .prod-cat li a.active {
        background: none;
        color: #ff21bb;
      }

      .pro-lab {
        margin-right: 20px;
        font-weight: normal;
      }

      .pro-sort {
        padding-right: 20px;
        float: left;
      }

      .pro-page-list {
        margin: 5px 0 0 0;
      }

      .product-list img {
        width: 100%;
        border-radius: 4px 4px 0 0;
        -webkit-border-radius: 4px 4px 0 0;
      }

      .product-list .pro-img-box {
        position: relative;
      }
      .adtocart {
        background: #f2f2f2;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        -webkit-border-radius: 50%;
   
        display: inline-block;
        text-align: center;
        border: 3px solid #ff21bb;
        left: 45%;
        bottom: -25px;
        position: absolute;
      }

      .adtocart i {
        color: #fff;
        font-size: 20px;
        line-height: 5px;
      }

      .pro-title {
        color: #5a5a5a;
        display: inline-block;
        margin-top: 20px;
        font-size: 16px;
      }

      .product-list .price {
        color: #fc5959;
        font-size: 15px;
      }

      .pro-img-details {
        margin-left: -15px;
      }

      .pro-img-details img {
        width: 100%;
      }

      .pro-d-title {
        font-size: 16px;
        margin-top: 0;
      }

      .product_meta {
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
        padding: 10px 0;
        margin: 15px 0;
      }

      .product_meta span {
        display: block;
        margin-bottom: 10px;
      }
      .product_meta a,
      .pro-price {
        color: #fc5959;
      }

      .pro-price,
      .amount-old {
        font-size: 18px;
        padding: 0 10px;
      }

      .amount-old {
        text-decoration: line-through;
      }

      .quantity {
        width: 120px;
      }

      .pro-img-list {
        margin: 10px 0 0 -15px;
        width: 100%;
        display: inline-block;
      }

      .pro-img-list a {
        float: left;
        margin-right: 10px;
        margin-bottom: 10px;
      }

      .pro-d-head {
        font-size: 18px;
        font-weight: 300;
      }
      .price-input{
        width: 100%;
margin: 30px 0 35px;
      }
      .price-input .field{
       height: 45px;
       width: 100%;
       display: flex;
       align-items:center;      
      }
      .field input{
 width: 100%;
 height: 100%;
 outline: none;
 font-size: 19px;
 text-align: center;
 margin-left: 12px;
 border-radius: 5px;
 border: 1px solid #999;
 -moz-appearance:textfield;
      }
      input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button{
  -webkit-appearance: none;}
      .price-input .separator{
 width: 130px;
 display: flex;
 font-size: 19px;
 align-items: center;
 justify-content: center;}
 .slider{
 height: 5px;
 border-radius: 5px;
 background: #ddd;
 position: relative;
}
.slider .progress{
 height: 5px;
  left: 25%;
 right: 25%;
 position: absolute;
 border-radius: 5px;
 background: #ff21bb;}

 .range-input{
 position: relative;}
.range-input input{
 position: absolute;
 top: -5px;
 height: 11px;
 width: 100%;
background:none;
pointer-events:none;
-webkit-appearance:none;

}
input[type="range"]::-webkit-slider-thumb{
 height: 17px;
 width: 17px;
 border-radius: 50%;
 pointer-events: auto;
  -webkit-appearance: none;
 background: #ff21bb;}
 input[type="range"]::-moz-range-thumb{
 height: 17px;
 width: 17px;
 border:none;
 border-radius: 50%;
 pointer-events: auto;
  -moz-appearance: none;
 background: #ff21bb;}
 .maquillage-interface.hidden, .coloration-interface.hidden,.soin-interface.hidden,.cards.hidden{
  display: none;
}
.maquillage-interface
{
  width: 1300px;
    height: 2000px;
    background-color: white;
    margin-top: 80px;
    margin-left: -10px;
    position: absolute;
    transition:.5s;
    padding: 0;
    display: flex;
}
.soin-interface
{
  width: 1300px;
    height: 2000px;
    background-color: black;
    margin-top: 80px;
    margin-left: -10px;
    position: absolute;
    transition:.5s;
    padding: 0;
    display: flex;
}
.coloration-interface
{
  width: 1300px;
    height: 2000px;
    background-color: black;
    margin-top: 80px;
    margin-left: -10px;
    position: absolute;
    transition:.5s;
    padding: 0;
    display: flex;
}
.cards{
  width: 1300px;
    height: 2000px;
    background-color: black;
    margin-top: 80px;
    margin-left: -10px;
    position: absolute;
    transition:.5s;
    padding: 0;
}
    </style>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/common.js"></script>
    <script src="../js/home.js"></script>
    <script src="../js/testimonials.js"></script>
    <script type="text/javascript"></script>
    <script src="../js/price-range.js"></script>
    <script src="cart.js" async >
</script>
  </body>
</html>
