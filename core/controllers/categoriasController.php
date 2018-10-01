<?php

if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permiso'] >= 2){

$isset_id = isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >=1; // para comprobar si el usuario es ADM
require('core/models/class.Categorias.php');
$categorias = new Categorias(); // lo primero que pasa al llamar a la clase Categorias es lo de __construct() en class.Categorias

switch (isset($_GET['mode']) ? $_GET['mode'] : null){
//*********************************
case 'add':      #añadir categoria
//*********************************
if($_POST){
  $categorias->Add();
} else {
  include(HTML_DIR . 'forum/categorias/add_categoria.php');
}
break;
//*********************************
case 'edit':      #editar categoria
//*********************************
if($isset_id and array_key_exists($_GET['id'], $_categorias)){//comprobamos que el id este registrado en las cat y que el usuario sea adm
$id_categoria = intval($_GET['id']);


            if($_POST){
                 $categorias->Edit();
            }else{
                 include(HTML_DIR . 'forum/categorias/edit_categoria.php');
            }

  }else{
  header('location: ?view=categorias');
  }

break;
//*********************************
case 'delete':     #borrar categoria
//*********************************
if($isset_id){ //comprobamos si es admin con $isset_id
$categorias->Delete();
}else{
header('location: ?view=categorias');
}
break;
//*********************************
default:
//*********************************
$db = new Conexion();
$sql = $db->query("SELECT * FROM categorias;");

if($db->rows($sql) > 0){
  //mayor que 0
include(HTML_DIR . 'forum/categorias/all_categoria.php');
$db->liberar($sql);
$db->close();
break;
}else{
  header('location: ?view=index');
}

}}
?>
