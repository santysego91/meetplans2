function __(id){
  return document.getElementById(id);
}


//mensaje de confirmacion para borrar categoria o algo
function DeleteItem(contenido,url){
  var action = window.confirm(contenido);

  if (action){
    window.location = url;
  }
}
