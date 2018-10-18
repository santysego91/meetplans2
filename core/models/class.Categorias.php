<?php


class Categorias {

private $db;
private $id;
private $nombre;

//*********************************
public function __construct(){// se instancia apenas se llama la categoria (EN PHP)
  //de esta manera no tenemos que llamar a Conexion cada vez que queramos editar, añadir o borrar
$this->db = new Conexion();
} #fin funcion


private function Errors($url){

  try {
if(empty($_POST['nombre'])){
  throw new Exception(1);
}else {
  $this->nombre = $this->db->real_escape_string($_POST['nombre']);
}


} catch (Exception $error) {
  header('location: '.$url .$error->getMessage());
  exit;//este exit es para muestre el error y no haga mas nada
}

} #fin funcion



//*********************************

// CON EL __CONSTRUCT Y EL __DESTRUCT NOS  FACILITA A NO TENER QUE LLAMAR A CONECT Y A CLOSE CAda vez que hagamos edit, delete o add

public function Add(){
//$this->db->query("");
$this->Errors('?view=categorias&mode=add&error=');
  $this->db->query("INSERT INTO categorias (nombre) VALUES ('$this->nombre');");
  header('location: ?view=categorias&mode=add&success=true');
} #fin funcion
public function Edit(){
  $this->id = intval($_GET['id']);
  $this->Errors('?view=categorias&mode=edit&error='.$this->id.'&error=');
  $this->db->query("UPDATE categorias SET nombre='$this->nombre' WHERE id='$this->id';");
  header('location: ?view=categorias&mode=edit&id='.$this->id.'&success=true');
} #fin funcion
public function Delete(){
    $this->id = intval($_GET['id']);

    $q = "DELETE FROM categorias WHERE id='$this->id';";
    $q .= "DELETE FROM foros WHERE id_categoria='$this->id';"; //para hacer un multi query y poder concatenarla pònemos el .

//antes de borrar todos los foros que hay vincularos, debemos recopilar todas las id de los temas que tenemos dentro
  $sql = $this->db->query("SELECT id FROM foros WHERE id_categoria='$this->id';");


        //chekeamos si existen foros antes de hacer cualquier recorrido de bucle para evitar errores
        if ($this->db->rows($sql) > 0) {
          // si es mayor que 0
          while ($data = $this->db->recorrer($sql)) {
            $id_foro = $data[0];
            $q .= "DELETE FROM temas WHERE id_foro='$id_foro';";
          }


      }

      $this->db->liberar($sql);
      $this->db->multi_query($q);
      header('location: ?view=categorias');
} #fin funcion



//*********************************
public function __destruct() {//se instancia al cerrar la categoria EN PHP
      $this->db->close();
  }

  } #fin funcion
//*********************************


?>
