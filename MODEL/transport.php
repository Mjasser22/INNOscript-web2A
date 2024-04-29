<?php
include_once("../connexion.php");
class transport
{
    public int $ID_transport;
    public string $type;
    public string $matricule;
    public string $date_debut;
    public function read_all_transport()
    {
        try {
            $pdo = connexion::getConnexion();

            if (!$pdo) {
                throw new Exception("Failed to connect to the database.");
            }
            $query = $pdo->prepare("SELECT * FROM TRANSPORT ");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die('PDO Error: ' . $e->getMessage());
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function read_emploi_by_transport_id($ID_Emploi) 
    {
        try {
            $pdo = connexion::getConnexion();
            if (!$pdo) {
                throw new Exception("Failed to connect to the database.");
            }
            $query = $pdo->prepare("SELECT emploi.ID_transport, transport.* 
            FROM emploi 
            JOIN transport ON emploi.ID_transport = transport.ID_transport 
            WHERE emploi.ID_Emploi = :id AND transport.ID_transport = :id_tr;
             ");
            $query->bindParam(':id', $ID_Emploi);
            $query->bindParam(':id_tr', $ID_transport);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die('PDO Error: ' . $e->getMessage());
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    } 
    public function read_transport_by_id($ID_transport) 
    {
        try {
            $pdo = connexion::getConnexion();
            if (!$pdo) {
                throw new Exception("Failed to connect to the database.");
            }
            $query = $pdo->prepare("SELECT * FROM  transport where ID_transport = :id");
            $query->bindParam(':id', $ID_transport);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die('PDO Error: ' . $e->getMessage());
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function create_transport($ID_transport,$type,$matricule,$date_debut){
        $pdo = connexion::getConnexion();
        try {
            $query = $pdo->prepare('INSERT INTO `transport`(`ID_transport`, `type`, `matricule`, `date_debut`) VALUES (:ID_transport, :type, :matricule, :date_debut)');
            $query->bindParam(':ID_transport', $ID_transport);
            $query->bindParam(':type', $type);
            $query->bindParam(':matricule', $matricule); 
            $query->bindParam(':date_debut', $date_debut);
            
            $query->execute();
            
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    public function update_transport($ID_transport, $type, $matricule, $date_debut)
    {
        $pdo = connexion::getConnexion();
        try {
            $query = $pdo->prepare("UPDATE TRANSPORT SET type  = :type, matricule = :matricule, date_debut = :date_debut WHERE ID_transport = :ID_transport");
            $query->bindParam(':ID_transport', $ID_transport);
            $query->bindParam(':type', $type);
            $query->bindParam(':matricule', $matricule);
            $query->bindParam(':date_debut', $date_debut);
            $query->bindParam(':ID_transport', $ID_transport);
            $query->execute(); // Execute the query
            echo $query->rowCount() . " updated successfully!";

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function delete_transport($ID_transport)
    {
        $pdo = connexion::getConnexion();
        try {
            $query = $pdo->prepare("DELETE FROM `transport` WHERE `ID_transport` = :ID_transport");
            $query->bindParam(':ID_transport', $ID_transport);
            $query->execute(); // Execute the query
            echo $query->rowCount() . " row(s) deleted successfully!";
            

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

}



?>