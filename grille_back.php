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
        $id_img = htmlspecialchars($_POST['id_img']);

        if(!isset($_SESSION['ip']) && !isset($_SESSION['email']) && !isset($_SESSION['prenom']))
        {       
          header("refresh:2, url=index.php");
        }
        elseif (!isset($id_img))
        {   
          header("refresh:2, url=page2.php");
        } else 
        {
          $userExist = $bdd->query('SELECT email FROM user WHERE email = "'.$_SESSION['email'].'"');
          $donnees = $userExist->fetch();

          if(!isset($donnees['email'])){
            $bdd->exec('INSERT INTO user(first_name, email, ip_user) VALUES("'.$_SESSION['prenom'].'","'.$_SESSION['email'].'", "'.$_SESSION['ip'].'")');
          }
          /*
          $mostRecentDate = $bdd->query('SELECT date_time_check 
                                        FROM answer 
                                        INNER JOIN user ON answer.id_user = user.id 
                                        WHERE email = "'.$_SESSION['email'].'" 
                                              AND ip_user = "'.$_SESSION['ip'].'" 
                                        HAVING MAX(answer.date_time_check)');

          $donnees = $mostRecentDate->fetch();
          */   
          $reponse = $bdd->query('SELECT id FROM user WHERE email = "'.$_SESSION['email'].'"');
          $donnees = $reponse->fetch();
          $bdd->exec('INSERT INTO answer(user_answer, id_user) VALUES ("'.$answer.'","'.$donnees['id'].'")');

          $bdd->exec('UPDATE image SET display = 1 WHERE url = '.$id_img.'');

          header("refresh:5, url=index.php");
          
        } 
    ?>