<?php

include_once __DIR__ . '/../config.php';
include_once __DIR__ . '/../Model/Review.php';

class ReviewC
{
    public function listReviews()
    {
        $sql = "SELECT * FROM reviews";
        $db = Config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function getAverageRatingByHebergementId($id_hebergement)
    {
        $sql = "SELECT AVG(review) AS average_rating FROM reviews WHERE id_hebergement = :id_hebergement";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id_hebergement' => $id_hebergement]);

            $result = $query->fetch(PDO::FETCH_ASSOC);

            if ($result && isset($result['average_rating'])) {
                return $result['average_rating'];
            } else {
                return null; // No reviews found for this hebergement
            }
            
            //return $result['average_rating'];
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function deleteReview($id)
    {
        $sql = "DELETE FROM reviews WHERE id = :id";
        $db = Config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function addReview(Review $review)
    {
        $sql = "INSERT INTO reviews (id_hebergement, review)  
                VALUES (:id_hebergement, :review)";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_hebergement' => $review->getIdHebergement(),
                'review' => $review->getReview()
            ]);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function getReviewById($id)
    {
        $sql = "SELECT * FROM reviews WHERE id = :id";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id]);

            $review = $query->fetch();
            return $review;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
