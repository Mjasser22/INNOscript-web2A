<?php


require_once '../config.php';

$pdo = config::getConnexion();
$Id_R=$_POST['Id_R'];
$Id_E = $_POST[ 'Id_E' ];
$Id_U = $_POST[ 'Id_U' ];
$descrip = $_POST[ 'descrip' ];


try {
    $query = $pdo->prepare( "INSERT INTO reclamation 
    VALUES (:Id_R, :Id_E,:Id_U, :descrip)" );
    $query->bindValue( ':Id_R', $Id_R);
    $query->bindValue( ':Id_E', $Id_E );
    $query->bindValue( ':Id_U', $Id_U );
    $query->bindValue( ':descrip', $descrip );
    $query->execute();
    header('Location:../View/confirmation.php');  
} catch ( PDOException $e ) {
    echo 'error '. $e->getMessage();
}

?>