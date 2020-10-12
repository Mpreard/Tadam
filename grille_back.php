<?php
      function Submit_answer()
      {
        $answer = htmlspecialchars($_GET['answer']);

        if(isset($_GET["img"]))
        {
          $bdd->exec('UPDATE image SET display = 1 WHERE url = '.$id_img.'');
        } else 
        {
          exit("Veuillez choisir une image");
        }

        if(isset($_COOKIE['ip']) && isset($_COOKIE['nom']) && isset($_COOKIE['prenom']))
        {
          $bdd->exec('INSERT INTO user(first_name, last_name, ip_user) VALUES("'.$_COOKIE['ip'].'","'.$_COOKIE['prenom'].'", "'.$_COOKIE['nom'].'", )');
        } else 
        {
          exit("Veuillez recharger la page");
        }

        $bdd->exec('INSERT INTO answer(user_answer) VALUES ("'.$answer.'")');

        header("refresh:0, url=page2.php");

      }
    ?>