<?php
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
  </head>
  <body>
    <div id="grille">
      <?php
        $reponse = $bdd->query('SELECT url, display FROM image ORDER BY url ASC');
        while ($donnees = $reponse->fetch())
        {
          if($donnees['display'] == 0){
            echo '<img class="image_grille" src="assets/img-grille/noir.png"/>';
          } else
          {
            echo '<img class="image_grille" src="assets/img-grille/' . $donnees['url'] . '.jpg"/>';
          }
        }

        $reponse->closeCursor(); 
      ?>
    </div>
  </body>
</html>