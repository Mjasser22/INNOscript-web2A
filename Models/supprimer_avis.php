<?php
require_once '../config.php';
require_once '../Controller/CommentaireC.php';
require_once '../Model/Commentaire.php';
$employeC = new CommentaireC();
$id=$_GET["id_comment"];
echo'<script>alert("Do you want to delete this Avis ' . $id . '")</script>';
$employeC->deletecOMMENT($id);

?>
<script>
    window.location.href ="liste_avis.php";
</script>


