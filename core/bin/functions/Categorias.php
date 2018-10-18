<!-- almacena toda la info de las categorias de foros-->

<?php
function Categorias(){
$db = new Conexion();//Conexion() definida en class.Conexion.php
$sql = $db->query("SELECT * FROM categorias;");

if($db->rows($sql) > 0) {
  while($d = $db->recorrer($sql)) {//recorrer() definida en class.Conexion.php

    $categorias[$d['id']]= $d;
    }
}else {
  $categorias = false;
}

$db-> liberar($sql);//liberar() definida en class.Conexion.php
$db-> close();

return $categorias;
}
?>
