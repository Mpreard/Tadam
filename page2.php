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
      <form onclick="Submit_answer()" method="POST">
        <input type="text" placeholder="Votre réponse" name="answer" id="answer" required/>
        <input type="submit" value="Valider la réponse"/>
      </form>
    </div>
    <?php
      function Submit_answer()
      {
        $answer = htmlspecialchars($_GET['answer']);

        if(isset($_GET["img"]))
        {
          $bdd->exec('UPDATE image SET display = 1 WHERE url = '.$id_img.'');
        } else 
        {
          echo "<script>alert(\"Veuillez choisir une image\")</script>";
        }

        if(isset($_COOKIE['ip']) && isset($_COOKIE['nom']) && isset($_COOKIE['prenom']))
        {
          $bdd->exec('INSERT INTO user(first_name, last_name, ip_user) VALUES("'.$_COOKIE['ip'].'","'.$_COOKIE['prenom'].'", "'.$_COOKIE['nom'].'", )');
        }

        $bdd->exec('INSERT INTO answer(user_answer) VALUES ("'.$answer.'")');

        header("refresh:0, url=page2.php");

      }
    ?>

    
  </body>
</html>