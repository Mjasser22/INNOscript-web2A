<?php
require_once '../config.php';
require_once '../Model/Commentaire.php';
require_once '../Model/user.php';
class CommentaireC {
    public function addComment($Comment) {
        try {
            $db = config::getConnexion();
                        
            $sql = "INSERT INTO commentaire (id_comment, id_user, nom, commentaire, email, avis) 
            VALUES (:id_comment, :id_user, :nom, :commentaire, :email, :avis)";
            $query = $db->prepare($sql);
            $query->execute([
                'id_comment' => $Comment->getIdComment(),
                'id_user' => $Comment->getIdUser(),
                'nom' => $Comment->getNom(),
                'commentaire' => $Comment->getPrenom(),
                'email' => $Comment->getEmail(),
                'avis' => $Comment->getavis()
            ]);
                        
            return true; // Succès de l'insertion
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false; // Échec de l'insertion
        }
    }
    function chercher_id($id)
{
    // Connexion à la base de données
    $db = config::getConnexion();
    
    $search_query = "SELECT * FROM user WHERE id = :id_comment";
    $stmt = $db->prepare($search_query);
    $stmt->execute(array(':id_comment' => $id)); 
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } else {
        return NULL;
    }
}
function listEmployes()
    {
        $sql = "SELECT user.*, commentaire.*
        FROM user
        INNER JOIN commentaire ON user.id = commentaire.id_user;";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function chercherAvisPariduser($id_user) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare("
                SELECT c.*, u.*
                FROM commentaire c
                JOIN user u ON c.id_user = u.id
                WHERE c.id_user = :id_user
            ");
            $query->execute(array(':id_user' => $id_user));
            
            if ($query->rowCount() > 0) {
                $reponses = $query->fetchAll(PDO::FETCH_ASSOC);
                return $reponses;
            } else {
                return NULL;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return NULL;
        }
    }
    function deletecOMMENT($id)
    {
        $sql = "DELETE FROM commentaire WHERE id_comment = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function updateComment($Comment) {
        try {
            $db = config::getConnexion();
                        
            $sql = "UPDATE commentaire 
                    SET nom = :nom, 
                        commentaire = :commentaire, 
                        email = :email, 
                        avis = :avis
                    WHERE id_comment = :id_comment";
                    
            $query = $db->prepare($sql);
            $query->execute([
                'id_comment' => $Comment->getIdComment(),
                'nom' => $Comment->getNom(),
                'commentaire' => $Comment->getPrenom() ,
                'email' => $Comment->getEmail(),
                'avis' => $Comment->getAvis()
            ]);
                        
            return true; // Succès de la mise à jour
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false; // Échec de la mise à jour
        }
    }
    function showComment($id)
{
    $sql = "SELECT * from commentaire where id_comment = $id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute();

        $employe = $query->fetch();
        return $employe;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
function chercher_id_user($id)
{
    // Connexion à la base de données
    $db = config::getConnexion();
    
    $search_query = "SELECT id_user FROM commentaire WHERE id_comment = :id";
    $stmt = $db->prepare($search_query);
    $stmt->execute(array(':id' => $id));
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['id_user']; //  le nom de l'utilisateur
    } else {
        return NULL;
    }
}

}
?>