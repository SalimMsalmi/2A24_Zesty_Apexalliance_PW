<?php
session_start();

include "../../controller/commandeC.php";
include "../../model/commande.php";
include "../../controller/panierC.php";
class UserC {
    function afficheruser(){
        $sql="SELECT * FROM users";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMeesage());
        }
    }
    function supprimerusers($id){
        $sql="DELETE FROM users WHERE id=:id";
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
        $sql="INSERT INTO users (nom, prenom, pwd, email,rol,img,date_naissance,cin,Gender) 
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
            echo 'Erreur: '.$e->getMessage();
        }			
    }
    function recupereruser($cin){
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
                'UPDATE users SET 
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
            // echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

}
$user = null;

 $UserC = new ClientC();
 if(isset($_SESSION["clientcin"]))
 {
 	$user=$UserC->recupereruser($_SESSION["clientcin"]);
	
 }

$panierC=new panierC();

if (isset($_POST["client"]))
   $panierC->supprimertout($user["id"]);
    $commande= new commande($user["id"],$_POST["prix_tot"],$_POST["etat"]);
    $commandeC= new commandeC();
    $commandeC->ajoutercommande($commande);
      header("location:methodedepayment.php");
      //header("location:../../view/back/commande.php");

?>	