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
     echo '
   <div class="alert alert-dismissible alert-success">
   <strong>Completado!</strong> El foro fue creado.
   </div></br>';
   }

   if(isset($_GET['error'])){// definido en activarController.php
      if($_GET['error'] == 1){
        echo '
      <div class="mbr-section__container container mbr-section__container--isolated">
      <div class="alert alert-dismissible alert-danger">
      <strong>Error!</strong> Todos los campos deben ser completados.
      </div></br>';
    } else {
      echo '
    <div class="mbr-section__container container mbr-section__container--isolated">
    <div class="alert alert-dismissible alert-danger">
    <strong>Error!</strong> Debe existir una categoria para asociar al foro.</div></br>
    ';
    }

   }

    ?>


 <?php
 if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permiso'] >= 2){//la funcion permiso esta definida en $_users.php  - PARA GESTIONAR HAY QUE SER ADMIN por eso mayor o igual a 2 para poder visualizar los botones
   echo'
   <!-- botones admin foro -->

  <div class="mbr-avbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons">
  <a class="mbr-buttons__btn btn btn-danger" href="?view=configforos">GESTIONAR FOROS</a>
  <a class="mbr-buttons__btn btn btn-danger active" href="?view=configforos&mode=add">CREAR FORO</a>

  <a class="mbr-buttons__btn btn btn-danger" href="?view=categorias">GESTIONAR CATEGORÍAS</a>
  <a class="mbr-buttons__btn btn btn-danger" href="?view=categorias&mode=add">CREAR CATEGORIAS</a>
 </div>

   <!-- botones admin foro -->
   ';


 }
 ?>


















  <!-- breadcrumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-comments"></i><a href="?view=index">Inicio</a></li>
    <li class="breadcrumb-item"><i class="fa fa-comments"></i><a href="?view=adm_foros">Foros</a></li>
  </ol>
  <!-- fin breadcrumb -->



  <!-- encabezado tabla -->

  <div class="col-sm-12">


    <table width="100%" border="0" cellspacing="2" cellpadding="2">
       <tr>
         <th scope="col" bgcolor="#CCCCCC" style="margin-bottom:5px; height:32px;" >
           <div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;">AÑADIR FORO</div></th>
       </tr>
     </table><br/><br/>
  <!-- fin encabezado tabla -->




<div class="row">
  <div class="col-md_12">
    <form class="form-horizontal" id="form_foro" action="?view=configforos&mode=add" method="POST" enctype="application/x-www-form-urlencoded"><!--muy importante el enctype  -->
      <fieldset>
        <!-- Nombre del foro -->
        <div class="form-group">
          <label for="inputEmail" class="col-lg-2 control-label">Foro</label>
          <div class="col-lg-10">
          <input type="text" class="form-control" maxlength="200" name="nombre" placeholder="Nombre del foro"><!--SE LE LLAMO name="nombre" PORQUE EN class.Categorias.php se le llamo asi empty($_POST['nombre'])   -->
        </div>
      </div>

      <!-- Descripcion del foro -->
      <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">Descripción</label>
        <div class="col-lg-10">
        <input type="text" class="form-control" maxlength="250" name="descripcion" placeholder="Descripción corta para el foro (Acepta HTML)"><!--SE LE LLAMO name="nombre" PORQUE EN class.Categorias.php se le llamo asi empty($_POST['nombre'])   -->
      </div>
      </div>

      <!-- Indicar Categoria -->
      <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">Categoría</label>
        <div class="col-lg-10">





        <select  name="categoria" class="form-control">
            <?php
            //verificar que las categorias no esten vacias antes de recorrerlas
            if(false != $_categorias){
              foreach($_categorias as $id_categoria => $array_categoria){

              echo '<option value="'.$id_categoria.'">'.$_categorias[$id_categoria]['nombre'].'</option>';
                }


            } else {
              echo '<option value="0">No existe categoría</option>';
            }
          ?>
        </select>
      </div>
      </div>

      <!-- Estado del foro -->
      <div class="form-group">
        <label class="col-lg-2 control-label">Estado del foro:</label>
        <div class="col-lg-10">

                  <div class="radio">
                    <label>
                      <input type="radio" name="estado"  value="1" checked=""> Abierto
                    </label>
                    </div>

                    <div class="radio">
                      <label>
                        <input type="radio" name="estado" value="0">Cerrado
                      </label>
                      </div>
                  </div>
              </div>

      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="reset" class="btn btn-default">RESETEAR</button>
          <button type="submit" class="btn btn-primary">AÑADIR</button>
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
