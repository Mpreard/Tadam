<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Galerie d'images</title>
  </head>
  <body>
    <div>
  <?php
    $dir = 'assets/img/*.jpg';
    $files = glob($dir,GLOB_BRACE);

    $nbrImg = count($files);

    for($count = 1; $count <= $nbrImg; $count++)
    {
      echo '<div> <img src="./assets/img/' . $count . '.jpg"/></div>';
    } 
  ?>
    </div>
  </body>
</html>