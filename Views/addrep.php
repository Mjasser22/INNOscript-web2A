<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="back.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>

<body>
<!-- <a href="Listrep.php">Back to list </a>
<hr>
<form action="../Models/addr.php" method="POST" onsubmit="return validateForm()">
  <table border="1" align="center">
    <tr>
      <td><label for="Id_R">Id_R:</label></td>
      <td><input type="text" name="Id_R" id="Id_R" maxlength="20"></td>
    </tr>
    <tr>
      <td><label for="description">Description:</label></td>
      <td><input type="text" name="description" id="description" maxlength="20"></td>
    </tr>
    <tr>
      <td><label for="eval">Eval:</label></td>
      <td><input type="text" name="eval" id="eval"></td>
    </tr>
    <tr align="center">
      <td><input type="submit" value="Save"></td>
      <td><input type="reset" value="Reset"></td>
    </tr>
  </table>
</form> -->

<div class="flex-container">
  <div class="content-container">
    <div class="form-container">
    <form action="../Models/addr.php" method="POST" onsubmit="return validateForm()">
        <h1>
          ADD Reponse : 
        </h1>
        <br>
        <br>
        <span class="subtitle">Id_R:</span>
        <br>
        <input type="text" id="Id_R" name="Id_R" value="">
        <br>
        <span class="subtitle">Description:</span>
        <br>
        <input type="text" id="description" name="description" value="">
        <br>
        <span class="subtitle">Eval:</span>
        <br>
        <input type="text" name="eval" id="eval" value="">
        <br><br>
        <input type="submit" value="SUBMIT" class="submit-btn">
        <input type="reset" value="Reset" class="submit-btn">
      </form>
    </div>
  </div>
</div>





<title>Add Response</title>
<script>
function validateForm() {
  // Get all the input elements
  var Id_R = document.getElementById("Id_R");
  var description = document.getElementById("description");
  var eval = document.getElementById("eval");

  // Check if description field is empty
  if (description.value === "") {
    alert("Please enter a description!");
    return false;
  }

  // // Check if eval is within the limit (optional)
  // // if (parseFloat(eval.value) <= 0) {
  // //   alert("Eval must be positive!");
  // //   return false;
  // // }

  // If all validations pass, submit the form
  return true;
}
</script>
</body>

</html>
