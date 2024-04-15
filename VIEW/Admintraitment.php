<?php
require_once '../config.php';
require_once '../Controller/userC.php';
require_once '../Model/user.php';
$employeC = new userC();
$id=$_GET["id"];
echo'<script>alert("Do you want to delete this user ' . $id . '")</script>';
$employeC->deleteUser($id);

?>
<script>
    window.location.href ="liste_employe.php"
</script>


