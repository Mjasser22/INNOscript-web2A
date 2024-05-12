


<?php
include '../../controller/HebergementC.php';
include '../../Controller/CategorieC.php';





$error = '';
$hebergementC = new HebergementC();
$categorieC = new CategorieC();
$categoriesWithCount = $categorieC->getCategoriesWithHebergementCounts();

$currentHebergements = $hebergementC->listHebergements();
$categories = $categorieC->listcat();

if (
    $_SERVER['REQUEST_METHOD'] == 'POST' &&
    isset($_POST['delete_hebergement'])
) {
    $hebergement_id = $_POST['hebergement_id'];
    $hebergementC->deleteHebergement($hebergement_id);
    // Redirect to prevent form resubmission
    header('Location: listheber.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_nom'])) {
    $hebergement_id = $_POST['hebergement_id'];
    $nom = $_POST['update_nom'];
    $prix = $_POST['update_prix'];
    $ville = $_POST['update_ville'];
    $adresse = $_POST['update_adresse'];
    $id_categorie = $_POST['update_id_categorie'];
    $updatedHebergement = new Hebergement(
        $hebergement_id,
        $nom,
        $prix,
        $ville,
        $adresse,
        $id_categorie
    );
    $hebergementC->updateHebergement($updatedHebergement, $hebergement_id);
    header('Location: listheber.php');
    exit();
}

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
        <center>
        <div class="reservation-form mt-5">
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2">Ajouter un hébergement</th>
                </tr>
            </thead>
            <tbody>
                <form id="reservation-form" name="hebergement" method="POST" action="">
                    <tr>
                        <td>Votre nom</td>
                        <td>
                            <input type="text" name="nom" class="form-control" placeholder="Hotel aziz" required minlength="4" autocomplete="on" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Prix</td>
                        <td>
                            <input type="number" step="0.01" name="prix" class="form-control" placeholder="Ex. 150.00" autocomplete="on" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Ville</td>
                        <td>
                            <input type="text" name="ville" class="form-control" required minlength="4" placeholder="Ex. Paris" autocomplete="on" required pattern="[^\d]+">
                            <!-- pattern="[^\d]+" ensures that no numerals are allowed -->
                        </td>
                    </tr>
                    <tr>
                        <td>Adresse</td>
                        <td>
                            <input type="text" name="adresse" class="form-control" placeholder="Ex. 123 Rue de la Plage" autocomplete="on" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Catégorie</td>
                        <td>
                            <select name="id_categorie" class="form-select" required>
                                <?php
                                foreach ($categories as $category) {
                                    echo '<option value="' . $category['id'] . '">' . $category['libelle'] . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
</div>

        </center>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->

            <!-- Nav Item - Tables -->
            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>

        </ul>
        

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


    
    <script>
     $(document).ready(function() {
    $('.modifier-btn').click(function() {
        console.log("Modifier button clicked");
        $(this).siblings('.update-form').toggle();
    });
});
</script>

    
</body>

</html>