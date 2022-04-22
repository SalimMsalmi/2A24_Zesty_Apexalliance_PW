<?PHP
include "../../../../controller/commandeC.php";
include "../../../../config.php";


$commandeC=new commandeC();
if (isset($_GET["id_commande"])){
	$commandeC->supprimercommande($_GET["id_commande"]);
	header('Location: afficherlignecommande.php');
}

?>  