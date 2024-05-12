<?php
include '../../controller/CategorieC.php';
$categorieC = new CategorieC();
$list = $categorieC->listcat();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title</title>
    <link rel="stylesheet" href="hebergement.css">
    <!-- Include other necessary stylesheets -->
</head>

<body>
    <!-- Your HTML content -->
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
                        <span class="title">search:filter data</span>
                    </a>
                    
                    <input type="text" placeholder="Search with speciality" id="speciality" onkeyup="filterTable()" >
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
                <a href="../view/export_pdf.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">export_pdf</span>
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


        </ul>
        <div class="container-fluid">
        <center>
        <h1>List of categories</h1>
        <h2>
            <a href="addcat.php">Add Catégorie</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id catégorie</th>
            <th>Libelle</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $categorie) {
        ?>
            <tr>
                <td><?= $categorie['id']; ?></td>
                <td><?= $categorie['libelle']; ?></td>

                <td align="center">
                    <form method="POST" action="updatecat.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $categorie['id']; ?> name="id">
                    </form>
                </td>
                <td>
                    <a href="deletecat.php?id=<?php echo $categorie['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    
</body>

</html>