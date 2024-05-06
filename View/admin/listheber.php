<?php
include '../../controller/HebergementC.php';
include '../../Controller/CategorieC.php';

$error = '';
$hebergementC = new HebergementC();
$categorieC = new CategorieC();

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

<head><meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./travel.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>
<body>
<div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

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

        <div class="container mt-5">
      <div class="card rounded-3 shadow-sm">
            <div class="card-body">
        <h3>Liste des hebergements</h3>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Ville</th>
                    <th>Adresse</th>
                    <th>Categorie</th>
            <th>Supprimer</th>
            
            <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($currentHebergements as $hebergement): ?>
                    <tr>
                        <td><?php echo $hebergement['nom']; ?></td>
                        <td><?php echo $hebergement['prix']; ?></td>
                        <td><?php echo $hebergement['ville']; ?></td>
                        <td><?php echo $hebergement['adresse']; ?></td>
                        <td><?php echo $hebergementC->getCategoryLibelle(
                            $hebergement['id_categorie']
                        ); ?></td>
                        <td>
                        <form action="" method="POST">
                        <input type="hidden" name="hebergement_id" value="<?= $hebergement[
                            'id'
                        ] ?>">
                        <button type="submit" name="delete_hebergement" class="btn btn-danger">Supprimer</button>
                    </form>
                  </td>

                  <td>
        <button class="btn btn-primary modifier-btn">Modifier</button>
        
        <form class="update-form" action="" method="POST" style="display: none;">
            <input type="hidden" name="hebergement_id" value="<?= $hebergement[
                'id'
            ] ?>">
            <div class="form-group">
                <label for="update_nom">Nom:</label>
                <input type="text" class="form-control" id="update_nom" name="update_nom" value="<?= $hebergement[
                    'nom'
                ] ?>">
            </div>
            <div class="form-group">
                <label for="update_prix">Prix:</label>
                <input type="text" class="form-control" id="update_prix" name="update_prix" value="<?= $hebergement[
                    'prix'
                ] ?>">
            </div>
            <div class="form-group">
                <label for="update_ville">Ville:</label>
                <input type="text" class="form-control" id="update_ville" name="update_ville" value="<?= $hebergement[
                    'ville'
                ] ?>">
            </div>
            <div class="form-group">
                <label for="update_adresse">Adresse:</label>
                <input type="text" class="form-control" id="update_adresse" name="update_adresse" value="<?= $hebergement[
                    'adresse'
                ] ?>">
            </div>
            <div class="form-group">
                <label for="update_id_categorie">Catégorie:</label>
                <select class="form-control" id="update_id_categorie" name="update_id_categorie">
                    
            <?php

$categories = $categorieC->listcat();
foreach ($categories as $category) {
    echo '<option value="' .
        $category['id'] .
        '">' .
        $category['libelle'] .
        '</option>';
}
?>
</select>



                </select>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
        </form>
    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        </div></div></div>

        <ul class="flexbox">
  <li>Monday</li>
  <li>Tuesday</li>
  <li>Wednesday</li>
  <li>Thursday</li>
  <li>Friday</li>
  <li>Saturday</li>
  <li>Sunday</li>
  <li>Saturday</li>
  <li>Sunday</li>
  <li>Saturday</li>
  <li>Sunday</li>
  <li>Saturday</li>
  <li>Sunday</li>
  <li>Saturday</li>
  <li>Sunday</li>
  <li>Saturday</li>
  <li>Sunday</li>
</ul>

      

      
    </div>
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