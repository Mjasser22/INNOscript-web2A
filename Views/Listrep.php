<?php
include '../Controller/repR.php';
$repR = new repR();
$list = $repR->listrep();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="rep.css">
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
                    <a href="listrep.php">
                        <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">User Management</span>
                    </a>
                   
                    <!-- <input type="text" placeholder="Search with speciality" id="speciality" onkeyup="filterTable()" > -->
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
           
            <table id="myTable" class="RdvTable">
                    <thead>
                        <tr>
                        <th>Id_Rep</th>
                        <th>Id_R</th>
                        <th>description</th>
                        <th>eval</th>
                        <th>Update</th>
                        <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($list as $Reponse) {
                        ?>
                            <form action="updaterep.php" method="POST">
                                <tr>
                                    <td>
                                        <?= $Reponse['Id_Rep']; ?>
                                        <input type="hidden" name="Id_Rep" value="<?php echo $Reponse['Id_Rep']; ?>">
                                    </td>
                                    <td>
                                        <?= $Reponse['Id_R']; ?>
                                        <input type="hidden" name="Id_R" value="<?php echo $Reponse['Id_R']; ?>">
                                    </td>
                                    <td>
                                        <?= $Reponse['description']; ?>
                                        <input type="hidden" name="description" value="<?php echo $Reponse['description']; ?>">
                                    </td>
                                    <td>
                                        <?= $Reponse['eval']; ?>
                                        <input type="hidden" name="eval" value="<?php echo $Reponse['eval']; ?>">
                                    </td>
                                    <td>
                                        <button class ="updateButton" type="submit" name="updateButton">update</button>
                                    </td>
                                     <td>
                                     <a href="deleterep.php?Id_Rep=<?php echo $Reponse['Id_Rep']; ?>">Delete</a>
                                    </td>
                                   
                                </tr>
                            </form>
                        <?php
                        }
                        ?>
                    </tbody>
            </table>
        </div>
</body>

<script>
    function filterTable() {
    var nameInput, nameFilter, specialityInput, specialityFilter, table, tr, td, i, nameTxtValue, specialityTxtValue;
   
    nameInput = document.getElementById("speciality");
    nameFilter = nameInput.value.toUpperCase();
   
    specialityInput = document.getElementById("speciality");
    specialityFilter = specialityInput.value.toUpperCase();
   
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
   
    for (i = 0; i < tr.length; i++) {
        tdName = tr[i].getElementsByTagName("td")[1];
        tdSpeciality = tr[i].getElementsByTagName("td")[1];
       
        if (tdName && tdSpeciality) {
            nameTxtValue = tdName.textContent || tdName.innerText;
            specialityTxtValue = tdSpeciality.textContent || tdSpeciality.innerText;

            if (nameTxtValue.toUpperCase().indexOf(nameFilter) > -1 && specialityTxtValue.toUpperCase().indexOf(specialityFilter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

    </script>
</html>


