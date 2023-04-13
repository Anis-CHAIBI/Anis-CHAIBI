let ftypesInput = document.getElementById("types_transport");
/*let fdepInput = document.getElementById("d_dep");
let farrInput = document.getElementById("d_arr");
let fetatInput = document.getElementById("etat_loc");
let fdureeInput = document.getElementById("duree_loc");*/
var letters = /^[A-Za-z]+$/;



function passValidation() {
    if (ftypesInput.value !="Covoiturages" /*|| ftypesInput.value !="Velos " 
    || ftypesInput.value !="Voitures " || ftypesInput.value !="voitures  "
    || ftypesInput.value !="covoiturages" || ftypesInput.value !="velos hybrides"*/ 
    || ftypesInput.value =="" ) {
        alert("Le type de transport ne correspont pas ");

        return false;
    } else {
        alert("  Valider");
        return true;
    }
}



function typesValidation() {
    if (ftypesInput.value.length < 12) {
        ftypesError = " Le type de transport contient au minimum 12 caractères.";
        document.getElementById("typesEr").innerHTML = ftypesError;

        return false;
    }
   else  if (!ftypesInput.value.match(letters)) {
        ftypesError2 = "Veuillez entrer un type de transport valide ! (seulement des lettres)";
        ftypesValid2 = false;
        document.getElementById("typesEr").innerHTML = ftypesError2;
        return false;
    }
    document.getElementById("typesEr").innerHTML =
        "<p style='color:green'> Correct </p>";

    return true;
}


document.forms["reservation"].addEventListener("submit", function (e) {
    var inputs = document.forms["reservation"];
    let ids = [
        "erreur",
        "typesEr",
        "erreur",
    ];

    ids.map((id) => (document.getElementById(id).innerHTML = "")); // reinitialiser l'affichage des erreurs

    let errors = false;

    //Traitement cas par cas
    if (ftypesInput.value.length < 12) {
        errors = false;
        document.getElementById("typesEr").innerHTML =
            "Le type de transport contient au minimum 12 caractères.";
    } else if (!ftypesInput.value.match(letters)) {
        errors = false;
        document.getElementById("typesEr").innerHTML =
            "Veuillez entrer un type de transport valide ! (seulement des lettres)";
    } else {
        errors = true;
    }

   
    if (
        !(
            ftypesInput.value.match(/[0-9]/g) &&
            ftypesInput.value.match(/[A-Z]/g) &&
            ftypesInput.value.match(/[a-z]/g) &&
            ftypesInput.value.length >= 12
        )
    ) {
        errors = false;
        document.getElementById("typesEr").innerHTML = "Types de transport inexistant";
    } else {
        errors = true;
    }


     /*if (ftypesInput.value !="Covoiturages" || ftypesInput.value !="Vélos hybrides" 
     || ftypesInput.value !="Voitures électriques" || ftypesInput.value !="voitures électriques"
     || ftypesInput.value !="covoiturages" || ftypesInput.value !="vélos hybrides"
     || ftypesInput.value =="") {
        errors = false;
        document.getElementById("typesEr").innerHTML =
            "Le type de transport  ne correspont pas";
    } else {
        errors = true;
    }*/

    //Traitement générique
    for (var i = 0; i < inputs.length; i++) {
        if (!inputs[i].value) {
            errors = false;
            document.getElementById("erreur").innerHTML =
                "Veuillez renseigner tous les champs";
        }
    }

    if (errors === false) {
        e.preventDefault();
    } else {
        alert("formulaire envoyé");
    }
});



/*function pass1Validation() {
    if ( fetatInput.value !="Disponible" || fetatInput.value !="Non disponible" 
    || fetatInput.value !="disponible" || fetatInput.value !="non disponible" 
    || fetatInput.value =="" ) {
        alert(" L'état de location ne correspont pas");

        return false;
    } else {
        alert(" Valider");
    }
}

function depValidation() {
    if (fdepInput.value.length < 5) {
        fdepError = " Le type de transport contient au minimum 12 caractères.";
        document.getElementById("typesEr").innerHTML = ftypesError;

        return false;
    }
    if (!ftypesInput.value.match(letters)) {
        ftypesError2 = "Veuillez entrer un type de transport valide ! (seulement des lettres)";
        ftypesValid2 = false;
        document.getElementById("typesEr").innerHTML = ftypesError2;
        return false;
    }
    document.getElementById("typesEr").innerHTML =
        "<p style='color:green'> Correct </p>";

    return true;
}
*/