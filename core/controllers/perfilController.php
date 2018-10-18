<?php

//verificar si existe una id y que exista dentro de los usuarios
if (isset($_GET['id']) and array_key_exists($_GET['id'], $_users)) {

$id_usuario= intval($_GET['id']);


$db = new Conexion();
$sql = $db->query("SELECT COUNT(id) FROM temas WHERE id_dueno='$id_usuario'; ");




include(HTML_DIR . '/users/perfil.php');

$db->liberar($sql);
$db->close();

} else {
header('location: ?view=index');
}


 ?>
