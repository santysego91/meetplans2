<?php include(HTML_DIR . 'overall/header.php'); ?>
<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE. '- Crear tema' ?> </a></section>
 <!-- ENLACES -->
<?php include(HTML_DIR . 'overall/topnav.php'); ?>





 <section class="mbr-section mbr-after-navbar" id="content1-10">
     <div class="mbr-section__container container mbr-section__container--isolated">
 <!-- CONTENIDO -->





   <?php


   if(isset($_GET['error'])){// definido en activarController.php
      if($_GET['error'] == 1){
        echo '
      <div class="mbr-section__container container mbr-section__container--isolated">
      <div class="alert alert-dismissible alert-danger">
      <strong>Error!</strong> Todos los campos deben ser completados.(add_temas.php)
      </div></br>';
    } else if($_GET['error'] == 2){
      echo '
    <div class="mbr-section__container container mbr-section__container--isolated">
    <div class="alert alert-dismissible alert-danger">
    <strong>Error!</strong> El titulo del tema debe tener al menos '. FOROS_TITULO_LONG_MIN .' caracteres.(add_temas.php)
    </div></br>
    ';
    }else {
      echo '
    <div class="mbr-section__container container mbr-section__container--isolated">
    <div class="alert alert-dismissible alert-danger">
    <strong>Error!</strong> El contenido del tema debe tener al menos '. FOROS_CONT_LONG_MIN .' caracteres.(add_temas.php)
    </div></br>
    ';
    }

   }

    ?>



  <!-- breadcrumb -->
  <?php
  $ID_f= UrlAmigable(intval($_foros[$id_foro]['id']),$_foros[$id_foro]['nombre']);
  ?>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-comments"></i><a href="?view=index">Inicio</a></li>
    <li class="breadcrumb-item"><i class="fa fa-comments"></i><a href="?view=forum">Foros</a></li>
    <li class="breadcrumb-item"><i class="fa fa-comments"></i><a href="foros/<?php echo $ID_f; ?>"><?php echo $_foros[$id_foro]['nombre']?>o</a></li>
    <li class="breadcrumb-item"><i class="fa fa-comments"></i><a href="?view=temas&mode=add&id_foro=<?php echo $id_foro ?>">Crear Tema</a></li>
  </ol>
  <!-- fin breadcrumb -->


<!-- fin encabezado tabla -->
<table width="100%" border="0" cellspacing="2" cellpadding="2">
   <tr>
     <th scope="col" bgcolor="#CCCCCC" style="margin-bottom:5px; height:32px;" >
       <div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;">
         Crear tema en: <?php echo $_foros[$id_foro]['nombre']?></div></th>
   </tr>
 </table> <br /> <br />
  <!-- encabezado tabla -->

  <div class="col-sm-12">


    <table width="100%" border="0" cellspacing="5" cellpadding="5">
      <form class="form-horizontal" action="?view=temas&mode=add&id_foro=<?php echo $id_foro; ?>" method="POST" enctype="application/x-www-form-urlencoded"><!--muy importante el enctype  -->
      <fieldset>

      <tr>

        <th width="30%">
          <div style="float: right;">
            <label class="col-lg-2 control-label">Título:</label>
          </div>
        </th>

        <th colspan="2">

          <input type="text" class="form-control" maxlength="250" name="titulo" placeholder="Nombre para el tema"/><!--SE LE LLAMO name="nombre" PORQUE EN class.temas.php se le llamo asi empty($_POST['nombre'])   -->
        </th>

      </tr>


      <tr>
        <th rowspan="2" align="center" valign="top" scope="row"><br />
        <div style="float: right;"><label class="col-lg-2 control-label">Contenido:</label></div>
<br/><br/><br/><br/><br/><br/>

<div><center>BBCode</center>

<ul>
<li type="circle">- [b]Negrita[/b]</li>
<li type="square">- [u]Subrayar[/u]</li>
<li type="disc">- [i]Cursiva[/i]</li>
<li type="disc">- [s]Tachado[/s]</li>
<li type="disc">- [size=18]Tamaño 18[/size]</li>
<li type="disc">- [color="coral"]Coral[/color]</li>
<li type="disc">- [font="Wingdings"]Wingdings[/font]</li>
<li type="disc">- [img]imagen.jpg[/img]</li>
<li type="disc">- [url]http://google.com[/url]</li>
<li type="disc">- [quote="James"]Texto que quiero citar.[/quote]</li>
<li type="disc">- [h1]Cursiva[/h1]</li>
<li type="disc">- [h2]Cursiva[/h2]</li>
<li type="disc">- [h3]Cursiva[/h3]</li>
<li type="disc">- [h4]Cursiva[/h4]</li>
<li type="disc">- [h5]Cursiva[/h5]</li>
<li type="disc">- [h6]Cursiva[/h6]</li>

</ul>




</div><br/>




        </th>
        <td colspan="2" align="center" >
<br />
<textarea class="form-control estilotextarea" style="height:350px;" name="content" placeholder="Contenido de tu tema.."></textarea>
<br />

<?php
if ($_users[$_SESSION['app_id']]['permiso'] > 0) {
  // si el usuario tiene el permiso 1 o 2
  echo '
  <div style="float: right;">
    <label class="control-label">
      Crear tema como anuncio:
      <input type="checkbox" value="2" name="anuncio"></input>
    </label></div>
  ';
}
?>




      </td>
      </tr>
      <tr>
        <td width="" height="">&nbsp;</td>
        <td width="" align="right" valign="middle">
      <br/>
              <button type="reset" class="btn btn-default">RESETEAR</button>
              <button type="submit" class="btn btn-primary">AÑADIR</button>

        </td>
      </tr>


    </fieldset>
</form>
    </table>




 <!-- fin CONTENIDO -->
 </div>
 </section>




 <!-- FOOTER -->
 <?php include(HTML_DIR . 'overall/footer.php'); ?>
 </body>
 </html>
