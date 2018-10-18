

<!-- *****************************************************************-->

<!-- VER TEMAS-->

<!-- *****************************************************************-->

<?php include(HTML_DIR . 'overall/header.php'); ?>
<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE; ?></a></section>
<!-- ENLACES -->
<?php include(HTML_DIR . 'overall/topnav.php'); ?>

<section class="mbr-section mbr-after-navbar" id="content1-10">
    <div class="mbr-section__container container mbr-section__container--isolated">
<!-- CONTENIDO -->

<div class="row container">

<?php

if (isset($_SESSION['app_id'])) {
  // si el usuario esta conectado

  $ID_TM = $_GET['id'];
  $permisos_o_dueno = ($_users[$_SESSION['app_id']]['permiso'] > 0 or $tema['id_dueno'] == $_SESSION['app_id']);

  if ($tema['estado'] == 1) {
    // Si el tema esta abierto
  echo '
    <div class="mbr-avbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons">
       <a class="mbr-buttons__btn btn btn-danger" href="?view=temas&mode=responder&id='.$ID_TM.'&id_foro='. $_GET['id_foro'] .'">RESPONDER</a>
    </div>';
  }else if($permisos_o_dueno and $tema['estado'] == 0){
    //SI ESTA cerrado
    echo '
      <div class="mbr-avbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons">
         <a class="mbr-buttons__btn btn btn-danger" href="?view=temas&mode=close&id='.$ID_TM.'&id_foro='. $_GET['id_foro'] .'&estado=1">ABRIR</a>
      </div>';
  }


if ($permisos_o_dueno) {
  // code...

  if ($tema['estado'] == 1) {//si el usuaro esta logeado y tiene los permisos 1 0 2  de admin - O - si es el creador del tema.
    //PUEDE CERRAR EL TEMA
    echo '
      <div class="mbr-avbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons">
         <a class="mbr-buttons__btn btn btn-danger" href="?view=temas&mode=close&id='.$ID_TM.'&id_foro='. $_GET['id_foro'] .'&estado=0">CERRAR</a>
      </div>';
    }


    echo '
      <div class="mbr-avbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons">
         <a class="mbr-buttons__btn btn btn-danger" href="?view=temas&mode=delete&id='.$ID_TM.'&id_foro='. $_GET['id_foro'] .'">BORRAR</a>
      </div>';

}



}



?>


<!-- breadcrumb    -->
<?php
$ID_f= UrlAmigable(intval($_foros[$id_foro]['id']),$_foros[$id_foro]['nombre']);
$ID_t= UrlAmigable(intval($tema['id']),$tema['titulo'],intval($_foros[$id_foro]['id']));
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?view=index"><i class="fa fa-home"></i> Inicio</a></li>
  <li class="breadcrumb-item"><a href="?view=forum"><i class="fa fa-home"></i> Foros</a></li>
  <li class="breadcrumb-item"><a href="foros/<?php echo $ID_f; ?>"><?php echo $_foros[$id_foro]['nombre']; ?></a></li>
    <li class="breadcrumb-item"><a href="temas/<?php echo $ID_t; ?>"><?php echo $tema['titulo']; ?></a></li>
</ol>
<!-- fin breadcrumb -->

 <div class="col-sm-12">
  <!-- encabezado tabla ANUNCIOS-->
<table width="100%" border="0" cellspacing="2" cellpadding="2">

  <tr>
    <th colspan="5" scope="col" bgcolor="#CCCCCC" style="margin-bottom:5px; height:32px;" >

      <div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;">
        Tema : <?php echo $tema['titulo']; ?>

        <?php
        if (isset($_SESSION['app_id'])) {
          // si el usuario esta conectado
      if ($permisos_o_dueno) {
        // Si es el dueño del tema o admin- moderador PODRA editar el tema
        echo '<a class ="btn btn-sm" style="align:right;"href="index.php?view=temas&mode=edit&id='.$_GET['id'].'&id_foro='.$_GET['id_foro'].'">[EDITAR]</a>';
      }

    }?>

      </div>



    </th>
  </tr>
</table>
<br/>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <th width="30%" scope="col"><img src="<?php echo USER_PH_PERF_DIR . $_users[$tema['id_dueno']]['img_perfil']; ?>" alt="FOTO PERFIL" /></th>
    <th width="70%" rowspan="4"  scope="col">

      <?php echo BBcode($tema['contenido']); ?>



    </th>
  </tr>
  <tr>
    <th scope="row"><br/>Nombre: <?php echo $_users[$tema['id_dueno']]['user']; ?>
      <img src="<?php echo USER_PH_ICO_DIR . GetUserStatus($_users[$tema['id_dueno']]['ultima_conexion']);?>" />



    </th>





  </tr>
  <tr>
    <th   scope="row">Rango: <?php echo $_users[$tema['id_dueno']]['rango'] ?></th>
  </tr>
  <tr>
    <th   scope="row"></th>
  </tr>
  <tr>
    <th   scope="row">Mensajes: <?php echo $_users[$tema['id_dueno']]['mensajes'] ?></th>
    <td   rowspan="3" ><br/><hr style="color: #0056b2;"><?php echo BBcode($_users[$tema['id_dueno']]['firma']) ?><br/><br/></td>
  </tr>
  <tr>
    <th   scope="row">Edad: <?php echo $_users[$tema['id_dueno']]['edad'] ?></th>
  </tr>
  <tr>
    <th   scope="row">Registrado el: <?php echo $_users[$tema['id_dueno']]['fecha_reg'] ?></th>
  </tr>
</table>


</div>
<!--respuesta ****************************************************************************-->

<?php
if(false != $respuestas) {
  // SI HAY RESPUESTA
  foreach($respuestas as $resp){

  echo'


  <div class="col-sm-12">

  <br/><hr style="color: #0056b2;">
  <table width="100%" border="0" cellspacing="5" cellpadding="5">
   <tr>
     <th width="30%" scope="col">
     <img src="'. USER_PH_PERF_DIR . $_users[$resp['id_dueno']]['img_perfil'].'" alt="FOTO PERFIL" />
     </th>
     <th width="70%" rowspan="4"  scope="col">

     <div align="right">
      <a href="#">[EDITAR]</a>
     </div>

       '.BBcode($resp['contenido']).'</th>
   </tr>
   <tr>
     <th scope="row"><br/>Nombre: '. $_users[$resp['id_dueno']]['user'].'
       <img src="'. USER_PH_ICO_DIR . GetUserStatus($_users[$resp['id_dueno']]['ultima_conexion']).'" />
     </th>
   </tr>

   <tr>
     <th   scope="row">Rango: '. $_users[$resp['id_dueno']]['rango'].'</th>
   </tr>
   <tr>
     <th scope="row"></th>
   </tr>
   <tr>
     <th   scope="row">Mensajes: '. $_users[$resp['id_dueno']]['mensajes'].'</th>
     <td   rowspan="3" ><br/><hr style="color: #0056b2;">
  '.BBcode($_users[$resp['id_dueno']]['firma']).'
       <br/><br/></td>
   </tr>
   <tr>
     <th   scope="row">Edad: '. $_users[$resp['id_dueno']]['edad'].'</th>
   </tr>
   <tr>
     <th   scope="row">Registrado el: '. $_users[$resp['id_dueno']]['fecha_reg'].'</th>
   </tr>
  </table>



  </div>

  ';
  }
} // SI NO HAY RESPUESTAS         else {}






?>


<!-- fin respuesta -->




<!-- fin CONTENIDO -->
</div>
</section>




<!-- FOOTER -->
<?php include(HTML_DIR . 'overall/footer.php'); ?>
</body>
</html>
