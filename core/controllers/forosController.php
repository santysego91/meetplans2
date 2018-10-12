<?php

if (isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1) {
  // code...
  echo 'Esto es ?view=foros&id=',$_GET['id'];
}else {
  header('location: ../?view=forum');
}


?>
