<?php
	class service{
        //Attributes
		//private $idservice=null;
		private $nameservice=null;
		private $priceservice=null;
        private $imgservice=null;

		//Constructors
		function __construct($nameservice,$priceservice,$imgservice){
			//$this->idservice=$idservice;
			$this->nameservice=$nameservice;
			$this->priceservice=$priceservice;
            $this->imgservice=$imgservice;
		}
        //Getters
		//function getidservice(){
			//return $this->idservice;
		//}
		function getnameservice(){
			return $this->nameservice;
		}
		function getpriceservice(){
			return $this->priceservice;
		}
        function getimgservice(){
			return $this->imgservice;
		}
		
        //Setters
	/*	function setidservice(int $idservice){
			$this->idservice=$idservice;
		}*/
		function setnameservice(string $nameservice){
			$this->nameservice=$nameservice;
		}
		function setpriceservice(string $priceservice){
			$this->priceservice=$priceservice;
		}
		function setimgservice(string $imgservice){
			$this->imgservice=$imgservice;
		}
	}
?>