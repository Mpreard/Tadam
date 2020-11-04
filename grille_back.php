<?php 
  session_start();

  try{
    $bdd = new PDO('mysql:host=mysql-tima1617.alwaysdata.net;dbname=tima1617_bdd_tadam_elancia_concours;charset=utf8','tima1617','Maeltima16');
  }
    catch (Exception $e)
  {
          die('Erreur : ' . $e->getMessage());
  }

        $answer = $_POST['answer'];

        if(isset($_GET["img"]))
        {
          $bdd->exec('UPDATE image SET display = 1 WHERE url = '.$id_img.'');
        } else 
        {
          exit("Veuillez choisir une image");
        }

        if(isset($_SESSION['ip']) && isset($_SESSION['nom']) && isset($_SESSION['prenom']))
        {
          $bdd->exec('INSERT INTO user(first_name, last_name, ip_user) VALUES("'.$_SESSION['prenom'].'","'.$_SESSION['nom'].'", "'.$_SESSION['ip'].'", )');
        } else 
        {
          exit("Un problème est survenu");
          header("refresh:0, url=index.php");
        }

        $bdd->exec('INSERT INTO answer(user_answer) VALUES ("'.$answer.'")');

        header("refresh:0, url=page2.php");
    ?>