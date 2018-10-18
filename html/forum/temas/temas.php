<!-- *****************************************************************-->

<!-- DISEÑO TEMAS-->

<!-- *****************************************************************-->

<?php include(HTML_DIR . 'overall/header.php'); ?>
<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>
<!-- ENLACES -->
<?php include(HTML_DIR . 'overall/topnav.php'); ?>





<section class="mbr-section mbr-after-navbar" id="content1-10">
    <div class="mbr-section__container container mbr-section__container--isolated">
<!-- CONTENIDO -->
<?php
if(isset($_GET['success'])){// definido en activarController.php
  echo '<div class="alert alert-dismissible alert-success">
<strong>Completado!</strong> El foro fue eliminado correctamente. (all_foro.php)
</div>';
}

 ?>

<div class="row container">

<?php
$boton_Nuevo_Tema='
<!-- botones crear foro-->
  <div class="mbr-avbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons">
     <a class="mbr-buttons__btn btn btn-danger" href="?view=temas&mode=add&id_foro='.$id_foro.'">NUEVO TEMA</a>
  </div>';
if (isset($_SESSION['app_id'])) {
  // si el user esta logeado

  if($_foros[$id_foro]['estado'] == 1 or $_users[$_SESSION['app_id']]['permiso'] == 2){//si el usuario es admin O el foro esta abierto
    //la funcion permiso esta definida en $_users.php  - PARA GESTIONAR HAY QUE SER ADMIN por eso mayor o igual a 2 para poder visualizar los botones

   echo $boton_Nuevo_Tema;
  }
}


?>






<!-- breadcrumb    -->
<?php
$ID_f= UrlAmigable(intval($_foros[$id_foro]['id']),$_foros[$id_foro]['nombre']);
?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="?view=index"><i class="fa fa-home"></i> Inicio</a></li>
  <li class="breadcrumb-item"><a href="?view=forum"><i class="fa fa-comments"></i> Foros</a></li>
    <li class="breadcrumb-item"><a href="foros/<?php echo $ID_f; ?>"><?php echo $_foros[$id_foro]['nombre']; ?></a></li><!-- $id_foro la definimos en la linea 5 de forosController.php -->

</ol>
<!-- fin breadcrumb -->

 <div class="col-sm-12">
  <!-- encabezado tabla ANUNCIOS-->
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <th colspan="5" scope="col" bgcolor="#CCCCCC" style="margin-bottom:5px; height:32px;" >
      <div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;">
        Anuncios
      </div></th>
  </tr>
  <tr>
    <th colspan="5" scope="col"><div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;">
    </div></th>
  </tr>

<?php
if ($db->rows($sql_anuncios) > 0) {
  //HAY ANUNICIOS

  while ($anuncio = $db->recorrer($sql_anuncios)) {
//para la fecha y hora del tema lo usamos de esta manera en vez de estampar el time puro en la db y luego hacer un bucle para cada tema y modificar el formato. De esta manera optimizamos el funcionamiento
//cuanto menos tengamos que hacer dentro de un bucle , funcionara mejor

if($anuncio['estado'] == 1){
  $extension = 'announce.gif';
}else {
  $extension = 'announce_bloqueado.gif';
}


echo '
  <tr>
  <th width="9%" scope="row"><div align="center"><img src="views/app/images/forums/icons/boardicons/on.gif" /></div></th>
  <td width="43%" ><div align="left">
  <a href="temas/'.UrlAmigable($anuncio['id'],$anuncio['titulo'],$id_foro).'">
  <strong>'.$anuncio['titulo'].'</strong></a></div></td>
  <td><div align="center">'.number_format($anuncio['visitas'],0,',','.').'</br>Visitas</div></td>
  <td><div align="center">'.number_format($anuncio['respuestas'],0,',','.').'</br>Respuestas</div></td>
  <td width="32%" ><div align="center"><a href="#" title="IR AL PERFIL">'.$_users[$anuncio['id_ultimo']]['user'].'</a><br />
  '.$anuncio['fecha_ultimo'].'</div></td>
  </tr>

  <tr>
  <th colspan="5" scope="col" cellspacing="0" cellpadding="0"><div align="left"><hr style="color: #0056b2;" /></div></th>
  </tr>
';

  }
} else {
  // NO HAY ANUNCIOS
echo '
<!-- ANUNCIOS-->

   <tr>
   <th width="9%" scope="row"><div align="center">No hay anuncios.</div></td>
   </tr>

<!-- linea-->
   <tr>
   <th colspan="5" scope="col" cellspacing="0" cellpadding="0">
   <div align="left"><hr style="color: #0056b2;" /></div></th>
   </tr>
';
}

 ?>
</table>
</div>



 <!-- encabezado tabla FOROS-->

 <div class="col-sm-12">

 <!-- fin encabezado tabla FOROS-->

 <!-- AQUI LOS TEMAS -->
 <table width="100%" border="0" cellspacing="2" cellpadding="2">
   <tr>
     <th colspan="5" scope="col" bgcolor="#CCCCCC" style="margin-bottom:5px; height:32px;" >
       <div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;">
         <?php echo $_foros[$id_foro]['nombre']; ?>
       </div></th>
   </tr>
   <tr>
     <th colspan="5" scope="col"><div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;">
     </div></th>
   </tr>




   <?php
   if ($db->rows($sql_temas) > 0) {
     //HAY TEMAS


     while ($tema = $db->recorrer($sql_temas)) {

       if($tema['estado'] == 1){
         $extension = 'on.gif';
       }else {
         $extension = 'lock.gif';
       }

   //para la fecha y hora del tema lo usamos de esta manera en vez de estampar el time puro en la db y luego hacer un bucle para cada tema y modificar el formato. De esta manera optimizamos el funcionamiento
   //cuanto menos tengamos que hacer dentro de un bucle , funcionara mejor
   // views/app/images/forums/icons/boardicons/on.gif
   echo '
     <tr>
     <th width="9%" scope="row"><div align="center"><img src="'.IC_TOPIC_FORUM_DIR.$extension.'" /></div></th>
     <td width="43%" ><div align="left">
     <a href="temas/'.UrlAmigable($tema['id'],$tema['titulo'],$id_foro).'">
     <strong>'.$tema['titulo'].'</strong></a></div></td>
     <td><div align="center">'.number_format($tema['visitas'],0,',','.').'</br>Visitas</div></td>
     <td><div align="center">'.number_format($tema['respuestas'],0,',','.').'</br>Respuestas</div></td>
     <td width="32%" ><div align="center">Por: <a href="#" title="IR AL PERFIL">'.$_users[$tema['id_ultimo']]['user'].'</a><br />
     '.$tema['fecha_ultimo'].'</div></td>
     </tr>

     <tr>
     <th colspan="5" scope="col" cellspacing="0" cellpadding="0"><div align="left"><hr style="color: #0056b2;" /></div></th>
     </tr>
   ';

     }
   } else {
     // NO HAY TEMAS
   echo '
   <!-- TEMAS-->

      <tr>
      <th width="9%" scope="row"><div align="center">No hay temas.</div></td>
      </tr>

   <!-- linea-->
      <tr>
      <th colspan="5" scope="col" cellspacing="0" cellpadding="0">
      <div align="left"><hr style="color: #0056b2;" /></div></th>
      </tr>
   ';
   }

    ?>

 </table>
</div>























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
