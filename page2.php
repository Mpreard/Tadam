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
        $reponse = $bdd->query('SELECT url, display FROM image ORDER BY url ASC');
        while ($donnees = $reponse->fetch())
        {
          if($donnees['display'] == 0)
          {
            echo '<a id='.$id.'  class="image_grille" href="page2.php?img='.$id.'"><img src="assets/img-grille/noir.png"/></a>';
          }
          else{
              echo '<img class="image_grille" id='.$id.' src="assets/img-grille/' . $id . '.jpg"/>';
          } 
          $id++;   
        }

        if(isset($_GET["img"]))
          {
            $id_img = $_GET["img"];
            $bdd->exec('UPDATE image SET display = 1 WHERE url = '.$id_img.'');
            header("refresh:0, url=page2.php");
          }
        $reponse->closeCursor();



        //ici code pour insertion en bdd du nom prenom ip via cookie
        //$bdd->exec('INSERT INTO user(first_name, last_name, ip_user) VALUES("'.$_COOKIE['ip'].'","'.$_COOKIE['prenom'].'", "'.$_COOKIE['nom'].'", )');
        

        ?>
    </div>
  </body>
</html>