

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
$ID_TM = $_GET['id'];
$boton_Nuevo_Tema='
<!-- botones crear foro-->
  <div class="mbr-avbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons">
     <a class="mbr-buttons__btn btn btn-danger" href="?view=temas&mode=responder&id='.$ID_TM.'">RESPONDER</a>
  </div>';
if (isset($_SESSION['app_id'])) {
  // si el user esta logeado

   echo $boton_Nuevo_Tema;
  }
?>


<!-- breadcrumb    -->

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="?view=forum"><i class="fa fa-home"></i> Foros</a></li>

</ol>
<!-- fin breadcrumb -->

 <div class="col-sm-12">
  <!-- encabezado tabla ANUNCIOS-->
<table width="100%" border="0" cellspacing="2" cellpadding="2">

  <tr>
    <th colspan="5" scope="col" bgcolor="#CCCCCC" style="margin-bottom:5px; height:32px;" >
      <div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;">
        Tema : <?php echo $tema['titulo']; ?>
      </div>
    </th>
  </tr>
</table>
<br/>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <th width="30%" scope="col"><img src="<?php echo USER_PH_PERF_DIR . $_users[$tema['id_dueno']]['img_perfil']; ?>" alt="FOTO PERFIL" /></th>
    <th width="70%" rowspan="4"  scope="col">

      <?php echo BBcode($tema['contenido']); ?></th>
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
    <th   scope="row">Temas: </th>
  </tr>
  <tr>
    <th   scope="row">Mensajes:</th>
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
for($x =0; $x <= 5; $x++ ){

echo'


<div class="col-sm-12">

<br/><hr style="color: #0056b2;">
<table width="100%" border="0" cellspacing="5" cellpadding="5">
 <tr>
   <th width="30%" scope="col">
   <img src="'. USER_PH_PERF_DIR . $_users[$tema['id_dueno']]['img_perfil'].'" alt="FOTO PERFIL" />
   </th>
   <th width="70%" rowspan="4"  scope="col">

     EJEMPLO CONTENIDO</th>
 </tr>
 <tr>
   <th scope="row"><br/>Nombre: '. $_users[$tema['id_dueno']]['user'].'
     <img src="'. USER_PH_ICO_DIR . GetUserStatus($_users[$tema['id_dueno']]['ultima_conexion']).'" />
   </th>
 </tr>

 <tr>
   <th   scope="row">Rango: '. $_users[$tema['id_dueno']]['rango'].'</th>
 </tr>
 <tr>
   <th scope="row">Temas: </th>
 </tr>
 <tr>
   <th   scope="row">Mensajes:</th>
   <td   rowspan="3" ><br/><hr style="color: #0056b2;">
EJEMPLO FIRMA
     <br/><br/></td>
 </tr>
 <tr>
   <th   scope="row">Edad: '. $_users[$tema['id_dueno']]['edad'].'</th>
 </tr>
 <tr>
   <th   scope="row">Registrado el: '. $_users[$tema['id_dueno']]['fecha_reg'].'</th>
 </tr>
</table>



</div>



';
}
?>


<!-- fin respuesta -->




<!-- fin CONTENIDO -->
</div>
</section>




<!-- FOOTER -->
<?php include(HTML_DIR . 'overall/footer.php'); ?>
</body>
</html>
