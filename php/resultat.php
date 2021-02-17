<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Concours Tadam - Elancia</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css" />
        <link rel="stylesheet" type="text/css" href="../css/page2.css" />
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    </head>

    <body>
        <div class = "main_container">
            <div class = "logos_welcome">
            <div class ="welcome message">
                <img class ="logo cadenas_error" src="../assets/logos/logo_cadenas.png">
            </div>
                <a href = "https://www.tadamescape.fr/" target="_blank"><img class="logo tadam" src="../assets/logos/logo_tadam.png"></a> 
                <img class="logo quiestce" src="../assets/logos/logo_quiestce.png"> 
            </div>
            <?php 
                if($_SESSION['result'] === 'victoire')
                {
                    echo '<div class ="error_page">
                            <div class="error_message_div">
                                <h1 class="error_message"> Félicitations ! 
                                </br>
                                </br>
                                C’est bien notre bon vieux Gérard qui se cache sous cette photo. 
                                </br>
                                Vous faites désormais parti des gagnants et votre adresse e-mail est enregistrée pour le tirage au sort du : 
                                </br>
                                Bonne chance ! </h1>
                                <h2 class="error_message" style="magin-bottom : 5%;"> Tirage au sort le .... </h2>
                            </div>
        
                            <div class="error_image">
                                <img src="../assets/logos/gerard.png" class="img_crane">
                            </div> 
                        </div>';
                } else {
                    echo '<div class ="error_page">
                            <div class="error_message_div">
                                <h1 class="error_message"> Vous avez perdu, à demain !</h1>
                            </div>
                            <div class="error_image">
                                <img src="../assets/logos/logo_crane.png" class="img_crane">
                            </div> 
                        </div>';
                } 
                session_destroy();
                //header("refresh:20;url=../index.php");
            ?>
        </div>
        <div class="bottom_page" id="bottom_page" >
      <div class="container container_infos">
          <div class="row">
            <div class = "infos_container">
            </div>
          </div>
        </div>
    </div>
    </body>

    <footer>
        <div class="bottom"></div>
    </footer>

</html>
