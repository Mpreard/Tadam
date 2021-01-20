<?php
session_start();

  try{
    $bdd = new PDO('mysql:host=mysql-tima1617.alwaysdata.net;dbname=tima1617_bdd_tadam_elancia_concours;charset=utf8','tima1617','Maeltima16');
    //$bdd = new PDO('mysql:host=localhost;dbname=spideer_tadam_jeu_db;charset=utf8','gCd95PAv0zsAUJe1');
  }
    catch (Exception $e)
  {
          die('Erreur : ' . $e->getMessage());
  }

  if(!isset($_SESSION['email']) || !isset($_SESSION['prenom']))
  {
    $_SESSION['erreur'] = 'Vous n\'avais pas rempli le formulaire précédent !';
    header('Location: ./error_page.php');
  }
?>


<!DOCTYPE html>
<html lang="en">  
  <head>
    <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Galerie d'images</title>
    <link rel="stylesheet" type="text/css" href="../css/page2.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  </head>
  <body>
    <div class = "main_container">
      <div class = "logos_welcome">
        <a href = "https://www.tadamescape.fr/" target="_blank"><img class="logo tadam" src="../assets/logos/logo_tadam.png"></a>  
        <img class="logo quiestce" src="../assets/logos/logo_quiestce.png">
        <div class ="welcome message">
          <img class ="logo cadenas" src="../assets/logos/logo_cadenas.png">
          <p class ="congrats"><strong>Bravo !</strong></p>
        </div>
      </div>
      <div class = "presentation_text">
        <p class = "GG" id="first">Bien joué challenger, vous avez trouvé le code !</p>
        <p>Mais le jeu ne s'arrete pas la...</p>
<<<<<<< HEAD
        <p>Voici la photo mystère… mais QUI-EST-CE ?</p>
        <p>Qui se cache derrière cette image ? </p>
        <p class="midlle">Tous les jours, vous pourrez dévoiler une des cases et proposer une réponse.</p>
        <p>Chaque joueur contribue à déverrouiller les cases masquées. Une fois cliquée, elles sont visibles par tous. </p>
        <p>N’oubliez pas, vous pouvez revenir jouer demain et proposer un autre nom. </p>
        <p>Un tirage au sort pour gagner de nombreuses surprises (parties d’escape, places, jeux…) sera effectué à la fin du concours. </p>
=======
        <p>Chaque jour, vous pourrez dévoiler une des cases et proposer une réponse.</p>
        <p>Un tirage au sort aura lieu pour gagner partie de jeu chez TADAM ESCAPE</p>
>>>>>>> e3930948570e9e1fba5ef820436a77b569fcefc7
        <p>Bon courage !</p>
        <div class="bottom_text">
          <p class="end_presentation">Alors ?</p>
          <p class="end_presentation bot_pres">Saurez-vous retrouver qui se cache derrière cette photo ?</p> 
        </div>
      </div>
      <div class="wrap_grille">
        <div id="grille">
          <?php
            if(isset($_GET["img"])){
              $_SESSION['click'] = true;
            }
            $id = 1;
            $lignenb = 0;
            $reponse = $bdd->query('SELECT url, display FROM image ORDER BY url ASC');
            while ($donnees = $reponse->fetch())
            {
              $compteur = $id/12;
              if(fmod($id-1, 12) == 0)
              {
                $lignenb = $lignenb + 1 ;
                echo '<div class="ligne'.$lignenb.'">';
              }
              if($donnees['display'] == 0)
              {
                if(isset($_GET["img"]) && $id == $_GET["img"] && $_SESSION['click'] == true)
                {
                  echo '<img class="image_grille" id='.$id.' src="../assets/img-grille/image_noel_concours_tadam_' . $id . '.png"/>';
                } else {
                  if($_SESSION['click'] == true){
                    echo'<img src="../assets/img-grille/noir.png"   class="image_grille"/>';
                  } else {
                    echo'<a id='.$id.'  class="image_cliquable" href="grille.php?img='.$id.'"><img src="../assets/img-grille/noir.png" class="image_grille"/></a>';
                  }
                }
              }
              elseif ($donnees['display'] == 1){
                  echo '<img class="image_grille" id='.$id.' src="../assets/img-grille/image_noel_concours_tadam_' . $id . '.png"/>';
              } 
              if(fmod($id, 12) == 0){
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
          <div class="container container_infos">
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