<?php

require_once "../connexion.php";


?>
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
<script>
    function validateForm() {
        var ID_transport = document.getElementById("ID_transport").value;
        var type = document.getElementById("type").value;
        var matricule = document.getElementById("matricule").value;
        var date_debut = document.getElementById("date_debut").value;

        // Check if any field is empty
        if (ID_transport == "" || type == "" || matricule == "" || date_debut == "") {
            alert("All fields are required!");
            return false;
        }

     
        
        return true; 
    }
</script>
    <div class="inscription"> <!-- Remplacez container par inscription -->
        <h2>add transportation</h2>
        <form action="../controller/handleInserttranssport.php" method="POST">
            <label for="ID_transport"> ID_transport:</label>
            <input type="text" id="ID_transport" name="ID_transport" required>
            
            <label for="type">type:</label>
            <input type="text" id="type" name="type" required>

            <label for="matricule">matricule:</label>
            <input type="text" id="matricule" name="matricule" required>

            <label for="date_debut"> date_debut:</label>
            <input type="date" id="date_debut" name="date_debut" required>
            

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
