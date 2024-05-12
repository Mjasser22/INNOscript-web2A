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
        </div>
        <div class="container">
            <a href="hebergement.php">
                <button class="ajouter">Ajouter</button>
            </a>
            
            
        </div>
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

        
      <div class="card rounded-3 shadow-sm">
            <div class="card-body">
                <h3>Nombre d'hebergement par categorie</h3>
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th>Categorie</th>
                            <th class="text-center">Nombre d'hebergements</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($categoriesWithCount as $category) {
                            echo '<tr>';
                            echo '<td>' . $category['libelle'] . '</td>';
                            echo '<td  class="text-center">' . $category['hebergement_count'] . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
                
            </div>
            </div>
      
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