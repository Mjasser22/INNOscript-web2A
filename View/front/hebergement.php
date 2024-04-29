<?php
include '../Controller/HebergementC.php';

$error = '';

$hebergement = null;

$hebergementC = new HebergementC();
if (
    isset($_POST['nom']) &&
    isset($_POST['prix']) &&
    isset($_POST['ville']) &&
    isset($_POST['adresse']) &&
    isset($_POST['id_categorie'])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST['prix']) &&
        !empty($_POST['ville']) &&
        !empty($_POST['adresse']) &&
        !empty($_POST['id_categorie']) 
    ) {
        $hebergement = new Hebergement(
            null,
            $_POST['nom'],
            $_POST['prix'],
            $_POST['ville'],
            $_POST['adresse'],
            $_POST['id_categorie']
        );
        $hebergementC->addHebergement($hebergement);
        header('Location:hebergement.php');
    } else {
        $error = 'Missing information';
    }
}

$currentHebergements = $hebergementC->listHebergements();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_hebergement"])) {
  $hebergement_id = $_POST["hebergement_id"];
  $hebergementC->deleteHebergement($hebergement_id);
  // Redirect to prevent form resubmission
  header("Location: hebergement.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Hebergement</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    
    <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 580 Woox Travel

https://templatemo.com/tm-580-woox-travel

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="deals.php">Deals</a></li>
                        <li><a href="hebergement.php" class="active">Hebergement</a></li>
                        <li><a href="hebergement.php">Book Yours</a></li>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="second-page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Book Prefered Deal Here</h4>
          <h2>Make Your Hebergement</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt uttersi labore et dolore magna aliqua is ipsum suspendisse ultrices gravida</p>
          <div class="main-button"><a href="about.php">Discover More</a></div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info reservation-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-phone"></i>
            <h4>Make a Phone Call</h4>
            <a href="#">+123 456 789 (0)</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-envelope"></i>
            <h4>Contact Us via Email</h4>
            <a href="#">company@email.com</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-map-marker"></i>
            <h4>Visit Our Offices</h4>
            <a href="#">24th Street North Avenue London, UK</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="reservation-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        </div>
        <div class="col-lg-12">
        <form id="reservation-form" name="hebergement" method="POST" action="">
          <div class="row">
            <div class="col-lg-12">
              <h4>Ajouter un hebergement</h4>
            </div>
            <div class="col-lg-6">
              <fieldset>
                <label for="nom" class="form-label">Votre nom</label>
                <input type="text" name="nom" class="form-control" placeholder="Ex. John Smithee" autocomplete="on" required>
              </fieldset>
            </div>
            <div class="col-lg-6">
              <fieldset>
                <label for="prix" class="form-label">Prix</label>
                <input type="text" name="prix" class="form-control" placeholder="Ex. 150.00" autocomplete="on" required>
              </fieldset>
            </div>
            <div class="col-lg-6">
              <fieldset>
                <label for="ville" class="form-label">Ville</label>
                <input type="text" name="ville" class="form-control" placeholder="Ex. Paris" autocomplete="on" required>
              </fieldset>
            </div>
            <div class="col-lg-6">
              <fieldset>
                <label for="adresse" class="form-label">Addresse</label>
                <input type="text" name="adresse" class="form-control" placeholder="Ex. 123 Rue de la Plage" autocomplete="on" required>
              </fieldset>
            </div>
            <div class="col-lg-6">
              <fieldset>
                <label for="id_categorie" class="form-label">Categorie</label>
                <select name="id_categorie" class="form-select" required>
            <option value="1">Hotel</option>
            <option value="2">Maison</option>
            <option value="3">Resort</option>
            <option value="4">Appartement</option>
        </select>
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <button type="submit" class="btn btn-primary">Ajouter</button>
              </fieldset>
            </div>
          </div>
        <span></span>
        </form>
        </div>
      </div>
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
            <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($currentHebergements as $hebergement) : ?>
                    <tr>
                        <td><?php echo $hebergement['nom']; ?></td>
                        <td><?php echo $hebergement['prix']; ?></td>
                        <td><?php echo $hebergement['ville']; ?></td>
                        <td><?php echo $hebergement['adresse']; ?></td>
                        <td><?php echo $hebergementC->getCategoryLibelle($hebergement['id_categorie']); ?></td>
                        <td>
                        <form action="" method="POST">
                        <input type="hidden" name="hebergement_id" value="<?= $hebergement['id'] ?>">
                        <button type="submit" name="delete_hebergement" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        </div></div></div>

      

      
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">WoOx Travel</a> Company. All rights reserved. 
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/wow.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });
  </script>

  </body>

</html>
