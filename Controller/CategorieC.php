<?php

include_once __DIR__ . '/../config.php';

include_once '../../model/categorie.php';
include_once '../../model/hebergement.php';

class categorieC
{
    public function listcat()
    {
        $sql = "SELECT * FROM categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletecat($id)
    {
        $sql = "DELETE FROM categorie WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addcat($categorie)
    {
        $sql = "INSERT INTO categorie  
        VALUES (NULL, :l)";
        $db = config::getConnexion();
        try {
          
            $query = $db->prepare($sql);
            $query->execute([
                'l' => $categorie->getlibelle(),
        
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updatecat($categorie, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE categorie SET 
                    libelle = :libelle

                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'libelle' => $categorie->getlibelle(),

            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    function getCategoriesWithHebergementCounts()
    {
        $sql = "SELECT c.id, c.libelle, COUNT(h.id) AS hebergement_count FROM categorie c LEFT JOIN hebergement h ON c.id = h.id_categorie GROUP BY c.id, c.libelle";

        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            return $query->fetchAll();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return [];
        }
    }

    function showcat($id)
    {
        $sql = "SELECT * from categorie where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $categorie = $query->fetch();
            return $categorie;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
