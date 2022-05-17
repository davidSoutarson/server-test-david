<?php
//ficher de configuration
define ('WEB_DIR_NAME','projet_image');
define ('IMAGE_DIR_NAME','images');
define ('IMAGE_DIR_PATH', $_SERVER['DOCUMENT_ROOT'] .'/'. WEB_DIR_NAME .'/'. IMAGE_DIR_NAME .'/' );
define ('IMAGE_DIR_URL', 'http://'. $_SERVER['HTTP_HOST'] .'/'. WEB_DIR_NAME .'/'. IMAGE_DIR_NAME .'/' );
define ('WEB_TITLE','Projet Images');

define ( 'WEB_DIR_URL','admin.php'); // pour que tous mais sripte fontione j ai preferer definir la fontion icie ? est la bonne methode ?
