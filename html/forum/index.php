<?php include(HTML_DIR . 'overall/header.php'); ?>
<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>
 <!-- ENLACES -->
<?php include(HTML_DIR . 'overall/topnav.php'); ?>


<?php
if(isset($_GET['success'])){// definido en activarController.php
  echo '
  <section class="mbr-section mbr-after-navbar" id="content1-10">
<div class="mbr-section__container container mbr-section__container--isolated">
<div class="alert alert-dismissible alert-success">
<strong>Activado!</strong> Tu usuario ha sido activado correctamente.
</div>
</div>
</section>
  ';
}

if(isset($_GET['error'])){// definido en activarController.php
  echo '
  <section class="mbr-section mbr-after-navbar" id="content1-10">
<div class="mbr-section__container container mbr-section__container--isolated">
<div class="alert alert-dismissible alert-danger">
<strong>Error!</strong> No se ha podido activar tu usuario.
</div>
</div>
</section>
  ';
}
 ?>








 <section class="mbr-section mbr-after-navbar" id="content1-10">
     <div class="mbr-section__container container mbr-section__container--isolated">
 <!-- CONTENIDO -->



<div class="row container">

<?php
if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permiso'] >= 2){//la funcion permiso esta definida en $_users.php  - PARA GESTIONAR HAY QUE SER ADMIN por eso mayor o igual a 2 para poder visualizar los botones
  echo'
  <!-- botones admin foro -->

 <div class="mbr-avbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons">
     <a class="mbr-buttons__btn btn btn-danger" href="?view=configforos">GESTIONAR FOROS</a>
     <a class="mbr-buttons__btn btn btn-danger" href="?view=categorias">GESTIONAR CATEGORÍAS</a>
     <a class="mbr-buttons__btn btn btn-danger" href="?view=categorias&mode=add">CREAR CATEGORIA</a>
</div>

  <!-- botones admin foro -->
  ';
}
?>


 <!-- breadcrumb -->
 <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="#"><?php echo APP_TITLE; ?></a></li>
 </ol>
 <!-- fin breadcrumb -->


<?php

