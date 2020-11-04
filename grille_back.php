<?php 
  session_start();

  try{
    $bdd = new PDO('mysql:host=mysql-tima1617.alwaysdata.net;dbname=tima1617_bdd_tadam_elancia_concours;charset=utf8','tima1617','Maeltima16');
  }
    catch (Exception $e)
  {
          die('Erreur : ' . $e->getMessage());
  }

        $answer = htmlspecialchars($_POST['answer']);
        $id_img = htmlspecialchars($_GET['id_img']);

        if(isset($_SESSION['ip']) && isset($_SESSION['nom']) && isset($_SESSION['prenom']))
        {          
          if(isset($id_img))
          {
            $bdd->exec('UPDATE image SET display = 1 WHERE url = '.$id_img.'');
          } else 
          {
            exit("Veuillez choisir une image");
          }
          $bdd->exec('INSERT INTO user(first_name, last_name, ip_user) VALUES("'.$_SESSION['prenom'].'","'.$_SESSION['nom'].'", "'.$_SESSION['ip'].'", )');
        } else 
        {
          exit("Un problème est survenu");
          header("refresh:2, url=index.php");
        }

        $bdd->exec('INSERT INTO answer(user_answer) VALUES ("'.$answer.'")');

        header("refresh:0, url=index.php");
    ?>