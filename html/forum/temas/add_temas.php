<?php include(HTML_DIR . 'overall/header.php'); ?>
<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?> - Crear tema</a></section>
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
       <div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;">Crear tema en: <?php echo $_foros[$id_foro]['nombre']?></div></th>
   </tr>
 </table> <br /> <br />
  <!-- encabezado tabla -->

  <div class="col-sm-12">
<form id="form_foro" action="?view=temas&mode=add" method="POST" enctype="application/x-www-form-urlencoded"><!--muy importante el enctype  -->

    <table width="100%" border="0" cellspacing="5" cellpadding="5">
      <tr>

        <th width="30%">
          <div style="float: right;">
            <label for="inputEmail" class="col-lg-2 control-label">Título:</label>
          </div>
        </th>

        <th colspan="2">

          <input type="text" class="form-control" maxlength="250" name="titulo" placeholder="Nombre para el tema"/><!--SE LE LLAMO name="nombre" PORQUE EN class.Categorias.php se le llamo asi empty($_POST['nombre'])   -->
        </th>

      </tr>


      <tr>
        <th rowspan="2" align="center" valign="top" scope="row"><br />
        <div style="float: right;"><label for="inputEmail" class="col-lg-2 control-label">Contenido:</label></div>
<br/><br/><br/><br/><br/><br/>

<div><center>BBCode</center></div><br/>


<div style="text-align: center;" id="tooltip_b">[b]Negrita[/b]</div>
<div style="text-align: center;" id="tooltip_i">[i]Italic[/i]</div>
<div style="text-align: center;" id="tooltip_u">[u]Subrayado[/u]</div>
<div style="text-align: center;" id="tooltip_s">[s]Tachado[/s]</div>
<div style="text-align: center;" id="tooltip_center">[center]Center[/center]</div>
    	  <div style="text-align: center;" id="tooltip_email">[EMAIL=you@email.com]email[/EMAIL]</div>
    	  <div style="text-align: center;" id="tooltip_url">[URL=http://site.com]website[/URL]</div>
    	  <div style="text-align: center;" id="tooltip_img">[IMG]URL imagen[IMG]</div>
    	  <div style="text-align: center;" id="tooltip_list">[LIST=a][*]point 1[/*][*]point 2[/*][/LIST]</div>
    	  <div style="text-align: center;" id="tooltip_quote">[QUOTE=Nickname]Quote[/QUOTE]</div>
    	  <div style="text-align: center;" id="tooltip_toggle">[TOGGLE=Read more]Full Text[/TOGGLE]</div>


        </th>
        <td colspan="2" align="center" >
<br />
            <textarea class="form-control" name="content" placeholder="Contenido de tu tema.." style=" height:350px;">
            </textarea>
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
    </table>

</form>


 <!-- fin CONTENIDO -->
 </div>
 </section>




 <!-- FOOTER -->
 <?php include(HTML_DIR . 'overall/footer.php'); ?>
 </body>
 </html>
