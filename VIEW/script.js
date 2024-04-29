var message_valeur=document.querySelector(".employe").children[1];
var ID_employe,nom,prenom,age,numTel,adresse,date_debut,date_fin,email;
var valeur;
//CECI NOUS PERMET DE SELECTIONNER LE 2 EME PARAGRAHPE DANS LA DIV AYANT LA CLASS INFORMATION
window.onload=()=>{
    valeur="Aucune valeur"
    message_valeur.innerHTML=valeur;
}
document.forms[0].onchange=()=>{
    console.log("change");
}
var qr = new QRious({
    element: document.querySelector('.qrious'),
    size: 250,
    value: valeur
  });
function change(element) {
switch (element.name) {
    case "ID_employe":
        ID_employe=element.value;
      break; 
    case "nom":
        nom=element.value
     break;
     case "prenom": 
     prenom=element.value;
     break;
    case "age identite":
        age=element.value;    
    break;
    case "numTel":
        numTel=element.value;    
    break;
    case "adresse":
        adresse=element.value;
    break;
        case "date_debut":
            date_debut=element.value;
        break;
    case "date_fin":
        date_fin=element.value;
            
        break;
        case "email":
            email=element.value;
        break;
        


    
}

valeur=ID_employe+'-'+nom+'-'+prenom+'-'+age+'-'+numTel+'-'+adresse+'-'+date_debut+'-'+date_fin+'-'+email+ '';
qr.value=valeur;
message_valeur.innerHTML=qr.value;


  
   
}



  