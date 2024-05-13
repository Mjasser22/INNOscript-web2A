<?php

include '../../Controller/voyageCon.php';
include '../../Controller/categoryCon.php';
$categoryC = new CategoryController("category");
$categories = $categoryC->listCategories();


$voyageC = new VoyageController("voyage");


$result = isset($_GET['result']) ? $_GET['result'] : null;
$Ca = isset($_GET['category']) ? $_GET['category'] : null;
if ($Ca == NULL) {
    $voyages = $voyageC->listVoyages();
}else{
    $voyages = $voyageC->listVoyagesCon($Ca);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>WoOx Travel Bootstrap 5 Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!--

TemplateMo 580 Woox Travel

https://templatemo.com/tm-580-woox-travel

-->
    <style>
        .main-nav .nav {
            list-style-type: none;
            /* Removes bullet points from the list */
            margin: 0;
            padding: 0;
        }

        .main-nav .nav li {
            position: relative;
            /* Essential for absolute positioning of dropdown */
            display: inline-block;
            /* Aligns menu items horizontally */
        }

        .main-nav .nav li a {
            display: block;
            padding: 10px;
            /* Adjust padding as needed */
            text-decoration: none;
            /* Removes underline from links */
            color: black !important;
            /* Text color */
        }

        .main-nav .nav .dropdown-content {
            display: none;
            /* Hide the dropdown content by default */
            position: absolute;
            /* Positions the dropdown right below the menu item */
            background-color: #f9f9f9;
            /* Light background for the dropdown */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            /* Adds shadow for depth */
            min-width: 160px;
            /* Minimum width of dropdown */
            z-index: 1;
            /* Ensures dropdown is on top */
        }

        .main-nav .nav .dropdown:hover .dropdown-content {
            display: block;
            /* Displays dropdown on hover */
        }

        .main-nav .nav .dropdown-content a {
            text-align: left;
            /* Aligns link text to the left */
            padding: 12px 16px;
            /* Padding for dropdown items */
            text-decoration: none;
            /* Removes underline */
            display: block;
            /* Ensures links are block-level, easier to click */
            color: black;
            /* Text color for dropdown items */
        }

        .main-nav .nav .dropdown-content a:hover {
            background-color: #ddd;
            /* Light grey background on hover */
        }
    </style>
</head>

<body>



    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/logo.png" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="reservation.php">Categories</a></li>
                            <li><a href="deals.html">book yours</a></li>
                            <li><a href="check_reservation.php">Reservation</a></li>
                            <li class="dropdown">
                                <a href="reservation.php" class="active">Voyage</a>
                                <ul class="dropdown-content">
                                    <?php foreach ($categories as $category) : ?>
                                        <li><a href="reservation.php?category=<?= htmlspecialchars($category['id']); ?>"><?= htmlspecialchars($category['name']); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="visit-country">
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-heading">
                        <h2>Visit One Of Our Countries Now</h2>
                        <p>Book now.</p>
                    </div>
                </div>
            </div>
            <div class="row">





                <div class="col-lg-8">
                    <div class="items">
                        <div class="row">
                            <?php foreach ($voyages as $voyage) : ?>
                                <?php
                                // Assuming you have a method getCategory in your CategoryController
                                $category = $categoryC->getCategory($voyage['id_category']);
                                ?>
                                <div class="col-lg-12">
                                    <div class="item">
                                        <div class="row">


                                            <div class="col-lg-4 col-sm-5 ">
                                                <div class="image">
                                                    <img src="images/<?= htmlspecialchars($voyage['path_image']); ?>" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-sm-7">
                                                <div class="right-content">
                                                    <h4><?= htmlspecialchars($voyage['Country']); ?></h4>
                                                    <span><?= htmlspecialchars($voyage['continent']); ?></span>
                                                    <div class="main-button">
                                                        <a href="about.html"><?= htmlspecialchars($category['name']); ?></a>
                                                    </div>
                                                    <p><?= htmlspecialchars($voyage['description']); ?></p>
                                                    <ul class="info">
                                                        <li><i class="fa fa-calendar"></i><?= htmlspecialchars($voyage['population']); ?></li>
                                                        <li><i class="fa fa-globe"></i> 41.290 km2</li>
                                                        <li><i class="fa fa-home"></i> $<?= htmlspecialchars($voyage['price']); ?></li>
                                                    </ul>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; ?>


                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="side-bar-map">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="550px" frameborder="0" style="border:0; border-radius: 23px; " allowfullscreen=""></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>