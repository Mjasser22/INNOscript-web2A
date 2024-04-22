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
    public function read_employer_by_transport_id($ID_transport) 
    {
        try {
            $pdo = connexion::getConnexion();
            if (!$pdo) {
                throw new Exception("Failed to connect to the database.");
            }
            $query = $pdo->prepare("SELECT * FROM EMPLOYE where ID_transport = :id");
            $query->bindParam(':id', $ID_transport);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die('PDO Error: ' . $e->getMessage());
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    } 
}
?>