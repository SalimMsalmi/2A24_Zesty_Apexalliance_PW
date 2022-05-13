<?php

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

class commandeC
{
    function ajoutercommande($commande)
    {
        $sql= "insert into commande( client,prix_tot,etat) values (:client,:prix_tot,:etat)";
       
      
        $db = config::getConnexion();
        try
        {
            $req=$db->prepare($sql);
            
           
            $prix_tot=$commande->getprix_tot();
            $client=$commande->getclient();
         
            $etat=$commande->getetat();
           

          
          
            $req->bindValue(':prix_tot',$prix_tot);
            $req->bindValue(':client',$client);
          
              
              $req->bindValue(':etat',$etat);
            
          
          

            $req->execute();
            $from ="sprit.tn";
            $to = "azizbouzid7 mohamedaziz.bouzid@e8gmail.tn";
            $subject = "Commande";
            $message = "votre commande est en cours de traitement ";
            $headers = "From:" . $from;
            mail($to, $subject, $message, $headers);

        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());

        }

    
     }
     function affichercommande()
    {

        $sql="select * from commande ORDER BY prix_tot ASC";

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
    function affichercommande1()
    {

        $sql="SELECT * FROM commande  ";

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
       
       
 
     function affichercommandetri()
    {

        $sql="select * from commande ORDER BY prix_tot  desc";

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
    function supprimercommande($id_commande){
        $sql="DELETE FROM commande where id_commande= :id_commande";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id_commande',$id_commande);
        try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
}
function modifiercommande($id_commande,$etat)
    {
        $sql="update commande set  etat='$etat' where id_commande='$id_commande'";
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
    function recherchercommande($str){
        $sql="SELECT * FROM commande WHERE id_commande like '".$str."%' or etat like '".$str."%' or client like '".$str."%' ";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }

   

}
