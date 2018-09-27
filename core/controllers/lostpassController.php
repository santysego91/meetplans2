<?php
if(!isset($_SESSION['app_id']) and isset($_GET['key'])){//el usuario no debe estar logeado para recuperar el pass pero si debe estar definida la variable key   (?view=lostpass&key=) definida en goLostPass.php

$db= new Conexion();
$keypass = $db->real_escape_string($_GET['key']);
$sql = $db->query("SELECT id,new_pass FROM users WHERE keypass='$keypass' LIMIT 1;");
if($db->rows($sql) > 0){
  $data = $db->recorrer($sql);//obtiene el primer valor c0784027b45aa11e848a38e890f8416c        bbcd333021fe939f7e1c7ce53846c786    EAC390E4

  $id_user = $data[0];
  $new_pass = Encrypt($data[1]);
  $password = $data[1];
  $db->query("UPDATE users SET keypass='',new_pass='',pass='$new_pass' WHERE id='$id_user';");
  include('html/mensajes/lostpass_mensaje.php');
}else{
  header('location: ?view=index');
}
$db->liberar($sql);
$db->close();

}else{
header('location: ?view=index');
}




?>
