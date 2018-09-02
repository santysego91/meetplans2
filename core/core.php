<?php
/* Núcleo de la app*/
session_start(); //Arranca session para que funcionen las variables
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
require('core/models/class.Conexion.php');
require('core/bin/functions/Encrypt.php');#Archivo encriptador de pass
require('core/bin/functions/Users.php');#Archivo que trae los datos de los usuarios
require('core/bin/functions/EmailTemplate.php');#Archivo que valida el registro

#VARIABLES
$users = Users();//variable que utilizaremos para obtener datos de los usuarios. Definida en Users.php

#CONSTANTES DE PHPMAILER

define('PHPMAILER_HOST', 'p3plcpnl0173.prod.phx3.secureserver.net');
define('PHPMAILER_SMTP_AUTH', 'true');
define('PHPMAILER_USER', 'public@orend.com');
define('PHPMAILER_PASS', 'Prinick2016');
define('PHPMAILER_SMTP_SECURE', 'tls');
define('PHPMAILER_PORT', '565');
// detalles del correo
define('PHPMAILER_TITULO_EMAIL', 'MiWeb.com');
define('PHPMAILER_SUBJECT', 'Activacion de tu cuenta');



?>
