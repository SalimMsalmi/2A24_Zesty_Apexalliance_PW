<?php
	require_once 'config.php';
	require_once 'Client.php';
	class ClientC {
		function afficheruser(){
			$sql="SELECT * FROM client";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
		}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function count_female(){
			$sql="SELECT * FROM client where Gender='Female'";
			$db = config::getConnexion();
			//try{
				$liste = $db->query($sql);
				return $liste;
			//}
			//catch(Exception $e){
			//	die('Erreur:'. $e->getMeesage());
			//}
		}
		function count_male(){
			$sql="SELECT * FROM client where Gender='Male'";
			$db = config::getConnexion();
			//try{
				$liste = $db->query($sql);
				return $liste;
			//}
			//catch(Exception $e){
			//	die('Erreur:'. $e->getMeesage());
			//}
		}
		function supprimerusers($id){
			$sql="DELETE FROM client WHERE id=:id";
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
			$sql="INSERT INTO client (nom, prenom, pwd, email,rol,img,date_naissance,cin,Gender) 
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
				echo "<script>alert(\"email has to be unique\")</script>";
			}			
		}
		function recupereruser($cin){
			$sql="SELECT * from client where cin=$cin";
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
		function recupereruser_email($email){
			$sql="SELECT * from client where email = :email";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute([
					'email' => $email
				]);
				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function recupereradmin($cin){
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
		 			'UPDATE client SET 
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
		 		
		 	} catch (PDOException $e) {
		 		$e->getMessage();
		 	}
		 }

	}
?>