<?php
require_once '../config.php';

class emploi
{
    public int $ID_Emploi;
    public string $specialite;
    public string $pieceidentite;
    public int $numero;
    public string $Email;
    public string $disponibilite;
    public string $password;
    public string $genre;
    public int $ID_transport;
    
    public function read_all_emploi()
    {
        try {
            $pdo = config::getConnexion();

            if (!$pdo) {
                throw new Exception("Failed to connect to the database.");
            }
            $query = $pdo->prepare("SELECT * FROM EMPLOI");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die('PDO Error: ' . $e->getMessage());
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function read_emploi_by_id($ID_Emploi) 
    {
        try {
            $pdo = config::getConnexion();
            if (!$pdo) {
                throw new Exception("Failed to connect to the database.");
            }
            $query = $pdo->prepare("SELECT * FROM  EMPLOI where ID_emploi = :id");
            $query->bindParam(':id', $ID_Emploi);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die('PDO Error: ' . $e->getMessage());
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function create_emploi($ID_Emploi, $specialite, $pieceidentite, $numero, $Email, $disponibilite, $password, $genre, $ID_transport)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('
                INSERT INTO EMPLOI (ID_Emploi, specialite, pieceidentite, numero, Email, disponibilite, password, genre, ID_transport)
                VALUES (:ID_Emploi, :specialite, :pieceidentite, :numero, :Email, :disponibilite, :password, :genre, :ID_transport)
            ');
            $query->bindParam(':ID_Emploi', $ID_Emploi);
            $query->bindParam(':specialite', $specialite);
            $query->bindParam(':pieceidentite', $pieceidentite); 
            $query->bindParam(':numero', $numero);
            $query->bindParam(':Email', $Email);
            $query->bindParam(':disponibilite', $disponibilite);
            $query->bindParam(':password', $password);
            $query->bindParam(':genre', $genre);
            $query->bindParam(':ID_transport', $ID_transport);
            
    
            $query->execute();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }    
    public function delete_emploi($ID_Emploi)
    {
        $pdo = config::getConnexion();
        try {
            echo 'pass';
            $query = $pdo->prepare('DELETE FROM EMPLOI where ID_Emploi = :id');
            $query->bindParam(':id', $ID_Emploi);
            $query->execute();
            echo $query->rowCount() . ' deleted successfully';
        } catch (PDOException $e) {
            echo 'error' . $e->getMessage();
        }
    }
    public function update_emploi($ID_Emploi, $specialite, $pieceidentite, $numero, $Email, $disponibilite, $password, $genre)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare("UPDATE EMPLOI SET specialite = :specialite, pieceidentite = :pieceidentite, numero = :numero, Email = :Email, disponibilite = :disponibilite, password = :password, genre = :genre WHERE ID_Emploi = :ID_Emploi");
            $query->bindParam(':ID_Emploi', $ID_Emploi);
            $query->bindParam(':specialite', $specialite);
            $query->bindParam(':pieceidentite', $pieceidentite); 
            $query->bindParam(':numero', $numero);
            $query->bindParam(':Email', $Email);
            $query->bindParam(':disponibilite', $disponibilite);
            $query->bindParam(':password', $password);
            $query->bindParam(':genre', $genre);
            $query->execute(); // Execute the query
            echo $query->rowCount() . " updated successfully!";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
}
?>