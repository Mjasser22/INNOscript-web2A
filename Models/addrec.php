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
    <link rel="stylesheet" href="Reclamation1.css">
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
                        <li><a href="index_user.html" class="active">Home</a></li>
                        <li><a href="indexEmploi.html">Emploi</a></li>
                        <li><a href="">Hebergement</a></li>
                        <li><a href="">Reservation</a></li>
                        <li><a href="index.html">log_out</a></li>
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
                </div>
            </div>
        </div>
        <div class="reclamation-form">
        <div class="container">
            <div class="row">
                
                </div>



    <div class="contact1">
    
		<div class="container-contact1">
        
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="assets/images/recimage.png" alt="IMG">
			</div>

			<form action="../Model/add.php" class="contact1-form validate-form"  name="gs" role="search" method="post">
				<span class="contact1-form-title">
                    Votre réclamation
				</span>

				<div class="wrap-input1 validate-input" data-validate = "Id User is required">
					<input class="input1" type="text" name="Id_U" placeholder="Id User">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Id Hebergement is required">
					<input class="input1" type="text" name="Id_E" placeholder="Id Hebergement">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Message is required">
					<textarea class="input1" name="descrip" placeholder="Message"></textarea>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn">
						<span>
							Envoyer Reclamation
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

    </div>
            </div>
        </div>
    </div>
    </div>
<!--   
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
        <div class="reclamation-form">
        <div class="container">
            <div class="row">
                
                </div>
                <div class="col-lg-12">
                    <form action="../Models/add.php" id="reclamation-form" name="gs" role="search" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Donnez votre <em>Reclamation</em> à travers ce <em>formulaire</em></h4>
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
                                    <button id="submit-btn" class="main-button" type="submit" href="confirmation">Envoyer votre réclamation</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div> -->
   
  
    
  
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
    // Vérifier le nombre de mots inappropriés dans la description
    $countInappropriate = $recC->countInappropriateWords($descrip);

    // Si le nombre de mots inappropriés est supérieur à 3, afficher un message de bannissement
    if ($countInappropriate > 3) {
        echo "<script>alert('Vous avez été banni pour avoir ajouté trop de mots inappropriés.');</script>";
        // Vous pouvez également prendre d'autres mesures, telles que bloquer l'accès ou désactiver la fonctionnalité d'ajout de réclamations
    } else {
        // Si le nombre de mots inappropriés est inférieur ou égal à 3, ajouter la réclamation normalement
        $Reclamation = new Reclamation($Id_R, $Id_E, $Id_U, $descrip);
        $recC->addrec($Reclamation);
        echo "<script>alert('Votre réclamation a été ajoutée avec succès.');</script>";
        // Vous pouvez rediriger l'utilisateur vers une autre page ou afficher un message de succès ici
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
</script> -->



<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->
	<script src="ReclamationJS.js"></script>

</body>
</html>