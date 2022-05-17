<?php
class Image
/*
// La classe Image permettra donc d’effectuer deux opérations :
// afficher les images contenus dans le répertoire avec la méthode : getImages($image_dir) ;
// enregistrer dans la base les informations postées depuis l’administration : insertImage($title, $descr, $filename).
*/
{
  public function __construct()
  {
// Le constucteur et vide pour le projet
  }
/*metode retoutnant les ficher présent dans le ou
nous avons placé nos images et que nous définissons  au moyent de la
variable  $image_dir
*/
public function getImages($image_dir)
{
// nous ouveron le dossier $image_dir avec opendir
//et atention le resulta a la variable $handle
if ($handle = opendir($image_dir))
{
//
while (false !== ($entry = readdir( $handle )))
{

  if( $entry != "." && $entry != "..")
  {
  $i++;
  $images[$i] ['filemame'] = $entry;
  // utilisation de this pour apeler la methode getImageData

  $image_data = $this->getImageData($entry);

  $image [$i] ['tile'] = $image_data['title'];
  $image[$i] ['description'] = $image_data['description'];

  }
}
  }
closedir ($handle);//nous fermons le repertoire avec closedir
return $images; //nous retournons le tableau de données
}

/* la method insertImage  per enregistrer dans la base les informations
postées depuis l’administration : insertImage($title, $descr, $filename).*/

public function insertImage ($title, $descr, $filename)
{

  $mysqli = new mysqli('localhost','root','','projet_image');

  $mysqli->set_charset("utf8");

  // verification de connexion à la base

  if ($mysqli->connect_errno) {

    echo 'echec de la connexion ' .$mysqli->connect_errno ;

    exit();
  }
  // insertion fomuler admin.php dans la BD

  if (!$mysqli->query('INSERT INTO image (title,description,filename) VALUES ("'. $title .'", "'. $descr .'", "'. $filename .'")'))
  {
    echo 'Une erreur est survenue lors de l\'insertion des données dans la base . Mesage d\' erreur :' . $mysqli->error;

    return false;
  }

  else {
    return true;

    $mysqli->close();
  }

}

// 03 Optimisation fonctionnelle du gestionnaire : pages 5
// méthode qui nous permet de retourner le tableau  $image_data
// contenant donc les informations de la table image :

public function getImageData ($filename)
{
  $mysqli = new mysqli('localhost','root','','projet_image')

  $mysqli->set_charset("utf8");
  /* verification de conexion à la base */

  if ($mysqli->connetc_errno) {
    printf("Echec de la conection %s\n",$mysqli->connect_error);
    exit();
  }

  $result =$mysqli->query('SELECT id, title, description, filename,
    FROM image WHERE filename = "' . $filename . '" ');

  if (!$result)
  {
    echo 'Une erreur est sur venue lor de la recuperation des données dans la base. Mesage d\'erreur : ' . $mysqli->error;
    return false;
  }
  else {
    $row = $result->fetch_array();
    $image_data['id'] = $row['id'];
    $image_data['title'] = $row['title'];
    $image_data['description'] = $row['description'];
    $image_data['filename'] = $row['filename'];
    return $image_data
  }
  $mysqli->close ();
}

}
?>
