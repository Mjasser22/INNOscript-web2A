<?php

require 'connect.php';

class VoyageController {

    private $tab_name;

    public function __construct($tab_name){
        $this->tab_name = $tab_name;
    }

    public function getVoyage($id)
    {
        $sql = "SELECT * FROM $this->tab_name WHERE id = $id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute();
            $voyage = $query->fetch();
            return $voyage;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function listVoyages()
    {
        $sql = "SELECT * FROM $this->tab_name";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listVoyagesCon($f)
    {
        $sql = "SELECT * FROM $this->tab_name WHERE $f = id_category";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addVoyage($voyage)
    {
        $sql = "INSERT INTO $this->tab_name (titre, description, Country, price, population, continent, path_image,id_category) VALUES (:titre, :description, :Country, :price, :population, :continent, :path_image, :category)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre' => $voyage->getTitre(),
                'description' => $voyage->getDescription(),
                'Country' => $voyage->getCountry(),
                'price' => $voyage->getPrice(),
                'population' => $voyage->getPopulation(),
                'continent' => $voyage->getContinent(),
                'path_image' => $voyage->getPathImage(),
                'category' => $voyage->getCategory()
            ]);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateVoyage($voyage, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare("UPDATE $this->tab_name SET titre = :titre, description = :description, Country = :Country, price = :price, population = :population, continent = :continent, path_image = :path_image,id_category = :category WHERE id = :id");
            $query->execute([
                'id' => $id,
                'titre' => $voyage->getTitre(),
                'description' => $voyage->getDescription(),
                'Country' => $voyage->getCountry(),
                'price' => $voyage->getPrice(),
                'population' => $voyage->getPopulation(),
                'continent' => $voyage->getContinent(),
                'path_image' => $voyage->getPathImage(),
                'category' => $voyage->getCategory()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function deleteVoyage($id)
    {
        $sql = "DELETE FROM $this->tab_name WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

}

?>
