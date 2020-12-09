<?php 
  session_start();
?>

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
      <a href = "https://www.elancia.fr/" target="_blank"><img class="logo elancia" src="assets/logos/logo_elancia.png"></a>
      <div class ="welcome message">
        <img class ="logo cadenas_error" src="assets/logos/logo_cadenas.png">
      </div>
      <a href = "https://www.tadamescape.fr/" target="_blank"><img class="logo tadam" src="assets/logos/logo_tadam.png"></a>  
    </div>
    <div class ="error_page">
    <div class="error_message_div">
        <h1 class="error_message">ERREUR DANS VOTRE CODE</h1>
    </div>
  <div class="error_image">
    <img src="assets/logos/logo_crane.png" class="img_crane">
  </div> 
  </div>
  <div class="bottom_error_page">
  </div>
  <?php 
    header("refresh:3;url=index.php");
  ?>

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