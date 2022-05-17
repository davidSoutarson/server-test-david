<?php
$image = new Image();
$images = $image->getImages(IMAGE_DIR_PATH);

 ?>
 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title><?php echo WEB_TITLE ?></title>
   </head>
   <body>

   </body>

   <h1> <?php echo WEB_TITLE ?> </h1>

   <a href="admin.php"> =>admin</a>
   <ul>
     <?php foreach ($images as $image) : ?>
     <li><img src=" <?php echo IMAGE_DIR_URL. $image ?>" /></li>

    <?php endforeach ?>
    </ul>

 </html>
