<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Concours Tadam - Elancia</title>
  <link rel="stylesheet" type="text/css" href="main.css" />
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <script src="main.js"></script>
  <script type="text/javascript" src="//cookie.eurowebpage.com/cookie.js?"></script>

</head>

<body>
  
  <div class = "main_container">
    <div class = "logos_welcome">
      <img class="logo elancia" src="assets/logos/logo_elancia.png">
      <div class ="welcome message">
        <img class ="logo cadenas" src="assets/logos/logo_cadenas.png">
        <p class ="welcome_challenger"><strong> Bienvenue Challenger !</strong></p>
        <p class ="enter_code">Veuillez entrer le code trouvé grâce à l'énigme.</p>
        <p class = "GL"> Bonne chance ! </p>
      </div>
      <img class="logo tadam" src="assets/logos/logo_tadam.png">
    </div>
    <div class="form_container">
      <form action="run.php" id="formulaire" class="container mt-5" method="POST">
        <div class="container mt-5 code_square">
          <div class="row">
            <div class="col-12 jpa">
              <div class = code_container>
                <input id="nombre1" name="nombre1" class ="number_code" type="text" maxlength="1" required />
                <input id="nombre2" name="nombre2" class ="number_code" type="text" maxlength="1" required />
                <input id="nombre3" name="nombre3" class ="number_code" type="text" maxlength="1" required />
                <input id="nombre4" name="nombre4" class ="number_code number_left" type="text" maxlength="1" required />
              </div>
            </div>
          </div>
        </div>

        <?php
        //Permet de tester si il y une variable 'error' en paramètre
            if(isset($_GET["error"])){
                $error = $_GET["error"];

                //Si c'est le cas, on affiche code erroné
                if ($error == 1){
                    echo "<p>Le code est erroné</p>";
                }
            }
        ?>

        <div class="container mt-5 container_infos">
          <div class="row">
            <div class = infos_container>
              <div class="col-6 input_infos">
                <input type="text" id="nom" name="nom" class="form-control form_infos" placeholder="Nom"  pattern="[A-Za-z]+" required />
              </div>
              <div class="col-6 input_infos">
                <input type="text" id="prenom" name="prenom" class="form-control form_infos" placeholder="Prenom" pattern="[A-Za-z]+" required />
              </div>
              <div class = submit_button>
                <input type="submit" value="Commencez le jeu !" />
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script type="text/javascript" src="dist/js/jquery-pincode-autotab.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $(".jpa input").jqueryPincodeAutotab();
    });
  </script>
</body>
<footer>
    <div class="bottom"></div>
</footer>

</html>