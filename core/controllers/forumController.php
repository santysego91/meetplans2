<?php
$db = new Conexion();
# Para recorrer solo una vez los foros y determinar la cantidad de categorias de forma que use menos recursos
include('html/forum/index.php');
$db->close();

?>
