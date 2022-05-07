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


	}
?>