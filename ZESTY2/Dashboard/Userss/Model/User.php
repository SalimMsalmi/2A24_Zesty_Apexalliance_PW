<?php
	class User{
        //Attributes
		private $id=null;
		private $nom=null;
		private $prenom=null;
		private $pwd=null;
		private $email=null;
		private $cin;
        private $rol;
        private $img=null;
		private $date_naissance=null;
		private $Gender=null;
		//Constructors
		function __construct($nom, $prenom, $pwd, $email, $rol,$cin,$date_naissance,$img,$Gender){
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->pwd=$pwd;
			$this->email=$email;
			$this->cin=$cin;
            $this->rol=$rol;
            $this->img=$img;
			$this->date_naissance=$date_naissance;
			$this->Gender=$Gender;
		}
        //Getters
		function getid(){
			return $this->id;
		}
		function getGender(){
			return $this->Gender;
		}
		function getNom(){
			return $this->nom;
		}
		function getPrenom(){
			return $this->prenom;
		}
		function getpwd(){
			return $this->pwd;
		}
		function getEmail(){
			return $this->email;
		}
		function getrol(){
			return $this->rol;
		}
        function getcin(){
			return $this->cin;
		}
        function getimg(){
			return $this->img;
		}
		function getdate_naissance(){
			return $this->date_naissance;
		}
        //Setters
		function setNom(string $nom){
			$this->nom=$nom;
		}
		function setGender(string $Gender){
			$this->Gender=$Gender;
		}
		function setPrenom(string $prenom){
			$this->prenom=$prenom;
		}
		function setpwd(string $pwd){
			$this->pwd=$pwd;
		}
		function setEmail(string $email){
			$this->email=$email;
		}
		function setimg(string $img){
			$this->img=$img;
		}
        function setcin(string $cin){
			$this->cin=$cin;
		}
        function setrol(string $rol){
			$this->rol=$rol;
		}
        function setid(string $id){
			$this->id=$id;
		}
		function setdate_naissance(string $date_naissance){
			$this->date_naissance=$date_naissance;
		}
		
	}
?>