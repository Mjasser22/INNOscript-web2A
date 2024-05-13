<?php
require_once "../config.php"; // Assurez-vous d'inclure correctement le fichier config.php
$id=$_POST['id_u'];
// Vérifiez si un fichier a été téléchargé
if(isset($_FILES['image'])){
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_name_parts = explode('.', $_FILES['image']['name']);
    $file_ext = strtolower(end($file_name_parts));
    // Vous pouvez vérifier l'extension du fichier ici si nécessaire
    $extensions = array("jpeg","jpg","png");
    

    if(in_array($file_ext, $extensions) === false){
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    if(empty($errors) == true){
        
        // Lire le contenu du fichier dans une variable PHP
        $imageData = file_get_contents($file_tmp);

        try {
            // Obtenez la connexion à la base de données
            $db = config::getConnexion();
            $sql = "INSERT INTO images (image_name, image_data, id_u) VALUES (:image_name, :image_data, :id_u)";
            $stmt = $db->prepare($sql);

            // Lier les paramètres et exécuter la requête
            $stmt->bindParam(':image_name', $file_name);
            $stmt->bindParam(':image_data', $imageData, PDO::PARAM_LOB);
            $stmt->bindParam(':id_u', $id);
            $stmt->execute();

            //echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
            echo '<script>alert("Compte ajouter"); 
            <script>alert("attendez la validation de votre compte"); 
             window.location.href = "login.html";</script>';
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else{
        print_r($errors);
    }
}
?>
