<?php


if(isset ($GET['key'],$_SESSION['app_id'])){ //El usuario e activa etando logeado
  $db = new Conexion();
  $id = $_SESSION['app_id']; //esto captura el id del usuario logeado
  $key = $db->real_escape_string($_GET['key']);
$sql = $db->query("SELECT id FROM users WHERE id='$id' AND keyreg='$key' LIMIT 1;");

if($db->rows($sql) > 0){ // si es mayor que 0 entonces SI activaremos la cuenta
  $db->query("UPDATE users SET activo='1', keyreg='0' WHERE id='$id';");
  header ('location: ?view=index&success=true');  //pasa esta variable a index.php
}else{
header ('location: ?view=index&error=true');
}


$db-> liberar($sql);
  $db->close();
  $key = $_GET['key'];
}else{
  include('html/public/logearte.php');//si no esta logeado lo manda a una pag de logeo tipo index

}

?>
