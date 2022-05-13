<?php


require '../../../../model/produit.php';




	 

class produitC{

    function afficherProduit()
    {
      $sql = " SELECT * FROM produit ORDER BY prix ASC";
      $db = config::getConnexion();
      try {
        $liste= $db->query($sql);
        return $liste;
      } catch(Exception $e) {
          die('Erreur: ' .$e->getMessage());
      }
    }


  
    
	
    function ajoutProduit($produit)
    { $mysqli = new mysqli('localhost', 'root', '', 'zesty') or die(mysqli_error($mysqli));
		$mysqli->query("INSERT INTO produit (`nom`, `categorie`, `prix`, `image`) VALUES('$produit->getNom','$produit->categorie','$produit->prix','$produit->img')") or
		die($mysqli->error);
		/*$sql = "INSERT INTO produit (nom, categorie, prix, image)
		values(:nom, :categorie,:prix,  :image)";
		$db = config::getConnexion();
		try {
		 $query = $db->prepare($sql);
		 $query->execute([
			 'nom' => $produit->getNom(),
				  'categorie' => $produit->getCategorie(),
			 'prix' => $produit->getPrix(),
				  'categorie' => $produit->getCategorie(),
			 'image' => $produit->getImg()
			 
		 ]);
		 
	   } catch(Exception $e) {
		   die('Erreur: ' .$e->getMessage());
	   }*/
}

}
	/*
 function modifierProduit($produit, $id){
	try {
		$db = config::getConnexion();
		$query = $db->prepare(
			'UPDATE produit SET 
				nom = :nom, 
				categorie = :categorie,
				
				prix = :prix,
				img = :img
			WHERE id = :id'
		);
		$query->execute([
			'nom' => $produit->getNom(),
			'categorie' => $produit->getCategorie(),
			
			'prix' => $produit->getPrix(),
			'id' => $id  , 
			'img' => $produit->getImg()
			 ]);

		echo $query->rowCount() . " records UPDATED successfully <br>";
	} catch (PDOException $e) {
		$e->getMessage();
	}
}
	function supprimerProduit($id){
			$sql="DELETE FROM produit WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
   
		function recupererProduit($id){
			$sql="SELECT * from produit where	id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$produit=$query->fetch();
				return $produit;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recupererProduit1($id){
			$sql="SELECT * from produit where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$produit = $query->fetch(PDO::FETCH_OBJ);
				return $produit;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function recupererProduitParCategorie($categorie){
			$sql="SELECT * from produit where  categorie= $categorie";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$liste= $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

	 
	}

  */