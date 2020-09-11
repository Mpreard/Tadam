<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Galerie d'images</title>
    <link rel="stylesheet" href="page2.css">
  </head>
  <body>
  <?php
    $dir = 'assets/img/*.jpg';
    $files = glob($dir,GLOB_BRACE);

    $nbrImg = count($files);
  ?>
      
      <div id="grille">
        <?php
            for($count = 1; $count <= $nbrImg; $count++)
            {
          echo '<img class="image_grille" src="./assets/img/' . $count . '.jpg"/>';
            }   
        ?>
    </div>
  </body>
</html>