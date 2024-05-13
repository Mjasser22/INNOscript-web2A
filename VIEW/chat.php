<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nouvelle Destination - WoOx Travel</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">


    
    <style>
        #chat-container {
    background-color: #f5f5f5;
    border-radius: 10px;
    padding: 20px;
    max-width: 600px;
    margin: 0 auto;
    margin-top: 50px;
}

#chat {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.user-message {
    background-color: #dcf8c6;
    padding: 10px;
    border-radius: 10px;
    max-width: 70%;
}

.user-message:hover {
    background-color: #d1f5b8;
}

.bot-message {
    background-color: #e5f3ff;
    padding: 10px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.bot-message:hover {
    background-color: #d5e8ff;
}

.bot-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #007bff;
    display: flex;
    align-items: center;
    justify-content: center;
}

.bot-avatar i {
    color: #fff;
    font-size: 24px;
}

#options {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 10px;
}

#options button {
    background-color: #dcf8c6;
    padding: 10px;
    border-radius: 10px;
    flex-basis: calc(20% - 10px);
}

#options button:hover {
    background-color: #d1f5b8;
}
</style>
</head>

<body>


 


    <div class="inner-banner bg-shape2 bg-color5">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="conatiner">
                    
                </div>
            </div>
        </div>
    </div>


    <section class="shop-detls ptb-100">
        <center><h1>Chatbot!</h1></center>
        <div id="chat-container">
        <div id="chat"></div>
    <div id="options">
      <!--  <button id="option-hello">Hello</button> -->
        <button id="option-products">bonjour</button>
        <button id="option-order">réservation</button>
        <button id="option-discounts">quelle est la destination la plus chère</button>
        <button id="option-help">contacter le support client</button>

    </div>
   <center> <input type="text" id="user-input" placeholder="Type here..."></center>
</div>
    </section>
    


    <script>
        // Function to add bot response to the chat
        // Function to add bot response to the chat
// Function to add bot response to the chat
function botResponse(message) {
    var chat = document.getElementById("chat");
    var botMessage = document.createElement("div");
    botMessage.classList.add("bot-message");
    var botAvatar = document.createElement("div");
    botAvatar.classList.add("bot-avatar");
    botAvatar.innerHTML = `<i class="fas fa-robot"></i>`;
    botMessage.appendChild(botAvatar);
    var messageElement = document.createElement("div");
    messageElement.classList.add("message");
    messageElement.innerText = message;
    botMessage.appendChild(messageElement);
    chat.appendChild(botMessage);
}

