<?php
//(int $id) el int esta reservada solo para php7, si quiero usar la app para otra version sacar el int
function IncrementarVisitas(int $id){

//llamamos a una nueva conexion
$db = new Conexion();
$db->query("UPDATE temas SET visitas=visitas + '1' WHERE id='$id' LIMIT 1;");
$db->close();
} ?>
