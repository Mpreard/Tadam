<?php
session_start();

  try{
    $bdd = new PDO('mysql:host=mysql-tima1617.alwaysdata.net;dbname=tima1617_bdd_tadam_elancia_concours;charset=utf8','tima1617','Maeltima16');
  }
    catch (Exception $e)
  {
          die('Erreur : ' . $e->getMessage());
  }


  if(!isset($_SESSION['ip']) || !isset($_SESSION['nom']) || !isset($_SESSION['prenom']))
  {
    header("refresh:0 , url=index.php");
  }
?>


<!DOCTYPE html>
<html lang="en">  
  <head>
    <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Galerie d'images</title>
    <link rel="stylesheet" type="text/css" href="page2.css">
    <link rel="stylesheet" type="text/css" href="main.css" />
  </head>
  <body>
    <div class = "main_container">
      <div class = "logos_welcome">
        <a href = "https://www.tadamescape.fr/" target="_blank"><img class="logo tadam" src="assets/logos/logo_tadam.png"></a>  
        <a href = "https://www.elancia.fr/" target="_blank"><img class="logo elancia" src="assets/logos/logo_elancia.png"></a>
        <div class ="welcome message">
          <img class ="logo cadenas" src="assets/logos/logo_cadenas.png">
          <p class ="congrats"><strong>Bravo !</strong></p>
        </div>
      </div>
      <div class = "presentation_text">
        <p class = "GG" id="first">Bien joué challenger, vous avez trouvé le code !</p>
        <p>Mais le jeu ne s'arrete pas la...</p>
        <p>Chaque jour, vous pourrez dévoiler une des cases et proposer une réponse.</p>
        <p>Plus vous cumulez de réponses (correcte) plus vous aurez de chance d'être tiré au sort pour gagner  partie de jeu chez TADAM ESCAPE</p>
        <p>Bon courage !</p>
        <p class="end_presentation">Alors ?</p>
        <p class="end_presentation bot_pres">Saurez-vous retrouver qui se cache derrière cette photo ?</p> 
      </div>
      <div class="wrap_grille">
        <div id="grille">
          <?php
            $id = 1;
            $clique = false;
            $lignenb = 0;
            $reponse = $bdd->query('SELECT url, display FROM image ORDER BY url ASC');
            while ($donnees = $reponse->fetch())
            {
              $compteur = $id/19;
              if(fmod($id-1, 19) == 0)
              {
                $lignenb = $lignenb + 1 ;
                echo '<div class="ligne'.$lignenb.'">';
              }
              if($donnees['display'] == 0)
              {
                if(isset($_GET["img"]) && $id == $_GET["img"] && $clique == false)
                {
                  echo '<img class="image_grille" id='.$id.' src="assets/img-grille/' . $id . '.jpg"/>';
                  $clique = true;
                } else {
                  echo'<a id='.$id.'  class="image_cliquable" href="page2.php?img='.$id.'"><img src="assets/img-grille/noir.png" class="image_grille"/></a>';
                }
              
              }
              elseif ($donnees['display'] == 1){
                  echo '<img class="image_grille" id='.$id.' src="assets/img-grille/' . $id . '.jpg"/>';
              } 
              if(fmod($id, 19) == 0){
                echo '</div>';
              }
              $id++;  
            }
            $reponse->closeCursor();    
          
          ?>
        </div>
      </div>
      <form action="grille_back.php" method="POST">
        <div class="bottom_page">
          <div class="container mt-5 container_infos">
            <div class="row">
              <div class = "infos_container">
                <div class="col-6 input_infos input_answer">
                  <p class="message_guess">Selon vous, qui se cache derrière cette photo ?</p> 
                </div>
                <div class="col-6 input_infos">
                <input type="text" id="answer" name="answer" class="form-control form_infos form_answer" placeholder="Votre réponse" required />
                <input type="text" id="id_img" name="id_img" value="<?php echo($_GET['img']) ?>" style="display:none;">
                </div>
                <div class="col-6 input_infos input_submit_button">
                  <div class = "submit_button_class">
                    <input type="submit" class = "submit_button submit_button_guess" value="Valider la réponse" />
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