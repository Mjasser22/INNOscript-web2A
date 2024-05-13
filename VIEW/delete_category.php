<?php
include 'category.php';  
include '../Controller/categoryCon.php';  

$categoryC = new CategoryController("category");
if (isset($_POST['id'])) {
    $current_id = $_POST['id'];
    
    $categoryC->deleteCategory($current_id);
    
    header('Location:../View/liste_employe.php');  
    exit;  
}
?>
