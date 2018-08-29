<!-- almacna toda la info de los usuarios-->
<?php
function Users(){
$db = new Conexion();//Conexion() definida en class.Conexion.php
$sql = $db->query("SELECT * FROM users");

if($db->rows($sql) > 0) {
  while($d = $db->recorrer($sql)) {//recorrer() definida en class.Conexion.php

    $users[$d['id']]= array(
    'id'=> $d['id'],
    'user'=> $d['user'],
    'pass'=> $d['pass'],
    'email'=> $d['email'],
    'permiso'=> $d['permiso']
    );
    // $users[$_SESSION['app_id']]['user']    para traer al nombre de usuario
   //$d['row de Base de Datos']
  }
}else {
  $users = false;
}

$db-> liberar($sql);//liberar() definida en class.Conexion.php
$db-> close();

return $users;
}
?>
