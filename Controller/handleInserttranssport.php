<?php
include_once('../model/transport.php');
$ID_transport = $_POST['ID_transport'];
$type = $_POST['type'];
$matricule = $_POST['matricule'];
$date_debut = $_POST['date_debut'];
$new_transport = new transport(); 
$new_transport->create_transport($ID_transport,$type,$matricule,$date_debut);
header('Location: ../view/indexEmploi.html'); 
?>