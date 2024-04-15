<?php
require_once '../config.php';
require_once '../Controller/userC.php';
require_once '../Model/user.php';

$userC = new userC;
$user1 = $_POST['id'];
$resultat = $userC->chercher_id($user1);
$img =$_POST['image'];
$resultat1=$userC->chercher_tel($user1);
$resultat3=$userC->chercher_num_passport($user1);

if ($resultat == null && $resultat1==null && $resultat3==null) {

    $user = new User(
        $_POST['id'],  
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['email'],
        $_POST['adresse'],
        $_POST['password'],
        $_POST['telephone'],
        $_POST['num_passport'],
        $_POST['genre'],
        $_POST['pays']  
    );

    $userC1 = new userC;
    $userC1->adduser($user);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: #f4f4f4; /* Couleur de fond */
        }

        .welcome-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .welcome-text {
            font-size: 5em;
            animation: fadeInOut 3s forwards;
            color: #007bff; /* Couleur du texte */
        }

        @keyframes fadeInOut {
            0% { opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { opacity: 0; }
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <p class="welcome-text">Ajout avec succes</p>
    </div>
        

    <script>
        // Attendre 3 secondes avant de supprimer le message de bienvenue
        setTimeout(function() {
            var welcomeElement = document.querySelector('.welcome-text');
            welcomeElement.parentNode.removeChild(welcomeElement);
           window.location.href = "liste_employe.php";
        }, 2000);
    </script>
</body>
</html>
<?php
} else {
?>
<script>
    alert("Identité déjà existante.");
    window.history.back();
</script>
<?php
}
?>
