<?php 
  session_start();

        $answer = htmlspecialchars($_GET['answer']);

        if(isset($_GET["img"]))
        {
          $bdd->exec('UPDATE image SET display = 1 WHERE url = '.$id_img.'');
        } else 
        {
          exit("Veuillez choisir une image");
        }

        if(isset($_SESSION['ip']) && isset($_SESSION['nom']) && isset($_SESSION['prenom']))
        {
          $bdd->exec('INSERT INTO user(first_name, last_name, ip_user) VALUES("'.$_SESSION['ip'].'","'.$_SESSION['prenom'].'", "'.$_SESSION['nom'].'", )');
        } else 
        {
          exit("Veuillez recharger la page");
        }

        $bdd->exec('INSERT INTO answer(user_answer) VALUES ("'.$answer.'")');

        header("refresh:0, url=page2.php");
    ?>