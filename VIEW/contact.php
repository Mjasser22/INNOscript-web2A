<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Agence de Voyage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        #map {
            height: 300px;
            margin-top: 20px;
        }
        nav {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin-right: 10px;
        }
        nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<nav>
        <a href="view1.php">Accueil</a>
        <a href="#">Destinations</a>
        <a href="#">Services</a>
        <a href="#">À propos</a>
        <a href="contact.php">Contact</a>
    </nav>
    <div class="container">
        <h1>Nous Contacter</h1>
        <form action="mailto:destinataire@example.com" method="post" enctype="text/plain">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <input type="submit" value="Envoyer">
        </form>

        <div>
            <h2>Informations de Contact</h2>
            <p>Numéro de téléphone : 50141988</p>
            <p>Adresse : ESPRIT - Cours du soir, Arien soghra ghazela</p>
            <p>Email : <a href="mailto:destinataire@example.com">Selmi.mootez@esprit.tn</a></p>
        </div>

        <div id="map"></div>
    </div>

    <script>
        function initMap() {
            var location = {lat: 36.6361237, lng: 9.5861768}; 

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: location
            });

            var marker = new google.maps.Marker({
                position: location,
                map: map,
                title: 'Agence de Voyage'
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=VOTRE_CLE_API&callback=initMap" async defer></script>
</body>
</html>