if(false !=$_categorias){
  // SI HAY CATEGORIAS  (para ver cual es la forma mas optima ver como comprueba en video creasion de foros 2/2- parte 13  56:40)
# Para recorrer solo una vez los foros y determinar la cantidad de categorias de forma que use menos recursos

//$prepare_sql  = $db->prepare("SELECT id FROM foros WHERE id_categoria = ? LIMIT 1;");# Por cada repeticion obtenemos 1. El simbolo de ? es donde entra el parametro $id_categoria1 de abajo
//$prepare_sql->bind_param('i',$id_categoria1); #sentencia sql preparada que se ejecutara solo 1 vez

$prepare_sql  = $db->prepare("SELECT id FROM foros WHERE id_categoria = ? ;");
$prepare_sql->bind_param('i',$id_categoria);
foreach ($_categorias as $id_categoria => $array_categoria) {
  // encabezado $_categorias

$prepare_sql->execute();

//una vez obtenemos los resultados lo guardamos en un cache para verificar si hay temas. si no lo hay enviaremos un mensaje de que no hay temas
$prepare_sql->store_result();// este cache no afecta en absoluto al rendimiento

//Inicio tabla de diseño foros
echo '
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <th colspan="5" scope="col" bgcolor="#CCCCCC" style="margin-bottom:5px; height:32px;" >
      <div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;">'.$_categorias[$id_categoria]['nombre'].'</div></th>
  </tr>
  <tr>
    <th colspan="5" scope="col"><div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;"></div></th>
  </tr>
';

// para ver si me trae datos puedo hacer echo en $prepare_sql->num_rows
if ($prepare_sql->num_rows > 0) {
  // EXISTEN FOROS
  $prepare_sql->bind_result($id_del_foro);

  while ($prepare_sql->fetch()) {

    if($_foros[$id_del_foro]['estado'] == 1){
      $extension = 'off.gif';
    }else {
      $extension = 'lock.gif';
    }
    // muestra esto la cantidad de veces que encuentre un foro aqui
    echo '

    <!-- pag -->

    <tr>
    <th width="9%" rowspan="2" scope="row"><div align="center"><img src="'.IC_TOPIC_FORUM_DIR.$extension.'" /></div></th>
    <td width="43%" rowspan="2"><div align="left">
    <a href="foros/'.UrlAmigable($id_del_foro,$_foros[$id_del_foro]['nombre']).'"><strong>'.$_foros[$id_del_foro]['nombre'].'</strong></a><br />
    '.$_foros[$id_del_foro]['descripcion'].'</div></td>
    <td><div align="center">'.number_format($_foros[$id_del_foro]['cantidad_temas'],0,',','.').' </div></td>
    <td><div align="center">'.number_format($_foros[$id_del_foro]['cantidad_mensajes'],0,',','.').' </div></td>
    <td width="32%" rowspan="2"><div align="center"><a href="#" title="IR AL PERFIL">Usuario</a><br />
    11/10/18 - 21:50</div></td>
    </tr>
    <tr>
    <td width="8%"><p align="center">Temas</p>    </td>
    <td width="8%"><div align="center">Mensajes</div></td>
    </tr>

    <tr>
    <th colspan="5" scope="col" cellspacing="0" cellpadding="0"><div align="left"><hr style="color: #0056b2;" /></div></th>
    </tr>
    ';
  }

} else {
  // NO HAY FOROS

  echo '

  <!-- pag -->
  <tr>
  <th width="90%" scope="row"><div align="center">Para crear un foro ve a <a class="mbr-buttons__btn btn btn-danger" href="?view=configforos&mode=add">CREAR FORO</a> </div></th>

 </tr>
 <tr>
  <th scope="col" cellspacing="0" cellpadding="0"><div align="left"><hr style="color: #0056b2;" /></div></th>
 </tr>
 <!-- pag -->
  ';
}
//final tabla de diseño foros
echo '
<!-- pag -->
</table>
';


}//final foreach

$prepare_sql->close();
}else {
  // si no hay categorias

  echo '
  <table width="100%" border="0" cellspacing="2" cellpadding="2">
    <tr>
      <th  scope="col" bgcolor="#CCCCCC" style="margin-bottom:5px; height:32px;" >
        <div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;"><center>No existe ninguna categoria.</center></div>
      </th>
    </tr>
    <tr>
      <th scope="col"><div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;"></div></th>
    </tr>
  <!-- pag -->
  <tr>
  <th width="90%" scope="row"><div align="center">Para crear una categoria ve a <a class="mbr-buttons__btn btn btn-danger" href="?view=categorias&mode=add">CREAR CATEGORIA</a> </div></th>

 </tr>
 <tr>
  <th scope="col" cellspacing="0" cellpadding="0"><div align="left"><hr style="color: #0056b2;" /></div></th>
 </tr>
 <!-- pag -->
  </table>
  ';
}



 ?>



















 <!-- pag -->
 <div>
   <ul class="pagination pagination-sm">
     <li class="page-item disabled">
       <a class="page-link" href="#">&laquo;</a>
     </li>
     <li class="page-item active">
       <a class="page-link" href="#">1</a>
     </li>
     <li class="page-item">
       <a class="page-link" href="#">2</a>
     </li>
     <li class="page-item">
       <a class="page-link" href="#">3</a>
     </li>
     <li class="page-item">
       <a class="page-link" href="#">4</a>
     </li>
     <li class="page-item">
       <a class="page-link" href="#">5</a>
     </li>
     <li class="page-item">
       <a class="page-link" href="#">&raquo;</a>
     </li>
   </ul>
 </div>
 <!-- fin pag -->



 <!-- fin CONTENIDO -->
</div>
</section>




 <!-- FOOTER -->
<?php include(HTML_DIR . 'overall/footer.php'); ?>
</body>
</html>
