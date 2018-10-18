<!-- almacena toda la info de las categorias de foros-->

<?php
function Foros(){
$db = new Conexion();//Conexion() definida en class.Conexion.php
$sql = $db->query("SELECT * FROM foros;");

if($db->rows($sql) > 0) {
  while($d = $db->recorrer($sql)) {//recorrer() definida en class.Conexion.php

    $foros[$d['id']]= $d;
    }
}else {
  $foros = false;
}

$db-> liberar($sql);//liberar() definida en class.Conexion.php
$db-> close();

return $foros;
}
?>
