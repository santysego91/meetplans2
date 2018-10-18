<?php
//PENDIENTES
/*
3- Hacer que no se puedan borrar todos los usuarios. (Siempre tiene que quedar el admin general)
*/

//index.php se encarga de llamar a los controladores
require('core/core.php');// DISPONIBLE CONTROLADORES Y OTROS EN TODAS LAS PAGINAS

/*
if (  si esta definida la vista "$_GET['view']"  ){}
else{si NO ir a una pag.}
 */


OnlineUsers();//Llamamos esta funcion porque queremos que este de forma global (que sea accesible en toda la app)



if(isset($_GET['view'])) {
 #si la view esta definida ir a la VISTA
// convertidor de mayusculas a minusculasa (para evitar errores en servidor)
 if(file_exists('core/controllers/' . strtolower($_GET['view']) . 'Controller.php')) {
       include('core/controllers/'. strtolower($_GET['view']) . 'Controller.php'); // si la view existe lo mostramos
     }else {
       include('core/controllers/errorController.php');// si la view no existe mostrar error
     }
 }else {
   include('core/controllers/indexController.php');// si la view no esta definida ir a:
 }


?>
