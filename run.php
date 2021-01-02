<?php

session_start();

$_SESSION['email'] = htmlspecialchars($_POST['email']);
$_SESSION['prenom'] = htmlspecialchars($_POST['prenom']);
$_SESSION['ip'] = htmlspecialchars($_SERVER['REMOTE_ADDR']);

$code = '1234';

$nombre1 = $_POST['nbr_1_code'];
$nombre2 = $_POST['nbr_2_code'];
$nombre3 = $_POST['nbr_3_code'];
$nombre4 = $_POST['nbr_4_code'];

$nombreFinal = $nombre1 . $nombre2 . $nombre3 . $nombre4;

if(isset($_SESSION['ip']) && isset($_SESSION['email']) && isset($_SESSION['prenom']) && $nombreFinal === $code )
{
    header('Location: ./page2.php');
} 
else
{
    header('Location: ./error_page.php');
}
?>