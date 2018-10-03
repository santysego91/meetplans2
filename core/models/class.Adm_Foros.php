<?php
class Adm_Foros{

  private $db;
  private $id;
  private $nombre;

  //*********************************
  public function __construct(){// se instancia apenas se llama la categoria (EN PHP)
    //de esta manera no tenemos que llamar a Conexion cada vez que queramos editar, añadir o borrar
  $this->db = new Conexion();
  }


  private function Errors($url){}
  //*********************************

  // CON EL __CONSTRUCT Y EL __DESTRUCT NOS  FACILITA A NO TENER QUE LLAMAR A CONECT Y A CLOSE CAda vez que hagamos edit, delete o add

  public function Add(){}
  public function Edit(){}
  public function Delete(){}



  //*********************************
  public function __destruct() {//se instancia al cerrar la categoria EN PHP
        $this->db->close();
    }
  //*********************************

}
  ?>
