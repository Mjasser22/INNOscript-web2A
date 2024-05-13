<?php
include 'voyage.php';  
include '../Controller/voyageCon.php';  

$voyageC = new voyageController("voyage");
echo 'mohamed';
if (isset($_POST['id'])) {
    $current_id = $_POST['id'];
    
    $voyageC->deleteVoyage($current_id);
    
    header('Location:../View/admin/pages/tables/table_voy.php?result=1');  
    exit;  
}
?>
