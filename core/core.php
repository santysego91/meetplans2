<?php
/* Núcleo de la app*/
session_start(); //Arranca session para que funcionen las variables

date_default_timezone_set('Europe/Madrid');//estaflece la zona horaria
//http://php.net/manual/es/timezones.php - listado de zonas horarias

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
define('IC_TOPIC_FORUM_DIR', 'views/app/images/forums/icons/boardicons/');

#CONSTANTES DE CONFIGURACION

#Foros
define('FOROS_TITULO_LONG_MIN', 5);
define('FOROS_CONT_LONG_MIN', 250);// para evitar spam se puede subir la cantidad
define('FOROS_FORMAT_DATE_HR', 'd/n/y - H:i');// http://php.net/manual/es/function.date.php   http://php.net/manual/es/datetime.formats.time.php


#ESTRUCTURA
require('vendor/autoload.php');  //carga automatiamente todas las librerias que carguemos con composer
require('core/models/class.Conexion.php');
require('core/bin/functions/Encrypt.php');#Archivo encriptador de pass
require('core/bin/functions/Users.php');#Archivo que trae los datos de los usuarios
require('core/bin/functions/EmailTemplate.php');#Archivo que valida el registro
require('core/bin/functions/LostPassTemplate.php');#Archivo que valida el registro
require('core/bin/functions/Categorias.php');#Archivo que obtiene toda la info de categorias de foros
require('core/bin/functions/Foros.php');#Archivo que obtiene toda la info de los foros
require('core/bin/functions/UrlAmigable.php');#Archivo que obtiene toda la info de los foros

#VARIABLES
$_users = Users();//variable que utilizaremos para obtener datos de los usuarios. Definida en function/Users.php
$_categorias = Categorias();//variable que utilizaremos para obtener datos de las categorias. Definida en function/Categorias.php
$_foros = Foros();
#CONSTANTES DE PHPMAILER

define('PHPMAILER_HOST', 'smtp.gmail.com');                // Host del SMTP. (Se puede usar el de google smtp.gmail.com)
define('PHPMAILER_SMTP_AUTH', 'true');                     // Enable SMTP authentication
define('PHPMAILER_USER', '');           // Usuario del Host SMTP (Puede ser tu correo gmail) para poder usarlo permitir otras apps en https://myaccount.google.com/lesssecureapps
define('PHPMAILER_PASS', '');                     // Pass del Host SMTP
define('PHPMAILER_SMTP_SECURE', 'ssl');                    // Enable TLS encryption, `ssl` also accepted
define('PHPMAILER_PORT', '465');                           //Puerto TCP (gmail usa el 465 con ssl. De lo contrario 587)
// Detalles del correo registro
define('PHPMAILER_SUBJECT', 'MiWeb.com - ACTIVACIÓN DE CUENTA');             // El 'Subject' que aparecera de titulo





?>
