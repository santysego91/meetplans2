<?php
/* encriptador de pass*/

#CONSTANTES DE CONEXIÓN
function Encrypt($string){
  $str ='';
$long = strlen($string);
for($x = 0; $x < $long; $x++){ #recorre la lonjitud de caracteres que tiene desde 0 al final
  $str .= ($x % 2) != 0 ? md5($string[$x]) : $x; #si es par me devuelve 0, si es impar me da md5, en otro caso deja igul el caracter
}
return md5($str);

}
?>
