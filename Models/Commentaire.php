<?php
require_once '../config.php';
require_once '../Controller/CommentaireC.php';
require_once '../Model/Commentaire.php';

$commentc = new CommentaireC();
$id = $_POST['id_comment']; // Correction ici

$resultat = $commentc->chercher_id($id);

if ($resultat != null) {
    $comment = new Commentaire( 
        $_POST['id_comment'],  
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['avis'],
        $_POST['email'],
        $_POST['id_user']
    );
    $commentc1 = new CommentaireC();
    $commentc1->addComment($comment);
    echo '<script> alert("THANK You for your feedback");
    window.location.href = "index.html";; 
     </script>'; 
} else {
    echo '<script> alert("id n\'existe pas");
    window.history.back(); 
     </script>'; 

}
?>
