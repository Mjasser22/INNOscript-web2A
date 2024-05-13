<?php
include '../config.php';
include '../Model/rep.php';


class repR
{
    public function listrep()
    {
        $sql = "SELECT * FROM reponse";
        $db = Config::getConnexion(); // Assuming 'Config' is the correct class name for your database configuration
        try {
            $liste = $db->query($sql);
            return $liste->fetchAll(); // Fetch all rows from the result set
        } catch (PDOException $e) { // Catch PDOException
            die('Error:' . $e->getMessage());
        }
    }

    function deleterep($Id_Rep)
    {
        $sql = "DELETE FROM reponse WHERE Id_Rep = :Id_Rep";
        $db = Config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':Id_Rep', $Id_Rep);

        try {
            $req->execute();
        } catch (PDOException $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addrep($Reponse)
    {
        $sql = "INSERT INTO reponse (description, eval)  
                VALUES (:description, :s)";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'description' => $Reponse->getdescription(),
                's' => $Reponse->geteval(),
            ]);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updaterep($description, $eval, $Id_Rep)
    {
        try {
            $db = Config::getConnexion();
            $query = $db->prepare(
                'UPDATE reponse SET 
                    description = :description, 
                    eval = :eval
                WHERE Id_Rep = :Id_Rep'
            );
            $query->execute([
                'description' => $description, // Utiliser $description au lieu de $Reponse
                'eval' => $eval,
                'Id_Rep' => $Id_Rep
            ]);
            echo $query->rowCount() . " records UPDATED successfully ";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showrep($Id_Rep)
    {
        $sql = "SELECT * FROM reponse WHERE Id_Rep = :Id_Rep";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['Id_Rep' => $Id_Rep]);
            $Reponse = $query->fetch();
            return $Reponse;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function afficheReclamation($Id_Rep)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM reclamation WHERE Id_R = :Id_R"); // Assurez-vous que reponse_id est la clé étrangère vers la table "reponse"
            $query->execute(['Id_R' => $Id_Rep]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function afficheReponse()
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM reponse");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



}
