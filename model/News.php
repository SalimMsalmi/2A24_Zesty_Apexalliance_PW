<?php
	class news{
        //Attributes
		private $idblog=null;
		private $dateblog=null;
		private $imageblog=null;
		private $descriptionblog=null;
        private $idadmin=null;
		//Constructors
		function __construct($idblog,$dateblog,$descriptionblog, $imageblog, $idadmin){
			$this->idblog=$idblog;
			$this->dateblog=$dateblog;
			$this->imageblog=$imageblog;
			$this->descriptionblog=$descriptionblog;
			$this->idadmin=$idadmin;
			
		}
        //Getters
		function getidblog(){
			return $this->idblog;
		}
		function getdateblog(){
			return $this->dateblog;
		}
		function getimageblog(){
			return $this->imageblog;
		}
		function getdescriptionblog(){
			return $this->descriptionblog;
		}
		function getidadmin(){
			return $this->idadmin;
		}
        //Setters
		function setdateblog(string $dateblog){
			$this->dateblog=$dateblog;
		}
		function setimageblog(string $imageblog){
			$this->imageblog=$imageblog;
		}
		function setdescriptionblog(string $descriptionblog){
			$this->descriptionblog=$descriptionblog;
		}
		function setidadmin(string $idadmin){
			$this->idadmin=$idadmin;
		}
        function setidblog(string $idblog){
			$this->idblog=$idblog;
		}
	}
?>