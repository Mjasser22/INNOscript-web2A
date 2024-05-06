<?php
// Include necessary files
include_once './../../config.php'; // Assuming this includes your database configuration

// Function to get average rating by id_hebergement
function getAverageRatingByIdHebergement($id_hebergement)
{
    $db = config::getConnexion(); // Assuming this is your database connection method

    // SQL query to calculate average rating
    $sql = "SELECT AVG(review) AS average_rating FROM reviews WHERE id_hebergement = :id_hebergement";

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_hebergement', $id_hebergement);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && isset($result['average_rating'])) {
            return $result['average_rating'];
        } else {
            return null; // No reviews found for this hebergement
        }
    } catch (PDOException $e) {
        die('Error fetching average rating: ' . $e->getMessage());
    }
}

// Specify the id_hebergement for which you want to retrieve the average rating
$id_hebergement = 3;

// Get average rating for the specified id_hebergement
$averageRating = getAverageRatingByIdHebergement($id_hebergement);

// Echo the average rating
echo 'Average Rating for id_hebergement ' . $id_hebergement . ': ' . $averageRating;
?>
