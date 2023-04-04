<?php
if (isset($_POST['btnResetPassword'])) {
  $email = $_POST['email_reset'];
  $questionSecrete = $unControleur->selectWhere("user", "email_u", $email)['security_question'];
  $reponseSecrete = $unControleur->selectWhere("user", "email_u", $email)['security_answer'];


  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Adresse email invalide";
    exit;
  }


  if ($_POST['Reset_security_answer'] !== $reponseSecrete) {
    echo "Réponse de sécurité incorrecte";
    exit;
  }


  $nouveauMotDePasse = $_POST['new_password'];
  $unControleur->setTable("user");
  $tab = array("mdp_u" => $nouveauMotDePasse);
  $unControleur->update($tab, "email_u", $email);

  echo "Mot de passe mis à jour avec succès";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="conteneur" id="conteneur">

    <div class="form-conteneur register-conteneur">
      <form action="" method="POST">
        <h1>Inscrivez vous</h1>
        <div class="rowInputs">
          <input type="text" placeholder="Nom" name="nom">
          <input type="text" placeholder="Prénom" name="prenom">
        </div>
        <select name="sexe" id="sexe">
          <option value="">Sexe</option>
          <option value="M">Homme</option>
          <option value="F">Femme</option>
        </select>
        <input type="text" placeholder="Adresse" name="adr">
        <div class="rowInputs">
          <input type="text" placeholder="Ville" name="ville">
          <input type="text" placeholder="Code postal" name="cp">
        </div>
        <div class="rowInputs">
          <input type="text" placeholder="Téléphone" name="tel" maxlength="10">
          <!-- <input type="date" placeholder="" name="date"> -->
          <input type="text" name="date" id="date-input" placeholder="Date de naissance" onfocus="(this.type='date')" onblur="(this.value === '' ? this.type='text' : null)" onchange="(this.value != '' ? this.setAttribute('data-placeholder', this.value) : this.setAttribute('placeholder', 'Date de naissance'))">
        </div>
        <input type="email" placeholder="Email" name="email">
        <input type="password" placeholder="Mot de passe" name="mdp">
        <div class="rowInputs">
          <select name="security_question" id="security_question">
            <option value="">Question de sécurité</option>
            <option value="Quelle est votre couleur préférée ?">Quel est votre couleur préférée ?</option>
            <option value="Quel est votre genre de film préféré ?">Quel est votre genre de film préféré ?</option>
            <option value="Quel est votre livre préféré?">Quel est votre livre préféré?</option>
            <option value="Dans quelle ville êtes-vous né ?">Dans quelle ville êtes-vous né ?</option>
            <option value="Quelle était ta nourriture préférée étant enfant ?">Quelle était votre nourriture préférée étant enfant ?</option>
          </select>
          <input type="text" placeholder="Réponse de sécurité" name="security_answer">
        </div>
        <button type="submit" name="Register" value="Register">S'inscrire</button>
      </form>
    </div>

    <div class="form-conteneur login-conteneur">
      <form action="" method="POST">
        <h1>Connectez vous</h1>
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="mdp" placeholder="Mot de passe">
        <div class="content">
          <div class="pass-link">
            <a href="#" class="modal-title fs-5" id="exampleModalLabel" data-bs-toggle="modal" data-bs-target="#exampleModal">Mot de passe oublié ?</a>
          </div>
        </div>
        <button type="submit" name="SeConnecter" value="SeConnecter">Se connecter</button>
      </form>
    </div>

    <div class="overlay-conteneur">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <img src="./images/logo.png" alt="logo" width="125px" height="125px" class="img-fluid mb-5">
          <h1 class="title">Bienvenue</h1>
          <p>Si vous avez déjà un compte, connectez-vous pour continuer.</p>
          <button class="ghost" id="login">Se connecter
          </button>
        </div>
        <div class="overlay-panel overlay-right">
          <img src="./images/logo.png" alt="logo" width="125px" height="125px" class="img-fluid mb-5">
          <h1 class="title">Démarrez votre voyage</h1>
          <p>Si vous n'avez pas de compte, inscrivez-vous pour continuer.</p>
          <button class="ghost" id="register">S'inscrire
          </button>
        </div>
      </div>
    </div>

    <div class="switch-mobile">
      <button class="ghost ghost-mobile ghost-mobile-login" id="login-mobile">Se connecter
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
        </svg>
      </button>
      <button class="ghost ghost-mobile ghost-mobile-register" id="register-mobile">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
        </svg>S'inscrire
      </button>
    </div>

  </div>

  <!-- Modal -->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">

          <h1 class="modal-title fs-5" id="exampleModalLabel" data-bs-toggle="modal" data-bs-target="#exampleModal">Mot de passe oublié ?</h1>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        </div>

        <div class="modal-body">

          <form action="" method="post" id="formPasswordReset" class="p-0">

            <input type="hidden" name="currentStep" id="currentStep" value="1">



            <div id="step1">

              <p><strong>Veuillez entrer votre adresse email pour réinitialiser votre mot de passe :</strong></p>

              <div class="form-group">

                <label for="email">Email :</label>

                <input type="email" class="form-email-control" id="email_reset" name="email_reset">

              </div>

            </div>



            <div id="step2" style="display: none;">

              <p>Veuillez répondre à votre question de sécurité :</p>

              <div class="form-group">

                <label for="security_answer">Question :</label>

                <select name="Reset_security_question" id="Reset_security_question">

                  <option value="Quelle est votre couleur préférée ?">Quel est votre couleur préférée ?</option>

                  <option value="Quel est votre genre de film préféré ?">Quel est votre genre de film préféré ?</option>

                  <option value="Quel est votre livre préféré?">Quel est votre livre préféré?</option>

                  <option value="Dans quelle ville êtes-vous né ?">Dans quelle ville êtes-vous né ?</option>

                  <option value="Quelle était ta nourriture préférée étant enfant ?">Quelle était votre nourriture préférée étant enfant ?</option>

                </select>

                <input type="text" class="form-answer-control" id="Reset_security_answer" name="Reset_security_answer">

              </div>

            </div>



            <div id="step3" style="display: none;">

              <p>Veuillez choisir un nouveau mot de passe :</p>

              <div class="form-group">

                <label for="new_password">Nouveau mot de passe :</label>

                <input type="password" class="form-mdp-control" id="new_password" name="new_password">

              </div>

              <div class="form-group">

                <label for="confirm_password">Confirmer le nouveau mot de passe :</label>

                <input type="password" class="form-mdp-control" id="confirm_password" name="confirm_password">

              </div>

            </div>



            <div class="modal-footer">

              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

              <button type="button" class="btn btn-primary" id="btnNextStep" name="btnNextStep">Suivant</button>

              <button type="submit" class="btn btn-primary" id="btnResetPassword" name="btnResetPassword" style="display: none;">Réinitialiser</button>

            </div>

          </form>

        </div>

      </div>

    </div>

  </div>

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins");

    * {
      box-sizing: border-box;
    }

    .rowInputs {
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .rowInputs input,
    .rowInputs select {
      width: 48%;
    }

    body {
      background-color: #f6f5f7;
      font-family: "Poppins", sans-serif;
      overflow: hidden;
      height: 100vh;
      margin: 0px;
    }

    h1 {
      font-weight: 700;
      letter-spacing: -1.5px;
      margin: 0;
      margin-bottom: 15px;
    }

    h1.title {
      font-size: 45px;
      line-height: 45px;
      margin: 0;
      text-shadow: 0 0 10px rgba(16, 64, 74, 0.5);
    }

    p {
      font-size: 14px;
      font-weight: 100;
      line-height: 20px;
      letter-spacing: 0.5px;
      margin: 20px 0 30px;
      text-shadow: 0 0 10px rgba(16, 64, 74, 0.5);
    }

    a {
      color: #333;
      font-size: 14px;
      text-decoration: none;
      margin: 15px 0;
      transition: 0.3s ease-in-out;
    }

    a:hover {
      color: #4bb6b7;
    }

    .content {
      display: flex;
      width: 100%;
      height: 50px;
      align-items: center;
      justify-content: space-around;
    }

    .content .checkbox {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .content input {
      accent-color: #333;
      width: 12px;
      height: 12px;
    }

    .content label {
      font-size: 14px;
      user-select: none;
      padding-left: 5px;
    }

    button {
      position: relative;
      border-radius: 20px;
      border: 1px solid #4bb6b7;
      background-color: #4bb6b7;
      color: #fff;
      font-size: 15px;
      font-weight: 700;
      margin: 10px;
      padding: 12px 80px;
      letter-spacing: 1px;
      text-transform: capitalize;
      transition: 0.3s ease-in-out;
      cursor: pointer;
    }

    button:hover {
      letter-spacing: 2px;
    }

    button:active {
      transform: scale(0.95);
    }

    button:focus {
      outline: none;
    }

    button.ghost {
      background-color: rgba(225, 225, 225, 0.2);
      border: 2px solid #fff;
      color: #fff;
    }

    button.ghost-mobile {
      padding: 0;
      display: flex;
      align-items: center;
      z-index: 100000;
      background-color: transparent;
      border: none;
      color: black;
      transition: all 0.2s ease-in-out;
    }

    button.ghost-mobile-register {
      position: absolute;
      top: 15px;
      left: 15px;
    }

    button.ghost-mobile-login {
      opacity: 0;
      position: absolute;
      top: 15px;
      right: 15px;
    }

    button.ghost i {
      position: absolute;
      opacity: 0;
      transition: 0.3s ease-in-out;
    }

    button.ghost i.register {
      right: 70px;
    }

    button.ghost i.login {
      left: 70px;
    }

    button.ghost:hover i.register {
      right: 40px;
      opacity: 1;
    }

    button.ghost:hover i.login {
      left: 40px;
      opacity: 1;
    }

    form {
      background-color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 100px;
      height: 100%;
      text-align: center;
    }

    input,
    select {
      background-color: #eee;
      border-radius: 7px;
      border: none;
      padding: 10px 15px !important;
      margin: 8px 0;
      width: 100%;
      outline: none;
      color: #757575;
    }

    select {
      display: block;
      width: 100%;
      padding: .375rem 2.25rem .375rem .75rem;
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right .75rem center;
      background-size: 16px 12px;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
    }

    input:focus,
    select:focus {
      outline: 2px solid rgba(0, 0, 0, 0.3);
    }

    select {
      cursor: pointer;
    }

    .conteneur {
      background-color: #fff;
      box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
      position: relative;
      overflow: hidden;
      height: 100vh;
    }

    .form-conteneur {
      position: absolute;
      top: 0;
      height: 100%;
      transition: all 0.6s ease-in-out;
    }

    .login-conteneur {
      left: 0;
      width: 50%;
      z-index: 2;
    }

    .conteneur.right-panel-active .login-conteneur {
      transform: translateX(100%);
    }

    .register-conteneur {
      left: 0;
      width: 50%;
      opacity: 0;
      z-index: 1;
    }

    .conteneur.right-panel-active .register-conteneur {
      transform: translateX(100%);
      opacity: 1;
      z-index: 5;
      animation: show 0.6s;
    }

    @keyframes show {

      0%,
      49.99% {
        opacity: 0;
        z-index: 1;
      }

      50%,
      100% {
        opacity: 1;
        z-index: 5;
      }
    }

    .overlay-conteneur {
      position: absolute;
      top: 0;
      left: 50%;
      width: 50%;
      height: 100%;
      overflow: hidden;
      transition: transform 0.6s ease-in-out;
      z-index: 100;
    }

    .switch-mobile {
      display: none;
    }

    .conteneur.right-panel-active .overlay-conteneur {
      transform: translate(-100%);
    }

    .overlay {
      background-color: #2b8c52;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: 0 0;
      color: #fff;
      position: relative;
      left: -100%;
      height: 100%;
      width: 200%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
    }

    .overlay::before {
      content: "";
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      background: linear-gradient(to top,
          rgba(46, 94, 109, 0.4) 40%,
          rgba(46, 94, 109, 0));
    }

    .conteneur.right-panel-active .overlay {
      transform: translateX(50%);
    }

    .overlay-panel {
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 40px;
      text-align: center;
      top: 0;
      height: 100%;
      width: 50%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
    }

    .overlay-left {
      transform: translateX(-20%);
    }

    .conteneur.right-panel-active .overlay-left {
      transform: translateX(0);
    }

    .overlay-right {
      right: 0;
      transform: translateX(0);
    }

    .conteneur.right-panel-active .overlay-right {
      transform: translateX(20%);
    }

    .social-conteneur {
      margin: 20px 0;
    }

    .social-conteneur a {
      border: 1px solid #dddddd;
      border-radius: 50%;
      display: inline-flex;
      justify-content: center;
      align-items: center;
      margin: 0 5px;
      height: 40px;
      width: 40px;
      transition: 0.3s ease-in-out;
    }

    .social-conteneur a:hover {
      border: 1px solid #4bb6b7;
    }

    @media screen and (max-width: 1100px) {
      .conteneur.right-panel-active .register-conteneur {
        animation: show-mobile 0.6s !important;
      }

      @keyframes show-mobile {

        0%,
        49.99% {
          opacity: 0;
          z-index: 1;
        }

        100% {
          opacity: 1;
          z-index: 5;
        }
      }

      form {
        padding: 0 20px;
      }

      .conteneur.right-panel-active .login-conteneur {
        transform: translateX(150%);
      }

      .switch-mobile {
        display: block;
      }

      .form-conteneur {
        width: 100%;
        transition: all 0.6s ease-in-out;
      }

      .overlay-conteneur {
        display: none;
      }

      .overlay-conteneur-mobile {
        display: block;
        position: absolute;
        top: 85%;
        left: 0;
        width: 100%;
        height: 15%;
        overflow: hidden;
        transition: transform 0.6s ease-in-out;
        z-index: 100;
      }

      .conteneur.right-panel-active .register-conteneur {
        transform: translateX(0%);
        opacity: 1;
        z-index: 5;
        animation: show 0.6s;
      }
    }

    .error {
      outline: 1.5px solid red;
    }
  </style>

  <script>
    const registerButton = document.getElementById("register");
    const registerButtonMobile = document.getElementById("register-mobile");
    const loginButton = document.getElementById("login");
    const loginButtonMobile = document.getElementById("login-mobile");
    const conteneur = document.getElementById("conteneur");

    registerButton.addEventListener("click", () => {
      conteneur.classList.add("right-panel-active");
    });

    registerButtonMobile.addEventListener("click", () => {
      conteneur.classList.add("right-panel-active");
      registerButtonMobile.style.opacity = 0;
      loginButtonMobile.style.opacity = 1;
    });

    loginButton.addEventListener("click", () => {
      conteneur.classList.remove("right-panel-active");
    });

    loginButtonMobile.addEventListener("click", () => {
      conteneur.classList.remove("right-panel-active");
      registerButtonMobile.style.opacity = 1;
      loginButtonMobile.style.opacity = 0;
    });

    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }

    var dateInput = document.getElementById('date-input');
    if (dateInput.getAttribute('data-placeholder')) {
      dateInput.type = 'date';
      dateInput.value = dateInput.getAttribute('data-placeholder');
    }

    //get all buttons type submit
    var buttonsSubmit = document.querySelectorAll('button[type="submit"]');
    //loop through buttons
    buttonsSubmit.forEach(e => {
      e.addEventListener('click', function(event) {
        //get form
        var form = e.closest('form');
        //get all inputs
        var inputs = form.querySelectorAll('input');
        //loop through inputs
        inputs.forEach(e => {
          //check if input is empty
          if (e.value == '') {
            //add class error
            e.classList.add('error');
          } else {
            //remove class error
            e.classList.remove('error');
          }

          //add blur event
          e.addEventListener('blur', function() {
            //check if input is empty
            if (e.value == '') {
              //add class error
              e.classList.add('error');
            } else {
              //remove class error
              e.classList.remove('error');
            }
          });
        });

        //get all selects
        var selects = form.querySelectorAll('select');
        //loop through selects
        selects.forEach(e => {
          //check if select is empty
          if (e.value == '') {
            //add class error
            e.classList.add('error');
          } else {
            //remove class error
            e.classList.remove('error');
          }

          //add change event
          e.addEventListener('change', function() {
            //check if select is empty
            if (e.value == '') {
              //add class error
              e.classList.add('error');
            } else {
              //remove class error
              e.classList.remove('error');
            }
          });
        });


        // if no error on inputs and select submit form
        if (form.querySelectorAll('.error').length != 0) {
          //prevent default action
          event.preventDefault();
        }
      });
    });
  </script>
  <script src="./Js/Sign_in.js"></script>
</body>

</html>