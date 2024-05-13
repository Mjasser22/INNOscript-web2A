<!DOCTYPE html>
<html>

<head>
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="liste_employe.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <!-- Le code pour la barre de navigation -->
        </div>

        <h2 class="title">
            Liste des utilisateurs
        </h2>
        <h2 class="inscription">
            <p>TABLE OF USERS</p>
        </h2>
        <table border="1" align="center" width="70%">
            <tr>
                <th>Identity</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Password</th>
                <th>Telephone</th>
                <th>Passport Number</th>
                <th>Gender</th>
                <th>Country</th>
                <th>Verification</th>
                <th>Delete</th>
                <th>Update</th>
                <th>Image</th>
            </tr>
            <?php
            require_once '../Controller/userC.php';
            $employeC = new userC();
            $list = $employeC->listEmployes();
            foreach ($list as $employe) {
            ?>
                <tr>
                    <td><?= $employe['id']; ?></td>
                    <td><?= $employe['nom']; ?></td>
                    <td><?= $employe['prenom']; ?></td>
                    <td><?= $employe['email']; ?></td>
                    <td><?= $employe['adresse']; ?></td>
                    <td><?= $employe['password']; ?></td>
                    <td><?= $employe['telephone']; ?></td>
                    <td><?= $employe['num_passport']; ?></td>
                    <td><?= $employe['genre']; ?></td>
                    <td><?= $employe['pays']; ?></td>
                    <td><?= $employe['verif']; ?></td>
                    <td><a href="Admintraitment.php?id=<?= $employe['id']; ?>">Delete</a></td>
                    <td><a href="Update.php?id=<?= $employe['id']; ?>">Update</a></td>
                    <td>
                        <?php
                        require_once "../config.php"; // Assurez-vous d'inclure correctement le fichier config.php

                        // Préparez et exécutez la requête SQL pour récupérer l'image en fonction de l'ID
                        $sql = "SELECT image_name, image_data FROM images WHERE id_u = :id";
                        $db = config::getConnexion(); // Obtenez la connexion à la base de données
                        $stmt = $db->prepare($sql);
                        $stmt->bindParam(':id', $employe['id']); // Utilisez l'ID de l'utilisateur de la boucle foreach
                        $stmt->execute();

                        // Vérifiez si des résultats sont retournés
                        if ($stmt->rowCount() > 0) {
                            // Récupérez les données de l'image
                            $donnees = $stmt->fetch();
                            // Affichez l'image
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($donnees['image_data']) . '" style="width: 100%; height: auto; border-radius: 10px;" />';
                        } else {
                            // Affichez un message si aucune image n'est trouvée pour cet utilisateur
                            //echo '<script>alert("Image not found for user ID: ' . $employe['id'] . '")</script>';
                        }
                        ?>
                    </td>
                     <td>
            <div>
<a href="Admintraitment.php?id=<?php echo $employe['id']; ?>">Delete</a>
            </div>
            <td>
            <a href="Update.php?id=<?php echo $employe['id']; ?>">Update</a>
            </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>
