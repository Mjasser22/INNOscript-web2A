<?php
include_once("../model/transport.php");
require_once "../connexion.php";

if(isset($_POST['ID_transport'])){
    $ID_transport = $_POST['ID_transport'];
    $new_transport = new transport();

    if (isset($_POST['deleteButton'])) {
        $new_transport->delete_transport($ID_transport);
        header('Location: ../view/index.html');  
    }

    if (isset($_POST['updateButton'])) {
        $final_list = $new_transport->read_transport_by_id($ID_transport);
        foreach ($final_list as $transport) {
            $ID_transport = $transport['ID_transport'];
            $type = $transport['type'];
            $matricule = $transport['matricule'];
            $date_debut = $transport['date_debut'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update  transport </title>
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
        <form action="..\..\..\..\..\controller\handleupdatetransport.php" method="POST">
            <h2> Update transport</h2>
           
            <label for="ID_transport"> ID_transport:</label>
            <input type="text" id="ID_transport" name="ID_transport" value="<?php echo $ID_transport; ?>" required>
            
            <label for="type">type:</label>
            <input type="text" id="type" name="type" value="<?php echo $type; ?>" required>

            <label for="matricule">matricule:</label>
            <input type="text" id="matricule" name="matricule" value="<?php echo $matricule; ?>" required>

            <label for="date_debut"> date_debut:</label>
            <input type="date" id="date_debut" name="date_debut" value="<?php echo $date_debut; ?>" required>
                
            <input type="submit" name="update" value="Update">
        </form>
    </div>
</body>
</html>
