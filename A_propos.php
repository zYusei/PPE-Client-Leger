<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once("./views/_navbar.php");
    ?>
    <div class="banner mb-5 position-relative fs-5">
        <h1 class="slogan my-5 text-center">À propos de nous!</h1>
        <div class="voiture position-absolute">
            <img src="images/voiture.avif" alt="" width="100px" height="100px" class="position-relative voiture-img">
        </div>
    </div>
    <main class="fs-5">
        <div class="container">
            <div class="row my-5 py-4">
                <div class="col-8 align-self-center">
                    <p>
                        Nous sommes une auto-école reconnue depuis plusieurs années,
                        spécialisée dans la formation des conducteurs débutants et expérimentés.
                        Nous sommes fiers de fournir un enseignement de qualité supérieure pour
                        aider nos élèves à devenir des conducteurs sûrs et compétents.
                    </p>
                </div>
                <div class="col-4 text-center align-self-center">
                    <img src="images/qualite-superieure.png" alt="" width="200rem" class="img-fluid">
                </div>
            </div>
        </div>
        <div data-aos="fade-right" class="bg-grey">
            <div class="container">
                <div class="row my-5 py-4">
                    <div class="col-4 text-center align-self-center">
                        <img src="images/certification.png" alt="" width="180rem" class="img-fluid">
                    </div>
                    <div class="col-8 align-self-center">
                        <p>
                            Nous offrons une variété de cours de conduite, y compris les leçons de conduite individualisées,
                            les cours de conduite en groupe et les programmes de formation accélérée.
                            Nous sommes également fiers d'être licenciés et certifiés pour fournir des services de formation de qualité.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div data-aos="fade-left" class="row my-5 py-4">
                <div class="col-xl-8 align-self-center">
                    <p>
                        Nous nous efforçons de toujours fournir un service client exceptionnel.
                        Nous sommes toujours disponibles pour répondre à toutes vos questions et
                        pour vous aider à planifier votre formation en fonction de vos besoins et de votre emploi du temps.
                    </p>
                </div>
                <div class="col-xl-4 text-center align-self-center">
                    <img src="images/service-client.jpg" alt="" width="500rem" class="img-fluid rounded-3">
                </div>
            </div>
            <div data-aos="fade-up" class="row my-5 py-4">
                <div class="col-md-8 bg-light text-center mx-auto rounded-3 p-3">
                    <p>
                        N'hésitez pas à <a href="mailto:contact@valauto.com" target="_blank">nous contacter</a> pour en savoir plus sur nos services
                        ou pour prendre rendez-vous pour une leçon de conduite.
                        Nous nous réjouissons de vous aider à devenir un conducteur qualifié et compétent.
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
        overflow-x: hidden;
    }


    #A-Propos {
        text-decoration: underline;
        text-underline-offset: 5px;
    }

    .banner {
        background-color: #2B8C52;
        width: 100%;
        min-height: 60vh;
        overflow: hidden;
    }

    .bg-grey {
        background-color: #F5F5F5;
        width: 100vw !important;
    }

    .slogan {
        color: white;
        font-weight: 900;
        font-size: 80px;
    }

    .voiture {
        bottom: -26px;
        animation: voiture 10s infinite ease-in-out;
        user-select: none;
    }

    @keyframes voiture {
        0% {
            transform: translateX(-30vw) rotate(-5deg);
        }

        30% {
            transform: translateX(45vw) rotate(5deg);
        }

        34% {
            transform: translateX(45vw) rotate(-1deg);
        }

        36% {
            transform: translateX(45vw) rotate(1deg);
        }

        38% {
            transform: translateX(45vw) rotate(0deg);
        }

        60% {
            transform: translateX(45vw);
        }

        100% {
            transform: translateX(120vw) rotate(-5deg);
        }
    }

    @media screen and (max-width: 600px) {
        @keyframes voiture {
            0% {
                transform: translateX(-30vw);
            }

            30% {
                transform: translateX(20vw);
            }

            60% {
                transform: translateX(20vw);
            }

            100% {
                transform: translateX(150vw);
            }
        }
    }


    .voiture::before {
        z-index: 10;
        content: attr(data-content);
        position: absolute;
        width: min-content;
        min-width: 200%;
        max-height: 200px;
        bottom: 100px;
        left: 50px;
        font-size: 16px;
        padding: 10px;
        display: block;
        transform: scale(0);
        animation: popUp 10s infinite;
        background-color: white;
        border-radius: 10px;
    }

    .voiture::after {
        z-index: 1;
        content: "";
        position: absolute;
        width: 0;
        height: 0;
        bottom: 125px;
        left: 150px;
        border-left: 0px solid transparent;
        border-right: 20px solid transparent;
        border-top: 20px solid white;
        display: block;
        transform: scale(0);
        animation: popUp2 10s infinite;
    }

    @keyframes popUp {
        0% {
            transform: scale(0);
        }

        17.5% {
            transform: scale(0);
        }

        25% {
            transform: scale(1);
        }

        60% {
            transform: scale(1);
        }

        65% {
            transform: scale(0);
        }

        100% {
            transform: scale(0);
        }
    }

    @keyframes popUp2 {
        0% {
            transform: scale(0);
        }

        19.5% {
            transform: scale(0);
        }

        27% {
            transform: scale(1) translateY(40px) translateX(-80px);
            z-index: 1;
        }

        57.5% {
            transform: scale(1) translateY(40px) translateX(-80px);
            z-index: 1;
        }

        60% {
            z-index: 0;
        }

        62.5% {
            transform: scale(0) translateY(0px);
        }

        100% {
            transform: scale(0);
        }
    }
