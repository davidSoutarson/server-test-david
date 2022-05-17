<?php
require('config.php');
require('class/Image.php');


$image = new Image();
$images = $image->getImages(IMAGE_DIR_PATH);
//un fomulaire par image
?>
<h1> <?php echo WEB_TITLE ?> </h1>

<a href="index.php"> <=index </a> <br>
<a href="process_image.php"> process_image=> </a>

<ul>
  <?php foreach ($images as $image) : ?>
  <li><img src=" <?php echo IMAGE_DIR_URL. $image ?>" />

    <form method="post" action="process_image.php">

      <p> Titre : <input type="text" name="titele"  value=" " /> </p>

      <input type="hidden" name="filename" value ="<?php echo $image ?>" />

      <p> Description  <br> <textarea name="descr" cols="50" rows="5"> </textarea> </p>

      <p> <input type="submit" name="formImageSubmit" value="Validez"/> </p>

    </form>
  </li>

<?php endforeach ?>
</ul>
