<?php
include_once('../model/offre.php');
$id_tr = $_POST['ID_transport'];
$ID_Emploi = $_POST['ID_Emploi'];
$specialite = $_POST['specialite'];
$pieceidentite = $_POST['pieceidentite'];
$numero = $_POST['numero'];
$Email= $_POST['Email'];
$disponibilite= $_POST['disponibilite'];
$password= $_POST['password'];
$genre= $_POST['genre'];  
$new_emploi = new emploi(); 
$new_emploi->create_emploi($ID_Emploi, $specialite, $pieceidentite, $numero, $Email, $disponibilite, $password, $genre, $id_tr);
header('Location: ../view/indexEmploi.html'); 
?>