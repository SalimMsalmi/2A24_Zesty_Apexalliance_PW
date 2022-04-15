<?php
	include '../config.php';
	include_once '../Model/Service.php';

	class serviceC {
		function afficherservice(){
			$sql="SELECT * FROM services";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerservice($idservice){
			$sql="DELETE FROM services WHERE idservice=:idservice";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idservice', $idservice);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

		function recupererservice($idservice){
			$sql="SELECT * from services where idservice=$idservice";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				$service=$query->fetch();
				return $service;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function modifierservice($service, $idservice){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE services SET 
						nameservice= :nameservice, 
						priceservice= :priceservice, 
						imgservice= :imgservice
					WHERE idservice= :idservice'
				);
				$query->execute([
					'nameservice' => $service->getnameservice(),
					'priceservice' => $service->getpriceservice(),
					'imgservice' => $service->getimgservice(),
					
					'idservice' => $idservice
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		function ajouterservice($service){
		
			$sql="	INSERT INTO services ( nameservice, priceservice, imgservice)
			VALUES (:nameservice, :priceservice, :imgservice)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					//'idservice' => $service->getidservice(),
					'nameservice' => $service->getnameservice(),
					'priceservice' => $service->getpriceservice(),
					'imgservice' => $service->getimgservice()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		

	}
?>