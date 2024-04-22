<!DOCTYPE html>
<html>

<head>
    <title>liste_avis</title>
    <link rel="stylesheet" href="liste_employe.css">
    <link rel="stylesheet" href="list_avis.css">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   
</head>
<body>

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
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
   

    
        <h2 class="title">
            Liste des utulisteur</h1>
        <h2 class="inscription">
            <p>TABLE</p>
            <center>
                <form action="chercher_avis.php" method="post">
                <div class="InputContainer">
  <input placeholder="Search.." id="chercher" class="input" name="chercher" type="text">
                </form>

</div>
            </center>
  

    </form>           
        </h2>
    <table border="1" align="center" width="70%">
        <tr>
            <th>ID_comment</th>
            <th>ID_user</th>
            <th>FIRST_Name</th>
            <th>Last_name</th>
            <th>ADRESSE</th>
            <th>email</th>
            <th>telephone</th>
            <th>num_passport</th>
            <th>genre</th>
            <th>pays</th>
            <th>Avis/5</th>
            
        </tr>
        <?php
        require_once '../Controller/CommentaireC.php';
        $employeC = new CommentaireC();
        
        $list = $employeC->listEmployes();

        foreach ($list as $employe) {
        ?>
            <tr>
                <td><?= $employe['id_comment']; ?></td>
                <td><?= $employe['id']; ?></td>
                <td><?= $employe['nom']; ?></td>
                <td><?= $employe['prenom']; ?></td>
                <td><?= $employe['email']; ?></td>
                <td><?= $employe['adresse']; ?></td>
                <td><?= $employe['telephone']; ?></td>
                <td><?= $employe['num_passport']; ?></td>
                <td><?= $employe['genre']; ?></td>
                <td><?= $employe['pays']; ?></td>
                <td><?= $employe['avis']; ?></td>
                <form >
           <td>
            <div>

<a href="supprimer_avis.php?id_comment=<?php echo $employe['id_comment']; ?>">Delete</a>
            </div>
            <td>
            <a href="update_comment.php?id_comment=<?php echo $employe['id_comment']; ?>">Update</a>
            </td>
            </tr>

                </td>
           </form>
        <?php
        }
        ?>
    </table>
    
</body>

</html>
