<?php
include_once("../model/offre.php");
$ID_employe = $_POST['ID_employe'];
$new_employe = new employe();
if (isset($_POST['deleteButton'])) {
    $new_employe->delete_employe($ID_employe);
    header('Location: ../view/listOffre.php');  
}
if (isset($_POST['updateButton'])) {
    $new_employe = new employe();
    $final_list = $new_employe->read_employe_by_id($ID_employe);
    foreach ($final_list as $employe) {
        $ID_employe = $employe['ID_employe'];
        $nom = $employe['nom'];
        $prenom = $employe['prenom'];
        $age = $employe['age'];
        $numTel = $employe['numTel'];
        $adresse = $employe['adresse'];
        $date_debut = $employe['date_debut'];
        $date_fin = $employe['date_fin'];
        $email = $employe['email'];
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
            <input type ="hidden" name = "ID_employe" value ="<?php echo $ID_employe ?>">

            <label for="nom">nom employe:</label>
            <input type="text" id="nom" name="nom" value ="<?php echo $nom ?>" required>
                
            <label for="prenom">prenom employe:</label>
            <input type="text" id=prenom" name="prenom" value ="<?php echo $prenom ?>" required>
                
            <label for="age">Age:</label>
            <input type="text" id="age" name="age" value ="<?php echo $age ?>" required>
            
            <label for="Email">numTel:</label>
            <input type="text" id="numTel" name="numTel" value ="<?php echo $numTel ?>" required>
                
            <label for="numTel">adresse:</label>
            <input type="text" id="adresse" name="adresse" value ="<?php echo $adresse ?>" required>
                
            <label for="Email">date_debut:</label>
            <input type="date" id="date_debut" name="date_debut" value ="<?php echo $date_debut ?>" required>
                
            <label for="date_fin">date_fin:</label>
            <input type="date" id="date_fin" name="date_fin" value ="<?php echo $date_fin ?>" required>
                
            <label for="Email">Email:</label>
            <input type="text" id="Email" name="email" value ="<?php echo $email ?>" required>

            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
<?php
}

?>