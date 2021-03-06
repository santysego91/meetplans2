<?php
//FUNCIONAMIENTO:
//1-  Hacemos una unica consulta a la db (Conexion() definida en class.Conexion.php)
//2-  Obtenemos todos los datos de todos los usuarios
//3-  Cerificamos la cantidad de respuestas que tenemos (cantidad de usuarios) $db->rows($sql)
//4-  Verificamos si ya existe una variable de sesion que se llama $_SESSION['cantidad_usuarios'] (Este caso se da solamente cuando el usuario entra por primera vez a la web o cuando ha pasado mucho tiempo sin entrar y ya no exista esa variable de sesion. También con un logout)
//5-  Cuando no exista se crea con la cantidad de usuarios que hay en ese momento (Si se elimina o se crea un usuario se actualiza $usuarios_actuales_db). Si existia continuara con la misma cantidad de usuarios en la variable $_SESSION['cantidad_usuarios']
//6-  Verificamos si los datos que tenemos difieren de los actuales, ademas en la segunda condicion buscamos diferencias del tiempo actual - 60 segundos (1 min) sea menor o igual que el timer de la db
//7-  Si dio True, hay cambios en los usuarios y ejecutamos el while (recorrer() definida en class.Conexion.php)
//8-  Se genera la nueva variable de usuarios con todos los datos de todos los usuarios
//9-  Si en el paso (6) es false comprobamos si existe la variable $_SESSION['users']. Si no existe quiere decir que al menos esta entrando por primera vez
//10- No hay cambios en los usuarios por lo que mantenemos la misma cantidad de usuarios
//11- Le indicamos el valor a la vbariable $users con todos los datos de todos los usuarios
//12- Liberamos la consulta en la db
//13- Cerramos conexion
//14- Retornamos en la variable de sesion que se esta cargando en la web desde core.php


//Este algoritmo se actualiza solo cuando hay un cambio en la cantidad de usuarios que existe en el sistema
// pero no se reflejan cosas importantes para OTROS usuarios como puede ser la visualisación de otro usuario online o que los otros usuarios hallan hecho cambios en su informacion personal

//La siguiente modificacion es para que un usuario se conecte o desconecte o haga cambios, entonces el sistema tendra que actualizar la sesion a todos los usuarios

function Users(){
$db = new Conexion();//1

$query =  $db->query("SELECT timer FROM config WHERE id='1' LIMIT 1;");
$timer = $db->recorrer($query)[0];
$db-> liberar($query);



$sql = $db->query("SELECT * FROM users");//2
$usuarios_actuales_db = $db->rows($sql); //3

//Primer inicio
if (!isset($_SESSION['cantidad_usuarios'])) {//4
$_SESSION['cantidad_usuarios'] = $usuarios_actuales_db;//5
}

//Uso habitual
if($_SESSION['cantidad_usuarios'] != $usuarios_actuales_db or (time() - 60) <= $timer) {//6

  while($d = $db->recorrer($sql)) {//7
    $users[$d['id']]= $d;}//8

}else {//No ha existido la variable $_SESSION['users']

  if (!isset($_SESSION['users'])) {//9

    while($d = $db->recorrer($sql)) {//=7
      $users[$d['id']]= $d;}//=8

  } else {
    $users = $_SESSION['users'];//10
  }

}

$_SESSION['users'] = $users;//11
$db-> liberar($sql);//12
$db-> close();//13
return $_SESSION['users'];//14
}
?>
