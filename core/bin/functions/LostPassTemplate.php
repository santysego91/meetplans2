<?php
function LostPassTemplate($user,$link){

$HTML = '
<html>
<body style="background: #FFFFFF;fot-family: Verdana; font-size: 14px;color:#1c1b1b;">
<div style="">
 <h2>Hola '.$user.'</h2>
 <p style="font-size: 17px;">Solicitud de cambio de contraseña.</p>
  <p style="font-size: 12px;">El día '. date('d/m/Y' , time()).' se ha generado una solicitud de recuperación de contraseña. </br >
   Si no has solicitado esto, has caso omiso a este mensaje, en cambio si deseas modificarla, debes hacer click en el enlace. </p>
  <p> Para modificar tu contraseña has <a style="font-weight:bold;color: #2ba6cb"  href="'.$link.'" target="_blank">CLIC AQUÍ</a></p>
  <p style="font-size: 9px; " >&copy; '. date('Y',time()) .' '. APP_TITLE .' Todos los derechos reservados. (LostPassTemplate.php)</p>
</div>
</body>
</html>
';
return $HTML;
}
?>
