<?php
include '../controller/heberC.php';

$heberC = new heberC();
$heberC->deleteheber($_GET["id"]);
header('Location:listheber.php');
