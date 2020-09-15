<?php

$code = '1234';
$nombre1 = $_POST['nombre1'];
$nombre2 = $_POST['nombre2'];
$nombre3 = $_POST['nombre3'];
$nombre4 = $_POST['nombre4'];

$nombreFinal = $nombre1 . $nombre2 . $nombre3 . $nombre4;

function CheckCode()
{

    if (nombreFinal == $code){

    };
    echo "t'a mère";
}




?>