<?PHP

	class produit
    {
		private  $id = null;
		private  $nom = null;
		private  $prix = null;
		private  $categorie = null;	
		private  $img = null;	
		function __construct(string $nom, float $prix, string $categorie, string $img)
        {
			$this->nom=$nom;
		
			$this->prix=$prix;
			$this->categorie=$categorie;
			$this->img=$img;
		}
		function getId(): int{
			return $this->id;
		}
		function getImg(): string{
			return $this->img;
		}
		function getNom(): string{
			return $this->nom;
		}
	
		function getPrix(): float{
			return $this->prix;
		}
		function getCategorie(): string{
			return $this->categorie;
		}
		function setNom(string $nom): void
        {
			$this->$nom=$nom;
		}
		function setImg(string $img): void
        {
			$this->img=$img;
		}
		
		function setPrix(int $prix): void
        {
			$this->prix=$prix;
		}
		function setCategorie(string $categorie): void
        {
			$this->categorie=$categorie;
		}
		
    }
?><?php







	 

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