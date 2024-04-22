<?php
require_once("../model/offre.php");
require_once("../model/transport.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <a href="#">
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
   
        <div class="box">
            <a href="../view/addOffre.php">
                <button class ="addButton" type="submit" name ="addButton">add</button> 
            </a>
            <table class="RdvTable">
                    <thead>
                        <tr>
                            <th>ID employe</th>
                            <th>nom</th>
                            <th>Prenom</th>
                            <th>Age</th>
                            <th>numTel</th>
                            <th>Adresse  </th>
                            <th>date debut</th>
                            <th>date fin</th>
                            <th>Email</th>
                            <th>update</th>
                            <th>delete</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $new_employe = new employe();
                        $final_list = $new_employe->read_all_employe();
                        foreach ($final_list as $employe) {
                            ?>
                            <form action="../controller/handleOprations.php" method="POST">
                                <tr>
                                    <td>
                                        <?= $employe['ID_employe']; ?>
                                        <input type="hidden" name="ID_employe" value="<?php echo $employe['ID_employe']; ?>">
                                    </td>
                                    <td>
                                        <?= $employe['nom']; ?>
                                    </td>
                                    <td>
                                        <?= $employe['prenom']; ?>
                                    </td>
                                    <td>
                                        <?= $employe['age']; ?>
                                    </td>
                                    <td>
                                        <?= $employe['numTel']; ?>
                                    </td>
                                    <td>
                                        <?= $employe['adresse']; ?>
                                    </td>
                                    <td>
                                        <?= $employe['date_debut']; ?>
                                    </td>
                                    <td>
                                        <?= $employe['date_fin']; ?>
                                    </td>
                                    <td>
                                        <?= $employe['email']; ?>
                                    </td>
                                    <td>
                                        <button class ="updateButton" type="submit" name="updateButton">update</button>
                                    </td>
                                     <td>
                                        <button class ="deleteButton" type="submit" name="deleteButton">delete</button> 
                                    </td>
                                    
                                </tr>
                            </form>
                        <?php
                        }
                        ?>
                    </tbody>
            </table>
            <table class="RdvTable">
                    <thead>
                        <tr>
                            <th>ID transport</th>
                            <th>type</th>
                            <th>matricule</th>
                            <th>date debut</th>
                            <th>transport employe</th>         
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $new_transport = new transport();
                        $final_list = $new_transport->read_all_transport();
                        foreach ($final_list as $transport) {
                            ?>
                                <tr>
                                    <td>
                                        <?= $transport['ID_transport']; ?>
                                    </td>
                                    <td>
                                        <?= $transport['type']; ?>
                                    </td>
                                    <td>
                                        <?= $transport['matricule']; ?>
                                    </td>
                                    <td>
                                        <?= $transport['date_debut']; ?>
                                    </td>
                                    <td>
                                            <table class="RdvTable">
                                                <thead>
                                                    <tr>
                                                        <th>ID employe</th>
                                                        <th>nom</th>
                                                        <th>Prenom</th>
                                                        <th>Age</th>
                                                        <th>numTel</th>
                                                        <th>Adresse  </th>
                                                        <th>date debut</th>
                                                        <th>date fin</th>
                                                        <th>Email</th>                                                  
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $new_transport_1 = new transport();
                                                    $final_list = $new_transport_1->read_employer_by_transport_id($transport['ID_transport']);
                                                    foreach ($final_list as $employe) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?= $employe['ID_employe']; ?>
                                                            <input type="hidden" name="ID_employe" value="<?php echo $employe['ID_employe']; ?>">
                                                        </td>
                                                        <td>
                                                            <?= $employe['nom']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $employe['prenom']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $employe['age']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $employe['numTel']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $employe['adresse']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $employe['date_debut']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $employe['date_fin']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $employe['email']; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>

                                    </td>
                                </tr>
                        <?php
                        }
                        ?>
                    </tbody>
            </table>
        </div>
</body>
</html>