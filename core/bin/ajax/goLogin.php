<?php
if(!empty($_POST['user']) and !empty($_POST['pass'])){#chekear que todo este completado


$db = new Conexion(); //Conexion() definida en class.Conexion.php
$data = $db->real_escape_string($_POST['user']);
$pass = Encrypt($_POST['pass']);
#vamosa chekear si el usuario o el email coincide con la pass
#el parentecis en el sql es para que compruebe uno de los 2 y de solo 1 resultado
$sql = $db->query("SELECT id FROM users WHERE (user='$data' OR email='$data') AND pass='$pass' LIMIT 1");


if($db->rows($sql) > 0 ){
// recordar la sesion si "recordar cuenta" esta chekeado
  if($_POST['sesion']) {
    // recordar sesion un dia (60*60*24)
    ini_set('session.cookie_lifetime', time() + (60*60*24*90));
  }
  // esto es con PHP 5, en 7 cambia por si da error
    $_SESSION['app_id'] = $db->recorrer($sql)[0];//creamos la variable de session ['app_id'] para manejar la id de usuario

echo 1;

}else {//mensaje de error (no coinciden los datos)
  echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">X</button>
  <strong>Oh!</strong> Credenciales incorrectas. (goLogin.php)
  </div>';
}
$db-> liberar($sql); //liberar() definida en class.Conexion.php
$db-> close();


}else {# si todo esto esta vacio enviar esto
  echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">X</button>
  <strong>Oh!</strong> No ha indicado sus credenciales. (goLogin.php)
</div>';
}


 ?>
