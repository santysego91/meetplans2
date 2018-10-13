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
  //*********************************
  // __CONSTRUCT
  //*********************************
  public function __construct(){
  $this->db = new Conexion();

  //Con esto tendremos disponible el ID del tema para todos los metodos (edit, delete, close, anuncio) en temasController.php
  $this->id = isset($_GET['id']) ? intval($_GET['id']) : null;//Si esta definida en(temasController.php) la ponemos, si no null
  $this->id_foro = intval($_GET['id_foro']);
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
if (strlen($this->titulo) < FOROS_CONT_LONG_MIN) {
  //si es menor a 10
throw new Exception(3);
}




    } catch (\Exception $error) {
      header('location: ' . $url . $error->getMessage());
      exit;
    }


  }#


//ADD 11/10/18 - 21:50
  public function Add($id){
$this->Errors('?view=temas&mode=add&error=');
$fecha = date(FOROS_FORMAT_DATE_HR,time());
$this->db->query("INSERT INTO temas (titulo,contenido)
VALUES ('$this->titulo','$this->content');");//PRIMERO PARAMETROS LUEGO VALORES
  }#

//EDIT
  public function Edit($id){
$this->Errors('?view=temas&mode=edit&id='.$this->id.'&error=');

  }#

//DELETE
  public function Delete($id){
$this->Errors('');

  }#


//Cerrar tema
  public function Close($id){
$this->Errors('');

  }#

//Crear un tema ANUNCIO
  public function Anuncio($id){
$this->Errors('');

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
