<?php
session_start();

try{
    $bdd = new PDO('mysql:host=mysql-tima1617.alwaysdata.net;dbname=tima1617_bdd_tadam_elancia_concours;charset=utf8','tima1617','Maeltima16');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$_SESSION['email'] = htmlspecialchars($_POST['email']);
$_SESSION['prenom'] = htmlspecialchars($_POST['prenom']);

$code = '1234';
$nombre1 = $_POST['nombre1'];
$nombre2 = $_POST['nombre2'];
$nombre3 = $_POST['nombre3'];
$nombre4 = $_POST['nombre4'];
$nombreFinal = $nombre1 . $nombre2 . $nombre3 . $nombre4;

$currentDate = date('Y-m-d'); 

$mostRecentDate = $bdd->query('SELECT MAX(date_time_check) AS "last_date" FROM answer 
                            INNER JOIN user ON answer.id_user = user.id 
                            WHERE user.email = "'.$_SESSION['email'].'"');

$donnees = $mostRecentDate->fetch();

if($nombreFinal === $code && isset($_SESSION['email']) && isset($_SESSION['prenom'])){
    $userExist = $bdd->query('SELECT email FROM user WHERE email = "'.$_SESSION['email'].'"');
    $userValues = $userExist->fetch();

    if(!isset($userValues['email'])){
        $bdd->exec('INSERT INTO user(first_name, email) VALUES("'.$_SESSION['prenom'].'","'.$_SESSION['email'].'")');  
    }

    if($donnees['last_date'] != $currentDate){
        header('Location: ./page2.php');
    } else{
        header('Location: ./error_page.php');
    }
}
else
{
    session_destroy();
    header('Location: ./error_page.php');
}
?>