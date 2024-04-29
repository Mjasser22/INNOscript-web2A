<!-- 
include '../Controller/recC.php';
$recC = new recC();
if(isset($_GET['Id_R'])) { // Check if Id_R is set in the GET request
    $Id_R = $_GET['Id_R'];
    $recC->deleterec($Id_R);
}
header('Location: Listrec.php');

-->

<?php
include '../Controller/recC.php';
$recC = new recC();
if(isset($_GET['Id_R'])) { // Check if Id_R is set in the GET request
    $Id_R = $_GET['Id_R'];
    $recC->deleterec($Id_R);
}
header('Location: Listrec.php');

?>
