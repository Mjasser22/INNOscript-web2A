<?php
include '../Controller/recC.php';

require_once "../config.php";
$Id_R = $_POST['Id_R'];
$Id_E = $_POST['Id_E'];
$Id_U = $_POST['Id_U'];
$descrip = $_POST['descrip'];


?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Display</title>
  <script>
    function validateForm() {
      // Get all the input elements
      var Id_R = document.getElementById("Id_R");
      var Id_E = document.getElementById("Id_E");
      var Id_U = document.getElementById("Id_U");
      var descrip = document.getElementById("descrip");
      

      // // Check if ID fields are empty (pre-filled values help here)
      // if (idExercice.value === "" || idJeu.value === "") {
      //   alert("Veuillez saisir un ID du jeu !");
      //   return false;
      // }

      // Check if Id_U field is empty (pre-filled values help here)
      if (Id_U.value === "") {
        alert("Veuillez saisir un Id_U !");
        return false;
      }

      // // Check if descrip is a positive number
      // if (isNaN(descrip.value) || parseFloat(descrip.value) <= 0 || Id_U.value === "") {
      //   alert("descrip doit etre strictement positive !");
      //   return false;
      // }

      

      // If all validations pass, submit the form
      return true;
    }
  </script>
</head>

<body>
  <button><a href="Listrec.php">Back to list</a></button>
  <hr>

  <form action='../Models/update.php' method="POST" onsubmit="return validateForm()">
    <table border="1" align="center">
      <tr>
        <td>
          <label for="Id_R">Id_R:
          </label>
        </td>
        <td><input type="text" name="Id_R" id="Id_R" value="<?php echo $Id_R; ?>" maxlength="20" readonly></td>
      </tr>
      <tr>
        <td>
          <label for="Id_E">Id_E:
          </label>
        </td>
        <td><input type="text" name="Id_E" id="Id_E" value="<?php echo $Id_E; ?>" maxlength="20" readonly></td>
      </tr>
      <tr>
        <td>
          <label for="Id_U">Id_U:
          </label>
        </td>
        <td><input type="text" name="Id_U" id="Id_U" value="<?php echo $Id_U; ?>" maxlength="20"></td>
      </tr>
      <tr>
        <td>
          <label for="descrip">descrip:
          </label>
        </td>
        <td>
          <input type="text" name="descrip" value="<?php echo $descrip; ?>" id="descrip">
        </td>
      </tr>
     
      <tr>
        <td></td>
        <td>
          <input type="submit" value="Update">
        </td>
        <td>
          <input type="reset" value="Reset">
        </td>
      </tr>
    </table>
  </form>
</body>

</html>
