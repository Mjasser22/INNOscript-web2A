<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="back.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('travel.jpg'); /* Assurez-vous de remplacer 'your_image.jpg' par le nom de votre image */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.8); /* Ajoute une légère opacité pour rendre le formulaire plus lisible */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .btn-container {
            text-align: center;
        }
        .submit-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>
<body>
<div class="container">
  <div class="form-container">
    <form action="../Model/addr.php" method="POST" onsubmit="return validateForm()">
        <h1>ADD Response</h1>
        
        <div class="form-group">
            <label for="Id_R">Id_R:</label>
            <input type="text" id="Id_R" name="Id_R" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" required>
        </div>
        <div class="btn-container">
            <input type="submit" value="SUBMIT" class="submit-btn">
            <input type="reset" value="Reset" class="submit-btn">
        </div>
    </form>
  </div>
</div>
<title>Add Response</title>
<script>
function validateForm() {
  var Id_R = document.getElementById("Id_R");
  var description = document.getElementById("description");

  if (Id_R.value.trim() === "") {
    alert("Please enter Id_R!");
    return false;
  }
  if (description.value.trim() === "") {
    alert("Please enter a description!");
    return false;
  }
  return true;
}
</script>
</body>
</html>
