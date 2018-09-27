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



 <!-- breadcrumb -->
 <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="#">Home</a></li>
   <li class="breadcrumb-item"><a href="#">Library</a></li>
   <li class="breadcrumb-item active">Data</li>
 </ol>
 <!-- fin breadcrumb -->


<?php  for($c =1; $c <4; $c++) {  ?>

 <table width="100%" border="0" cellspacing="2" cellpadding="2">
   <tr>
     <th colspan="5" scope="col" bgcolor="#CCCCCC" style="margin-bottom:5px; height:32px;" ><div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;">TITULO CATEGORIA</div></th>
   </tr>
   <tr>
     <th colspan="5" scope="col"><div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;"></div></th>
   </tr>
<?php  for($x =1; $x <5; $x++) {  ?>

 <!-- pag -->

 <tr>
 <th width="9%" rowspan="2" scope="row"><div align="center"><img src="views/app/images/forums/icons/boardicons/off.gif" /></div></th>
 <td width="43%" rowspan="2"><div align="left"><a href="http://localhost/meetplans2/#"><strong>TITULO DE FORO</strong></a><br />
 Descripción corta del foro</div></td>
 <td><div align="center">40 </div></td>
 <td><div align="center">788 </div></td>
 <td width="32%" rowspan="2"><div align="center"><a href="#" title="Welcome">Welcome</a>       <br />
 by <a href="#">Gramziu</a> 24 Feb 2015, 21:50</div></td>
</tr>
<tr>
 <td width="8%"><p align="center">Temas</p>    </td>
 <td width="8%"><div align="center">Mensajes</div></td>
</tr>


<tr>
 <th colspan="5" scope="col" cellspacing="0" cellpadding="0"><div align="left"><hr style="color: #0056b2;" /></div></th>
</tr>
 <?php  }  ?>
<!-- pag -->



 </table>
 <?php  }  ?>



 <!-- pag
 <div class="row categorias_con_foros">
	<div class="col-sm-12">
				<div class="row titulo_categoria">TITULO CATEGORIA</div>

<?php  for($x =1; $x <5; $x++) {  ?>

<div class="row foros">



  <div class="col-md-1" style="height:50px; line-height: 37px;">
   <img src="views/app/images/forums/icons/boardicons/off.gif" />
  </div>


   <div class="col-md7 puntitos" style="padding-left: 0px;">
  <a href="#"> TITULO DE FORO</a><br />
  Descripción corta del foro
  </div>


  <div class="col-md-2 left_border" style="text-aling: center;font-weight:bold;">
  40 Temas <br />
  788 Mensajes
  </div>


  <div class="col-md-2 left_border puntitos" style="line-height: 37px;">
  <a href="#">Ultimo mensaje, Txt Largo</a>
  </div>

  </div>

	<?php  }  ?>




  </div>
    </div>
    </div>

-->


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
