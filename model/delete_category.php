<?php
include 'category.php';  
include '../Controller/categoryCon.php';  

$categoryC = new CategoryController("category");
if (isset($_POST['id'])) {
    $current_id = $_POST['id'];
    
    $categoryC->deleteCategory($current_id);
    
    header('Location:../View/admin/pages/tables/table_cath.php?result=1');  
    exit;  
}
?>
