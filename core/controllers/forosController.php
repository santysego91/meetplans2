<?php

if (isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1) {

  $id_foro = intval($_GET['id']);

  //vamos a verificar que el tema exista
  //nop instanciamos una nueva conexion para verificarla porque ya tenemos una clase en function/foros.php que lo hace y esta declarada global en el core

if (array_key_exists($id_foro,$_foros)) {
  // EL TEMAS EXISTE
$db = new Conexion();
//Tipo1= tema normal                Tipo2= Anuncio
//Se ordena de MAYOR a -
$sql_anuncios = $db->query("SELECT * FROM temas WHERE id_foro ='$id_foro'AND tipo='2' ORDER BY id DESC; ");//sabemos que es un dato que entrara correctamente a la db porque es numerico y esta previamente definido

//el paginador solo afectara a estos temas normasles ya que la de anuncio estara siempre estatica en la cabecera
$sql_temas = $db->query("SELECT * FROM temas WHERE id_foro ='$id_foro' AND tipo='1' ORDER BY id DESC; ");

include(HTML_DIR . 'forum/temas/temas.php');


$db->liberar($sql_anuncios,$sql_temas);
$db->close();
} else {
  // NO EXISTE
    header('location: '.APP_URL.'?view=error');
}


}else {
  header('location: '.APP_URL.'?view=forum');
}


?>
