// PERMIS B
const nbCours = document.getElementsByName('nbCours');
const typeBoite = document.getElementsByName('typeBoite');
const typePermis = document.getElementsByName('typePermis');
const Montant_Display = document.getElementById("Montant-Display");
let ChampGauche = 0;
let ChampMilieu = 0;
let ChampDroite = 0;
Montant_Display.innerHTML = "0€";
sendDataPermisB();

for (let i = 0; i < nbCours.length; i++) {
    nbCours[i].addEventListener('change', function () {
        nbCours[i].value == 0 ? ChampDroite = 0 : null;
        nbCours[i].value == 150 ? ChampDroite = 150 : null;
        nbCours[i].value == 460 ? ChampDroite = 460 : null;

        if (i == 0 && nbCours[i].checked && nbCours[i].value != 0) { // Si le bouton est coché et que la valeur est différente de 0 alors on met la valeur à 0
            ChampDroite = 0;
        }

        if (i == 1 && nbCours[i].checked && nbCours[i].value != 150) {
            ChampDroite = 150;
        }

        if (i == 2 && nbCours[i].checked && nbCours[i].value != 460) {
            ChampDroite = 460;
        }
        Calculer();
        sendDataPermisB();
    });
}

for (let i = 0; i < typeBoite.length; i++) {
    typeBoite[i].addEventListener('change', function () {

        typeBoite[i].value == 0 ? ChampMilieu = 0 : null;
        typeBoite[i].value == 300 ? ChampMilieu = 300 : null;


        if (i == 0 && typeBoite[i].checked && typeBoite[i].value != 300) {
            ChampMilieu = 300;
        }

        if (i == 1 && typeBoite[i].checked && typeBoite[i].value != 0) {
            ChampMilieu = 0;
        }
        Calculer();
        sendDataPermisB();
    });
}


for (let i = 0; i < typePermis.length; i++) {
    typePermis[i].addEventListener('change', function () {

        typePermis[i].value == 599 ? ChampGauche = 599 : null;
        typePermis[i].value == 739 ? ChampGauche = 739 : null;
        typePermis[i].value == 899 ? ChampGauche = 899 : null;

        if (i == 0 && typePermis[i].checked && typePermis[i].value != 599) { // Si le bouton est coché et que la valeur est différente de 599 alors on met la valeur à 599
            ChampGauche = 599;
        }

        if (i == 1 && typePermis[i].checked && typePermis[i].value != 739) {
            ChampGauche = 739;
        }

        if (i == 2 && typePermis[i].checked && typePermis[i].value != 899) {
            ChampGauche = 899;
        }
        Calculer();
        sendDataPermisB();
    });
}


function Calculer() {
    Montant_Display.innerHTML = parseInt(ChampGauche) + parseInt(ChampMilieu) + parseInt(ChampDroite) + " €"; // On affiche le montant total
}



// PERMIS A
const typePermisA = document.getElementsByName('typePermisA');
const Montant_Display2 = document.getElementById("Montant-Display2");
Montant_Display2.innerHTML = "0€";
let prix_PermisA = 0;
sendDataPermisA();
for (let i = 0; i < typePermisA.length; i++) {
    typePermisA[i].addEventListener('change', function () {

        typePermisA[i].value == 560 ? prix_PermisA = 560 : null;
        typePermisA[i].value == 225 ? prix_PermisA = 225 : null;
        typePermisA[i].value == 243 ? prix_PermisA = 243 : null;

        if (i == 0 || i == 1 && typePermisA[i].checked && typePermisA[i].value != 560) {
            prix_PermisA = 560;
        }

        if (i == 2 && typePermisA[i].checked && typePermisA[i].value != 225) {
            prix_PermisA = 225;
        }

        if (i == 3 && typePermisA[i].checked && typePermisA[i].value != 243) {
            prix_PermisA = 243;
        }

        Montant_Display2.innerHTML = prix_PermisA + " €";
        sendDataPermisA();
    });
}





// CODE
const Code = document.getElementsByName('Code');
const Montant_Display3 = document.getElementById("Montant-Display3");
Montant_Display3.innerHTML = "0€";
let prix_Code = 0;
sendDataCode();
for (let i = 0; i < typePermisA.length; i++) {
    Code[i].addEventListener('change', function () {

        Code[i].value == 10 ? prix_Code = 10 : null;
        Code[i].value == 30 ? prix_Code = 30 : null;

        if (i == 0 && Code[i].checked && Code[i].value != 10) {
            prix_Code = 10;
        }

        if (i == 1 && Code[i].checked && Code[i].value != 30) {
            prix_Code = 30;
        }

        Montant_Display3.innerHTML = prix_Code + " €";
        sendDataCode();
    });
}








function Display_PermisB() {
    document.getElementById("form-PermisB").style.display = "flex";
    document.getElementById("form-PermisA").style.display = "none";
    document.getElementById("form-Code").style.display = "none";

    document.getElementById("validate-PermisB").style.display = "flex";
    document.getElementById("validate-PermisA").style.display = "none";
    document.getElementById("validate-Code").style.display = "none";

    document.getElementById("btn-PermisB").classList.add("boutton-active");
    document.getElementById("btn-PermisA").classList.remove("boutton-active");
    document.getElementById("btn-Code").classList.remove("boutton-active");
}

function Display_PermisA() {
    document.getElementById("form-PermisB").style.display = "none";
    document.getElementById("form-PermisA").style.display = "flex";
    document.getElementById("form-Code").style.display = "none";

    document.getElementById("validate-PermisB").style.display = "none";
    document.getElementById("validate-PermisA").style.display = "flex";
    document.getElementById("validate-Code").style.display = "none";

    document.getElementById("btn-PermisB").classList.remove("boutton-active");
    document.getElementById("btn-PermisA").classList.add("boutton-active");
    document.getElementById("btn-Code").classList.remove("boutton-active");
}

function Display_Code() {
    document.getElementById("form-PermisB").style.display = "none";
    document.getElementById("form-PermisA").style.display = "none";
    document.getElementById("form-Code").style.display = "flex";

    document.getElementById("validate-PermisB").style.display = "none";
    document.getElementById("validate-PermisA").style.display = "none";
    document.getElementById("validate-Code").style.display = "flex";

    document.getElementById("btn-PermisB").classList.remove("boutton-active");
    document.getElementById("btn-PermisA").classList.remove("boutton-active");
    document.getElementById("btn-Code").classList.add("boutton-active");
}


function sendDataPermisB() {
    var total_PermisB = parseInt(ChampGauche) + parseInt(ChampMilieu) + parseInt(ChampDroite);

    var xhr = new XMLHttpRequest();

    xhr.open("POST", "script.php", true);

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.send("total_PermisB=" + total_PermisB);
}

function sendDataPermisA() {
    var total_PermisA = prix_PermisA;

    var xhr = new XMLHttpRequest();

    xhr.open("POST", "script.php", true);

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.send("total_PermisA=" + total_PermisA);
}

function sendDataCode() {
    var total_Code = prix_Code;

    var xhr = new XMLHttpRequest();

    xhr.open("POST", "script.php", true);

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.send("total_Code=" + total_Code);
}