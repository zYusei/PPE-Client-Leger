const nomCarte = document.getElementById('inputNom');
const numeroCarte = document.getElementById('inputNum');
const dateCarte = document.getElementById('inputDate');
const cvvCarte = document.getElementById('inputCVV');


document.getElementById('submit').addEventListener('click', function () {

    if (nomCarte.value == '') {
        nomCarte.style.cssText = 'border : 1px solid red;';
    } else {
        nomCarte.style.cssText = 'border : 1px solid green;';
    }

    if (numeroCarte.value == '') {
        numeroCarte.style.cssText = 'border : 1px solid red;';
    } else {
        numeroCarte.style.cssText = 'border : 1px solid green;';
    }


    if (dateCarte.value == '') {
        dateCarte.style.cssText = 'border : 1px solid red;';
    } else {
        dateCarte.style.cssText = 'border : 1px solid green;';
    }


    if (cvvCarte.value == '') {
        cvvCarte.style.cssText = 'border : 1px solid red;';
    } else {
        cvvCarte.style.cssText = 'border : 1px solid green;';
    }

});


document.getElementById('submit').addEventListener('click', function () { //Quand l'utilistaeur clique sur le bouton submit du formulaire de paiement
    if (nomCarte.value == '' || numeroCarte.value == '' || dateCarte.value == '' || cvvCarte.value == '') { //Si un des champs est vide
        event.preventDefault(); //On empêche l'envoi du formulaire
    } else {
        event.preventDefault(); //On empêche l'envoi du formulaire

        document.getElementById('textbtnSublit').style.display = 'none'; //On affiche le message de validation et le gif de chargement
        document.getElementById('gif').style.display = 'block';
        document.getElementById('flash').style.display = 'block';


        var formData = new FormData(document.getElementById('FormPurchase')); //On récupère les données du formulaire

        var xhr = new XMLHttpRequest(); //On envoie les données du formulaire au serveur
        xhr.open('POST', 'Ajax_Purchase.php', true); //sur la page Ajax_Purchase.php
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () { //On traite la réponse du serveur
            if (xhr.readyState === 4 && xhr.status === 200) {
                // traite la réponse du serveur
                var response = JSON.parse(xhr.responseText);
                if (response.success) { //Si la réponse est positive
                    // redirige vers la page de remerciement
                    setTimeout(function () {
                        //recupérer l'url jusqu'à "page=" et ajouter "page=2"
                        var url = window.location.href;
                        var url2 = url.substring(0, url.indexOf("page=") + 5);
                        window.location.href = url2 + "2"; //rédirige vers la page dashboard


                    }, Math.random() * (4500 - 2500) + 2500); //On redirige vers la page dashboard après un délai aléatoire entre 2.5 et 4.5 secondes
                } else {
                    // affiche un message d'erreur
                    alert(response.message);
                }
            }
        };
        xhr.send(formData);
    }
});
