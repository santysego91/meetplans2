<?php
/* Núcleo de la app*/

#CONSTANTES DE CONEXIÓN
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'nombre_bd');

#CONSTANTES DE LA APP
define('HTML_DIR', 'html/');
define('APP_URL', 'http://localhost/meetplans2/');
define('BOOTSTRAP_CSS_DIR', 'views/app/css/bootstrap/');
define('BOOTSTRAP_JS_DIR', 'views/app/js/bootstrap/');
define('APP_TITLE', 'Mi Web.com');
define('APP_COPY', 'Copyright  &copy; ' . ' ' . date('Y',time()) . ' ' .'Miweb.com');



#ESTRUCTURA
require('vendor/autoload.php');  //carga automatiamente todas las librerias que carguemos con composer

?>
