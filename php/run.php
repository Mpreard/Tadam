<?php
session_start();
require('db_connect.php');

//Valeur de session
$_SESSION['email'] = htmlspecialchars(strtolower($_POST['email']));
$_SESSION['prenom'] = htmlspecialchars(strtolower($_POST['prenom']));
$_SESSION['click'] = 0;
$_SESSION['answer'] = 'gerardjugnot';
$_SESSION['erreur'] = '';
$_SESSION['result'] = '';

//Code
$code = '1234';
$nombre1 = $_POST['nbr_1_code'];
$nombre2 = $_POST['nbr_2_code'];
$nombre3 = $_POST['nbr_3_code'];
$nombre4 = $_POST['nbr_4_code'];

$nombreFinal = $nombre1 . $nombre2 . $nombre3 . $nombre4;

$currentDate = date('Y-m-d'); 

//Date la plus récente de participation récupéréé 
$mostRecentDate = $bdd->query('SELECT MAX(date_time_check) AS "last_date" FROM answer 
                        INNER JOIN user ON answer.id_user = user.id 
                        WHERE user.email = "'.$_SESSION['email'].'"');
$recentDate = $mostRecentDate->fetch(); 

if($nombreFinal === $code && !empty($_SESSION['email']) && !empty($_SESSION['prenom']) && $recentDate['last_date'] != $currentDate)
{
    //Email récupéré si l'utilisateur à donner la bonne réponse
    $reponse = $bdd->query('SELECT user.email FROM `user` 
                        INNER JOIN answer ON user.id = answer.id_user
                        WHERE user.email = "'.$_SESSION['email'].'" AND answer.right_answer = 1');
    $right_answer = $reponse->fetch();

    if(!empty($right_answer['email']))
    {        
        $_SESSION['erreur'] = 'Vous avez déjà donné la bonne réponse !';
        header('Location: ./error_page.php');
    } else {
        //Retourne l'user possédant l'email rentrée  
        $userExist = $bdd->query('SELECT email FROM user WHERE email = "'.$_SESSION['email'].'"');
        $userValues = $userExist->fetch();

        if(!isset($userValues['email']))
        {
            $bdd->exec('INSERT INTO user(first_name, email) VALUES("'.$_SESSION['prenom'].'","'.$_SESSION['email'].'")');  
        }
        header('Location: ./grille.php');
    }
}
//Affichage des erreurs
else
{
    if($nombreFinal != $code){
        $_SESSION['erreur'] = 'Le code renseigné est faux !';
    }
    if(empty($_SESSION['email']) || empty($_SESSION['prenom'])){
        $_SESSION['erreur'] = 'Problème dans les champs renseignés !';
    }
    if($recentDate['last_date'] === $currentDate){
        $_SESSION['erreur'] = 'Vous avez déjà participé aujourd\'hui !';
    }
    header('Location: ./error_page.php');
}

?>