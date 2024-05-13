<!DOCTYPE html>
<html>

<head>
    <title>Liste des utulistaeur</title>
    <link rel="stylesheet" href="liste_employe.css">
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
            <p>TABLE OF USERS</p>
        </h2>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Identity</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>ADRESSE</th>
            <th>password</th>
            <th>telephone</th>
            <th>num_passport</th>
            <th>genre</th>
            <th>pays</th>
            <th>Delete</th>
            <th>Update</th>
            
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
                <form >
           <td>
            <div>
<a href="Admintraitment.php?id=<?php echo $employe['id']; ?>">Delete</a>
            </div>
            <td>
            <a href="Update.php?id=<?php echo $employe['id']; ?>">Update</a>
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
