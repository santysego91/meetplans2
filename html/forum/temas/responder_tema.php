<?php include(HTML_DIR . 'overall/header.php'); ?>
<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE. '- Responder tema' ?> </a></section>
 <!-- ENLACES -->
<?php include(HTML_DIR . 'overall/topnav.php'); ?>
 <section class="mbr-section mbr-after-navbar" id="content1-10">
     <div class="mbr-section__container container mbr-section__container--isolated">
 <!-- CONTENIDO -->

   <?php
   if(isset($_GET['error'])){// definido en activarController.php
        echo '
      <div class="mbr-section__container container mbr-section__container--isolated">
      <div class="alert alert-dismissible alert-danger">
      <strong>Error!</strong> Todos los campos deben ser completados.(add_temas.php)
      </div></br>';

   }
    ?>



  <!-- breadcrumb -->
  <?php
  $ID_f= UrlAmigable(intval($_foros[$id_foro]['id']),$_foros[$id_foro]['nombre']);
  ?>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-comments"></i><a href="?view=index">Inicio</a></li>
    <li class="breadcrumb-item"><i class="fa fa-comments"></i><a href="?view=forum">Foros</a></li>
    <li class="breadcrumb-item"><i class="fa fa-comments"></i><a href="foros/<?php echo $ID_f; ?>"><?php echo $_foros[$id_foro]['nombre']?></a></li>
    <li class="breadcrumb-item"><i class="fa fa-comments"></i><a href="?view=temas&mode=responder&id=<?php echo $_GET['id'] ?>&id_foro=<?php echo $id_foro ?>">Responder Tema</a></li>
  </ol>
  <!-- fin breadcrumb -->


<!-- fin encabezado tabla -->
<table width="100%" border="0" cellspacing="2" cellpadding="2">
   <tr>
     <th scope="col" bgcolor="#CCCCCC" style="margin-bottom:5px; height:32px;" >
       <div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;">
         Responder tema: <?php echo $tema['titulo']?></div></th>
   </tr>
 </table> <br /> <br />
  <!-- encabezado tabla -->

  <div class="col-sm-12">


    <table width="100%" border="0" cellspacing="5" cellpadding="5">
      <form class="form-horizontal" action="?view=temas&mode=responder&id_foro=<?php echo $id_foro; ?>&id=<?php echo $_GET['id']; // este es el id del tema?>" method="POST" enctype="application/x-www-form-urlencoded"><!--muy importante el enctype  -->
      <fieldset>

      <tr>
        <th width="30%"></th>
        <th colspan="2"></th>
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
<textarea class="form-control estilotextarea" style="height:350px;" name="content" placeholder="Contenido de tu respuesta.."></textarea>
<br />





      </td>
      </tr>
      <tr>
        <td width="" height="">&nbsp;</td>
        <td width="" align="right" valign="middle">
      <br/>
              <button type="reset" class="btn btn-default">RESETEAR</button>
              <button type="submit" class="btn btn-primary">RESPONDER</button>

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
