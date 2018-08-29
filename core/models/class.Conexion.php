<?php

class Conexion extends mysqli {
public function __construct(){
parent::__construct(DB_HOST,DB_USER,DB_PASS,DB_NAME);#En el mismo orden de Core.php
$this->connect_error ? die('Error en conexión a la DB') : null;
$this->set_charset("utf8");
}


#numero de filas
public function rows($query){
  return mysqli_num_rows($query);
}
#liberar resultado
public function liberar($query){
  return mysqli_free_result($query);
}
#recorrer
public function recorrer($query){
  return mysqli_fetch_array($query);
}



}

 ?>
