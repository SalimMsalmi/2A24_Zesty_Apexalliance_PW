<?php
	class offre{
	
		private $id_offre=null;
		private $nom_offre=null;
		private $description_offre=null;
		private $code_promo=null;
		private $img_offre;
		
		private $password=null;
		function __construct($id_offre, $nom_offre, $description_offre, $code_promo, $img_offre){
		
			$this->id_offre=$id_offre;
			$this->nom_offre=$nom_offre;
			$this->description_offre=$description_offre;
			$this->code_promo=$code_promo;
			$this->img_offre=$img_offre;
		}
		/*function getNumoffre(){
			return $this->numoffre;
		}*/
		function getid_offre(){
			return $this->id_offre;
		}
		function getnom_offre(){
			return $this->nom_offre;
		}
		function getdescription_offre(){
			return $this->description_offre;
		}
		function getcode_promo(){
			return $this->code_promo;
		}
		function getimg_offre(){
			return $this->img_offre;
		}
		
		function setid_offre(string $id_offre){
			$this->id_offre=$id_offre;
		}
		function setnom_offre(string $nom_offre){
			$this->nom_offre=$nom_offre;
		}
		function setdescription_offre(string $description_offre){
			$this->description_offre=$description_offre;
		}
		function setcode_promo(string $code_promo){
			$this->code_promo=$code_promo;
		}
		function setimg_offre(string $img_offre){
			$this->img_offre=$img_offre;
		}
		
	}


?>