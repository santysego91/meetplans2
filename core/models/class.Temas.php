<?php
/**
 *
 */
class Temas{

  private $db;
  private $id;
  private $titulo;
  private $content;
  private $id_foro;
  private $id_dueno;
  private $anuncio;
  //*********************************
  // __CONSTRUCT
  //*********************************
  public function __construct(){
  $this->db = new Conexion();

  //Con esto tendremos disponible el ID del tema para todos los metodos (edit, delete, close, anuncio) en temasController.php
  $this->id = isset($_GET['id']) ? intval($_GET['id']) : null;//Si esta definida en(temasController.php) la ponemos, si no null
  $this->id_foro = intval($_GET['id_foro']);
  $this->id_dueno = isset($_SESSION['app_id']) ? $_SESSION['app_id'] : null;

  }
  //*********************************
  //*********************************




  //Controlador de errores
    private function Errors($url){

    try {

//primero verificamos que no esten vacios los campos
if (empty($_POST['titulo']) or empty($_POST['content'])) {
  //si los campos estan vacios
throw new Exception(1);
} else {
  $this->titulo = $this->db->real_escape_string($_POST['titulo']);
  $this->content = $this->db->real_escape_string($_POST['content']);
}

//Verificar cantidad de campos en titulo
if (strlen($this->titulo) < FOROS_TITULO_LONG_MIN) {
  //si es menor a 5
throw new Exception(2);
}

//Verificar cantidad de campos en contenido
if (strlen($this->content) < FOROS_CONT_LONG_MIN) {
  //si es menor a 10
throw new Exception(3);
}

//Verificar si el ususario tiene los permisos necesarios de admin o moderador
// le indicamos que solo podamos aceptar el valor 1 (para evitar error si alguien manda peticiones que no queremos)
// 2 es el valor que tenemos declarado en el input de la vista add_temas.php
if (isset($_POST['anuncio']) and $_POST['anuncio'] == 2){
  //si el valor anuncio esta definido le pasamos el VALOR
  $this->anuncio= 2;
}else {
  //si no esta definido el valor de anuncio (refiriendose a la vista de add_temas.php)
  $this->anuncio= 1;
}


    } catch (\Exception $error) {
      header('location: ' . $url . $error->getMessage());
      exit;
    }


  }#


private  function UpdateMenjUser( int $mensajes = 1,bool $restar = false){

if ($restar) {
  // Si es restar
    $_SESSION['users'][$this->id_dueno]['mensajes'] = $_SESSION['users'][$this->id_dueno]['mensajes'] - $mensajes;
} else {
  // si es sumar

    //incrementar mensajes a la sesion del usuario (la sesion que esta en el cache. sino demoraria 5 minutos en aparecerle)
    $_SESSION['users'][$this->id_dueno]['mensajes'] = $_SESSION['users'][$this->id_dueno]['mensajes'] + $mensajes;
}

}


//ADD 11/10/18 - 21:50
  public function Add(){
$this->Errors('?view=temas&mode=add&id_foro='.$this->id_foro.'&error=');
$fecha = date(FOROS_FORMAT_DATE_HR, time());

//pasar el contenido del tema o post a BBcode
$POST=BBcode($this->content);
$this->db->query("INSERT INTO temas (titulo,contenido,id_foro,id_dueno,fecha,id_ultimo,fecha_ultimo,tipo)
VALUES ('$this->titulo','$POST','$this->id_foro','$this->id_dueno','$fecha','$this->id_dueno','$fecha','$this->anuncio');");//PRIMERO PARAMETROS LUEGO VALORES

//almacenamos el valor del ID del post para usarla luego
$ID_TEMA= $this->db->insert_id;

//actualizar el foro y sumarle un tema y un mensaje
$query = "UPDATE foros SET cantidad_temas=cantidad_temas + '1', cantidad_mensajes=cantidad_mensajes + '1', ultimo_tema='$this->titulo', id_ultimo_tema='$ID_TEMA'  WHERE id='$this->id_foro' LIMIT 1;";
$query .= "UPDATE users SET mensajes=mensajes + '1'  WHERE id='$this->id_dueno' LIMIT 1;";
$this->db->multi_query($query);
$this->UpdateMenjUser();
header('location: temas/' . UrlAmigable($ID_TEMA,$this->titulo,$this->id_foro));//$this->db->insert_id   nos devolvera la ultima id que fue insetada
  }#


//EDIT
  public function Edit(){
$this->Errors('?view=temas&mode=edit&id='.$this->id.'&id_foro='.$this->id_foro.'&error=');
$this->db->query("UPDATE temas SET titulo='$this->titulo',contenido='$this->content',tipo='$this->anuncio'  WHERE id='$this->id' LIMIT 1;");
header('location: temas/' . UrlAmigable($this->id,$this->titulo,$this->id_foro));//regresamos al tema despues de editarlo
  }#







/*
function DeleteLast()
1) chequear si el id del tema que estoy borrando (perteneciente al mismo foro) es el ultimo tema que este en el foro
2) Si la sentencia sql (paso 1) me devuelve al menos 1 valor
3) procedemos a borrarlo
4) Si no es asi, se libera la sentencia sql y continuamos con el codifo
5) Seleccionamos el id y el titulo de los temas cuando el id del foro sea del "id del foro del tema actual"
y la id del mismo tema que quiero cambiar, sea distinto del id del que quiero borrar.
Lo ordenamos para que siempre me traiga el ultimo. (id <> '$this->id') esto es para evitar que me traiga el id del que quiero borrar
Si es el ultimo tema del foro por la linea (id <> '$this->id') no nos devolvera nada

6) Si el paso 5 no nos devuelve nada, significa que debemos vaciar el ultimo tema en el nombre e id
7) Si hay otro tema ademas del que queremos borrar, Almacenamos el id
8) Almacenamos el nombre
9) liberamos la sentencia sql
10)Actualizamos el foro actual indicandole cual sera el id del ultimo tema y el nombre
 (dependiendo de la situacion de si hay otro tema que quedara como ultimo o si no lo hay; que borraremos todo)

11)Continua con el flujo de DELETE

*/




  private function DeleteLast() {
  //Chequeamos que el tema que se quiere borrar sea el ultimo del foro
  $sql = $this->db->query("SELECT id FROM foros WHERE id_ultimo_tema='$this->id' AND id='$this->id_foro' LIMIT 1;");//1

          if ($this->db->rows($sql) > 0) {//2
            //3
            // Extraemos el id y nombre del ultimo tema que NO sea el mismo que se va a borrar
            $sql_2 = $this->db->query("SELECT id,titulo FROM temas WHERE id_foro='$this->id_foro' AND id <> '$this->id' ORDER BY id DESC LIMIT 1;");//5

                      if($this->db->rows($sql_2) > 0){
                        $data_t = $this->db->recorrer($sql_2);
                        $id_ultimo_tema = $data_t[0];//7
                        $ultimo_tema = $data_t[1];//8
                      } else { //6
                        $id_ultimo_tema = 0;
                        $ultimo_tema = '';
                      }

                      $this->db->liberar($sql_2);//9
            //Actualizamos el foro
          $sql_4 = $this->db->query("UPDATE foros SET id_ultimo_tema='$id_ultimo_tema', ultimo_tema='$ultimo_tema' WHERE id='$this->id_foro' LIMIT 1;");//10
          }
    $this->db->liberar($sql);//4
}// 11


//DELETE
  public function Delete(){
  //para que no se le borre la cantidad de mensajes a un administrador que borra un tema que no es suyo
  $this->DeleteLast();
  //chekear si el mensaje lo esta borrando el dueño o otro
  $sql2 = $this->db->query("SELECT id_dueno FROM temas WHERE id='$this->id' LIMIT 1 ;");

          if ($this->db->rows($sql2) > 0) {
              $sql = $this->db->query("SELECT id_dueno FROM respuestas WHERE id_tema='$this->id' ;");// obtener la cantidad de mensajes o repuestas asosiados al tema
              $id_dueno_tema = $this->db->recorrer($sql2)[0];
              // si no hay respuesta solo borramos 1 mensaje
              $mensajes_borrar = 1;
              $is_dueno = ($id_dueno_tema == $_SESSION['app_id']); //EL PARENTESIS ADMITIDO EN PHP7
              $mensajes_user_actual = $is_dueno ? 1 : 0;//chekear cuando sea tema creado por el ususario que lo borra
                    if ($this->db->rows($sql) > 0) {
                      // si hay varios temas para borrar
                    $prepare_sql = $this->db->prepare("UPDATE users SET mensajes=mensajes - '1' WHERE id=? LIMIT 1;");
                    //cada vez que pasemos por un resultado botrramos 1 mensaje (una sql preparada)
                    // ademas con WHERE id=?   le pasamos la id del dueño del tema que pueden ser diferentes en cada respuesta
                      $prepare_sql->bind_param('i' ,$id_dueno);

                              while ($data = $this->db->recorrer($sql)) {
                                    $id_dueno = $data[0];
                                    $prepare_sql->execute();
                                    $mensajes_borrar++;

                                  if ($id_dueno == $_SESSION['app_id']) {
                                    // significa que yo soy el usuario actual que borra
                                    $mensajes_user_actual++;
                                  }
                              }#fin del while

                                $prepare_sql->close();
                      }

                  $this->db->liberar($sql);
                  $query  = "DELETE FROM temas WHERE id='$this->id' LIMIT 1;";
                  $query  .= "UPDATE foros SET cantidad_mensajes=cantidad_mensajes - '$mensajes_borrar', cantidad_temas=cantidad_temas - '1' WHERE id='$this->id_foro' LIMIT 1 ;";
                  $query  .= "DELETE FROM respuestas WHERE id_tema='$this->id';";//aqui borra todas las respuestas asosiadas al tema
                  // SI ES EL DUEÑO
                if ($is_dueno) {
                  $query .= "UPDATE users SET mensajes=mensajes - '1' WHERE id='$this->id_dueno' LIMIT 1;"; // original   $query .= "UPDATE users SET mensajes=mensajes - '1' WHERE id='$this->id_dueno_tema' LIMIT 1;";
                }
                  $this->db->multi_query($query);
                  $this->UpdateMenjUser($mensajes_user_actual,true);//el true es para que reste
                }
                $this->db->liberar($sql2);
                header('location: index.php?view=foros&id='. $this->id_foro);
                //2- CUANDO SAE BORRA UN TEMA EN EL INDEX DE FOROS SALE COMO EL ULTIMO TEMA EL BORRADO (CHEKEAR)

    }#



//Cerrar tema
  public function Close(int $estado){//(int $estado) con estos habilitamos la misma funcion tanto para abrir como para cerrar el tema
    $estado = intval($estado);
    $this->db->query("UPDATE temas SET estado='$estado' WHERE id='$this->id' LIMIT 1;");
    header('location: index.php?view=temas&id='.$this->id.'&id_foro='. $this->id_foro);

  }#

  //Responder tema
    public function Responder(){//(int $estado) con estos habilitamos la misma funcion tanto para abrir como para cerrar el tema

        if (empty($_POST['content'])) {
          // si el contenido esta vacio enviarlo a errors
         header('location: index.php?view=temas&mode=responder&id='.$this->id.'&id_foro='. $this->id_foro);
          exit;
          } else {
              // si se escribio una repuesta
              $this->content = $this->db->real_escape_string($_POST['content']);
            }
            $this->UpdateMenjUser();
            $query = "INSERT INTO respuestas (id_dueno,id_tema,id_foro,contenido)
            VALUES ('$this->id_dueno','$this->id','$this->id_foro','$this->content');";//insertar repuesta en db
            //actualizar el foro y sumarle un tema y un mensaje
            $query .= "UPDATE foros SET cantidad_mensajes=cantidad_mensajes + '1'  WHERE id='$this->id_foro' LIMIT 1;";//+1 en mensajes del foro principal
            $query .= "UPDATE temas SET respuestas=respuestas + '1'  WHERE id='$this->id' LIMIT 1;";// +1 en mensajes del tema al que respondemos
            $query .= "UPDATE users SET mensajes=mensajes + '1'  WHERE id='$this->id_dueno' LIMIT 1;";// +1 en mensajes del usuario
            $this->db->multi_query($query);
            header('location: index.php?view=temas&id='.$this->id.'&id_foro='. $this->id_foro);
            //1- REVISAR QUE CUANDO SE RESPONDE UN TEMA NO SE LE SUMA 1 A LA CANTIDAD DE MENSAJES DEL USUARIO NI AL TEMA
    }#


  public function Check(){//esta funcion verifica si el tema existe
    $sql = $this->db->query("SELECT * FROM temas WHERE id='$this->id' LIMIT 1; ");//traemos toda la info de temas

    if ($this->db->rows($sql) > 0) {//si es mayor q 0 devolvemos un arreglo con todos los datos del tema
      $tema = $this->db->recorrer($sql);
    } else {// si no existe devolvemos un false
      $tema= false;
    }

    $this->db->liberar($sql);
    return $tema;
  }#



public function GetRespuestas(){

  $sql = $this->db->query("SELECT * FROM respuestas  WHERE id_tema='$this->id'; ");//traemos toda la info de temas

  if ($this->db->rows($sql) > 0) {//si es mayor q 0 devolvemos un arreglo con todos los datos del tema

while ($data = $this->db->recorrer($sql)) {
  //el arreglo respuestas[] seria cada vez que data tenga resultado
  $respuestas[] = $data;
}


  } else {// si no existe devolvemos un false
    $respuestas= false;
  }

  $this->db->liberar($sql);
  return $respuestas;
}


  //*********************************
  // __DESTRUCT - se instancia al cerrar la categoria EN PHP
  //*********************************
  public function __destruct() {
        $this->db->close();
    }#
  //*********************************
  //*********************************

}

 ?>
