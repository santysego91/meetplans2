<?php
if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permiso'] >= 2){//la funcion permiso esta definida en $_users.php  - PARA GESTIONAR HAY QUE SER ADMIN por eso mayor o igual a 2 para poder visualizar los botones
$isset_id = isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >=1;

require('core/models/class.ConfigForos.php');
$config_foros = new ConfigForos();

switch (isset($_GET['mode']) ? $_GET['mode'] : null){

  //*********************************
  case 'add':      #añadir FORO
  //*********************************
  if($_POST){
    $config_foros->Add();
  } else {
    include(HTML_DIR . 'forum/foros/add_foro.php');
  }
  break;
  //*********************************
  case 'edit':      #editar FORO
  //*********************************
  if($isset_id and array_key_exists($_GET['id'], $_foros)){//comprobamos que el id este registrado en las cat y que el usuario sea adm
  $id_foro = intval($_GET['id']);


              if($_POST){
                   $config_foros->Edit();
              }else{
                   include(HTML_DIR . 'forum/foros/edit_foro.php');
              }

    }else{
      header('location: ?view=configforos');
    }
  break;
  //*********************************
  case 'delete':      #eliminar FORO
  //*********************************
  if($isset_id){
    $config_foros->Delete();
  } else {
    header('location: ?view=configforos');
  }
  break;

  default:
include(HTML_DIR . 'forum/foros/all_foro.php');
  break;


}

}else{
  header('location: ?views=index');
}



?>
