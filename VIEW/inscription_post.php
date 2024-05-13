<?php 
require_once "../connexion.php";

$pdo = connexion::getConnexion();
        try {
            $query = $pdo->prepare('
                INSERT INTO EMPLOI (ID_Emploi, specialite, pieceidentite, numero, Email, disponibilite, password, genre)
                VALUES (:ID_Emploi, :specialite, :pieceidentite, :numero, :Email, :disponibilite, :password, :genre)
            ');
            $query->bindParam(':ID_Emploi', $ID_Emploi);
            $query->bindParam(':specialite', $specialite);
            $query->bindParam(':pieceidentite', $pieceidentite); 
            $query->bindParam(':numero', $numero);
            $query->bindParam(':Email', $Email);
            $query->bindParam(':disponibilite', $disponibilite);
            $query->bindParam(':password', $password);
            $query->bindParam(':genre', $genre);
            
    
            $query->execute();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }

?>