<?PHP
include "../Products/controller/commandeC.php";
require_once "../../config.php";
$commandeC=new commandeC();
if (isset($_GET["id_commande"])){
	$commandeC->supprimercommande($_GET["id_commande"]);
	header('Location:Commande.php');
}

?>