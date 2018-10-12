<?php

if (isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1) {
  // controlador de temas
  echo 'Esto es ?view=temas&id=', $_GET['id'];
}else {
  header('location: ../?view=forum');
}


?>
