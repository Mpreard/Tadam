<?php
try{
    $bdd = new PDO('mysql:host=mysql-tima1617.alwaysdata.net;dbname=tima1617_bdd_tadam_elancia_concours;charset=utf8','tima1617','Maeltima16');
    //$bdd = new PDO('mysql:host=localhost;dbname=spideer_tadam_jeu_db;charset=utf8','gCd95PAv0zsAUJe1');
  }
    catch (Exception $e)
  {
          die('Erreur : ' . $e->getMessage());
  }
?>