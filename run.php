<?php

session_start();

$_SESSION['nom'] = $_POST['nom'];
$_SESSION['prenom'] = $_POST['prenom'];
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];


$code = '1234';

$nombre1 = $_POST['nombre1'];
$nombre2 = $_POST['nombre2'];
$nombre3 = $_POST['nombre3'];
$nombre4 = $_POST['nombre4'];

$nombreFinal = $nombre1 . $nombre2 . $nombre3 . $nombre4;

if($nombreFinal === $code)
{
    header('Location: ./page2.php');
} 
else
{
    header('Location: ./error_page.php');
}
?>