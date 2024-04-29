<?php 
require_once "../config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>WoOx Travel Reclamation Page</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
</head>

<body>

    <!-- Preloader Start -->
    <div id="js-preloader" class="js-preloader loaded">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- Preloader End -->
  
    <!-- Header Area Start -->
    <header class="header-area header-sticky background-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="http://localhost/travel/index.html" class="logo">
                            <img src="./WoOx Travel Reservation Page 2_files/logo.png" alt="">
                        </a>
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
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
  
    <div class="second-page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Book Preferred Deal Here</h4>
                    <h2>Votre réclamation</h2>
                    <p>Pour mieux avancer votre avis nous importe, veuillez saisir votre réclamation en toute franchise.</p>
                    <div class="main-button"><a href="http://localhost/travel/about.html">Découvrez</a></div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="more-info reclamation-info">
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
  
    <div class="reclamation-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="map">
                        <iframe src="./WoOx Travel Reservation Page 2_files/embed.html" width="100%" height="450px" frameborder="0" style="border:0; border-top-left-radius: 23px; border-top-right-radius: 23px;" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-lg-12">
                    <form action="../Models/add.php" id="reclamation-form" name="gs" role="search" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Donnez votre <em>Reclamation</em> à travers ce <em>formulaire</em></h4>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label  class="reclamationC">Id Reclamation</label>
                                    <input type="text" name="Id_R" class="Id_U" placeholder="Ex. JF255T" autocomplete="on" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label  class="reclamationC">Id Ebergement</label>
                                    <input type="text" name="Id_E" class="Id_U" placeholder="Ex. JF255T" autocomplete="on" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label  class="reclamationC">Votre identifiant</label>
                                    <input type="text" name="Id_U" class="Id_U" placeholder="Ex. JF255T" autocomplete="on" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label  class="reclamationC">Identifiant de l'hébergement</label>
                                    <input type="text" name="Id_E" class="Id_E" placeholder="Ex.kjh65T" autocomplete="on" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label  class="reclamationC">Veuillez saisir votre message</label>
                                    <textarea name="descrip" class="descrip" placeholder="Message" autocomplete="on" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">                        
                                <fieldset>
                                    <button id="submit-btn" class="main-button" type="submit">Envoyer votre réclamation</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
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

<script>
function validateForm() {
  // Get all the input elements
  //var idJeu = document.getElementById("Id_R");
  var Id_E = document.getElementById("Id_E");
  var Id_U = document.getElementById("Id_U");
  var descrip = document.getElementById("descrip");

  // // Check if Id_R field is empty (required attribute also helps here)
  // if (idJeu.value === "") {
  //     alert("Veuillez saisir l'ID du jeu !");
  //     return false;
  // }

  // Check if Id_E field is empty
  if (Id_E.value === "") {
    alert("Veuillez saisir un Id_E !");
    return false;
  }

  // // Check if Id_U is a positive number
  // if (isNaN(Id_U.value) || parseFloat(Id_U.value) <= 0 || Id_U.value === "") {
  //   alert("Id_U doit etre strictement positive !");
  //   return false;
  // }

  // // Check if descrip is within the limit (optional)
  // if (parseFloat(descrip.value) > 20 || parseFloat(descrip.value) <= 0) {
  //     alert("La descrip ne peut pas depasser 20 !");
  //     return false;
  // }

  // If all validations pass, submit the form
  return true;
}
</script>

</body>
</html>