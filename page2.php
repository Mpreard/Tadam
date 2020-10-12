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
      <div>
      <form action="grille_back.php" method="POST">
        <input type="text" placeholder="Votre réponse" name="answer" id="answer" required/>
        <input type="submit" value="Valider la réponse"/>
      </form>
    </div>    
  </body>
</html>