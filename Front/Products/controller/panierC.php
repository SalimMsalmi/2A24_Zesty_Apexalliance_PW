<?php

require_once '../../../../config.php';
class ClientC {
    function afficheruser(){
        $sql="SELECT * FROM client";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMeesage());
        }
    }
    function count_female(){
        $sql="SELECT * FROM client where Gender='Female'";
        $db = config::getConnexion();
        //try{
            $liste = $db->query($sql);
            return $liste;
        //}
        //catch(Exception $e){
        //	die('Erreur:'. $e->getMeesage());
        //}
    }
    function count_male(){
        $sql="SELECT * FROM client where Gender='Male'";
        $db = config::getConnexion();
        //try{
            $liste = $db->query($sql);
            return $liste;
        //}
        //catch(Exception $e){
        //	die('Erreur:'. $e->getMeesage());
        //}
    }
    function supprimerusers($id){
        $sql="DELETE FROM client WHERE id=:id";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id', $id);
        try{
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMeesage());
        }
    }
    function ajouteradmin($admin){
        $sql="INSERT INTO client (nom, prenom, pwd, email,rol,img,date_naissance,cin,Gender) 
        VALUES (:nom,:prenom, :pwd,:email, :rol, :img, :date_naissance,:cin,:Gender)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $admin->getnom(),
                'prenom' => $admin->getprenom(),
                'pwd' => $admin->getpwd(),
                'email' => $admin->getemail(),
                'rol' => $admin->getrol(),
                'img' => $admin->getimg(),
                'date_naissance' => $admin->getdate_naissance(),
                'cin' => $admin->getcin(),
                'Gender' => $admin->getGender()
            ]);			
        }
        catch (Exception $e){
            echo "<script>alert(\"email has to be unique\")</script>";
        }			
    }
    function recupereruser($cin){
        $sql="SELECT * from client where cin=$cin";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
            $user=$query->fetch();
            return $user;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function recupereruser_email($email){
        $sql="SELECT * from client where email = :email";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute([
                'email' => $email
            ]);
            $user=$query->fetch();
            return $user;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function recupereradmin($cin){
        $sql="SELECT * from users where cin=$cin";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
            $user=$query->fetch();
            return $user;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    
     function modifieradmin($user, $cin){
         try {
             $db = config::getConnexion();
             $query = $db->prepare(
                 'UPDATE client SET 
                     nom= :nom, 
                     prenom= :prenom, 
                     email= :email, 
                     img= :img,
                    Gender=:gender
                 WHERE cin= :cin'
             );
             $query->execute([
                 'nom' => $user->getnom(),
                 'prenom' => $user->getprenom(),
                 'img' => $user->getimg(),
                 'email' => $user->getemail(),
                 'cin' => $cin,
                 'gender' => $user->getGender()
             ]);
             
         } catch (PDOException $e) {
             $e->getMessage();
         }
     }

}

class panier{
	
	
	private ?int$client=null;
	private ?string $nomproduit=null;
	private ?string $imgproduit=null;
	private  ?int $prix=null;
	private ?int $qte=null;
	private ?int $idpanier=null;
	private ?int $idproduit=null;



	

	function __construct(string $imgproduit, string $nomproduit, int $prix, int $qte, int $produit, int $client){
		
		$this->imgproduit=$imgproduit;
		$this->nomproduit=$nomproduit;
		$this->prix=$prix;
		$this->qte=$qte;
		
		$this->produit=$produit;
	
		$this->client=$client;
	}
	
	function getimgproduit(): string{
		return $this->imgproduit;
	}
	function getnomproduit(): string{
		return $this->nomproduit;
	}
	function getprix():int{
		return $this->prix;
	}
	function getqte(): int{
		return $this->qte;
	}
	function getLocal(): int{
		return $this->local;
	}
	function getclient(): int{
		return $this->client;
	}
	
	function getproduit(): int{
		return $this->produit;
	}
	
	
	
	
	function getidpanier(): int{
		return $this->idpanier;
	}
	
	function setnomproduit(string $nomproduit): void
	{
		$this->nomproduit=$nomproduit;
	}
	
	function setimgproduit(string $imgproduit): void
	{
		$this->imgproduit=$imgproduit;
	}
	function setclient(int $client): void
	{
		$this->client=$client;
	}
	function setidpanier(int $idpanier): void
	{
		$this->idpanier=$idpanier;
	}
		function setprix(int $prix): void
		{
		$this->prix=$prix;
	}
		function setqte(int $qte): void 
		{
		$this->qte=$qte;
	}

	function setproduit(int $produit): void
	{
		$this->produit=$produit;
	}
	

	
}
class panierC
{
    function ajouterpanier($panier)
    {   
           $sql = "INSERT INTO panier (nomproduit,imgproduit, idProduit, prix, qte,client)
           values(:nomproduit,:imgproduit,:idProduit,:prix,:qte,:client)";
           $db = config::getConnexion();
           try {
            $query = $db->prepare($sql);
            $query->execute([
                'imgproduit' => $panier->getimgproduit(),
                'nomproduit' => $panier->getnomproduit(),
                     'prix' => $panier->getprix(),
                'qte' => $panier->getqte(),
                    'client'=>$panier->getclient(),
                'idProduit' => $panier->getproduit(),
       
                
            ]);
            
          } catch(Exception $e) {
              die('Erreur: ' .$e->getMessage());
          }
        }
     function afficherpanier()
    {

        $sql="select * from panier ";

        $db = config::getConnexion();
        try
        {
            $list=$db->query($sql);
            return $list;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function supprimerpanier($idpanier){
        $sql="DELETE FROM panier where  idPanier=:idPanier ";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':idPanier',$idpanier);
        try{
            $req->execute();
           // header('Location: 1.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
}
function supprimertout($client){
    $sql="DELETE FROM panier where client= :client";
    $db = config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':client',$client);
    try{
        $req->execute();
       // header('Location: index.php');
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
function modifierpanier($idpanier,$qte)
    {
        $sql="update panier set  qte='$qte' where idpanier='$idpanier'";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifierpanierLocal($idpanier,$local)
    {
        $sql="update panier set  local='$local' where idpanier='$idpanier'";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }

    function modifier($nomproduit)
    {
        $sql="update panier set qte= qte+1 where nomproduit='$nomproduit'";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    
 function calculerpanier($idpanier){
        $sql="select count(*) as nb from panier  ";
        $db = config::getConnexion();
        
        try{
             $nb=$db->query($sql);
             return $nb->fetch();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

}
