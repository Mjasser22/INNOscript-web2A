
<?php
require_once '../config.php';
require_once '../Controller/userC.php';
require_once '../Model/user.php';

$id = $_POST['id'];
$mdp = $_POST['password'];
$user =new userC;
$chercher=$user->chercher_id($id);
$chercher_pass =$user->chercher_password($mdp);

if(isset($_POST['id'])) {
    $user_name = $_POST['id'];
    if(($user_name == "motez")&&($_POST['password']=='100123'))
     {
       

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
        <p class="welcome-text">Bienvenue</p>
    </div>
        

    <script>
        // Attendre 3 secondes avant de supprimer le message de bienvenue
        setTimeout(function() {
            var welcomeElement = document.querySelector('.welcome-text');
            welcomeElement.parentNode.removeChild(welcomeElement);
            window.location.href = "liste_employe.php";
        }, 3000);
    </script>
</body>
</html>


<?php
    
} else if($chercher !=null && $chercher_pass!=null)  {
    
    
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
        <p class="welcome-text">
        <?php
        $genre =$user->chercher_genre($id);
        if($genre=='homme')
        {
            $genre_aff="MR";
        }else
        {
            $genre_aff="MS";
        }
        $nom=$user->chercher_NOM($id);
        $prenom =$user->chercher_PRENOM($id);
        echo "bienvenue $genre_aff. $nom $prenom ";
        ?>
    </div>
        

    <script>
        // Attendre 3 secondes avant de supprimer le message de bienvenue
        setTimeout(function() {
            var welcomeElement = document.querySelector('.welcome-text');
            welcomeElement.parentNode.removeChild(welcomeElement);
            window.location.href = "index_user.html";
        }, 3000);
    </script>
</body>
</html>

<?php
    
}else
{

    
?>
<script>
    alert ('adresse ou mot de passe incorrect');
    window.location.href = "login.html";
</script>
<?php
    
}
}

    
?>