// Fonction de validation pour l'identifiant utilisateur
function validateUserId(userId) {
    // Vérifie si l'ID utilisateur est une chaîne de caractères contenant des lettres minuscules, des lettres majuscules et des nombres, avec une longueur maximale de 10 caractères
    return /^[0-9]{1,10}$/.test(userId);
}

// Fonction de validation pour l'identifiant de l'hébergement
function validateAccommodationId(accommodationId) {
    // Vérifie si l'identifiant de l'hébergement est une chaîne de caractères contenant des lettres minuscules, des lettres majuscules et des nombres, avec une longueur maximale de 10 caractères
    return /^[a-zA-Z0-9]{1,10}$/.test(accommodationId);
}

// Fonction de validation pour le champ de description
function validateDescription(description) {
    // Vérifie simplement si le champ de description n'est pas vide
    return description.trim() !== '';
}

// Fonction pour mettre à jour l'apparence des champs en fonction de leur validité
function updateFieldValidity(field, isValid) {
    if (isValid) {
        // Si le champ est valide, ajoutez une classe pour indiquer qu'il est correctement rempli
        field.classList.add('valid');
        field.classList.remove('invalid');
    } else {
        // Si le champ n'est pas valide, ajoutez une classe pour indiquer qu'il y a une erreur
        field.classList.add('invalid');
        field.classList.remove('valid');
    }
}

// Fonction pour vérifier la validité des champs lorsqu'ils sont modifiés
function checkValidity() {
    // Récupère les valeurs des champs
    var userId = document.getElementsByName('Id_U')[0].value;
    var accommodationId = document.getElementsByName('Id_E')[0].value;
    var description = document.getElementsByName('descrip')[0].value;

    // Valide chaque champ et met à jour son apparence
    updateFieldValidity(document.getElementsByName('Id_U')[0], validateUserId(userId));
    updateFieldValidity(document.getElementsByName('Id_E')[0], validateAccommodationId(accommodationId));
    updateFieldValidity(document.getElementsByName('descrip')[0], validateDescription(description));
}

// Écoute les événements de modification sur les champs de saisie et vérifie leur validité
document.querySelectorAll('input[name="Id_U"], input[name="Id_E"], input[name="descrip"]').forEach(function(field) {
    field.addEventListener('input', checkValidity);
});
