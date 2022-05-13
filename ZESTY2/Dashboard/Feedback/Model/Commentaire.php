<?php
	class commentaire{
        //Attributes
		private $idcom=null;
		private $iduser=null;
		private $idblog=null;
		private $descriptioncom=null;
        private $Datecom=null;
		//Constructors
		function __construct($idcom,$iduser,$idblog, $descriptioncom, $Datecom){
			$this->idcom=$idcom;
			$this->iduser=$iduser;
			$this->idblog=$idblog;
			$this->descriptioncom=$descriptioncom;
			$this->Datecom=$Datecom;
			
		}
        //Getters
		function getidcom(){
			return $this->idcom;
		}
		function getiduser(){
			return $this->iduser;
		}
		function getidblog(){
			return $this->idblog;
		}
		function getdescriptioncom(){
			return $this->descriptioncom;
		}
		function getDatecom(){
			return $this->Datecom;
		}
        //Setters
		function setidcom(string $idcom){
			$this->idcom=$idcom;
		}
		function setiduser(string $iduser){
			$this->iduser=$iduser;
		}
		function setidblog(string $idblog){
			$this->idblog=$idblog;
		}
		function setdescriptioncom(string $descriptioncom){
			$this->descriptioncom=$descriptioncom;
		}
        function setDatecom(string $Datecom){
			$this->Datecom=$Datecom;
		}
	}
?>