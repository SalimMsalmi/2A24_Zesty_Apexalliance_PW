<?php
	include 'config.php';
	include_once 'Commentaire.php';
    class commentaireC {
		function affichercommentairetri($idblog){
			$sql="SELECT * FROM commentaire where idblog=$idblog ORDER BY datecom ASC";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
			
			}
		}
		function affichercommentaire($idblog){
			$sql="SELECT * FROM commentaire where idblog=$idblog";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
			
			}
		}
		function supprimercommentaire($idcom){
			$sql="DELETE FROM commentaire WHERE idcom=:idcom";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idcom', $idcom);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajoutercommentaire($commentaire){
			$sql="INSERT INTO commentaire (iduser, idblog, descriptioncom, Datecom) 
			VALUES (:iduser, :idblog,:descriptioncom, :Datecom)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'iduser' => $commentaire->getiduser(),
					'idblog' => $commentaire->getidblog(),
					'descriptioncom' => $commentaire->getdescriptioncom(),
					'Datecom' => $commentaire->getDatecom()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperercommentaire($idcom){
			$sql="SELECT * from commentaire where idcom=$idcom";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				$commentaire=$query->fetch();
				return $commentaire;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiercommentaire($commentaire, $idcom){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE commentaire SET 
					    iduser= :iduser,
						idblog= :idblog, 
						descriptioncom= :descriptioncom, 
						Datecom= :Datecom
					WHERE idcom= :idcom'
				);
				$query->execute([
					'iduser' => $commentaire->getdateblog(),
					'idblog' => $commentaire->getidblog(),
					'descriptioncom' => $commentaire->getdescriptioncom(),
					'Datecom' => $commentaire->getDatecom(),
					'idcom' => $idcom,
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>