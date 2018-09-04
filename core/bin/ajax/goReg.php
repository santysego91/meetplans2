<?php

$db = new Conexion(); //Conexion() definida en class.Conexion.php

$pass = Encrypt($_POST['pass']);
$user = $db->real_escape_string($_POST['user']);
$email = $db->real_escape_string($_POST['email']);


//Verificar si existe un usuario
$sql = $db->query("SELECT user FROM users WHERE user='$user' OR email='$email' LIMIT 1;");//con limit 1 deja de buscar en l db si encuentra un resultado.

if($db->rows($sql) ==0){
  // no devuelve nada (no existe usuario ni el email)

// BASE CONFIG PHPMAILER
$keyreg = md5(time()); //sera el tiempo encriptado la llave de registro
$link = APP_URL . '?view=activar&key=' . $keyreg;



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
    $mail->Subject = PHPMAILER_SUBJECT;
    $mail->Body    = '<table width="80%" border="0" cellpadding="1">
        <tr>
          <th align="center" valign="middle" scope="col" bgcolor="#0099CC">Bienvenido a la comunidad <b>' . $user .' </b></th>
             </tr>
             <tr>
               <th align="center" valign="middle" scope="row" bgcolor="#CCCCCC"><p>Nos ayudará  asegurar su cuenta en ' . APP_TITLE .' verificando su dirección de correo electrónico.</p> <p><b><a href="'. $link . '">ACTIVAR MI CUENTA</a></b></p>
             <p>Esto le permite acceder a todas las funciones de un usuario registrado.</p>
             </br></th>
           </tr>
           <tr>
             <th align="center" valign="middle" scope="row"><p>' . APP_COPY . ' (goReg.php)</p></th>
         </tr>
       </table>' ;



    $mail->AltBody = 'Hola ' . $user .'!, para activar tu cuenta accede al enlace: ' . $link;

    $mail->send();


    // si no hay error instertamos usuario
      $db->query("INSERT INTO users (user, pass, email, keyreg) VALUES ('$user','$pass','$email','$keyreg');");
      $sql_2= $db->query("SELECT MAX(id) AS id FROM users;");
      $_SESSION['app_id'] = $db-> recorrer($sql_2)[0];
      $db-> liberar($sql_2);
      $HTML = 1; // para que en reg.js acceda a connect.responseText == 1   y nos redireccione

echo 'Message has been sent';


} catch (Exception $e) {
  echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  // si no se envio correctamente
  $HTML = '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">X</button>
  <strong>Oh!</strong>'. $mail->ErrorInfo .'. (goReg.php)
  </div>';
}


// FIN BASE CONFIG PHPMAILER


} else{
  // existe algun usuario igual
  //recorrer() definida en class.Conexion.php. Con el [0] accede al primer elemento 'user'
  $usuario = $db->recorrer($sql)[0];
  if(strtolower($user) == strtolower($usuario)){

    //Usuario coincide. el strtolower es para pasar todos los caracteres a inusculas y poder analizarlos igual
    $HTML = '<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <strong>Oh!</strong>Nombre de usuario registrado. (goReg.php)</div>';
  }else{
    // email coincide
    $HTML = '<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <strong>Oh!</strong> El email ya esta registrado. (goReg.php)
  </div>';
  }
}

$db-> liberar($sql); //liberar() definida en class.Conexion.php
$db-> close();
echo $HTML;

?>
