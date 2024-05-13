<?php
include_once("../model/offre.php");
$ID_Emploi = $_POST['ID_Emploi'];
$new_emploi = new emploi();
if (isset($_POST['deleteButton'])) {
    $new_emploi->delete_emploi($ID_emploi);
    header('Location: ../view/index.html');  
}
if (isset($_POST['updateButton'])) {
    $new_emploi = new emploi();
    $final_list = $new_emploi->read_emploi_by_id($ID_Emploi);
    foreach ($final_list as $emploi) {
        $ID_Emploi = $emploi['ID_Emploi'];
        $specialite = $emploi['specialite'];
        $pieceidentite = $emploi['pieceidentite'];
        $numero = $emploi['numero'];
        $Email = $emploi['Email'];
        $disponibilite = $emploi['disponibilite'];
        $password = $emploi['password'];
        $genre = $emploi['genre'];




    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update Offre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #4caf50;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="date"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
   
</head>
<body>
    <div class="container">
        <form action="../controller/handelUpdate.php" method="POST">
            <h2>Update Offre</h2>
            <input type ="hidden" name = "ID_Emploi" value ="<?php echo $ID_Emploi ?>">

            <label for="specialite">specialite:</label>
            <input type="text" id="specialite" name="specialite" value ="<?php echo $specialite ?>" required>
                
            <label for="pieceidentite">pieceidentite:</label>
            <input type="text" id=pieceidentite" name="pieceidentite" value ="<?php echo $pieceidentite ?>" required>
                
            <label for="age">numero:</label>
            <input type="text" id="numero" name="numero" value ="<?php echo $numero ?>" required>
            
            <label for="Email">Email:</label>
            <input type="text" id="Email" name="Email" value ="<?php echo $Email ?>" required>
                
            <label for="disponibilite">disponibilite:</label>
            <input type="text" id="disponibilite" name="disponibilite" value ="<?php echo $disponibilite ?>" required>
                
            <label for="password">password:</label>
            <input type="password" id="password" name="password" value ="<?php echo $password ?>" required>
                
            <label for="genre">genre:</label>
            <input type="genre" id="genre" name="genre" value ="<?php echo $genre ?>" required>
                
           

            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
<?php
}

?>