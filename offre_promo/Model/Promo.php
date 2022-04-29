<?php
	class promo{
		private $id_offre=null;
		private $id_promo=null;
		private $nom_promo=null;
		private $prix=null;
		private $por_promo=null;
		private $img_promo;
		
		
		function __construct($id_offre,$id_promo, $nom_promo, $prix, $por_promo, $img_promo){
			$this->id_offre=$id_offre;
			$this->id_promo=$id_promo;
			$this->nom_promo=$nom_promo;
			$this->prix=$prix;
			$this->por_promo=$por_promo;
			$this->img_promo=$img_promo;
		}
		/*function getNumoffre(){
			return $this->numoffre;
		}*/
		function getid_offre(){
			return $this->id_offre;
		}
		function getid_promo(){
			return $this->id_promo;
		}
		function getnom_promo(){
			return $this->nom_promo;
		}
		function getprix(){
			return $this->prix;
		}
		function getpor_promo(){
			return $this->por_promo;
		}
		function getimg_promo(){
			return $this->img_promo;
		}
		
		function setid_offre(string $id_offre){
			$this->id_offre=$id_offre;
		}
		function setid_promo(string $id_promo){
			$this->id_promo=$id_promo;
		}
		function setnom_promo(string $nom_promo){
			$this->nom_promo=$nom_promo;
		}
		function setprix(string $prix){
			$this->prix=$prix;
		}
		function setpor_promo(string $por_promo){
			$this->por_promo=$por_promo;
		}
		function setimg_promo(string $img_promo){
			$this->img_promo=$img_promo;
		}
		
	}


?>