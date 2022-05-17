<?php
require('config.php');
require('class/Image.php');
if (!isset($_POST['formImageSubmit']))
{
  $error_msg = 'Aucune donnée n\'est fournie.
  <a href= "'.WEB_DIR_URL .'" > retour 1 </a>';

}

 if (isset($_POST['formImageSubmit'])) // dans le ca ou les valeur son poster

{
  var_dump($_POST);

  if( (empty($_POST['titele'])) OR (empty($_POST['descr']))
  OR (empty($_POST['filename'])) )
  {

      $error_msg = 'une des informations est manquante.
      <a href="'. WEB_DIR_URL .'"> retour 2 </a>';


  } else {
    //enregitement dans la base
    //  creation  la méthode insertImage dans le fichier Image.php
    //  La fontion enlever les espaces blancs au début et à la fin des chaîne de caractère.
    $title = trim ( $_POST ['titele']);
    $descr = trim ($_POST ['descr']);
    $filename = trim ($_POST ['filename']);


    $image = new Image();
    $insertImage = $image->insertImage($title, $descr, $filename) ;


    if(true === $insertImage)
    {
      //header('location:'.WEB_DIR_URL. '?insertImage=ok');


    }else{

      $error_msg = '<br> <a href ="' . WEB_DIR_URL . '"> retour </a>';
    }
  }
}

?>
