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
?>