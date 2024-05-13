<?php
include_once('../model/offre.php');
$ID_Emploi = $_POST['ID_Emploi'];
$specialite = $_POST['specialite'];
$pieceidentite = $_POST['pieceidentite'];
$numero = $_POST['numero'];
$Email= $_POST['Email'];
$disponibilite= $_POST['disponibilite'];
$password= $_POST['password'];
$genre= $_POST['genre']; 

var_dump($ID_Emploi, $specialite, $pieceidentite, $numero, $Email, $disponibilite, $password, $genre);
$new_emploi = new emploi();
$new_emploi->update_emploi($ID_Emploi, $specialite, $pieceidentite, $numero, $Email, $disponibilite, $password, $genre);
header('Location: ../view/listOffre.php');  
?>
    