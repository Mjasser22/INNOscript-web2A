<?php
include_once './../../config.php';
include_once './../../Model/Review.php';
include_once './../../Controller/ReviewC.php';

// Check if data is received via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from POST request
    $idHebergement = $_POST['id_hebergement'];
    $reviewContent = $_POST['review'];

    // Create a new Review object
    $review = new Review(null, $idHebergement, $reviewContent);

    // Instantiate ReviewC controller
    $reviewC = new ReviewC();

    // Add review to the database
    $reviewC->addReview($review);
    
    // Return success message (optional)
    echo 'Review added successfully!';
}
?>
