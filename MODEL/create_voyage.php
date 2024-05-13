<?php
include '../Controller/voyageCon.php';  
require_once 'voyage.php';  

$voyageController = new VoyageController("voyage");
$error = '';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate input fields
    if (
        !empty($_POST["titre"]) && !empty($_POST["description"]) &&
        !empty($_POST["country"]) && !empty($_POST["price"]) &&
        !empty($_POST["population"]) && !empty($_POST["continent"]) &&
        !empty($_POST["path_image"]) && !empty($_POST["category"])
    ) {
        try {
            // Create new Voyage object
            $voyage = new Voyage(
                '',  // Assuming ID is auto-incremented
                $_POST["titre"],
                $_POST["description"],
                $_POST["country"],
                $_POST["price"],
                $_POST["population"],
                $_POST["continent"],
                $_POST["path_image"],
                $_POST["category"]
            );

            // Add voyage to the database
            $voyageController->addVoyage($voyage);
            // Redirect on success
            header('Location: ../View/liste_employe.php');
            exit;
        } catch (Exception $e) {
            // Handle any exceptions during database operations
            $error = 'Error adding voyage: ' . $e->getMessage();
        }
    } else {
        // Not all fields were filled
        $error = 'Please fill in all required fields.';
    }
} else {
    // Form not submitted
    $error = 'Please submit the form.';
}

if (!empty($error)) {
    // Redirect or display the error message
    header('Location: ../View/liste_employe.php' . urlencode($error));
    exit;
}
?>
