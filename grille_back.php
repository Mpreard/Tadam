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

if(!isset($_SESSION['email']) || !isset($_SESSION['prenom']) || !isset($answer))
{      
  echo '<p> Erreur de remplissage <p>';  
} 
else
{  
  $reponse = $bdd->query('SELECT id FROM user WHERE email = "'.$_SESSION['email'].'"');
  $values = $reponse->fetch();

  if(isset($id_img))
  {
    $bdd->exec('UPDATE image SET display = 1 WHERE url = '.$id_img.'');
  } 

  if ($answer === $_SESSION['answer']) 
  {
    $bdd->exec('INSERT INTO answer(user_answer, id_user, right_answer) VALUES ("'.$answer.'","'.$values['id'].'", 1)');
    //TO DO : Rediriger vers une page de victoire
  } else 
  {
    $bdd->exec('INSERT INTO answer(user_answer, id_user, right_answer) VALUES ("'.$answer.'","'.$values['id'].'", 0)');
    //TO DO : Rediriger vers une page de défaite
  } 
}
session_destroy();
header('Location: ./index.php');
?>