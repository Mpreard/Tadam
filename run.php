<?php

$code = '1234';

$nombre1 = $_POST['nombre1'];
$nombre2 = $_POST['nombre2'];
$nombre3 = $_POST['nombre3'];
$nombre4 = $_POST['nombre4'];

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

$nombreFinal = $nombre1 . $nombre2 . $nombre3 . $nombre4;


function fctRetirerAccents($varMaChaine){
	$search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
	//Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
	$replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');
	$varMaChaine = str_replace($search, $replace, $varMaChaine);
	return $varMaChaine; 
}


$nom = fctRetirerAccents($nom);
$prenom = fctRetirerAccents($prenom);

if($nombreFinal === $code){
    header('Location: ./index.php?error='.$nom);
}else{
    header('Location: ./index.php?error=1');
    //header ("Refresh: 3;URL=index.html");
}
?>