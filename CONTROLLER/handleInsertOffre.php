<?php
include_once('../model/offre.php');
$ID_employe = $_POST['ID_employe'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$numTel= $_POST['numTel'];
$adresse= $_POST['adresse'];
$date_debut= $_POST['date_debut'];
$date_fin= $_POST['date_fin'];
$email= $_POST['email'];  
$new_employe = new employe(); 
$new_employe->create_employe($ID_employe, $nom, $prenom,$age ,$numTel, $adresse,$date_debut,$date_fin,$email);
header('Location: ../view/index.html'); 
?>