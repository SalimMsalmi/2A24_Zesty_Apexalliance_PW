<?php

include '../config.php';

 function affichertype($idtype){
  try{
      $pdo=getConnexion();
      $query = $pdo->prepare( 'SELECT * FROM services where typeservice = :id');
$query->execute([ 'id'=> $idtype]);
return $query->fetchAll();
  } catch (PDOException $e){ $e->getMessage();}



}
?>