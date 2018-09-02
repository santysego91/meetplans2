<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--sticky mbr-navbar--auto-collapse" id="ext_menu-0">
    <div class="mbr-navbar__section mbr-section">
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container">
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                    <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
                        <span class="mbr-brand__logo"><a href="#"><img class="mbr-navbar__brand-img mbr-brand__img" src="views/images/logo.png" alt="Mobirise"></a></span>
                    </span>
                </div>
                <div class="mbr-navbar__hamburger mbr-hamburger text-white"><span class="mbr-hamburger__line"></span></div>
                <div class="mbr-navbar__column mbr-navbar__menu">
                    <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
                        <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active"><li class="mbr-navbar__item">
                          <a class="mbr-buttons__link btn text-white" href="#">INICIO</a></li><li class="mbr-navbar__item">
<!-- estos botones estaran si no existe login-->
<?php
if(!isset($_SESSION['app_id'])){//si la sesion no esta definda
  echo '<a class="mbr-buttons__link btn text-white" data-toggle="modal" data-target="#Login">INICIAR SESIÓN</a></li><li class="mbr-navbar__item">
  <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item"><a class="mbr-buttons__btn btn btn-danger" data-toggle="modal" data-target="#Registro">REGISTRO</a></li></ul></div>
';
}else {//boton de acceso a perfil si el usuario esta logeado
  echo '<a class="mbr-buttons__link btn text-white" href="?view=perfil&id='.$_SESSION['app_id'].'">'. strtoupper($users[$_SESSION['app_id']]['user']) .'</a></li><li class="mbr-navbar__item">
        <a class="mbr-buttons__link btn text-white" href="?view=cuenta">Cuenta</a></li><li class="mbr-navbar__item">
                <a class="mbr-buttons__link btn text-white" href="#">DESCONECTARSE</a></li><li class="mbr-navbar__item">
  ';

}
?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- LOGIN - REGISTRO - RECUPERAR PASS-->
<?php
// detecta si hay un usuario no esta logeado (si no=!isset si=isset)
// si NO esta logeado mostramos LOGIN - REISTRO - RECUPERAR PASS
if(!isset($_SESSION['app_id'])){
  include(HTML_DIR . 'public/login.html');
  include(HTML_DIR . 'public/lostpass.html');
  include(HTML_DIR . 'public/reg.html');
}
 ?>
