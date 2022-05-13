<?php
	include '../../config.php';
	include_once 'Model/Offre.php';
	class offreC {
		function afficheroffre(){
			$sql="SELECT * FROM offre";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}	
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimeroffre($id_offre){
			$sql="DELETE FROM offre WHERE id_offre=:id_offre";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_offre', $id_offre);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouteroffre($offre){
			$sql="INSERT INTO offre (id_offre, nom_offre, description_offre, code_promo, img_offre) 
			VALUES (:id_offre,:nom_offre, :description_offre,:code_promo, :img_offre)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_offre' => $offre->getid_offre(),
					'nom_offre' => $offre->getnom_offre(),
					'description_offre' => $offre->getdescription_offre(),
					'code_promo' => $offre->getcode_promo(),
					'img_offre' => $offre->getimg_offre()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupereroffre($id_offre){
			$sql="SELECT * from offre where id_offre=$id_offre";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$offre=$query->fetch();
				return $offre;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifieroffre($offre, $id_offre){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE offre SET 
					
						nom_offre= :nom_offre, 
						description_offre= :description_offre, 
						code_promo= :code_promo, 
						img_offre= :img_offre
					WHERE id_offre= :id_offre'
				);
				$query->execute([
					
					'nom_offre' => $offre->getnom_offre(),
					'description_offre' => $offre->getdescription_offre(),
					'code_promo' => $offre->getcode_promo(),
					'img_offre' => $offre->getimg_offre(),
					'id_offre' => $id_offre
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>
<!--ppppppppppppprrrrrrrrrrrrooooooooooooommmmmmmmmmmmooooooooooo-->
<?php
	
	include_once 'Model/Promo.php';
	class promoC {
		function afficherpromo(){
			$sql="SELECT * FROM promo";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}	
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
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
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterpromo($promo){
			$sql="INSERT INTO promo (id_offre,id_promo, nom_promo, prix, por_promo, img_promo) 
			VALUES (:id_offre,:id_promo,:nom_promo, :prix,:por_promo, :img_promo)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_offre' => $promo->getid_offre(),
					'id_promo' => $promo->getid_promo(),
					'nom_promo' => $promo->getnom_promo(),
					'prix' => $promo->getprix(),
					'por_promo' => $promo->getpor_promo(),
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
						prix= :prix, 
						por_promo= :por_promo, 
						img_promo= :img_promo
					WHERE id_promo= :id_promo'
				);
				$query->execute([
					
					'nom_promo' => $promo->getnom_promo(),
					'prix' => $promo->getprix(),
					'por_promo' => $promo->getpor_promo(),
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