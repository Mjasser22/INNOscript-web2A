<?php

require_once '../Controller/repR.php'; // Include the repR class



$Id_Rep = $_POST['Id_Rep'];
$Id_R = $_POST['Id_R'];
$description = $_POST['description'];
$eval = $_POST['eval'];

$repR = new repR(); // Create an instance of the repR class
$repR->updaterep($description,$eval,$Id_Rep);
header('Location:../Views/Listrep.php');
// try {
//   $repR->updaterep($description,$eval,$Id_Rep);
//   header('Location:../Views/Listrep.php'); // Redirect on success
// } catch (PDOException $e) {
//   echo 'error ' . $e->getMessage(); // Handle errors
// }

?>