</style>
<script>
    const voiture = document.querySelector('.voiture');
    voiture.addEventListener('dragstart', (e) => {
        e.preventDefault();
    });

    var txtMessage = [
        "Nous sommes là pour vous aider à obtenir votre permis de conduire!",
        "Nous offrons des cours de conduite pratiques et théoriques!",
        "Notre équipe d'instructeurs expérimentés est là pour vous guider!",
        "Nous avons une flotte de voitures modernes et bien entretenues!",
        "Rejoignez-nous aujourd'hui pour débuter votre aventure de conduite!",
        "Nous sommes là pour vous aider à devenir un conducteur en toute confiance!",
        "N'hésitez pas à nous contacter pour plus d'informations!",
        "Nous sommes impatients de vous accueillir dans notre auto-école!",
        "Nous formons les conducteurs du futur!",
        "Notre enseignement est adapté à tous les niveaux!",
        "Venez découvrir nos forfaits!",
        "Offrez-vous une expérience de conduite inoubliable!",
        "Apprenez à conduire en toute confiance!",
        "Rejoignez notre communauté de conducteurs!",
        "Choisissez l'auto-école qui vous accompagne dans votre apprentissage!",
        "Votre permis de conduire est entre de bonnes mains avec nous!",
        "Des cours amusants et instructifs, c'est chez nous!",
        "Nous sommes là pour vous aider à atteindre votre objectif!",
        "Obtenez votre permis de conduire en un temps record!",
        "Notre équipe est à votre disposition pour toutes vos questions!",
        "Rejoignez-nous dès maintenant pour débuter votre aventure!",
        "Nous sommes le choix idéal pour votre formation en conduite!"
    ];






    const message = document.querySelector('.voiture');
    message.dataset.content = txtMessage[Math.floor(Math.random() * txtMessage.length)];
    setInterval(() => {
        message.dataset.content = txtMessage[Math.floor(Math.random() * txtMessage.length)];
    }, 10000);




    const element = document.querySelector('.voiture');

    function createBubble() {
        const bubble = document.createElement('div');
        bubble.style.width = '10px';
        bubble.style.height = '10px';
        bubble.style.borderRadius = '50%';
        bubble.style.backgroundColor = '#c8c8c8';
        bubble.style.position = 'absolute';
        bubble.style.left = '-20px';
        //randomly position the bubble vertically
        bubble.style.top = '50%';
        bubble.style.opacity = 0;
        element.appendChild(bubble);

        //slowly move the bubble to the up and left doing a curve and make it fade out
        bubble.animate([{
                transform: 'translateX(0px)',
            },
            {
                transform: 'translateX(-10px) translateY(-2px)',
                opacity: 1,
                delay: 500
            },
            {
                transform: 'translateX(-35px) translateY(-6px)',
                opacity: 1,
                delay: 1000
            },
            {
                transform: 'translateX(-50px) translateY(-12px)',
                opacity: 1,
                delay: 1500
            },
            {
                transform: 'translateX(-70px) translateY(-20px)',
                opacity: 1,
                delay: 2000
            },
            {
                transform: 'translateX(-75px) translateY(-30px)',
                opacity: 0,
                delay: 2500
            }
        ], {
            duration: 3000,
            easing: 'ease-out'
        });


    }

    setInterval(createBubble, 500);
</script>