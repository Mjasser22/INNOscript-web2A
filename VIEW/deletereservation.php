<?php
include '../CONTROLLER/reservationC.php';
$r=new ReservationC();
// Instanciation du contrôleur de réservation
$ReservationC = new ReservationC();

// Appel de la méthode pour supprimer une réservation en utilisant l'identifiant passé en paramètre GET
$ReservationC->deletereservation($_GET['id']);

// Redirection vers la liste des réservations après la suppression
header('Location: listreservation.php');
