<?php

require_once '../config.php';
require_once '../Controller/CommentaireC.php';
require_once '../Model/Commentaire.php';

$error = "";

// créer un employé
$employe = null;

// créer une instance du contrôleur
$employeC = new CommentaireC();
if (
    isset($_POST["id_comment"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["commenatire"]) &&
    isset($_POST["avis"]) &&
    isset($_POST["email"]) &&
    isset($_POST["id_user"]) 

) {
    $id = $_POST["id_comment"];
    $nom = $_POST["nom"];
    $prenom = $_POST["commenatire"];
    $adresse = $_POST["avis"];
    $email = $_POST["email"];
    $password = $_POST["id_user"];

    $employe = new Commentaire($id_comment, $nom, $commenatire, $avis, $email, $id_user);

    $employeC->updateComment($employe);
    header('Location:liste_employe.php');
} else {
}

?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage de l'utilisateur</title>
    <link rel="stylesheet" href="update.css">
    <link rel="stylesheet" href="inscription_admin.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
<a href="liste_employe.php" class="back-button">
  <span class="icon">&larr;</span> RETOUR
</a>


    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php

    if (isset($_GET['id_comment'])) {
        $employe = $employeC->showComment($_GET['id_comment']);

    ?>

        <form action="list_avis.php" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id">Id Employé:
                        </label>
                    </td>
                    <td><input type="text" name="id_comment" id="id_comment" value="<?php echo $employe['id_comment']; ?>" maxlength="20" readonly></td>
                </tr>
                <tr>
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $employe['nom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="commentaire">Commentaire:
                        </label>
                    </td>
                    <td><input type="text" name="commentaire" id="commentaire" value="<?php echo $employe['Commentaire']; ?>" maxlength="600"></td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email:
                        </label>
                    </td>
                    <td><input type="email" name="email" id="email" value="<?php echo $employe['email']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="avis">Avis:
                        </label>
                    </td>
                <td><input type="text" name="avis" id="avis" value="<?php echo $employe['avis']; ?>" maxlength="100"></td>

                </tr>
                <tr>
                    <td>
                        <label for="id_user">ID_user:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="id_user" id="id_user" value="<?php echo $employe['id_user']; ?>">
                    </td>
                </tr>
                <tr>
                    
                </tr>
                <tr>

                     
                    
                </tr>
                <tr>
                    
                   
                </tr>
                <tr>
                   
                 
                </tr>
                <tr>
                    <td></td>
                    <td>
                    <button>
            <div class="svg-wrapper-1">
              <div class="svg-wrapper">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  width="24"
                  height="24"
                >
                  <path fill="none" d="M0 0h24v24H0z"></path>
                  <path
                    fill="currentColor"
                    d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"
                  ></path>
                </svg>
              </div>
            </div>
            <span>Update</span>
          </button>
                    </td>
                    <td>
                    <button>
            <div class="svg-wrapper-1">
              <div class="svg-wrapper">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  width="24"
                  height="24"
                >
                  <path fill="none" d="M0 0h24v24H0z"></path>
                  <path
                    fill="currentColor"
                    d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"
                  ></path>
                </svg>
              </div>
            </div>
            <span>Reset</span>
          </button>
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>
