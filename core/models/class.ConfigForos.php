<?php
class ConfigForos{

  private $db;
  private $id;
  private $nombre;
  private $descripcion;
  private $estado;
  private $categoria;
  //*********************************
  public function __construct(){
  $this->db = new Conexion();
  }


  private function Errors($url,$add_mode = false){

//traemos la clase Categoria dentro de esta funcion para que funcione
global $_categorias;



    try {

      if(empty($_POST['nombre']) or empty($_POST['descripcion']) or !isset($_POST['estado']) ){
        throw new Exception(1);
      }else{
        $this->nombre = $this->db->real_escape_string($_POST['nombre']);
        $this->descripcion = $this->db->real_escape_string($_POST['descripcion']);


        if($_POST['estado'] == 1){
          $this->estado = 1;
        } else {// si un usuario se salta la seguridad podra crear un foro pero en estado cerrado
            $this->estado = 0;
        }
      }

      if(!array_key_exists($_POST['categoria'],$_categorias)){ //con array_key_exists verificamos que sea un numero y que exista en las categorias (por si alguien hace el $_POST fuera de la web)

        throw new Exception(2);
      } else {
          $this->categoria = intval($_POST['categoria']);
      }

    } catch(Exception $error){
      header ('location: ' . $url . $error->getMessage());
      exit;
    }

  }
  //*********************************

  // CON EL __CONSTRUCT Y EL __DESTRUCT NOS  FACILITA A NO TENER QUE LLAMAR A CONECT Y A CLOSE CAda vez que hagamos edit, delete o add

  public function Add(){
$this->Errors('?view=configforos&mode=add&error=', true);

// si quiero que no se repita el nombre del foro podemos comprobar como lo hicimos en inicio de sesion
$this->db->query("INSERT INTO foros (nombre, descripcion, id_categoria, estado) VALUES ('$this->nombre', '$this->descripcion', '$this->categoria', '$this->estado');");
header('location: ?view=configforos&mode=add&success=true');

}
  public function Edit(){
    $this->id = intval($_GET['id']);
    $this->Errors('?view=configforos&mode=edit&id='.$this->id.'$error=');

    $this->db->query("UPDATE  foros SET nombre='$this->nombre', descripcion='$this->descripcion', id_categoria='$this->categoria', estado='$this->estado' WHERE id='$this->id';");
header('location: ?view=configforos&mode=edit&id='.$this->id.'&success=true');
  }
  public function Delete(){
    $this->id = intval($_GET['id']);
$this->db->query("DELETE FROM foros WHERE id='$this->id';");
    header('location: ?view=configforos&success=true');
  }



  //*********************************
  public function __destruct() {//se instancia al cerrar la categoria EN PHP
        $this->db->close();
    }
  //*********************************

}
  ?>
