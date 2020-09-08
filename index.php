<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Concours Tadam - Elancia</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <script src="main.js"></script>

</head>

<body>
  <h1>Concours Tadam</h1>
  <h2>Rentrez votre code !</h2>

  <form action="run.php" id="formulaire" class="container mt-5" method="POST">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 jpa">
          <input id="nombre1" name="nombre1" type="text" maxlength="1" required />
          <input id="nombre2" name="nombre2" type="text" maxlength="1" required />
          <input id="nombre3" name="nombre3" type="text" maxlength="1" required />
          <input id="nombre4" name="nombre4" type="text" maxlength="1" required />
        </div>
      </div>
    </div>

    <?php
    //Permet de tester si il y une variable 'error' en paramètre
        if(isset($_GET["error"])){
            $error = $_GET["error"];

            //Si c'est le cas, on affiche code erroné
            if ($error == 1){
                echo "Le code est erroné";
            }
        }
    ?>

    <div class="container mt-5">
      <div class="row">
        <div class="col-6">
          <input type="text" id="nom" name="nom" class="form-control" placeholder="Dujardin"  pattern="[A-Za-z]+" required />
        </div>
        <div class="col-6">
          <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Jean" pattern="[A-Za-z]+" required />
        </div>
      </div>
    </div>

    <input type="submit" value="Commencez le jeu !" />
  </form>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script type="text/javascript" src="dist/js/jquery-pincode-autotab.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $(".jpa input").jqueryPincodeAutotab();
    });
  </script>
</body>

</html>