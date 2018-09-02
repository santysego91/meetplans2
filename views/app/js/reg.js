/* video 6 */
/* FUNCION REGISTRO */


function goReg(){// INICIO FUNCION goREG

 var connect, form, response, result, user, pass, email, tyc, pass_dos;

// ver que __() es la id que le pasamos y que definimos en generales.js
user = __('box_user_reg').value;
pass = __('box_pass_reg').value;
email = __('box_email_reg').value;
pass_dos = __('box_pass_reg_dos').value;
tyc = __('chk_tyc_reg').checked ? true : false;


if (tyc == true) {

  /* verificar si todo no esta vacio*/
  if(user != '' && pass != '' && pass_dos != '' && email != '' ){

  /* verificar si las pass son iguales*/
    if(pass == pass_dos){


// TODO_OK ::::::::::::::::::::::::::::::::::::::::::

form = 'user=' + user + '&pass=' + pass + '&email=' + email;
/* identifica el explorador si es viejo o nuevo para que funcione en cualquiera*/
    /* si existe                                         :   si no existe*/
 connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    /* accion que se acciona cada vez que detecte un cambio en ajax*/

 connect.onreadystatechange = function(){//Az
   /* vereficar el estado de la conección 4 estados.
    1)se activa 2)se estan enviando datos
    3)php tiene los datos 4) php devuelve los datos a javascrypt (en estado 4 ya tenemos repuesta para el navegador)*/
     /* status 200 se encuentra archivo -  404 no se encuentra*/
if(connect.readyState == 4 && connect.status == 200){ //Ax


  if(connect.responseText == 1){
    /* conexion exitosa*/
  result += '<div class="alert alert-dismissible alert-success">';
  result += '<button type="button" class="close" data-dismiss="alert">X</button>';
  result += '<h4 class="alert-heading">¡Atención!</h4>';
  result += '<p class="mb-0">Registro completado(reg.js)</p>';
  result += '</div>';
  __('_AJAX_REGISTRO_').innerHTML = result;
  location.reload();
}else{
  result += '<div class="alert alert-dismissible alert-warning">';
  result += '<button type="button" class="close" data-dismiss="alert">X</button>';
  result += '<h4 class="alert-heading">¡Atención!</h4>';
  result += '<p class="mb-0">Usuario y/o Contraseña incorrectos. (reg.js)</p>';
  result += '</div>';
  __('_AJAX_REGISTRO_').innerHTML = connect.responseText; //.innerHTML = connect.responseText;  muestra el error de php
}
//console.log(connect.responseText); - devuelve en consola lo que pasa en php


/* recarga la web  (en el ejemplo usa modal.
  Es para evitar que redireccion a otra web. asi pede seguir en el mismo sitio despues del login)*/
}else if(connect.readyState != 4){
     /* texto amarillo espera*/
  result += '<div class="alert alert-dismissible alert-warning">';
  result += '<button type="button" class="close" data-dismiss="alert">X</button>';
  result += '<h4 class="alert-heading">OK!</h4>';
  result += '<p class="mb-0">Procesando... (Reg.js)</p>';
  result += '</div>';
  __('_AJAX_REGISTRO_').innerHTML = result;
}



}//Ax fin

   /* abrir conección*/
 connect.open('POST','ajax.php?mode=registro',true);
 /* cuando usamos form  con method="POST" enctype="applicationn/x-www-form-urlencoded"
tenemos que usar el mismo cifrado para enviar datos por cabecera  (vamos a pasar una URL codificada)*/
 connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');/* sin esta linea no funcionan*/
 connect.send(form);

//FIN TODO_OK ::::::::::::::::::::::::::::::::::::::

    }else {// las pass no coinciden
      result += '<div class="alert alert-dismissible alert-danger">';
      result += '<button type="button" class="close" data-dismiss="alert">X</button>';
      result += '<h4 class="alert-heading">¡Atención!</h4>';
      result += '<p class="mb-0">Las contraseñas no coinciden. (Reg.js)</p>';
      result += '</div>';
      __('_AJAX_REGISTRO_').innerHTML = result;
    }  /* FIN verificar si las pass son iguales*/


  }else{// al menos uno sin completar
  result += '<div class="alert alert-dismissible alert-danger">';
  result += '<button type="button" class="close" data-dismiss="alert">X</button>';
  result += '<h4 class="alert-heading">¡Atención!</h4>';
  result += '<p class="mb-0">Todos los campos deben ser completados. (Reg.js)</p>';
  result += '</div>';
  __('_AJAX_REGISTRO_').innerHTML = result;

  }/* FIN verificar si todo no esta vacio*/
}else{
  /* texto rojo los terminos no estan aceptados*/
result += '<div class="alert alert-dismissible alert-danger">';
result += '<button type="button" class="close" data-dismiss="alert">X</button>';
result += '<h4 class="alert-heading">¡Atención!</h4>';
result += '<p class="mb-0">Los términos y condiciones deben ser aceptados. (Reg.js)</p>';
result += '</div>';
__('_AJAX_REGISTRO_').innerHTML = result;
}


}// FIN FUNCION goREG






/* OBTENER FUNCION DEL BOTON ENTER Y EVENTO*/
 /* tecla 13 es enter o intro*/
function runScriptReg(e) {
  if(e.keyCode == 13){
    goReg();
  }
}
