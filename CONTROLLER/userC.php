<?php
require_once '../config.php';
require_once '../Model/user.php';

class userC {
    public function adduser($user) {
        try {
            $db = config::getConnexion();
                            
            $sql = "INSERT INTO user (id, nom, prenom, adresse, email, password, telephone, num_passport, genre, pays) VALUES (:id, :nom, :prenom, :adresse, :email, :password, :telephone, :num_passport, :genre, :pays)";
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $user->getid(),
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'adresse' => $user->getAdresse(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'telephone' => $user->getTelephone(),
                'num_passport' => $user->getNumPassport(),
                'genre' => $user->getGenre(),
                'pays' => $user->getPays(),
            ]);
                            
            return true; // Succès de l'insertion
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false; // Échec de l'insertion
        }
    }
    function deleteUser($id)
    {
        $sql = "DELETE FROM user WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function listEmployes()
    {
        $sql = "SELECT * FROM user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function chercher_id($id)
    {
        // Connexion à la base de données
        $db = config::getConnexion();
        
        $search_query = "SELECT * FROM user WHERE id = :id";
        $stmt = $db->prepare($search_query);
        $stmt->execute(array(':id' => $id));
        
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return NULL;
        }
    }
    function chercher_password($password)
    {
        // Connexion à la base de données
        $db = config::getConnexion();
        
        $search_query = "SELECT * FROM user WHERE password = :password";
        $stmt = $db->prepare($search_query);
        $stmt->execute(array(':password' => $password));
        
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return NULL;
        }
    }
    function chercher_NOM($id)
{
    // Connexion à la base de données
    $db = config::getConnexion();
    
    $search_query = "SELECT nom FROM user WHERE id = :id";
    $stmt = $db->prepare($search_query);
    $stmt->execute(array(':id' => $id));
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['nom']; //  le nom de l'utilisateur
    } else {
        return NULL;
    }
}
function chercher_PRENOM($id)
{
    // Connexion à la base de données
    $db = config::getConnexion();
    
    $search_query = "SELECT prenom FROM user WHERE id = :id";
    $stmt = $db->prepare($search_query);
    $stmt->execute(array(':id' => $id));
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['prenom']; //  le nom de l'utilisateur
    } else {
        return NULL;
    }
}
function chercher_genre($id)
{
    // Connexion à la base de données
    $db = config::getConnexion();
    
    $search_query = "SELECT genre FROM user WHERE id = :id";
    $stmt = $db->prepare($search_query);
    $stmt->execute(array(':id' => $id));
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['genre']; //  le nom de l'utilisateur
    } else {
        return NULL;
    }
}
function updateEmploye($user, $id)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE user SET 
                nom = :nom, 
                prenom = :prenom, 
                adresse = :adresse,
                email = :email, 
                password = :password, 
                telephone = :telephone, 
                num_passport = :num_passport,
                genre = :genre,
                pays = :pays,
                verif = :verif            
            WHERE id = :id'
        );
        $query->execute([
            'id' => $id,
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'adresse' => $user->getAdresse(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'telephone' => $user->getTelephone(),
            'num_passport' => $user->getNumPassport(),
            'genre' => $user->getGenre(),
            'pays' => $user->getPays(),
            'verif' => $user->getVerif()
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
function showEmploye($id)
{
    $sql = "SELECT * from user where id = $id";
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
function chercher_tel($id)
{
    // Connexion à la base de données
    $db = config::getConnexion();
    
    $search_query = "SELECT telephone FROM user WHERE id = :id";
    $stmt = $db->prepare($search_query);
    $stmt->execute(array(':id' => $id));
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['telephone']; //  le nom de l'utilisateur
    } else {
        return NULL;
    }
}
function chercher_num_passport($id)
{
    // Connexion à la base de données
    $db = config::getConnexion();
    
    $search_query = "SELECT num_passport FROM user WHERE id = :id";
    $stmt = $db->prepare($search_query);
    $stmt->execute(array(':id' => $id));
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['num_passport']; //  le nom de l'utilisateur
    } else {
        return NULL;
    }
}
function chercher_verif($id)
{
    // Connexion à la base de données
    $db = config::getConnexion();
    
    $search_query = "SELECT verif FROM user WHERE id = :id";
    $stmt = $db->prepare($search_query);
    $stmt->execute(array(':id' => $id));
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['verif']; //  le nom de l'utilisateur
    } else {
        return NULL;
    }
}
function chercher_mdp($adresse)
{
    // Connexion à la base de données
    $db = config::getConnexion();
    
    $search_query = "SELECT password FROM user WHERE adresse = :adresse";
    $stmt = $db->prepare($search_query);
    $stmt->execute(array(':adresse' => $adresse));
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['password']; 
    } else {
        return NULL; 
    }
}
function chercher_id_user($id)
{
    $db = config::getConnexion();
    
    $search_query = "SELECT id FROM user WHERE id = :id";
    $stmt = $db->prepare($search_query);
    $stmt->execute(array(':id' => $id));
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['id']; //  le nom de l'utilisateur
    } else {
        return NULL;
    }
}
public function tri() {
    // Récupérer la liste des utilisateurs
    $list = $this->listEmployes();

    // Fonction de comparaison pour le tri
    function compareByID($a, $b) {
        return $a['id'] - $b['id'];
    }

    // Trier la liste des utilisateurs en utilisant la fonction de comparaison
    usort($list, 'compareByID');

    // Retourner la liste triée
    return $list;
}
function listEmployes1()
{
    $sql = "SELECT * FROM user order by id";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}
function deleteimg($id)
    {
        $sql = "DELETE FROM images WHERE id_u = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

  
}
?>
