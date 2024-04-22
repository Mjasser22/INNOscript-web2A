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
                        <span class="title">Welcome to your Dashbored </span>
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
                        <span class="title">Singne Out</span>
                    </a>
                </li>
            </ul>
        </div>
    
        <h2 class="title">
            Liste des utilisateurs
        </h2>

        <table border="1" align="center" width="70%">
            <tr>
                <th>ID_avis</th>
                <th>Avis</th>
                <th>Last_name</th>
                <th>First_name</th>
                <th>ID</th>
            </tr>
            <?php
    require_once '../Controller/CommentaireC.php';
        $employeC1 = new CommentaireC();
        $id = $_POST['chercher'];        
            $employeC = new CommentaireC();
           
            $list = $employeC->chercherAvisPariduser($id);
            if($list!=null)
            {

            foreach ($list as $employe) {
            ?>
                <tr>
                    <td><?= $employe['id_comment']; ?></td>
                    <td><?= $employe['avis']; ?></td>
                    <td><?= $employe['prenom']; ?></td>
                    <td><?= $employe['nom']; ?></td>
                    <td><?= $employe['id_user']; ?></td>
                    <td>
                    </td>
                    <td>
                    <a href="supprimer_avis.php?id_comment=<?php echo $employe['id_comment']; ?>">Delete</a>
                    </td>
                </tr>
            <?php
            }
        }else
        {
            ?>
            <script>
                alert ("id nexiste pas");
                window.location.href="liste_avis.php";
            </script>
            <?php
        }
            ?>

        </table>
    </div>
</body>

</html>
