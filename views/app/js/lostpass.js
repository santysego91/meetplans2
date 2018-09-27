function goLostPass(){
 var connect, form, response, result, email;
email = __('box_email_lostpass').value;
if(email != ''){
  form = 'email=' + email;
  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
 connect.onreadystatechange = function(){//Az
 if(connect.readyState == 4 && connect.status == 200){ //Ax
   if(connect.responseText == 1){
   result += '<div class="alert alert-dismissible alert-success">';
   result += '<h4 class="alert-heading">Correo enviado</h4>';
   result += '<p class="mb-0">Revisa tu correo y has clic en el enlace (LOSTPASS.js)</p>';
   result += '</div>';
   __('_AJAX_LOSTPASS_').innerHTML = result;
   location.reload();
 }else{
   __('_AJAX_LOSTPASS_').innerHTML = connect.responseText; //.innerHTML = connect.responseText;  muestra el error de php
 }
 }else if(connect.readyState != 4){
   result += '<div class="alert alert-dismissible alert-warning">';
   result += '<button type="button" class="close" data-dismiss="alert">X</button>';
   result += '<h4 class="alert-heading">Procesando...</h4>';
   result += '<p class="mb-0">Estamos procesando tu solicitud... (LOSTPASS.js)</p>';
   result += '</div>';
   __('_AJAX_LOSTPASS_').innerHTML = result;
 }
 }//Ax fin
  connect.open('POST','ajax.php?mode=lostpass',true);
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  connect.send(form);
}else {
  result += '<div class="alert alert-dismissible alert-danger">';
  result += '<button type="button" class="close" data-dismiss="alert">X</button>';
  result += '<h4 class="alert-heading">ERROR</h4>';
  result += '<p class="mb-0">Debes completar el campo de email (LOSTPASS.js)</p>';
  result += '</div>';
  __('_AJAX_LOSTPASS_').innerHTML = result;
}




}//Az fin


/* OBTENER FUNCION DEL BOTON ENTER Y EVENTO*/
 /* tecla 13 es enter o intro*/
function runScriptLostPass(e) {
  if(e.keyCode == 13){
    goLostPass();
  }
}
