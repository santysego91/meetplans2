<?php
// recibe las peticiones ajax y manda a core/bin/ajax

   /*
Muestra lo que ponemos en la casilla usuario por ejemplo
if($_POST){
echo $_GET['user'];
}else{
header('location: index.php'); }
  */

if($_POST){
   /* los usuario pueden entrar a ajax.php solo si envian el POST */
  require('core/core.php');#Trae la conex DB y otros requisitos (phpmailer)

  switch (isset($_GET['mode']) ?  $_GET['mode'] : null) {

    case 'login':
      require('core/bin/ajax/goLogin.php');
      break;

      case 'registro':
        require('core/bin/ajax/goReg.php');
        break;


    default:
      header('location: index.php');
      break;
}





}else{ header('location: index.php'); }




?>
