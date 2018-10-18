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


//ADD 11/10/18 - 21:50
  public function Add(){
$this->Errors('?view=temas&mode=add&id_foro='.$this->id_foro.'&error=');
$fecha = date(FOROS_FORMAT_DATE_HR, time());

//insertar nuevo tema

//pasar el contenido del tema o post a BBcode
$POST=BBcode($this->content);

$this->db->query("INSERT INTO temas (titulo,contenido,id_foro,id_dueno,fecha,id_ultimo,fecha_ultimo,tipo)
VALUES ('$this->titulo','$POST','$this->id_foro','$this->id_dueno','$fecha','$this->id_dueno','$fecha','$this->anuncio');");//PRIMERO PARAMETROS LUEGO VALORES

//almacenamos el valor del ID del post para usarla luego
$ID_TEMA= $this->db->insert_id;

//actualizar el foro y sumarle un tema y un mensaje
$this->db->query("UPDATE foros SET cantidad_temas=cantidad_temas + '1', cantidad_mensajes=cantidad_mensajes + '1', ultimo_tema='$this->titulo', id_ultimo_tema='$ID_TEMA'  WHERE id='$this->id_foro' LIMIT 1;");
//Redirecciona al nuevo post (tema)
header('location: temas/' . UrlAmigable($ID_TEMA,$this->titulo,$this->id_foro));//$this->db->insert_id   nos devolvera la ultima id que fue insetada
  }#


//EDIT
  public function Edit(){
$this->Errors('?view=temas&mode=edit&id='.$this->id.'&id_foro='.$this->id_foro.'&error=');
$this->db->query("UPDATE temas SET titulo='$this->titulo',contenido='$this->content',tipo='$this->anuncio'  WHERE id='$this->id' LIMIT 1;");
header('location: temas/' . UrlAmigable($this->id,$this->titulo,$this->id_foro));//regresamos al tema despues de editarlo
  }#

//DELETE
  public function Delete(){

    $this->db->query("DELETE FROM temas WHERE id='$this->id' LIMIT 1;");
    header('location: index.php?view=foros&id='. $this->id_foro);
  }#


//Cerrar tema
  public function Close(int $estado){//(int $estado) con estos habilitamos la misma funcion tanto para abrir como para cerrar el tema
    $estado = intval($estado);
  $this->db->query("UPDATE temas SET estado='$estado' WHERE id='$this->id' LIMIT 1;");
  header('location: index.php?view=temas&id='.$this->id.'&id_foro='. $this->id_foro);

  }#




  public function Check(){//esta funcion verifica si el tema existe
    $sql = $this->db->query("SELECT * FROM temas WHERE id='$this->id' LIMIT 1; ");//traemos toda la info de temas

    if ($this->db->rows($sql) > 0) {//si es mayor q 0 devolvemos un arreglo con todos los datos del tema

      $tema = $this->db->recorrer($sql);

    } else {
      // si no existe devolvemos un false
      $tema= false;
    }
    $this->db->liberar($sql);

    return $tema;
  }#



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
