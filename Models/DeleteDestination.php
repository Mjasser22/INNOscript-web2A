<?php
include '../CONTROLLER/destinationC.php'; // Assurez-vous que le chemin du contrôleur DestinationC.php est correct
$destinationC = new DestinationC(); // Utilisez la classe DestinationC

// Utilisez la méthode deleteDestination avec l'ID récupéré de la requête GET
$destinationC->deleteDestination($_GET['id']);

// Redirigez vers la page où vous voulez afficher la liste des destinations
 header('Location: ListDestination.php');
?>
