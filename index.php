<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
	
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Concours Tadam - Elancia</title>
  <link rel="stylesheet" type="text/css" href="./css/main.css" />
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <script type="text/javascript" src="//cookie.eurowebpage.com/cookie.js?"></script>

</head>

<body>
  
  <div class = "main_container">
    <div class = "logos_welcome">
      <a href = "https://www.tadamescape.fr/" target="_blank"><img class="logo tadam" src="./assets/logos/logo_tadam.png"></a>  
      <img class="logo quiestce" src="assets/logos/logo_quiestce.png">
      <div class ="welcome message" id="welcome_message">
        <img class ="logo cadenas" src="./assets/logos/logo_cadenas.png">
        <p class ="welcome_challenger"><strong> Bienvenue Challenger !</strong></p>
        <p class ="enter_code" id="enter_code">Veuillez entrer le code trouvé grâce à l'énigme.</p>
        <p class = "GL" id="GL"> Bonne chance ! </p>
      </div>
    </div>
    <div class="form_container" id="form_container">
      <form action="./php/run.php" id="formulaire" class="form_group_button" method="POST">
        <div class="container code_square form_group_button">
          <div class="row">
            <div class="col-12 jpa">
              <div class = code_container>
                <input id="nombre1" name="nbr_1_code" class ="number_code" type="number" maxlength="1" autocomplete="false"  onfocus="entry(2)" onblur="exit()" required />
                <input id="nombre2" name="nbr_2_code" class ="number_code" type="number" maxlength="1" autocomplete="false" onfocus="entry(2)" onblur="exit()" required />
                <input id="nombre3" name="nbr_3_code" class ="number_code" type="number" maxlength="1" autocomplete="false" onfocus="entry(2)" onblur="exit()" required />
                <input id="nombre4" name="nbr_4_code" class ="number_code number_left" type="number" maxlength="1" autocomplete="false" onfocus="entry(2)" onblur="exit()" required />
              </div>
            </div>
          </div>
        </div>

    </div>
    <div class="bottom_page" id="bottom_page" >
      <div class="container container_infos">
          <div class="row">
            <div class = "infos_container">
              <div class="col-6 input_infos">
                <input type="email" id="email" name="email" class="form-control form_infos" placeholder="Email" autocomplete="false" onfocus="entry(1)" onblur="exit()" required />
              </div>
              <div class="col-6 input_infos">
                <input type="text" id="prenom" name="prenom" class="form-control form_infos" placeholder="Prenom" autocomplete="false" onfocus="entry(1)" onblur="exit()" required />
              </div>
              <div class="col-6 input_infos input_submit_button">
                <div class = "submit_button_class">
                  <input type="submit" id="submit_button" class ="submit_button" value="Commencez le jeu !" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

<script>

  function entry(n) {
    if (window.matchMedia("(max-width: 481px)").matches) {
      if (n == 1) {
        if (navigator.userAgent.toLowerCase().match(/android/)) {
          $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        }
      var text = document.getElementById('enter_code')
      text.innerText ="Trouverez vous le bon code ?" ;
      var text2 = document.getElementById('GL')
      text2.style.display = "none";
      }
      if (n == 2) {
      var text = document.getElementById('enter_code')
      text.innerText ="Trouverez vous le bon code ?" ;
      var text2 = document.getElementById('GL')
      text2.style.display = "none";
      }

    } else {
    }
  }

  function exit() {
    if (window.matchMedia("(max-width: 481px)").matches) {
      var text = document.getElementById('enter_code')
      text.innerText ="Veuillez entrer le code trouvé grâce à l'énigme." ;
      var text2 = document.getElementById('GL')
      text2.style.display = "block";
    } else {
    }
  }

</script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script type="text/javascript" src="./dist/js/jquery-pincode-autotab.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $(".number_code").jqueryPincodeAutotab();
    });
  </script>
</body>
<footer>
    <div class="bottom"></div>
</footer>

</html>