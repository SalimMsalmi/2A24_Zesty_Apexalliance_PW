<?php
include '../Controller/UserC.php';
	include_once '../model/News.php';
    class NewsC {
		function affichernews(){
			$sql="SELECT * FROM news";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
			
			}
		}
		function supprimernews($idblog){
			$sql="DELETE FROM news WHERE idblog=:idblog";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idblog', $idblog);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouternews($news){
			$sql="INSERT INTO news (dateblog, imageblog, descriptionblog, idadmin) 
			VALUES (:dateblog, :imageblog,:descriptionblog, :idadmin)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'dateblog' => $news->getdateblog(),
					'imageblog' => $news->getimageblog(),
					'descriptionblog' => $news->getdescriptionblog(),
					'idadmin' => $news->getidadmin()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperernews($idblog){
			$sql="SELECT * from news where idblog=$idblog";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				$news=$query->fetch();
				return $news;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiernews($news, $idblog){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE news SET 
					    dateblog= :dateblog,
						imageblog= :imageblog, 
						descriptionblog= :descriptionblog, 
						idadmin= :idadmin
					WHERE idblog= :idblog'
				);
				$query->execute([
					'dateblog' => $news->getdateblog(),
					'imageblog' => $news->getimageblog(),
					'descriptionblog' => $news->getdescriptionblog(),
					'idadmin' => $news->getidadmin(),
					'idblog' => $idblog,
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>