<?php
include '../Controller/categoryCon.php';  
require_once 'category.php';  

$categorycontroller = new CategoryController("category");
$error = '';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate input fields
    if (
        !empty($_POST["name"]) 
    ) {
        try {
            // Create new Voyage object
            $category = new Category(
                '',  // Assuming ID is auto-incremented
                $_POST["name"]
            );

            // Add voyage to the database
            $categorycontroller->addCategory($category);
            // Redirect on success
            header('Location: ../View/admin/pages/forms/add_cat.php?result=1');
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
    header('Location: ../View/admin/pages/forms/category_table.php?result=4&error=' . urlencode($error));
    exit;
}
?>
