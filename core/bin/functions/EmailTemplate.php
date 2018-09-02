<?php
function EmailTemplate($user,$link){

$HTML = '


<html>
<body style="background: #FFFFFF;fot-family: Verdana; font-size: 14px;color:#1c1b1b;">
<div style="">
 <h2>Hola '.$user.' </h2>
 <p style="font-size: 17px;">GRACIAS POR REGISTRARTE EN '. APP_TITLE.'.</p>
  <p style="font-size: 12px;">Solo queda activar la cuenta y disfrutar d etodos los beneficios de un usuario registrado. '. APP_TILE.'.</p>
  <p style="font-size: 12px;"> Activa <a style="fot-weight: bold; font-size: 20px;color:#2BA6CB;" href="'.$link.'" target="_blank">AQUI</a></p>
  <p style="font-size: 9px; " >&copy; '. date('Y',time()) .' '. APP_TITLE .' Todos los derechos reservados.</p>


</div>
</body>
</html>

';

return $HTML;
}

?>
