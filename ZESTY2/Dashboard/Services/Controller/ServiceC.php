<?php
	include '../../config.php';
	include_once 'Model/Service.php';

	class serviceC {   
		function afficherservice(){
			$sql="SELECT * FROM services";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
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
				die('Erreur:'. $e->getMessage());
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
						typeservice= :typeservice
					WHERE idservice= :idservice'
				);
				$query->execute([
					'nameservice' => $service->getnameservice(),
					'priceservice' => $service->getpriceservice(),
					'imgservice' => $service->getimgservice(),
					'typeservice' => $service->gettypeservice(),
					
					'idservice' => $idservice
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		function ajouterservice($service){
		
			$sql="	INSERT INTO services ( nameservice, priceservice, imgservice, typeservice)
			VALUES (:nameservice, :priceservice, :imgservice, :typeservice)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					//'idservice' => $service->getidservice(),
					'nameservice' => $service->getnameservice(),
					'priceservice' => $service->getpriceservice(),
					'imgservice' => $service->getimgservice(),
					'typeservice' => $service->gettypeservice(),

				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		

	}
?>

<?php
class UserC {
	function afficheruser(){
		$sql="SELECT * FROM users";
		$db = config::getConnexion();
		try{
			$liste = $db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die('Erreur:'. $e->getMeesage());
		}
	}
	function supprimerusers($id){
		$sql="DELETE FROM users WHERE id=:id";
		$db = config::getConnexion();
		$req=$db->prepare($sql);
		$req->bindValue(':id', $id);
		try{
			$req->execute();
		}
		catch(Exception $e){
			die('Erreur:'. $e->getMeesage());
		}
	}
	function ajouteradmin($admin){
		$sql="INSERT INTO users (nom, prenom, pwd, email,rol,img,date_naissance,cin,Gender) 
		VALUES (:nom,:prenom, :pwd,:email, :rol, :img, :date_naissance,:cin,:Gender)";
		$db = config::getConnexion();
		try{
			$query = $db->prepare($sql);
			$query->execute([
				'nom' => $admin->getnom(),
				'prenom' => $admin->getprenom(),
				'pwd' => $admin->getpwd(),
				'email' => $admin->getemail(),
				'rol' => $admin->getrol(),
				'img' => $admin->getimg(),
				'date_naissance' => $admin->getdate_naissance(),
				'cin' => $admin->getcin(),
				'Gender' => $admin->getGender()
			]);			
		}
		catch (Exception $e){
			echo 'Erreur: '.$e->getMessage();
		}			
	}
	function recupereruser($cin){
		$sql="SELECT * from users where cin=$cin";
		$db = config::getConnexion();
		try{
			$query=$db->prepare($sql);
			$query->execute();
			$user=$query->fetch();
			return $user;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}
	
	function modifieradmin($user, $cin){
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE users SET 
					nom= :nom, 
					prenom= :prenom, 
					email= :email, 
					img= :img,
					Gender=:gender
				WHERE cin= :cin'
			);
			$query->execute([
				'nom' => $user->getnom(),
				'prenom' => $user->getprenom(),
				'img' => $user->getimg(),
				'email' => $user->getemail(),
				'cin' => $cin,
				'gender' => $user->getGender()
			]);
			// echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}

}

?>