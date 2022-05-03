<?php
  require_once "pdo.php";
  $infos_connecte = $pdo->query('SELECT * FROM personnel');
  while ($row = $infos_connecte->fetch())
  {
    $matricule=$row['matricule_personnel'];
    $nom=$row['nom_personnel'];
    $prenom=$row['prenom_personnel'];
    $sexe=$row['sexe_personnel'];
    $fonction=$row['fonction_personnel'];
    $telephone=$row['telephone_personnel'];
    $email=$row['email_personnel'];
    $photo=$row['photo_personnel'];
  } 
  $infos_connecte->closeCursor();
?>