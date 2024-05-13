<?php

require_once '../config.php';
require_once '../Controller/userC.php';
require_once '../Model/user.php';

$error = "";

// créer un employé
$employe = null;

// créer une instance du contrôleur
$employeC = new userC();
if (
    isset($_POST["id"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["password"]) &&
    isset($_POST["telephone"]) &&
    isset($_POST["num_passport"]) &&
    isset($_POST["genre"]) &&
    isset($_POST["pays"])
) {
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $adresse = $_POST["adresse"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $telephone = $_POST["telephone"];
    $num_passport = $_POST["num_passport"];
    $genre = $_POST["genre"];
    $pays = $_POST["pays"];

    $employe = new User($id, $nom, $prenom, $adresse, $email, $password, $telephone, $num_passport, $genre, $pays);

    $employeC->updateEmploye($employe, $id);
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
    if (isset($_GET['id'])) {
        $employe = $employeC->showEmploye($_GET['id']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id">Id Employé:
                        </label>
                    </td>
                    <td><input type="text" name="id" id="id" value="<?php echo $employe['id']; ?>" maxlength="20" readonly></td>
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
                        <label for="prenom">Prénom:
                        </label>
                    </td>
                    <td><input type="text" name="prenom" id="prenom" value="<?php echo $employe['prenom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="adresse">Adresse:
                        </label>
                    </td>
                    <td><input type="email" name="email" id="email" value="<?php echo $employe['adresse']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Adresse email:
                        </label>
                    </td>
                <td><input type="text" name="adresse" id="adresse" value="<?php echo $employe['adresse']; ?>" maxlength="100"></td>

                </tr>
                <tr>
                    <td>
                        <label for="password">Mot de passe:
                        </label>
                    </td>
                    <td>
                        <input type="password" name="password" id="password" value="<?php echo $employe['password']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="telephone">Téléphone:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="telephone" id="telephone" value="<?php echo $employe['telephone']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="num_passport">Numéro de passeport:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="num_passport" id="num_passport" value="<?php echo $employe['num_passport']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="genre">Genre:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="genre" id="genre" value="<?php echo $employe['genre']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pays">Pays:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="pays" id="pays" value="<?php echo $employe['pays']; ?>">
                    </td>
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
