<?php

require_once '../config.php';

$pdo = config::getConnexion();

$Id_R = $_POST['Id_R'];
$description = $_POST['description'];
$eval = $_POST['eval'];

try {
  $query = $pdo->prepare("INSERT INTO reponse (Id_R, description, eval) 
                           VALUES (:Id_R, :description, :eval)");
  $query->bindValue(':Id_R', $Id_R);
  $query->bindValue(':description', $description);
  $query->bindValue(':eval', $eval);
  $query->execute();

  // Success message (optional)
 // echo 'Response added successfully!';
 header('Location:../Views/Listrep.php');  
} catch (PDOException $e) {
  echo 'error ' . $e->getMessage(); 
}

?>
