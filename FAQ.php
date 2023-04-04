<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>FAQ</title>
</head>

<body>
    <?php
    require_once("./views/_navbar.php");
    ?>

    <main class="d-flex">
        <div class="container bg-grey p-4">
            <div class="col-md-12 mx-auto">
                <div class="bg-gradient-green rounded-top p-3 text-center text-light">
                    <div class="titre">
                        FOIRE AUX QUESTIONS
                    </div>
                </div>
                <div class="question form-select rounded-0 border-0 p-3 pointer" onclick="Question1()">
                    A quel âge peut-on s'inscrire à l'examen du permis de conduire?
                </div>
                <div id="question1" class="bg-white quest quest-close">
                    <p class="p-3">
                        Il faut être âgé de 17 ans au moins pour pouvoir déposer un dossier (ou 15 ans au moins si vous souhaitez préparer le permis dans le cadre de l'apprentissage anticipé à la conduite ou le BSR). Le candidat peut se présenter à l'examen pratique dés l'âge de 17 ans et demi. En cas de réussite il pourra conduire seul dés le premier jour de sa majorité.
                    </p>
                </div>
                <div class="question form-select rounded-0 border-0 p-3 pointer" onclick="Question2()">
                    Quels sont les documents demandés pour l'inscription ?
                </div>
                <div id="question2" class="bg-white quest quest-close">
                    <p class="p-3">
                        Les documents peuvent varier selon les auto-écoles, mais en règle générale, voici la liste des documents que votre auto-école vous demandera pour ouvrir un dossier :
                    </p>
                    <ul>
                        <li>photocopie de la carte nationale d’identité recto-verso</li>
                        <li>2 photos d’identité pour le permis</li>
                        <li>2 enveloppes timbrées avec vos nom et adresse</li>
                        <li>Si vous êtes français et agé de 16 à 18 ans : 1 photocopie de l’attestation de recensement</li>
                        <li>Si vous êtes français et âgé de 18 ans révolu à 25 ans non révolus, 1 photocopie du certificat de participation à la journée défense et citoyenneté (JDC) anciennement JAPD</li>
                        <li>Si vous êtes né après 1987 et que vous passez le permis pour la première fois, 1 photocopie de l’ASSR2 ou de l’ASR</li>
                    </ul>
                    <p class="p-3">
                        Pour se présenter à l'examen vous aurez besoin de :
                    </p>
                    <ul>
                        <li>Le formulaire d'inscription Cerfa référence 02 n°14866*01 rempli. Ce formulaire permet de faire une demande de permis de conduire par inscription à l'examen ou avec attestation de formation</li>
                        <li>Le formulaire Cerfa référence 60 n°14948*01. Ce formulaire de recueil complémentaire des données nécessaire à l'édition du titre de conduite au format de l'Union Européenne.</li>
                    </ul>
                    <p class="p-3">
                        Si vous vous inscrivez en conduite accompagnée ou en conduite supervisée, la photocopie du permis de conduire de l’accompagnateur ainsi qu’un avenant de la compagnie d’assurance seront nécessaires
                    </p>
                </div>
                <div class="question form-select rounded-0 border-0 p-3 pointer" onclick="Question3()">
                    A quel âge peut-on se présenter à l'examen du code ?
                </div>
                <div id="question3" class="bg-white quest quest-close">
                    <p class="p-3">
                        La présentation à l’examen est possible pour les personnes âgées de 15 ans.
                    </p>
                </div>
                <div class="question form-select rounded-0 border-0 p-3 pointer" onclick="Question4()">
                    Combien de temps dure la formation ?
                </div>
                <div id="question4" class="bg-white quest quest-close">
                    <p class="p-3">
                        Pour le code de la route, il n’y a pas de minimum d’heures à réaliser. C’est un travail régulier qui vous permettra de réussir l’examen.
                        L’entraînement peut s’effectuer dans l’auto-école ou bien à distance, avec des formations en ligne.
                        Vous avancez à votre rythme. Pour la conduite, il faut un minimum 20h de conduite.
                        Toutefois, il est rare que cela soit suffisant. En général, lors de votre évaluation, l’enseignant peut estimer le nombre d’heures nécessaire.
                        Le candidat peut se présenter autant de fois que nécessaire à l’examen du code de la route.
                        Pour la conduite, il peut se présenter un nombre de fois limité.
                        S ‘il échoue à la cinquième présentation, il devra repasser l’épreuve théorique.
                    </p>
                </div>
                <div class="question form-select rounded-0 border-0 p-3 pointer" onclick="Question5()">
                    Comment se déroulent les séances de code ?
                </div>
                <div id="question5" class="bg-white quest quest-close">
                    <p class="p-3">
                        Les séances de code ont lieu dans une salle de l’auto-école.
                        L’élève dispose en général d’un boîtier qui lui permet de répondre directement aux questions proposées.
                        Mais certaines auto-écoles ne possède pas ce dispositif, les réponses se font donc sur papier.
                        Lors de l’examen, les élèves seront tous équipés d’un boîtier.
                        Avant de commencer, l’usage du boîtier sera expliqué aux candidats.
                        Il est très simple d’utilisation avec juste 6 touches.
                    </p>
                    <ul>
                        <li>4 pour les réponses : A, B, C, D</li>
                        <li>1 touche pour valider sa réponse</li>
                        <li>1 touche pour corriger éventuellement sa réponse avant de la valider</li>
                    </ul>
                </div>
                <div class="question form-select rounded-0 border-0 p-3 pointer" onclick="Question6()">
                    Comment le code est-il évalué ?
                </div>
                <div id="question6" class="bg-white quest quest-close">
                    <p class="p-3">
                        Pour obtenir l’examen du code de la route, le candidat doit répondre juste à au moins 35 questions sur 40. <br>
                        Depuis 2015, le code, une fois obtenu est valable 5 ans.
                    </p>
                </div>
                <div class="question form-select rounded-0 border-0 p-3 pointer" onclick="Question7()">
                    Est-il possible de faire des heures de conduite en même temps que le code ?
                </div>
                <div id="question7" class="bg-white quest quest-close">
                    <p class="p-3">
                        Oui, il est tout à fait possible de commencer les leçons de conduite en même temps que l'apprentissage du code de la route.
                        Souvent l'auto-école recommande d'obtenir d'abord le code avant de commencer les leçons de conduite car il semblerait que ce rythme soit plus rapide et moins onéreux.
                    </p>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once("./views/_footer.php");
    ?>
</body>

</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;700;800&display=swap');

    html,
    body {
        font-family: 'Karla';
    }

    .bg-grey {
        background-color: #f3f4f6;
    }

    #FAQ {
        text-decoration: underline;
        text-underline-offset: 5px;
    }

    .titre {
        font-size: 1.80rem;
        font-weight: 800;
    }

    .bg-gradient-green {
        background-image: linear-gradient(315deg, #3bb78f 0%, #0bab64 74%);
    }

    .question {
        font-size: 1.20rem;
        font-weight: 700;
        border-top: 0.5px solid black !important;
    }

    .quest {
        transition-duration: 0.5s;
        height: 0;
        overflow: hidden;
    }

    .quest-close {
        height: 0 !important;
    }

    .bg-grey {
        flex: 1;
    }
</style>

<script src="./Js/FAQ.js"></script>