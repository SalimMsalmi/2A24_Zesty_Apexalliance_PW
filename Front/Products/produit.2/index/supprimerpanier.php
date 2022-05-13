<?PHP
include "../../../../controller/panierC.php";
$panierC=new panierC();
if (isset($_POST["idpanier"])){
	$panierC->supprimerpanier($_POST["idpanier"]);
	header('Location:showpanier.php');
}

   
?>