<?php
include '../../controller/categorieC.php';
$categorieC = new categorieC();
$categorieC->deletecat($_GET["id"]);
header('Location:listcat.php');