// Function to handle user input
function handleUserInput() {
    var input = document.getElementById("user-input").value.toLowerCase();
    var response = "";

    // Respond to specific user inputs
    switch (input) {
    // Existing prompts
    case "bonjour":
        response = "Bonjour ! Comment puis-je vous aider aujourd'hui ?";
        break;
    case "comment ça va?":
        response = "Je suis juste un bot, mais merci de demander !";
        break;
    case "quel est votre nom?":
        response = "Je suis juste un bot, donc je n'ai pas de nom !";
        break;
    case "au revoir":
        response = "Au revoir ! Bonne journée !";
        break;
    case "aide":
        response = "Bien sûr, voici quelques questions que vous pouvez poser:\n- Quelles destinations proposez-vous ?\n- Comment puis-je faire une réservation ?\n- Avez-vous des réductions disponibles ?\n- Quelle est la destination la moins chère ?\n- Quelle est la destination la plus chère ?\n- Quelles sont vos meilleures destinations pour la plongée sous-marine ?\n- Pouvez-vous m'aider à planifier un voyage de plongée sous-marine ?\n- Quels sont vos meilleurs forfaits de plongée sous-marine ?\n- Proposez-vous des visites guidées de plongée sous-marine ?\n- Pouvez-vous fournir des informations sur les certifications de plongée sous-marine ?\n- Comment puis-je contacter votre support client ?\n- Avez-vous des témoignages de clients précédents ?";
        break;
    case "destinations":
        response = "Nous proposons une large gamme de destinations, y compris des destinations de plongée sous-marine, des croisières, des stations balnéaires et des villes historiques. N'hésitez pas à explorer notre site web !";
        break;
    case "réservation":
        response = "Pour faire une réservation, il vous suffit de sélectionner la destination et les dates qui vous conviennent, puis de suivre les instructions de réservation. Si vous avez besoin d'aide, n'hésitez pas à demander !";
        break;
    case "réductions":
        response = "Nous proposons régulièrement des réductions et des promotions. Assurez-vous de vous inscrire à notre newsletter pour rester informé des dernières offres !";
        break;
    case "quelle est la destination la moins chère":
        response = "Notre destination la moins chère est la ville historique de Marrakech, au Maroc, avec des forfaits à partir de 499 DT.";
        break;
    case "quelle est la destination la plus chère":
        response = "Notre destination la plus chère est la croisière de luxe en Antarctique, avec des forfaits à partir de 12 999 DT.";
        break;
    case "meilleures destinations de plongée sous-marine":
        response = "Nos meilleures destinations de plongée sous-marine sont la Grande Barrière de Corail en Australie, les Maldives et la Micronésie. Chacune offre une expérience de plongée sous-marine unique !";
        break;
    case "planifier un voyage de plongée sous-marine":
        response = "Bien sûr, notre équipe peut vous aider à planifier le voyage de plongée sous-marine de vos rêves. Que vous soyez débutant ou plongeur expérimenté, nous avons des forfaits pour tous les niveaux. Dites-nous simplement vos préférences et nous nous occuperons du reste !";
        break;
    case "meilleurs forfaits de plongée sous-marine":
        response = "Nos meilleurs forfaits de plongée sous-marineincluent le forfait \"Plongée en eaux profondes\" aux Maldives, le forfait \"Expédition sous-marine\" en Micronésie et le forfait \"Aventure sous-marine\" en Australie. Chaque forfait offre une expérience de plongée sous-marine unique et inoubliable !";
        break;
    case "visites guidées de plongée sous-marine":
        response = "Oui, nous proposons des visites guidées de plongée sous-marine avec des instructeurs expérimentés. Que vous soyez débutant ou plongeur expérimenté, nos guides s'assureront que vous avez une expérience de plongée sous-marine sûre et agréable.";
        break;
    case "certifications de plongée sous-marine":
        response = "Nous fournissons des informations sur les certifications de plongée sous-marine, y compris PADI Open Water Diver, Advanced Open Water Diver, Rescue Diver et plus encore. Faites-nous savoir si vous êtes intéressé par l'obtention d'une certification !";
        break;
    case "contacter le support client":
        response = "Vous pouvez contacter notre équipe de support client par téléphone au +33 1 23 45 67 89 ou par e-mail à support@agencedesdestinations.com. Nous sommes là pour vous aider avec toutes les questions ou demandes d'assistance que vous pourriez avoir !";
        break;
    case "témoignages":
        response = "Bien sûr ! Voici quelques témoignages de nos clients satisfaits :\n- \"L'agence de destinations a organisé le voyage de plongée sous-marine de mes rêves en Micronésie. Les instructeurs étaient expérimentés et sympathiques, et les sites de plongée étaient incroyables.\" - Jean\n- \"J'ai eu une expérience incroyable avec l'agence de destinations. Leur attention aux détails et leur service client sont inégalés. Je recommande vivement !\" - Marie\n- \"Grâce à l'agence de destinations, j'ai découvert ma passion pour la plongée sous-marine. Leur équipe m'a fait me sentir en sécurité et soutenu tout au long du voyage.\" - Pierre";
        break;
    
    // Additional prompts
    case "méthodes de paiement":
        response = "Nous acceptons diverses méthodes de paiement, y compris les cartes de crédit/débit (Visa, Mastercard, American Express), PayPal et les virements bancaires. Vous pouvez choisir la méthode de paiement qui vous convient le mieux lors du processus de réservation.";
        break;
    case "visites de groupe de plongée sous-marine":
        response = "Oui, nous proposons des visites de groupe de plongée sous-marine pour ceux qui préfèrent plonger avec d'autres personnes. C'est un excellent moyen de rencontrer d'autres passionnés de plongée sous-marine et d'explorer le monde sous-marin ensemble !";
        break;
    case "location d'équipement de plongée sous-marine":
        response = "Si vous avez besoin d'équipement de plongée sous-marine pour votre voyage, nous proposons également des services de location d'équipement. Des bouteilles et détendeurs aux combinaisons et palmes, nous avons tout ce dont vous avez besoin pour une expérience de plongée sous-marine mémorable !";
        break;
    case "forfaits personnalisés":
        response = "Vous recherchez une expérience de plongée sous-marine personnalisée ? Notre équipe peut créer des forfaits personnalisés adaptés à vos préférences, qu'il s'agisse d'une visite privée, d'un événement spécial ou d'une destination deplongée sous-marine unique .";
        break;
    case "cours de plongée sous-marine pour débutants":
        response = "Pour ceux qui sont nouveaux dans la plongée sous-marine, nous proposons des cours de plongée sous-marine pour débutants où vous pouvez apprendre les bases de la plongée sous-marine, les procédures de sécurité et l'utilisation de l'équipement. Nos instructeurs certifiés vous guideront à chaque étape du processus !";
        break;
    case "cours de plongée sous-marine avancés":
        response = "Vous êtes déjà certifié ? Prenez vos compétences en plongée sous-marine au niveau supérieur avec nos cours de plongée sous-marine avancés. Apprenez des techniques telles que la plongée en eaux profondes, la plongée sur épave et la navigation sous-marine auprès d'instructeurs expérimentés .";
        break;
    case "plongée sous-marine en croisière":
        response = "Vivez l'aventure ultime de plongée sous-marine avec nos croisières de plongée sous-marine. Passez plusieurs jours à bord d'un bateau de croisière explorant des sites de plongée sous-marine éloignés et profitez du confort de la plongée directement depuis votre hébergement !";
        break;
    default:
        response = "Je suis désolé, je n'ai pas compris ça.";
}

    // Add bot response to the chat
    botResponse(response);

    // Clear user input field
    document.getElementById("user-input").value = "";
}

// Function to handle option clicks
function handleOptionClick(event) {
    var input = event.target.innerText.toLowerCase();
    document.getElementById("user-input").value = input;
    handleUserInput();
}

// Add event listeners to options
var options = document.querySelectorAll("#options button");
options.forEach(function(option) {
    option.addEventListener("click", handleOptionClick);
});

// Event listener for user input
document.getElementById("user-input").addEventListener("keypress", function(e) {
    if (e.key === "Enter") {
        handleUserInput();
    }
});
    </script>

    <!-- ***** Preloader Start ***** -->
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
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky background-header">
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
    
    <!-- ***** Weekly Offers Section End ***** -->

    <!-- ***** More About Section Start ***** -->
    
    <!-- ***** More About Section End ***** -->

    <!-- ***** Best Locations Section Start ***** -->
    
    <!-- ***** Best Locations Section End ***** -->

    <!-- ***** Call to Action Section Start ***** -->
    
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
        
        
    </div>






</body></html>