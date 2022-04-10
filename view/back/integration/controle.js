function verifProduit() {
var error="<ul>"
var categorie = document.querySelector('#categorie').value;
console.log("azet")
if (categorie.charAt(0) < 'A' || categorie.charAt(0) > 'Z') {
        
console.log( "<li>Le libelle doit commencer par une lettre Majuscule </li>");
}
else {
   var msg = "Saisie effectuée avec succès";
   alert(msg);
    return true;
}
}
