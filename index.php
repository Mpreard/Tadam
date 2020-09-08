<?php

$code = '1234';

$nombre1 = $_POST['nombre1'];
$nombre2 = $_POST['nombre2'];
$nombre3 = $_POST['nombre3'];
$nombre4 = $_POST['nombre4'];

$nombreFinal = $nombre1 . $nombre2 . $nombre3 . $nombre4;

if ($nombreFinal === $code){
    header('Location: http://www.votresite.com/pageprotegee.php');
} else {
    echo "Votre code est faux";
    header ("Refresh: 3;URL=index.html");
}




?>