
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Offre</title>
  
   <link rel="stylesheet" href="inscription_admin.css">
   <link rel="stylesheet" href="liste_employe.css">

</head>
<body>
    <div class="inscription"> <!-- Remplacez container par inscription -->
        <h2>Add Offre</h2>
        <form action="../controller/handleInsertOffre.php" method="POST">
            <label for="ID_employe">Id employe:</label>
            <input type="text" id="ID_employe" name="ID_employe" required>
            
            <label for="nom">nom:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">prenom:</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="age"> age:</label>
            <input type="text" id="age" name="age" required>
            
            <label for="numTel">numTel:</label>
            <input type="text" id="numTel" name="numTel" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            
            <label for="adresse"> adresse:</label>
            <input type="text" id="adresse" name="adresse" required>

            <label for="date_debut">date_debut:</label>
            <input type="date" id="date_debut" name="date_debut" required>
            
            <label for="date_fin">date_fin:</label>
            <input type="date" id="date_fin" name="date_fin" required>
            


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
      <span>Connexion</span>
    </button>
        </form>
    </div>
</body>
</html>
