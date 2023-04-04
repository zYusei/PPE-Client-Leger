<nav class="navbar navbar-expand-xl">
    <div class="container-md">
        <div class="logo my-2 me-5">
            <a class="text-decoration-none" href="index.php?page=0">
                <img src="images/logo.png" alt="" width="50">
                Val'Auto
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav my-2 text-center w-100 justify-content-between">
                <li class="nav-item-p nav-item ">
                    <a id="Accueil" class="nav-link" href="index.php?page=0">
                        Accueil</a>
                </li>
                <li class="nav-item-p nav-item ">
                    <a id="Formations" class="nav-link" href="index.php?page=1">
                        Formations</a>
                </li>
                <li class="nav-item-p nav-item">
                    <a id="A-Propos" class="nav-link" href="index.php?page=4">
                        A propos de nous</a>
                </li>
                <li class="nav-item-p nav-item ">
                    <a id="FAQ" class="nav-link" href="index.php?page=3">
                        FAQ</a>
                </li>
                <?php
                if (isset($_SESSION['User']) && $_SESSION['User'] != null || isset($_SESSION['Moniteur']) && $_SESSION['Moniteur'] != null || isset($_SESSION['Admin']) && $_SESSION['Admin'] != null) {
                    echo '<li class="nav-item">
                    <div class="dropdown-center nav-link">
                    <button class=" con btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mon compte
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index.php?page=6">Mon profil</a></li>
                        <li><a class="dropdown-item" href="index.php?page=2">Mon espace</a></li>
                        <li><a class="dropdown-item" href="index.php?page=10">Déconnexion</a></li>
                    </ul>
                    </div>
                    </li> ';
                } else {
                    echo '   <li class="nav-item">
                            <a class="nav-link" href="index.php?page=9">
                            <div class="con">
                            Connexion
                            </div>
                            </a>
                            </li>';
                }
                ?>

            </ul>
        </div>
    </div>
</nav>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;700;800&display=swap');

    .navbar {
        background-color: #2B8C52;
        color: white;
    }

    .navbar a {
        color: white;
    }

    .logo {
        font-size: 30px;
        font-weight: bold;
    }

    .nav-item-p {
        padding-top: 10px;
        font-weight: bold;
    }

    .con {
        padding: 10px;
        padding-left: 40px;
        padding-right: 40px;
        background-color: #313131;
        border-radius: 50px;
        font-weight: bold;
    }

    .dropdown-menu {
        position: absolute;
        right: 0px;
    }

    .dropdown-center a {
        color: black;
    }

    .dropdown-center ul li:last-child a {
        color: red;
    }

    @media screen and (max-width: 768px) {
        .dropdown-center {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .dropdown-menu {
            margin-top: 10px !important;
            text-align: center;
            width: 60% !important;
        }
    }
</style>