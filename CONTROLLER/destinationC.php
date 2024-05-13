<?php
include '../config.php';
include '../Model/destination.php';

class DestinationC
{
    const ERROR_FETCHING_DESTINATIONS = "Error fetching destinations";
    const ERROR_DELETING_DESTINATION = "Error deleting destination";
    const ERROR_ADDING_DESTINATION = "Error adding destination";
    const ERROR_UPDATING_DESTINATION = "Error updating destination";
    const ERROR_FETCHING_DESTINATION = "Error fetching destination";

    // Récupérer la liste des destinations
    public function listDestinations()
    {
        $sql = "SELECT * FROM destination";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer l'erreur SQL de manière appropriée
            return self::ERROR_FETCHING_DESTINATIONS;
        }
    }

    // Supprimer une destination
    function deleteDestination($id)
    {
        $sql = "DELETE FROM destination WHERE id = :id";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();
        } catch (PDOException $e) {
            // Gérer l'erreur SQL de manière appropriée
            return self::ERROR_DELETING_DESTINATION;
        }
    }

    // Ajouter une nouvelle destination
   
function addDestination($destination)
{
    $sql = "INSERT INTO Destination  
    VALUES (NULL, :name, :description, :country, :city, :region, :availability, :price)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'name' => $destination->getName(),
            'description' => $destination->getDescription(),
            'country' => $destination->getCountry(),
            'city' => $destination->getCity(),
            'region' => $destination->getRegion(),
            'availability' => $destination->getAvailability(),
            'price' => $destination->getPrice(),
            
        ]);
    } catch (PDOException $e) {
        // Gérer l'erreur SQL de manière appropriée
        return self::ERROR_ADDING_DESTINATION;
    }
}


    // Mettre à jour une destination existante
    function updateDestination($id, $description, $price) {
        // Database configuration
        $servername = "localhost";
        $username = "root"; // Replace with your MySQL username
        $password = ""; // Replace with your MySQL password
        $dbname = "user";

        try {
            // Create connection
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare SQL statement
            $stmt = $conn->prepare("UPDATE destination 
                                    SET description = :description, price = :price 
                                    WHERE id = :id");

            // Bind parameters
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);

            // Execute the query
            $stmt->execute();
        } catch (PDOException $e) {
            // Handle database errors
            echo "Error: " . $e->getMessage();
        }

        // Close connection
        $conn = null;
    }

    // Afficher les détails d'une destination
    function showDestination($id)
    {
        $sql = "SELECT * from Destination where id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();

            $destination = $query->fetch();
            return $destination;
        } catch (PDOException $e) {
            // Gérer l'erreur SQL de manière appropriée
            return self::ERROR_FETCHING_DESTINATION;
        }
    }

    
}
?>
