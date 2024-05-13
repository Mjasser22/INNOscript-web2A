<?php
include '../controller/destinationC.php';

$error = "";

// Créer un objet destination
$destination = null;

// Créer une instance du contrôleur
$destinationC = new DestinationC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valider les données du formulaire
    $name = trim($_POST["name"]);
    $description = trim($_POST["description"]);
    $country = trim($_POST["country"]);
    $city = trim($_POST["city"]);
    $region = trim($_POST["region"]);
    $availability = trim($_POST["availability"]);
    $price = trim($_POST["price"]);

    if (
        !empty($name) &&
        !empty($description) &&
        !empty($country) &&
        !empty($city) &&
        !empty($region) &&
        !empty($availability) &&
        !empty($price) &&
        !empty($latitude) &&
        !empty($longitude)
    ) {
        // Créer un nouvel objet Destination
        $destination = new Destination(
            null, // L'ID sera généré automatiquement
            $name,
            $description,
            $country,
            $city,
            $region,
            $availability,
            $price,
            $latitude,
            $longitude,
            "" // Laissez le champ d'image vide pour l'instant
        );

        try {
            // Ajouter la destination
            $destinationC->addDestination($destination);

            // Rediriger vers la page de liste des destinations
            header('Location: listDestination.php');
            exit(); // Assurez-vous que le script s'arrête après la redirection
        } catch (PDOException $e) {
            $error = "Erreur lors de l'ajout de la destination : " . $e->getMessage();
        }
    } else {
        $error = "Informations manquantes";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une destination</title>
</head>
<body>

<h1>Ajouter une destination</h1>

<?php if ($error): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Nom de la destination :</label><br>
    <input type="text" id="name" name="name"><br>

    <label for="description">Description :</label><br>
    <textarea id="description" name="description"></textarea><br>

    <label for="country">Pays :</label><br>
    <input type="text" id="country" name="country"><br>

    <label for="city">Ville :</label><br>
    <input type="text" id="city" name="city"><br>

    <label for="region">Région :</label><br>
    <input type="text" id="region" name="region"><br>

    <label for="availability">Disponibilité :</label><br>
    <input type="text" id="availability" name="availability"><br>

    <label for="price">Prix :</label><br>
    <input type="text" id="price" name="price"><br>
    <input type="submit" value="Ajouter">
</form>

</body>
</html>

