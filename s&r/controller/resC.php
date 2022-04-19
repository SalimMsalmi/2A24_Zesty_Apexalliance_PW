<?php
	include '../config.php';
	include_once  '../model/res.php';
	class resC {
		function afficheres(){
			$sql="SELECT * FROM booknow";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerres($idres){
			$sql="DELETE FROM booknow WHERE idres=:idres";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idres', $idres);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterres($res){
			$sql="INSERT INTO booknow (idservice, dateres, timeres, nsres, mailres) 
			VALUES (:idservice,:dateres, :timeres,:nsers, :mailres)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'idservice' => $res->getidservice(),
					'dateres' => $res->dateres(),
					'timeres' => $res->gettimeres(),
					'nsers' => $res->getnsers(),
					'mailres' => $res->getmailres(),
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
	/*	function recupereradherent($NumAdherent){
			$sql="SELECT * from adherent where NumAdherent=$NumAdherent";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$adherent=$query->fetch();
				return $adherent;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifieradherent($adherent, $numadherent){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE adherent SET 
						Nom= :Nom, 
						timeres= :Prenom, 
						Adresse= :Adresse, 
						Email= :Email, 
						DateInscription= :DateInscription
					WHERE NumAdherent= :NumAdherent'
				);
				$query->execute([
					'Nom' => $adherent->getNom(),
					'Prenom' => $adherent->getPrenom(),
					'Adresse' => $adherent->getAdresse(),
					'Email' => $adherent->getEmail(),
					'DateInscription' => $adherent->getDateinscription(),
					'NumAdherent' => $numadherent
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}*/

	}
?>