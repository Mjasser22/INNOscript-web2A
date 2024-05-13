<?php
include '../Controller/voyageCon.php';
require_once 'voyage.php'; 

$voyageController = new VoyageController("voyage");
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    // Check if all required fields are filled
    if (
        !empty($_POST["titre"]) && !empty($_POST["description"]) &&
        !empty($_POST["country"]) && !empty($_POST["price"]) &&
        !empty($_POST["population"]) && !empty($_POST["continent"]) &&
        !empty($_POST["path_image"]) && !empty($_POST["category"])
    ) {
        try {
            // Create new Voyage object with provided ID
            $voyage = new Voyage(
                $_POST['id'],
                $_POST["titre"],
                $_POST["description"],
                $_POST["country"],
                $_POST["price"],
                $_POST["population"],
                $_POST["continent"],
                $_POST["path_image"],
                $_POST["category"]
            );

            // Update the voyage in the database
            $voyageController->updateVoyage($voyage, $_POST['id']);
            // Redirect on successful update
            header('Location:../View/admin/pages/tables/table_voy.php?result=1');  
            exit;
        } catch (Exception $e) {
            // Handle any exceptions during database operations
            $error = 'Error updating voyage: ' . $e->getMessage();
        }
    } else {
        // Not all fields were filled
        $error = 'Please fill in all required fields.';
    }
} elseif (isset($_GET['id'])) {
    // If only ID is provided via GET, fetch the voyage to display
    $current_id = $_GET['id'];
    $voyage = $voyageController->getVoyage($current_id);
    if (!$voyage) {
        $error = 'No voyage found with ID: ' . htmlspecialchars($current_id);
    }
}

if (!empty($error)) {
    // Redirect or display the error message if an error occurred
    header('Location: ../View/index.php?result=4&error=' . urlencode($error));
    exit;
}
?>
