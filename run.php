<?php

$code = '1234';

$nombre1 = $_POST['nombre1'];
$nombre2 = $_POST['nombre2'];
$nombre3 = $_POST['nombre3'];
$nombre4 = $_POST['nombre4'];

$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);

$nombreFinal = $nombre1 . $nombre2 . $nombre3 . $nombre4;


if($nombreFinal === $code){
    header('Location: ./page2.php?nom='.$nom.'&prenom='.$prenom);
}else{
    header('Location: ./index.php?error=1');
    //header ("Refresh: 3;URL=index.html");
}

?>