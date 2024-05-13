<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Destination</title>
    <!-- Liens vers les feuilles de style Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Feuille de style personnalisée -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Formulaire de Destination</h2>
        <form action="addDestination.php" method="POST" enctype="multipart/form-data">
            <!-- Champ ID -->
           
            <!-- Champ Nom -->
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <!-- Champ Description -->
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <!-- Champ Pays -->
            <div class="form-group">
                <label for="country">Pays:</label>
                <input type="text" class="form-control" id="country" name="country">
            </div>
            <!-- Champ Ville -->
            <div class="form-group">
                <label for="city">Ville:</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
            <!-- Champ Région -->
            <div class="form-group">
                <label for="region">Région:</label>
                <input type="text" class="form-control" id="region" name="region">
            </div>
            <!-- Champ Disponibilité -->
            <div class="form-group">
                <label for="availability">Disponibilité:</label>
                <input type="text" class="form-control" id="availability" name="availability">
            </div>
            <!-- Champ Prix -->
            <div class="form-group">
                <label for="price">Prix:</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <!-- Champ Latitude -->
            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" class="form-control" id="latitude" name="latitude">
            </div>
            <!-- Champ Longitude -->
            <div class="form-group">
                <label for="longitude">Longitude:</label>
                <input type="text" class="form-control" id="longitude" name="longitude">
            </div>
            <!-- Champ d'upload d'image -->
           
            <!-- Bouton Enregistrer -->
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>

    <!-- Scripts JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
