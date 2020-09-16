<?php

setcookie('nom','caca', time() + 365*24*3600, null, null, false, true);
setcookie('prenom','caca1', time() + 365*24*3600, null, null, false, true);
setcookie('ip','ouais', time() + 365*24*3600, null, null, false, true);

$code = '1234';

$nombre1 = $_POST['nombre1'];
$nombre2 = $_POST['nombre2'];
$nombre3 = $_POST['nombre3'];
$nombre4 = $_POST['nombre4'];

$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$ip = $_SERVER['REMOTE_ADDR'];

$nombreFinal = $nombre1 . $nombre2 . $nombre3 . $nombre4;


if($nombreFinal === $code){
    header('Location: ./page2.php?nom='.$nom.'&prenom='.$prenom);
}else{
    header('Location: ./index.php?error=1');
    //header ("Refresh: 3;URL=index.html");
}
?>