<?php

session_start();

  try{
    $bdd = new PDO('mysql:host=mysql-tima1617.alwaysdata.net;dbname=tima1617_bdd_tadam_elancia_concours;charset=utf8','tima1617','Maeltima16');
  }
    catch (Exception $e)
  {
          die('Erreur : ' . $e->getMessage());
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Galerie d'images</title>
    <link rel="stylesheet" href="page2.css">
    <link rel="stylesheet" type="text/css" href="main.css" />
  </head>
  <body>
    <div class = "main_container">
      <div class = "logos_welcome">
        <img class="logo tadam" src="assets/logos/logo_tadam.png">
        <img class="logo elancia" src="assets/logos/logo_elancia.png">
        <div class ="welcome message">
          <img class ="logo cadenas" src="assets/logos/logo_cadenas.png">
          <p class ="congrats"><strong>Bravo !</strong></p>
        </div>
      </div>
      <div class = "presentation_text">
        <p class = "GG" id="first">Bien joué challenger, vous avez trouvé le code !</p>
        <p>Mais le jeu ne s'arrete pas la...</p>
        <p>Chaque jour, vous pourrez dévoiler une des cases et proposer une réponse.</p>
        <p>Plus vous cumulez de réponses (correcte) plus vous aurez de chance d'être </br> tiré au sort pour gagner  partie de jeu chez TADAM ESCAPE</p>
        <p>Bon courage !</p>
        <p class="end_presentation">Alors ? Saurez-vous retrouver qui se cache derrière cette photo ?</p>
      </div>
      <div class="wrap_grille">
        <div id="grille">
          <?php
            $id = 1;
            $clique = false;
            $reponse = $bdd->query('SELECT url, display FROM image ORDER BY url ASC');
            while ($donnees = $reponse->fetch())
            {
              if($donnees['display'] == 0)
              {
                if(isset($_GET["img"]) && $id == $_GET["img"] && $clique == false)
                {
                  echo '<img class="image_grille" id='.$id.' src="assets/img-grille/' . $id . '.jpg"/>';
                  $clique = true;
                } else {
                  echo'<a id='.$id.'  class="image_grille" href="page2.php?img='.$id.'"><img src="assets/img-grille/noir.png"/></a>';
                }
              
              }
              elseif ($donnees['display'] == 1){
                  echo '<img class="image_grille" id='.$id.' src="assets/img-grille/' . $id . '.jpg"/>';
              } 
              $id++;   
            }
            $reponse->closeCursor();    
          
          ?>
        </div>
      </div>
      <div>
        <form action="grille_back.php" method="POST">
          <input type="text" placeholder="Votre réponse" name="answer" id="answer" required/>
          <input type="submit" value="Valider la réponse"/>
        </form>
      </div>
      <div class="bottom_page">
        <div class="container mt-5 container_infos">
          <div class="row">
            <div class = "infos_container">
              <div class="col-6 input_infos">
                <p>Selon vous, qui se cache derrière cette photo ?</p> 
              </div>
              <div class="col-6 input_infos">
                <input type="text" id="reponse" name="reponse" class="form-control form_infos" placeholder="Votre réponse" pattern="[A-Za-z]+" required />
              </div>
              <div class="col-6 input_infos input_submit_button">
                <div class = "submit_button_class">
                  <input type="submit" class = "submit_button" value="Valider la réponse" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>  
    </div>  
  </body>
</html>