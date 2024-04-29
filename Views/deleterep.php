<?php
include '../Controller/repR.php';
$repR = new repR();
if(isset($_GET['Id_Rep'])) { // Check if Id_Rep is set in the GET request
    $Id_Rep = $_GET['Id_Rep'];
    $repR->deleterep($Id_Rep);
}
header('Location: Listrep.php');

?>
