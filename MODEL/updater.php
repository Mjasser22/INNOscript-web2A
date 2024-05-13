<?php

require_once '../Controller/repR.php'; // Include the repR class

// Vérifiez si les données POST sont définies avant de les utiliser
if(isset($_POST['Id_Rep'], $_POST['Id_R'], $_POST['description'], $_POST['eval'])) {
    $Id_Rep = $_POST['Id_Rep'];
    $Id_R = $_POST['Id_R'];
    $description = $_POST['description'];
    $eval = $_POST['eval'];

    // Vérifiez que les valeurs récupérées sont valides (par exemple, que les identifiants sont des entiers)
    if(is_numeric($Id_Rep) && is_numeric($Id_R)) {
        $repR = new repR(); // Create an instance of the repR class

        // Appelez la méthode updaterep() pour mettre à jour la réponse
        $repR->updaterep($Id_Rep,$Id_R, $description, $eval );
          
        // Redirigez vers la page Listrep.php après la mise à jour
        header('Location:../View/Listrep.php');
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        echo "Invalid ID provided."; // Gestion des identifiants invalides
    }
} else {
    echo "Missing POST data."; // Gestion des données POST manquantes
}

?>
