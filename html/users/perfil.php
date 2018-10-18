<!-- *****************************************************************-->

<!-- DISEÑO PERFIL-->

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
$boton_Nuevo_Tema='
<!-- botones crear foro-->
  <div class="mbr-avbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons">
     <a class="mbr-buttons__btn btn btn-danger" href="#">EDITAR PERFIL</a>
  </div>';
if (isset($_SESSION['app_id'])) {
  // si el user esta logeado

   echo $boton_Nuevo_Tema;
  }
?>


<!-- breadcrumb    -->

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="?view=index"><i class="fa fa-home"></i> Inicio</a></li>
  <li class="breadcrumb-item"><a href="#"><i class="fa fa-comments"></i> Perfil</a></li>

</ol>
<!-- fin breadcrumb -->

 <div class="col-sm-12">
  <!-- encabezado tabla ANUNCIOS-->
<table width="100%" border="0" cellspacing="2" cellpadding="2">

  <tr>
    <th colspan="5" scope="col" bgcolor="#CCCCCC" style="margin-bottom:5px; height:32px;" >
      <div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;">
        Perfil de : <?php echo $_users[$id_usuario]['user'] ?>
      </div>
    </th>
  </tr>
</table>
<br/>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <th width="30%" scope="col"><img src="<?php echo USER_PH_PERF_DIR . $_users[$id_usuario]['img_perfil']; ?>" width="127" height="125" alt="FOTO PERFIL" /></th>
    <th width="70%" rowspan="4"  scope="col"><?php echo $_users[$id_usuario]['biografia']; ?></th>
  </tr>
  <tr>
    <th scope="row"><br/>Nombre: <?php echo $_users[$id_usuario]['user']; ?>
      <img src="<?php echo USER_PH_ICO_DIR . GetUserStatus($_users[$id_usuario]['ultima_conexion']);?>" />



    </th>





  </tr>
  <tr>
    <th   scope="row">Rango: <?php echo $_users[$id_usuario]['rango'] ?></th>
  </tr>
  <tr>
    <th   scope="row">Temas: <?php echo $db->recorrer($sql)[0]; //recorre el primer elemento que declaramos en $sql perfilController?>  </th>
  </tr>
  <tr>
    <th   scope="row">Mensajes: <?php echo $_users[$id_usuario]['mensajes'] ?></th>
    <td   rowspan="3" ><br/><hr style="color: #0056b2;"><?php echo BBcode($_users[$id_usuario]['firma']) ?><br/><br/></td>
  </tr>
  <tr>
    <th   scope="row">Edad: <?php echo $_users[$id_usuario]['edad'] ?></th>
  </tr>
  <tr>
    <th   scope="row">Registrado el: <?php echo $_users[$id_usuario]['fecha_reg'] ?></th>
  </tr>
</table>



</div>



<!-- fin CONTENIDO -->
</div>
</section>




<!-- FOOTER -->
<?php include(HTML_DIR . 'overall/footer.php'); ?>
</body>
</html>
