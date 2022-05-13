<?php
	include '../../config.php';
	include_once 'Model/Offre.php';
	class promoC {
		function afficherpromo(){
			$sql="SELECT * FROM promo";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}	
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerpromo($id_promo){
			$sql="DELETE FROM promo WHERE id_promo=:id_promo";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_promo', $id_promo);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouterpromo($promo){
			$sql="INSERT INTO promo (id_promo, nom_promo, prix, por_promo, img_promo) 
			VALUES (:id_promo,:nom_promo, :prix,:por_promo, :img_promo)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_promo' => $promo->getid_promo(),
					'nom_promo' => $promo->getnom_promo(),
					'por_promo' => $promo->getpor_promo(),
					'code_promo' => $promo->getcode_promo(),
					'img_promo' => $promo->getimg_promo()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererpromo($id_promo){
			$sql="SELECT * from promo where id_promo=$id_promo";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$promo=$query->fetch();
				return $promo;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierpromo($promo, $id_promo){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE promo SET 
					
						nom_promo= :nom_promo, 
						description_promo= :description_promo, 
						code_promo= :code_promo, 
						img_promo= :img_promo
					WHERE id_promo= :id_promo'
				);
				$query->execute([
					
					'nom_promo' => $promo->getnom_promo(),
					'description_promo' => $promo->getdescription_promo(),
					'code_promo' => $promo->getcode_promo(),
					'img_promo' => $promo->getimg_promo(),
					'id_promo' => $id_promo
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>