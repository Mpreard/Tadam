<?php 
session_start();

try{
  $bdd = new PDO('mysql:host=mysql-tima1617.alwaysdata.net;dbname=tima1617_bdd_tadam_elancia_concours;charset=utf8','tima1617','Maeltima16');
  //$bdd = new PDO('mysql:host=localhost;dbname=spideer_tadam_jeu_db;charset=utf8','gCd95PAv0zsAUJe1');
}
  catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}

$search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 
                'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
$replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 
                'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');
  
$answer_start = strtolower(htmlspecialchars($_POST['answer']));
$replaced = preg_replace("/\s+/", "",$answer_start);
$answer_final = str_replace($search, $replace, $replaced);

$id_img = htmlspecialchars($_POST['id_img']);

if(empty($_SESSION['email']) || empty($_SESSION['prenom']) || empty($answer_start))
{
  $_SESSION['erreur'] = 'Une erreur s\'est produite... !';  
  header('Location: ./error_page.php');    
} 
else
{  
  $reponse = $bdd->query('SELECT id FROM user WHERE email = "'.$_SESSION['email'].'"');
  $values = $reponse->fetch();

  if(isset($id_img))
  {
    $bdd->exec('UPDATE image SET display = 1 WHERE url = '.$id_img.'');
  } 

  if ($answer_final === $_SESSION['answer']) 
  {
    $bdd->exec('INSERT INTO answer(user_answer, id_user, right_answer) VALUES ("'.$answer_final.'","'.$values['id'].'", 1)');
    header('Location: ./resultat.php');
    $_SESSION['result'] = 'victoire';
  } else 
  {
    $bdd->exec('INSERT INTO answer(user_answer, id_user, right_answer) VALUES ("'.$answer_final.'","'.$values['id'].'", 0)');
    header('Location: ./resultat.php');
    $_SESSION['result'] = 'defaite';
  } 
}
?> 