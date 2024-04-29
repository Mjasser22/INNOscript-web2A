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
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="clipboard-outline"></ion-icon>
                        </span>
                        <span class="title">Welcome to your Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="liste_employe.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">User Management</span>
                    </a>
                </li>

                <li>
                    <a href="inscription_admin.html">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Add User</span>
                    </a>
                </li>

                <li>
                    <a href="liste_avis.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Messages</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
                    </a>
                </li>

                <li>
                    <a href="login.html">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    
        <h2 class="title">
            Liste des utilisateurs
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

            if(isset($_POST['chercher'])) {
                $id = $_POST['chercher'];
                $employeC = new userC();
                $employe = $employeC->chercher_id($id);

                if($employe != null) {
            ?>
            <tr>
            >
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
                            // Affichez l'image avec un lien pour agrandir
                            echo '<a href="#" onclick="openModal(\'data:image/jpeg;base64,' . base64_encode($donnees['image_data']) . '\')">';
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($donnees['image_data']) . '" style="width: 100px; height: auto; border-radius: 10px;" />';
                            echo '</a>';
                        } else {
                            // Affichez un message si aucune image n'est trouvée pour cet utilisateur
                            //echo '<script>alert("Image not found for user ID: ' . $employe['id'] . '")</script>';
                        }
                        ?>
                    </td>
            </tr>
            <?php
                } else {
                    echo "<script>alert('L\'ID nexiste pas .'); window.location.href = 'liste_employe.php';</script>";

            ?>
            <tr>
                
            </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</body>

</html>
