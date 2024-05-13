<?php
include '../Controller/categoryCon.php';
require_once 'category.php'; 

$categoryController = new CategoryController("category");
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    // Check if all required fields are filled
    if (
        !empty($_POST["name"])
    ) {
        try {
            // Create new Voyage object with provided ID
            $category = new Category(
                $_POST['id'],
                $_POST["name"]
            );

            // Update the voyage in the database
            $categoryController->updateCategory($category, $_POST['id']);
            // Redirect on successful update
            header('Location:../View/admin/pages/forms/cath_table.php?result=1');  
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
    $category = $categoryController->getCategory($current_id);
    if (!$category) {
        $error = 'No voyage found with ID: ' . htmlspecialchars($current_id);
    }
}

if (!empty($error)) {
    // Redirect or display the error message if an error occurred
    header('Location: ../View/admin/pages/forms/category_table.php?result=4&error=' . urlencode($error));
    exit;
}
?>
