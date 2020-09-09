<?php
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    echo 'Bienvenue sur la page de jeu '.$prenom;

    //Méthode 1 pour avoir l'adresse ip
    echo '  adresse ip'.$_SERVER['REMOTE_ADDR'];

    //Méthode 2 (car REMOTE_ADDR ne renvoi pas tout le temps l'adresse IP correct à cause d'un Proxy)
    function getIp(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
          $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
          $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
      }












    //Insertion ou Vérification de l'utilisateur dans la bdd
    $requeteInsertion = "INSERT INTO user (id, first_name, last_name) VALUES ('', LOWER('".$prenom."'), LOWER('".$nom."'));";
    $requeteCherche = "SELECT * FROM user WHERE first_name =LOWER('".$prenom."') AND last_name = LOWER('".$nom."');";

?>