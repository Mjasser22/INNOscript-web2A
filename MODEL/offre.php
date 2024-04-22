<?php
include_once("../connexion.php");
class employe
{
    public int $ID_employe;
    public string $nom;
    public string $prenom;
    public string $age;
    public string $numTel;
    public string $adresse;
    public string $date_debut;
    public string $date_fin;
    public string $email ; 
    public string $ID_transport ; 
    public function read_all_employe()
    {
        try {
            $pdo = connexion::getConnexion();

            if (!$pdo) {
                throw new Exception("Failed to connect to the database.");
            }
            $query = $pdo->prepare("SELECT * FROM EMPLOYE ");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die('PDO Error: ' . $e->getMessage());
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function read_employe_by_id($ID_employe) 
    {
        try {
            $pdo = connexion::getConnexion();
            if (!$pdo) {
                throw new Exception("Failed to connect to the database.");
            }
            $query = $pdo->prepare("SELECT * FROM  EMPLOYE where ID_employe = :id");
            $query->bindParam(':id', $ID_employe);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die('PDO Error: ' . $e->getMessage());
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function create_employe($ID_employe, $nom, $prenom, $age, $numTel, $adresse, $date_debut, $date_fin, $email)
    {
        $pdo = connexion::getConnexion();
        try {
            $query = $pdo->prepare('
                INSERT INTO EMPLOYE (ID_employe, nom, prenom, age, numTel, adresse, date_debut, date_fin, email)
                VALUES (:ID_employe, :nom, :prenom, :age, :numTel, :adresse, :date_debut, :date_fin, :email)
            ');
            $query->bindParam(':ID_employe', $ID_employe);
            $query->bindParam(':nom', $nom);
            $query->bindParam(':prenom', $prenom); 
            $query->bindParam(':age', $age);
            $query->bindParam(':numTel', $numTel);
            $query->bindParam(':adresse', $adresse);
            $query->bindParam(':date_debut', $date_debut);
            $query->bindParam(':date_fin', $date_fin);
            $query->bindParam(':email', $email);
    
            $query->execute();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }    
    public function delete_employe($ID_Employe)
    {
        $pdo = connexion::getConnexion();
        try {
            echo 'pass';
            $query = $pdo->prepare('DELETE FROM EMPLOYE where ID_employe = :id');
            $query->bindParam(':id', $ID_Employe);
            $query->execute();
            echo $query->rowCount() . ' deleted successfully';
        } catch (PDOException $e) {
            echo 'error' . $e->getMessage();
        }
    }
    public function update_Employe($ID_employe, $nom, $prenom, $age, $numTel, $adresse, $date_debut, $date_fin, $email)
    {
        $pdo = connexion::getConnexion();
        try {
            $query = $pdo->prepare("UPDATE EMPLOYE SET nom = :nom, prenom = :prenom, age = :age, numTel = :numTel, adresse = :adresse, date_debut = :date_debut, date_fin = :date_fin, email = :email WHERE ID_employe = :ID_employe");
            $query->bindParam(':ID_employe', $ID_employe);
            $query->bindParam(':nom', $nom);
            $query->bindParam(':prenom', $prenom); // Bind prenom here
            $query->bindParam(':age', $age);
            $query->bindParam(':numTel', $numTel);
            $query->bindParam(':adresse', $adresse);
            $query->bindParam(':date_debut', $date_debut);
            $query->bindParam(':date_fin', $date_fin);
            $query->bindParam(':email', $email);
            $query->execute(); // Execute the query
            echo $query->rowCount() . " updated successfully!";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
}
?>