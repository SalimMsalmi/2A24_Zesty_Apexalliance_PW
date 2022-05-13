<?php
	class res{
		private $idres=null;
		private $idservice=null;
		private $dateres;
		private $timeres=null;
		private $nsres=null;
		private $mailres=null;
		
		
		function __construct($idres, $nom, $dateres, $timeres, $nsres, $mailres){
			$this->idres=$idres;
			$this->nom=$nom;
			$this->dateres=$dateres;
			$this->timeres=$timeres;
			$this->nsres=$nsres;
			$this->mailres=$mailres;
		}
		function getidres(){
			return $this->idres;
		}
		function getidservice(){
			return $this->idservice;
		}
		function getdateres(){
			return $this->dateres;
		}
		function gettimeres(){
			return $this->timeres;
		}
		function getnsres(){
			return $this->nsres;
		}
		function getmailres(){
			return $this->mailres;
		}
		function setidservice(string $idservice){
			$this->idservice=$idservice;
		}
		function setdateres(string $dateres){
			$this->dateres=$dateres;
		}
		function settimeres(string $timeres){
			$this->timeres=$timeres;
		}
		function setnsres(string $nsres){
			$this->nsres=$nsres;
		}
		function setmailres(string $mailres){
			$this->mailres=$mailres;
		}
		
	}


?>