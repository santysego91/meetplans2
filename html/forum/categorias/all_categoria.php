

 <!-- *****************************************************************-->

 <!-- DISEÑO ALL_CATEGORIAS-->

 <!-- *****************************************************************-->

<?php include(HTML_DIR . 'overall/header.php'); ?>
<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>
 <!-- ENLACES -->
<?php include(HTML_DIR . 'overall/topnav.php'); ?>





 <section class="mbr-section mbr-after-navbar" id="content1-10">
     <div class="mbr-section__container container mbr-section__container--isolated">
 <!-- CONTENIDO -->



<div class="row container">

<?php
if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permiso'] >= 2){//la funcion permiso esta definida en $_users.php  - PARA GESTIONAR HAY QUE SER ADMIN por eso mayor o igual a 2 para poder visualizar los botones
  echo'
  <!-- botones admin foro -->

 <div class="mbr-avbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons">
     <a class="mbr-buttons__btn btn btn-danger" href="?view=cuenta">GESTIONAR FOROS</a>
     <a class="mbr-buttons__btn btn btn-danger active" href="?view=categorias">GESTIONAR CATEGORÍAS</a>
     <a class="mbr-buttons__btn btn btn-danger" href="?view=categorias&mode=add">CREAR CATEGORIA</a>
</div>

  <!-- botones admin foro -->
  ';
}
?>


 <!-- breadcrumb -->
 <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="?view=categorias">Categorias</a></li>
 </ol>
 <!-- fin breadcrumb -->










  <!-- encabezado tabla -->

<div class="col-sm-12">


  <table width="100%" border="0" cellspacing="2" cellpadding="2">
     <tr>
       <th scope="col" bgcolor="#CCCCCC" style="margin-bottom:5px; height:32px;" ><div align="left" style="margin-left:15px; margin-top:15px; margin-bottom:15px;">GESTIÓN DE CATEGORÍAS</div></th>
     </tr>
   </table>

  <!-- fin encabezado tabla -->


   <?php
   // en adm_categorias.php tengo esto $sql = $db->query("SELECT * FROM categorias;");

   // crear la tabla
if($db->rows($sql) > 0){

  $HTML= '
  <div class="row">
    <div class="col-md-12">

  <table class="table">
    <thead>
      <tr>
        <th style="width: 10%">ID</th>
        <th style="width: 60%">Nombre de categoria</th>
        <th style="width: 30%">Acciones</th>
      </tr>
    </thead>
   <tbody>';


   while ($data = $db->recorrer($sql)){
     $HTML .= '<tr>
       <td>'.$data['id'].'</td>
       <td>'.$data['nombre'].'</td>
      <td>
        <div class="btn-group">
          <a class="btn btn-primary">Acciones</a>
          <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?view=categorias&mode=edit&id='.$data['id'].'">Editar</a></li>
            <li><a onClick="DeleteItem(\'¿Esta seguro de eliminar esta categoria?\', \'?view=categorias&mode=delete&id='.$data['id'].'\')">Eliminar</a></li>
          </ul>
      </div>
    </td>
    </tr>';

    }



    $HTML .='</tbody></table>';


   } else {
     //mensaje de que no hay resultados
     $HTML='<div class="alert alert-dismissible alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>UPS! No hay ninguna categoria (all_categorias.php)</strong></a>
</div>';
  }

echo $HTML;
   ?>










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
