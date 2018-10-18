<?php

$mode = isset($_GET['mode']) ? $_GET['mode'] : null;

//verificamos si esta definida la url del foro .htaccess   index.php?view=temas&id=$1&id_foro=$2
if (isset($_GET['id_foro']) and array_key_exists($_GET['id_foro'],$_foros)) {
  //si esta definida la creamos. Siempre debe estar creada para que funcione ya que se depende del foro
  $id_foro = intval($_GET['id_foro']);

  require('core/models/class.Temas.php');
  // verifica si el tema existe y que sea numero
  $isset_id = isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1;

  //verificar si esta logeado
  $loged = isset($_SESSION['app_id']);
  if ($loged) {//cuando esta logeado pasamos a la espera de verificar el resto
  //verificar si el tema es cerrado o si es admin
  // para ello lo pasaremos por la url
  // esta linea cambia en php7
  //php 5.6  $cerrado = $_foros[$id_foro]['estado'] == 1 or $_users[$_SESSION['app_id']]['permiso'] == 2;
  //php 7    $cerrado = ($_foros[$id_foro]['estado'] == 1 or $_users[$_SESSION['app_id']]['permiso'] == 2);
  $cerrado = ($_foros[$id_foro]['estado'] == 1 or $_users[$_SESSION['app_id']]['permiso'] == 2);
  }else {
    $cerrado = false;
  }



  $temas = new Temas();

  switch ($mode) { //verificamos si existe una variable $_GET['mode'], si lo hay mandamos $_GET['mode']. De lo contrario es null



  // CREAR TEMA
    case 'add':

  if ($loged and $cerrado) {//para crear tema debe de estar logeado y no debe estar cerrado o ser admin

    if ($_POST) {
      $temas->Add();
    } else {
    include(HTML_DIR . 'forum/temas/add_temas.php');
    }


  } else {
    // code...
  }


    break;


  // EDITAR TEMA
    case 'edit':
    if ($isset_id and $loged) {//si devuelve true entonces es que recibio una id de tema y se puede visualizar

  //tenemos que chekear los $_POST
      if ($_POST) {
        $temas->Edit();
      } else {
        // code...
      }

    } else {
    //  header('location: '.APP_URL.'?view=forum');
          header('location: index.php?view=forum');
    }
    break;

  // BORRAR TEMA
    case 'delete':
    if ($isset_id and $loged) {//si devuelve true entonces es que recibio una id de tema y se puede visualizar

  $temas->Delete();

    } else {
      header('location: index.php?view=forum');
    }
    break;

  // CERRAR TEMA
    case 'close':
    if ($isset_id and $loged) {//si devuelve true entonces es que recibio una id de tema y se puede visualizar

  $temas->Close();

    } else {
      header('location: index.php?view=forum');
    }
    break;

  // CONVERTIR EL TEMA EN ANUNCIO
    case 'anuncio':
      if ($isset_id and $loged) {//si devuelve true entonces es que recibio una id de tema y se puede visualizar

  $temas->Anuncio();

      } else {
        header('location: index.php?view=forum');
      }
      break;


  // ACCION DEFAULT
    default:
      //aqui es la parte de la visualizacion del tema
      if ($isset_id) {//si devuelve true entonces es que recibio una id de tema y se puede visualizar


        // verificar si el tema EXISTEN
          $tema = $temas->Check();
          if (false != $tema) {
            // SI EXISTE - VISUALIZAR TEMA desde la variable $TEMA
          } else {
            header('location: index.php?view=forum');
          }

      } else {
        header('location: index.php?view=forum');
      }
      break;
  }

} else {


if (null == $mode) {
    header('location: ../index.php?view=forum');
} else {
    header('location: index.php?view=forum');
}



}










?>
