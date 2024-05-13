<?php
require_once '../config.php';
require_once '../Controller/userC.php';
require_once '../Model/user.php';

$userC = new userC;
$user1 = $_POST['id'];
$resultat = $userC->chercher_id($user1);
$email = $_POST['email'];

 
    if ($resultat == null) {
    
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
            $_POST['pays'],
            null
          
        );
        $userC1 = new userC;
        $userC1->adduser($user);
        echo "<script>alert('add your photo');</script>";

?>







<?php
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="login.css">
    <title>Image Upload Using PHP</title>
    <style>
      

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 60px;
            border: 1px solid #ccc;
            border-radius: 4px;
           
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: absolute;
    top: 400; /* Déplacer vers le bas de 50 pixels */
    left: 720px; /* Déplacer vers la droite de 100 pixels */
    
        }


        input[type="file"] {
    /* Masquer le bouton de sélection de fichier */
}

.custom-file-input {
    /* Style du conteneur personnalisé pour le bouton de sélection de fichier */
    display: inline-block;
    padding: 10px 15px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.custom-file-input:hover {
    /* Changement du style lorsque le curseur survole le bouton */
    background-color: #2980b9;
}
    </style>
 <link rel="stylesheet" href="user_signup.css">

  
    
</head>
<body>
    <?php if (isset($_GET['error'])): ?>
        <p><?php echo $_GET['error']; ?></p>
    <?php endif ?>
    <h1 class="ti">
            Registration</h1>
                <div class="alert">
                    <center>
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    Warning! <br>
                    Welcome to the registration page.Before you start,<br>
                    please take the time to carefully read each field and accurately enter your details. Thank you for your attention.<br> 
                  </div> 
                    </center>
            </center>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="hidden" name="id_u" id="id_u">
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
            <span>REGISTRATION</span>
          </button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var id_u_input = document.getElementById('id_u');
            <?php if (isset($_POST['id'])): ?>
                id_u_input.value = '<?php echo $_POST['id']; ?>';
            <?php endif; ?>
        });
    </script>
</body>
</html>
<?php
}else{
    
?>
<script>
    alert("identite deja existe");
    window.location.href = "inscription_admin.php";

</script>
<?php

}
?>