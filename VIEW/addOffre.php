<?php

require_once '../config.php';

$id_tr = array();

try {
    $pdo = config::getConnexion();

    if (!$pdo) {
        throw new Exception("Failed to connect to the database.");
    }

    $query = $pdo->prepare("SELECT ID_transport FROM transport");
    $query->execute();
    $id_tr = $query->fetchAll(PDO::FETCH_COLUMN); // Fetch the first column of the first row
    
} catch (PDOException $e) {
    die('PDO Error: ' . $e->getMessage());
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Offre</title>
  
   <link rel="stylesheet" href="inscription_admin1.css">
   <link rel="stylesheet" href="liste_employe1.css">
    

</head>
<body>
    <div class="inscription"> <!-- Remplacez container par inscription -->
        <h2>Add Offre</h2>
        <form action="../controller/handleInsertOffre.php" method="POST" onsubmit="return validateForm()">
            <label for="ID_Emploi"> ID_Emploi:</label>
            <input type="text" id="ID_Emploi" name="ID_Emploi" >
            
            <label for="specialite">specialite:</label>
            <input type="text" id="specialite" name="specialite" >

            <label for="pieceidentite">piece d'identite:</label>
            <input type="text" id="pieceidentite" name="pieceidentite" >

            <label for="numero"> numero:</label>
            <input type="text" id="numero" name="numero" >
            
            <label for="Email">Email:</label>
            <input type="text" id="Email" name="Email" >

          
            <label for="disponibilite"> disponibilite:</label>
            <input type="date" id="disponibilite" name="disponibilite" >

           <div class="titre-input" >
        <p class="titre">Password</p>
       <input type="password"  name="password"  class="form-control"  >   
  </div>
            
            <h4 class="titre">Genre</h4>
            <br>
            <label for="genre"  class="titre">Masculin</label>
    <input type="radio" value="masculin" name="genre"   >
    <label for="Genre" class="titre">Feminin</label>
    <input type="radio" value="feminin" name="genre"  >
    <label for="Genre" class="titre" >Personalisée</label>
    <input type="radio" value="Personalise" name="genre"  >
    <label for="ID_transport">Select ID_transport:</label>
<select id="ID_transport" name="ID_transport" >
    <?php foreach ($id_tr as $transport_id): ?>
        <option value="<?php echo $transport_id; ?>"><?php echo $transport_id; ?></option>
    <?php endforeach; ?>
</select>

    
    
            


            <button type="submit" >
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


    <script>
    function validateForm() {
        var ID_Emploi = document.getElementById("ID_Emploi").value;
        var specialite = document.getElementById("specialite").value;
        var pieceidentite = document.getElementById("pieceidentite").value;
        var numero = document.getElementById("numero").value;
        var Email = document.getElementById("Email").value;
        var disponibilite = document.getElementById("disponibilite").value;
        var password = document.getElementById("password").value;

        // Regular expressions for validation
        var nameRegex = /^[A-Za-z]+$/;
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      

        // Validate ID_Emploi (can be any value)
        if (ID_Emploi === "") {
            alert("ID_Emploi is required!");
            return false;
        }

        // Validate specialite (only letters)
        if (!nameRegex.test(specialite)) {
            alert("Specialite should contain only letters!");
            return false;
        }

        // Validate Email
        if (!emailRegex.test(Email)) {
            alert("Email should be in the correct format!");
            return false;
        }

        // You can add more specific validation for other fields if needed

        // If all validations pass, return true to allow form submission
        return true;
    }
</script>


    

</body>
</html>
