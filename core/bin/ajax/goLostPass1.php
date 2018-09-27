<?php
$db = new Conexion();
$email = $db->real_escape_string($_POST['email']);

$sql = $db->query("SELECT id, user FROM users WHERE email='$email' LIMIT 1");

if($db->rows($sql) > 0){
$data=  $db->recorrer($sql); //seleccionamos el id del usuario
$id = $data[0];
$user = $data[1];
$keypass = md5(time());

$new_pass = strtoupper(substr(sha1(time()),0,8));// substr() con esto generamos un string donde le indicamos desde y hasta donde vamos a mostrar los valores para acortar la contraseña y la enviamos en mayuscula

LostPassTemplate($user,$link);
$link = APP_URL . '?view=lostpass&key=' . $keypass;

// BASE PHPMAILER

$mail = new PHPMailer\PHPMailer\PHPMailer(true);          // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->CharSet = "UTF-8";
    $mail->Encoding = "quoted-printable";


    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = PHPMAILER_HOST;                         // Specify main and backup SMTP servers
    $mail->SMTPAuth = PHPMAILER_SMTP_AUTH;                // Enable SMTP authentication
    $mail->Username = PHPMAILER_USER;                     // SMTP username
    $mail->Password = PHPMAILER_PASS;                     // SMTP password
    $mail->SMTPSecure = PHPMAILER_SMTP_SECURE;            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = PHPMAILER_PORT;                         // TCP port to connect to

    //Recipients
    $mail->setFrom(PHPMAILER_USER, PHPMAILER_TITULO_EMAIL);
    $mail->addAddress($email, $user);     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Restablecer contraseña';
    $mail->Body    = '<table width="80%" border="0" cellpadding="1">
        <tr>
          <th align="center" valign="middle" scope="col" bgcolor="#0099CC">Hola <b>' . $user .' </b>! Has solicitado un cambio de contraseña</th>
             </tr>
             <tr>
               <th align="center" valign="middle" scope="row" bgcolor="#CCCCCC"><p>Para restablecerla has clic en:</p> <p><b><a href="'. $link . '">RESTABLECER CONTRASEÑA</a></b></p>
             <p>Si no lo has solicitado, has caso omiso a este mensaje.</p>
             </br></th>
           </tr>
           <tr>
             <th align="center" valign="middle" scope="row"><p>' . APP_COPY . ' (goLostPass.php)</p></th>
         </tr>
       </table>' ;



    $mail->AltBody = 'Hola ' . $user .'!, para restablecer tu contraseña has clic aqui: ' . $link . ' ; si no lo has solicitao, has caso omiso a este mensaje.';



    if(!$mail->send()){
      $HTML = '<div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">X</button>
      <h4>Error!</h4> <p>(goLostPass.php)</p>   ' . $email->ErrorInfo .'
      </div>';
    }else{

    }

//FIN BASE PHPMAILER



$db->query(" UPDATE users SET keypass='$keypass', new_pass='$new_pass' WHERE id='$id'; ");
$HTML = 1;

}else{
  $HTML = '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">X</button>
  <h4>Error!</h4> <p>El email solicitado no existe en el sistema. (goLostPass.php)</p>
  </div>';
  }
$db->liberar($sql);
$db->close();


echo $HTML;
 ?>
