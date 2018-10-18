<?php

//borramos todas las $_SESSION                                       $_SESSION['time_online']
unset($_SESSION['app_id'], $_SESSION['cantidad_usuarios'],$_SESSION['users']);
header('location: ?view=index');
//include('html/overall/logout.php');

?>
