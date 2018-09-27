<?php include(HTML_DIR . 'overall/header.php'); ?>
<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>
 <!-- ENLACES -->
<?php include(HTML_DIR . 'overall/topnav.php'); ?>




 <!-- CONTENIDO -->
<section class="mbr-section mbr-after-navbar" id="content1-10">
    <div class="mbr-section__container container mbr-section__container--isolated">

<div class="alert alert-dismissible alert-success">
  <strong>Contraseña cambiada!</strong> se ha generado una nueva contraseña: <strong>
    <?php echo $password;  ?></strong> .
    <a data-toggle="modal" data-target="#Login">Iniciar sesión</a>
  </div>


    </div>
</section>



 <!-- FOOTER -->
<?php include(HTML_DIR . 'overall/footer.php'); ?>
</body>
</html>
