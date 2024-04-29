<?php
include '../Controller/repR.php';

require_once "../config.php";
$Id_Rep = $_POST['Id_Rep'];
$Id_R = $_POST['Id_R'];
$description = $_POST['description'];
$eval = $_POST['eval'];

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Display</title>
  <script>
    function validateForm() {
      // Get all the input elements
      var Id_Rep = document.getElementById("Id_Rep");
      var Id_R = document.getElementById("Id_R");
      var description = document.getElementById("description");
      var eval = document.getElementById("eval");

      // Check if ID fields are empty (pre-filled values help here)
      if (Id_Rep.value === "") {
        alert("Veuillez saisir un ID du reponse !");
        return false;
      }

      // Check if Id_R field is empty (pre-filled values help here)
      if (Id_R.value === "") {
        alert("Veuillez saisir un Id_R !");
        return false;
      }


      // // Check if description is within the limit (optional)
      // if (parseFloat(description.value) > 20 || parseFloat(description.value) <= 0) {
      //   alert("Le description doit etre positif !");
      //   return false;
      // }

      // If all validations pass, submit the form
      return true;
    }
  </script>
</head>

<body>
  <button><a href="Listrep.php">Back to list</a></button>
  <hr>

  <form action='../Models/updater.php' method="POST" onsubmit="return validateForm()">
    <table border="1" align="center">
      <tr>
        <td>
          <label for="Id_Rep">Id_Rep:
          </label>
        </td>
        <td><input type="text" name="Id_Rep" id="Id_Rep" value="<?php echo $Id_Rep; ?>" maxlength="20" readonly></td>
      </tr>
      <tr>
        <td>
          <label for="Id_R">Id_R:
          </label>
        </td>
        <td><input type="text" name="Id_R" id="Id_R" value="<?php echo $Id_R; ?>" maxlength="20"></td>
      </tr>
      <tr>
        <td>
          <label for="description">description:
          </label>
        </td>
        <td>
          <input type="text" name="description" value="<?php echo $description; ?>" id="description">
        </td>
      </tr>
      <tr>
        <td>
          <label for="eval">eval:
          </label>
        </td>
        <td>
          <input type="text" name="eval" value="<?php echo $eval; ?>" id="eval">
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
