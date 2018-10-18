<?php

function GetUserStatus($time){

//verificamos que $time sea menor que el tiempo actual - 6 min
if ($time >= (time() - (60*5))) {
  // usuario esta Online

return 'online.gif';//icono de online

} else {
  // el usuario no esta Online
  return 'offline.gif';
}



}
 ?>
