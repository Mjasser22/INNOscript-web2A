<?php
include_once __DIR__ . '/../config.php';

include __DIR__ . '/../Model/Hebergement.php';

class HebergementC
{
    public function listHebergements()
    {
        $sql = "SELECT * FROM hebergement";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteHebergement($id)
    {
        $sql = "DELETE FROM hebergement WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addHebergement($hebergement)
    {
        $sql = "INSERT INTO hebergement  
        VALUES (NULL, :nom, :prix, :ville, :adresse, :id_categorie)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $hebergement->getNom(),
                'prix' => $hebergement->getPrix(),
                'ville' => $hebergement->getVille(),
                'adresse' => $hebergement->getAdresse(),
                'id_categorie' => $hebergement->getIdCategorie()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateHebergement($hebergement, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE hebergement SET 
                    nom = :nom, 
                    prix = :prix, 
                    ville = :ville, 
                    adresse = :adresse,
                    id_categorie = :id_categorie
                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'nom' => $hebergement->getNom(),
                'prix' => $hebergement->getPrix(),
                'ville' => $hebergement->getVille(),
                'adresse' => $hebergement->getAdresse(),
                'id_categorie' => $hebergement->getIdCategorie()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showHebergement($id)
    {
        $sql = "SELECT * from hebergement where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $hebergement = $query->fetch();
            return $hebergement;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function getCategoryLibelle($id_categorie)
    {

        $sql = "SELECT libelle FROM categorie WHERE id = :id";
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id', $id_categorie);
            $query->execute();
    
            $result = $query->fetch(PDO::FETCH_ASSOC);
    
            return $result['libelle'];
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
}
?>
