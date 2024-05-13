
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "user";

    try {
        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO destination (name, description, country, city, region, availability, price, image_url) 
                                VALUES (:name, :description, :country, :city, :region, :availability, :price, :image_url)");

        // Bind parameters
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':country', $_POST['country']);
        $stmt->bindParam(':city', $_POST['city']);
        $stmt->bindParam(':region', $_POST['region']);
        $stmt->bindParam(':availability', $_POST['availability']);
        $stmt->bindParam(':price', $_POST['price']);
        $price = floatval($_POST['price']);
       
        
        // Upload image
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        $stmt->bindParam(':image_url', $target_file);

        // Execute the query
        $stmt->execute();

        // Redirect to success page
        header('Location: listDestination.php');
        exit();
    } catch (PDOException $e) {
        // Display error message
        echo "Error: " . $e->getMessage();
    }

    // Close connection
    $conn = null;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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
        <!-- Header content here -->
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="about-main-content">
        <!-- Main banner content here -->
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Cities & Towns Section Start ***** -->
    <div class="cities-town">
        <!-- Cities & Towns content here -->
    </div>
    <!-- ***** Cities & Towns Section End ***** -->

    <!-- ***** Weekly Offers Section Start ***** -->
    <div class="weekly-offers">
        <!-- Weekly offers content here -->
    </div>
    <!-- ***** Weekly Offers Section End ***** -->

    <!-- ***** More About Section Start ***** -->
    <div class="more-about">
        <!-- More about content here -->
    </div>
    <!-- ***** More About Section End ***** -->

    <!-- ***** Best Locations Section Start ***** -->
    <div class="best-locations">
        <!-- Best locations content here -->
    </div>
    <!-- ***** Best Locations Section End ***** -->

    <!-- ***** Call to Action Section Start ***** -->
    <div class="call-to-action">
        <!-- Call to action content here -->
    </div>
    <!-- ***** Call to Action Section End ***** -->

    <!-- ***** Footer Section Start ***** -->
    <footer>
        <!-- Footer content here -->
    </footer>
    <!-- ***** Footer Section End ***** -->


    <!-- Scripts -->
     <!-- Scripts -->
     <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/popup.js"></script>
    <script src="assets/js/custom.js"></script>

    <script>
        $(".option").click(function () {
            $(".option").removeClass("active");
            $(this).addClass("active");
        });
    </script>
    <script>
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Handle the response from the server
                console.log(this.responseText);
            }
        };
        xhttp.open("GET", "destinationAjax.php?action=fetchData", true); // Include 'action=fetchData' in the URL
        xhttp.send();
    </script>

    <!-- Formulaire pour ajouter une nouvelle destination -->
    <div class="container">
        <h2>Ajouter une nouvelle destination</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" id="name" placeholder="Entrer le nom de la destination" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" placeholder="Entrer la description de la destination" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="country">Pays:</label>
                <input type="text" class="form-control" id="country" placeholder="Entrer le pays de la destination" name="country" required>
            </div>
            <div class="form-group">
                <label for="city">Ville:</label>
                <input type="text" class="form-control" id="city" placeholder="Entrer la ville de la destination" name="city" required>
            </div>
            <div class="form-group">
                <label for="region">Région:</label>
                <input type="text" class="form-control" id="region" placeholder="Entrer la région de la destination" name="region" required>
            </div>
            <div class="form-group">
    <label for="availability">Disponibilité:</label>
    <input type="date" class="form-control" id="availability" name="availability" required>
</div>

            <div class="form-group">
                <label for="price">Prix:</label>
                <input type="number" class="form-control" id="price" placeholder="Entrer le prix de la destination" name="price" required>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="number" class="form-control" id="latitude" placeholder="Entrer la latitude de la destination" name="latitude" required>
            </div>
            
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>



</body>

</html>
