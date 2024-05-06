<?php
include '../../Controller/HebergementC.php';
include '../../Controller/CategorieC.php';
include '../../Controller/ReviewC.php';

$error = '';

$hebergement = null;

$hebergementC = new HebergementC();
$categorieC = new CategorieC();

$reviewC = new ReviewC();

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

$categories = $categorieC->listcat();

if (
    $_SERVER['REQUEST_METHOD'] == 'POST' &&
    isset($_POST['delete_hebergement'])
) {
    $hebergement_id = $_POST['hebergement_id'];
    $hebergementC->deleteHebergement($hebergement_id);
    // Redirect to prevent form resubmission
    header('Location: hebergement.php');
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
    header('Location: hebergement.php');
    exit();
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
    
    <link href="listcategorie.scss" rel="stylesheet">
    <link href="./travel.css" rel="stylesheet">


    <style>
        /* Define CSS for star rating display */
        .star-rating {
            display: inline-block;
            font-size: 1.5em;
        }
        .star-rating span {
            color: gold;
        }
    </style>
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

        </div>
      </div>
      <div class="container mt-5">
      <div class="card rounded-3 shadow-sm">
            <div class="card-body">

            <div class="scroll-container">
            <div class="list-container">               
            <?php foreach ($categories as $categorie): ?>
                                       <div class="categorie-item" data-category-id="<?php echo $categorie[
                                           'id'
                                       ]; ?>">
                                       <?php echo $categorie['libelle']; ?>
                                      </div>

                       
                <?php endforeach; ?>
  </div>
  </div>

  
  <h3 class="mt-5 mb-4">Liste des hebergements</h3>

  <div class="container">
  
  <div class="row mb-3">
        <div class="col-md-3 offset-md-9">
            <input type="text" id="searchInput" class="form-control" placeholder="Recherche...">
        </div>
    </div>

    <div class="row hebergement-grid">
        <?php foreach ($currentHebergements as $hebergement): ?>

          <?php
        $id_hebergement = $hebergement['id'];
        $averageRating = $reviewC->getAverageRatingByHebergementId($id_hebergement);
        $filledStars = round($averageRating);
        ?>
            <div class="col-md-6 mb-4 hebergement-card" data-category-id="<?php echo $hebergement[
                'id_categorie'
            ]; ?>">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $hebergement[
                            'nom'
                        ]; ?></h5>
                        <p class="card-text">Prix: <?php echo $hebergement[
                            'prix'
                        ]; ?></p>
                        <p class="card-text">Ville: <?php echo $hebergement[
                            'ville'
                        ]; ?></p>
                        <p class="card-text">Adresse: <?php echo $hebergement[
                            'adresse'
                        ]; ?></p>
                        <p class="card-text">Catégorie: <?php echo $hebergementC->getCategoryLibelle(
                            $hebergement['id_categorie']
                        ); ?></p>
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                <?php if ($i <= $filledStars): ?>
                                    <span><img class="mb-2" style="width: 20px; height: 20px;" src='./assets/images/star.png'></span>
                                <?php else: ?>
                                    <span></span>
                                <?php endif; ?>
                            <?php endfor; ?>
                            <br>
                      <?php if ($averageRating == null): ?>
                        <p class="card-text">No Reviews Yet</p>
                    <?php endif; ?>
                        <button class="btn btn-primary show-review-form" data-hebergement-id="<?php echo $hebergement['id']; ?>">Leave Review</button>
                        <button class="btn btn-success">Réserver</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>  

        </div>
      </div>
    </div>

    </div>
  </div>

  <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Donner votre avis</h5>
                
            </div>
            <div class="modal-body">
                <form id="reviewForm">
                    <input type="hidden" id="hebergementId" name="hebergementId">
                    <div class="form-group">
                        <label for="rating">Rating (1-5)</label>
                        <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Confirmer</button>
                </form>
            </div>
        </div>
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
        $(document).ready(function() {
        $('.modifier-btn').click(function() {
            $(this).siblings('.update-form').toggle();
        });
    });
</script>
  <script>   
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });
  </script>

<script>
    $(document).ready(function() {
        // Event listener for category clicks
        $('.categorie-item').click(function() {
            const categoryId = $(this).data('category-id');

            // Show only cards belonging to the selected category
            $('.hebergement-card').hide().filter('[data-category-id="' + categoryId + '"]').show();
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Event listener for category clicks
        $('.categorie-item').click(function() {
            const categoryId = $(this).data('category-id');
            console.log(categoryId);

            // Hide all rows initially
            $('.hebergement-row').hide();

            // Show rows that match the selected category
            $('.hebergement-row[data-category-id="' + categoryId + '"]').show();
        });
    });
</script>


<script>
    $(document).ready(function() {
        // Event listener for keyup event on search input
        $('#searchInput').keyup(function() {
            const searchTerm = $(this).val().trim().toLowerCase();

            // Show/hide hebergement cards based on search term
            $('.hebergement-card').each(function() {
                const hebergementName = $(this).find('.card-title').text().trim().toLowerCase();
                if (hebergementName.includes(searchTerm)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Show review form when "Leave Review" button is clicked
        $('.show-review-form').click(function() {
            const hebergementId = $(this).data('hebergement-id');
            $('#hebergementId').val(hebergementId); // Set the hebergementId in the hidden input
            $('#reviewModal').modal('show'); // Show the review form modal
        });

        

        $('#reviewForm').submit(function(event) {
        event.preventDefault();

        // Get form data
        const hebergementId = $('#hebergementId').val();
        const rating = $('#rating').val(); // Assuming 'rating' corresponds to the review

        // Create a new Review object
        const review = {
            id_hebergement: hebergementId,
            review: rating // Assuming 'rating' corresponds to the review
        };


        $.post('submit_review.php', review, function(response) {
            // Handle success (e.g., show confirmation)
            alert('Review submitted successfully!');
            $('#reviewModal').modal('hide'); // Hide the review form modal
        }).fail(function(xhr, status, error) {
            console.log("error");
            alert('Failed to submit review. Please try again.');
        });
        

      });
    });
</script>


  </body>

</html>
