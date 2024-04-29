<?php
include '../config.php';
include '../Models/rec.php';

class recC
{
    public function listrec()
    {
        $sql = "SELECT * FROM Reclamation";
        $db = Config::getConnexion(); // Assuming 'Config' is the correct class name for your database configuration
        try {
            $liste = $db->query($sql);
            return $liste->fetchAll(); // Fetch all rows from the result set
        } catch (PDOException $e) { // Catch PDOException
            die('Error:' . $e->getMessage());
        }
    }

 

    function deleterec($Id_R)
    {
        $sql = "DELETE FROM reclamation WHERE Id_R = :Id_R";
        $db = Config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':Id_R', $Id_R);

        try {
            $req->execute();
        } catch (PDOException $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addrec($Reclamation)
    {
        $sql = "INSERT INTO reclamation (Id_R, Id_E, Id_U, descrip)  
                VALUES (:Id_R, :Id_E, :Id_U, :descrip)";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'Id_R' => $Reclamation->getId_R(),
                'Id_E' => $Reclamation->getId_E(),
                'Id_U' => $Reclamation->getId_U(),
                'descrip' => $Reclamation->getdescrip()
            ]);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updaterec($Reclamation, $Id_R)
    {
        try {
            $db = Config::getConnexion();
            $query = $db->prepare(
                'UPDATE Reclamation SET 
                    Id_R = :Id_R, 
                    Id_E = :Id_E, 
                    Id_U = :Id_U, 
                    descrip = :descrip
                WHERE Id_R = :Id_R'
            );
            $query->execute([
                'Id_R' => $Reclamation->getId_R(),
                'Id_E' => $Reclamation->getId_E(),
                'Id_U' => $Reclamation->getId_U(),
                'descrip' => $Reclamation->getdescrip(),
                'Id_R' => $Id_R
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showrec($Id_R)
    {
        $sql = "SELECT * FROM Reclamation WHERE Id_R = :Id_R";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['Id_R' => $Id_R]);
            $Reclamation = $query->fetch();
            return $Reclamation;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function afficheReclamation()
{
    try {
        $pdo = Config::getConnexion(); // Assurez-vous que Config est la bonne classe pour la connexion à la base de données
        $query = $pdo->prepare("SELECT * FROM reclamation"); // Remplacez "reponse" par le nom de votre table de réponses
        $query->execute();
        return $query->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
}
