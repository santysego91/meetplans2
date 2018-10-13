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
 <strong>Completado!</strong> La categoria <b><u>' . $_categorias[$_GET['id']]['nombre'] . ' </b></u> fue editada. (edit_categorias.php)
 </div>';
 }

 if(isset($_GET['error'])){// definido en activarController.php
   echo '
 <div class="mbr-section__container container mbr-section__container--isolated">
 <div class="alert alert-dismissible alert-danger">
 <strong>Error!</strong> La categoria no fue editada..
 </div>
   ';
 }
  ?>





 <?php
 if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permiso'] >= 2){//la funcion permiso esta definida en $_users.php  - PARA GESTIONAR HAY QUE SER ADMIN por eso mayor o igual a 2 para poder visualizar los botones
   echo'
   <!-- botones admin foro -->

  <div class="mbr-avbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons">
      <a class="mbr-buttons__btn btn btn-danger" href="?view=configforos">GESTIONAR FOROS</a>
      <a class="mbr-buttons__btn btn btn-danger" href="?view=categorias">GESTIONAR CATEGORÍAS</a>
      <a class="mbr-buttons__btn btn btn-danger active" href="?view=categorias&mode=add">CREAR CATEGORIA</a>
 </div>

   <!-- botones admin foro -->
   ';
 }
 ?>


  <!-- breadcrumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-comments"></i><a href="?view=index">Inicio</a></li>
    <li class="breadcrumb-item"><i class="fa fa-comments"></i><a href="?view=forum">Foros</a></li>
    <li class="breadcrumb-item"><a href="?view=categorias">Categorias</a></li>
  </ol>
  <!-- fin breadcrumb -->



  <!-- encabezado tabla -->

  <div class="col-sm-12">


    <table width="100%" border="0" cellspacing="2" cellpadding="2">
       <tr>
         <th scope="col" bgcolor="#CCCCCC" style="margin-bottom:5px; height:32px;" >
           <div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;">EDITAR CATEGORÍAS</div></th>
       </tr>
     </table><br />
  <!-- fin encabezado tabla -->




<div class="row">
  <div class="col-md_12">
    <form class="form-horizontal" action="?view=categorias&mode=edit&id=<?php echo $_GET['id']; ?>" method="POST" enctype="application/x-www-form-urlencoded"><!--muy importante el enctype  -->
      <fieldset>
        <div class="form-group">
          <label for="inputEmail" class="col-lg-2 control-label">Categoria</label>
          <div class="col-lg-10">
          <input type="text" class="form-control" name="nombre" placeholder="Nombre para la categoria"  value="<?php echo $_categorias[$_GET['id']]['nombre'];?>"><!--SE LE LLAMO name="nombre" PORQUE EN class.Categorias.php se le llamo asi empty($_POST['nombre'])   -->
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="reset" class="btn btn-default">RESETEAR</button>
          <button type="submit" class="btn btn-primary">EDITAR</button>
        </div>
      </div>
    </fieldset>
</form>
</div>
</div>










 <!-- fin CONTENIDO -->
 </div>
 </section>




 <!-- FOOTER -->
 <?php include(HTML_DIR . 'overall/footer.php'); ?>
 </body>
 </html>
