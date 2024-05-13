<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Confirmation de Réclamation</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky background-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="http://localhost/travel/index.html" class="logo">
                            <img src="./WoOx Travel Reservation Page 2_files/logo.png" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="http://localhost/travel/index.html">Home</a></li>
                            <li><a href="http://localhost/travel/about.html">About</a></li>
                            <li><a href="http://localhost/travel/deals.html">Deals</a></li>
                            <li><a href="http://localhost/travel/reclamation.html" class="active">Reclamation</a></li>
                            <li><a href="http://localhost/travel/reservation.html">Reservation</a></li>
                            <li><a href="http://localhost/travel/reservation.html">Book Yours</a></li>
                        </ul>
                        <a class="menu-trigger">
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
                    <h4>Confirmation de Réclamation</h4>
                    <h2>Votre réclamation est prise en charge !</h2>
                    <p>Merci d'avoir soumis votre réclamation. Nous la prendrons en charge dans les plus brefs délais.</p>
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
                        <h4>Contactez nous </h4>
                        <a href="http://localhost/travel/reclamation.html#">+216 456 789 00 (0)</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="info-item">
                        <i class="fa fa-envelope"></i>
                        <h4>Contactez nous via notre mail</h4>
                        <a href="http://localhost/travel/reclamation.html#">Las aguilas@email.com</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="info-item">
                        <i class="fa fa-map-marker"></i>
                        <h4>Visitez notre bureau</h4>
                        <a href="http://localhost/travel/reclamation.html#">24 ,rue hedi nuira ,Tunis </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/popup.js"></script>
    <script src="assets/js/custom.js"></script>

   <!-- <script>
       // Fonction pour rediriger vers la page de confirmation
       function redirectToConfirmation() {
        // Changer la fenêtre du navigateur pour afficher la page de confirmation
        window.location.href = "confirmation.html";
    }
    </script> -->
    <script>
        function validateForm() {
            // Votre logique de validation de formulaire ici
            
            // Si toutes les validations réussissent, soumettez le formulaire
            return true;
        }
        
        document.getElementById("reclamation-form").onsubmit = function() {
            // Valider le formulaire
            if (validateForm()) {
                // Si le formulaire est valide, redirigez vers la page de confirmation
                console.log("Redirection vers la page de confirmation.");
                window.location.href = "confirmation.html";
            } else {
                // Si le formulaire n'est pas valide, empêchez la soumission par défaut du formulaire
                return false;
            }
        };
        </script>
</body>

</html>
