<?php
include_once '../Controller/repR.php';

$repR= new repR();

if (isset($_POST['Id_Rep']) && isset($_POST['search'])) {
    $Id_Rep = $_POST['Id_Rep'];
    $list = $repR->afficheReclamation($Id_Rep); // Using repC here (should be repR)
  }
  
}
$rep = $recC->afficheReponse();
?>

<!DOCTYPE html>
<head>
     ><title>recherche reclamation</title>
</head>
<body>
    <h1>Recherche d'e reclamation d'id reponse:</label>
    <select name="reponse" id ="reponse">
        ?>