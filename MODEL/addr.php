<?php

require_once '../config.php';

$pdo = config::getConnexion();

$Id_R = $_POST['Id_R'];
$description = $_POST['description'];


try {
  $query = $pdo->prepare("INSERT INTO reponse (Id_R, description ) 
                           VALUES (:Id_R, :description)");
  $query->bindValue(':Id_R', $Id_R);
  $query->bindValue(':description', $description);
  
  $query->execute();

  // Success message (optional)
 // echo 'Response added successfully!';
 header('Location:../View/Listrep.php');  
} catch (PDOException $e) {
  echo 'error ' . $e->getMessage(); 
}

?>
