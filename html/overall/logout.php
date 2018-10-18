<?php





session_start();
if(!empty($_SESSION['app_id']))
{
$_SESSION['app_id']='';
session_destroy();
}
header("Location:?view=index");
?>
