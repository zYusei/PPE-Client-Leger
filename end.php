<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Félicitations!</title>
  <link rel="stylesheet" href="./css/end.css">
</head>

<body>
  <div class="container">
    <div id="end" class="hud">
      <a class="btn" href="index.php?page=7">Recommencer</a>
      <h1 id="finalScore"></h1>
      <a class="btn" href="index.php?page=2">Retour à l'accueil</a>
    </div>
  </div>
  <div id="Answers">
    <div class="btn-container">
      <?php
      for ($i = 0; $i < 20; $i++) {
        echo "<button value='$i' class='btn-question'>";
        echo $i + 1;
        echo "</button>";
      }
      ?>
    </div>
  </div>
  <script src="./Js/end.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>

</html>
</body>