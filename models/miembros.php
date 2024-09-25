<?php
require_once "database.php";
class Miembros
{
  private $pdo;

  private $miembro_id;
  private $miembro_nombre;
  private $miembro_apellido;
  private $miembro_direccion;
  private $miembro_telefono;
  private $miembro_correo;
  private $miembro_fecha_inscripcion;

  public function __construct()
  {
    $this->pdo = Database::Conectar();
  }

  //Metodo GETTER Y SETTERS 
  //Obtener el ID
  public function getMiembro_id(): ?int
  {
    return $this->miembro_id;
  }
  public function setMiembro_id(int $id)
  {
    $this->miembro_id = $id;
  }

  //Obtener el nombre
  public function getMiembro_nombre(): ?string
  {
    return $this->miembro_nombre;
  }
  public function setMiembro_nombre(string $nombre)
  {
    $this->miembro_nombre = $nombre;
  }

  //Obtener la apellido
  public function getMiembro_apellido(): ?string
  {
    return $this->miembro_apellido;
  }
  public function setMiembro_apellido(string $apellido)
  {
    $this->miembro_apellido = $apellido;
  }

  //Obtener el direccion
  public function getMiembro_direccion(): ?string
  {
    return $this->miembro_direccion;
  }
  public function setMiembro_direccion(string $direccion)
  {
    $this->miembro_direccion = $direccion;
  }

  //Obtener el telefono
  public function getMiembro_telefono(): ?int
  {
    return $this->miembro_telefono;
  }
  public function setMiembro_telefono(int $telefono)
  {
    $this->miembro_telefono = $telefono;
  }

  //Obtener la correo
  public function getMiembro_correo(): ?string
  {
    return $this->miembro_correo;
  }
  public function setMiembro_correo(string $correo)
  {
    $this->miembro_correo = $correo;
  }

  //Obtener la fecha de incripcion
  public function getMiembro_fecha_inscripcion(): ?int
  {
    return $this->miembro_fecha_inscripcion;
  }
  public function setMiembro_fecha_inscripcion(int $fecha_inscripcion)
  {
    $this->miembro_fecha_inscripcion = $fecha_inscripcion;
  }

  //Metodo Cantidad de miembros 
  public function CantidadMiembros()
  {
    try {
      $sql = "SELECT SUM(id) as Cantidad de Miembros FROM miembros;";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute();

      return $consulta->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  // Metodo Listar MIEMBROS
  public function ListarMiembros()
  {
    try {
      $sql = "SELECT * FROM miembros;";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
  /***METODO PARA INSERTAR MIEMBROS ****/
  public function Insertar(Miembros $p)
  {
    try {
      $sql = "INSERT INTO miembros (nombre,apellido, direccion,telefono, correo, fecha_inscripcion) VALUES (:nombre, :apellido, :direccion, :telefono, :correo, :fecha_inscripcion)";
      $consulta = $this->pdo->prepare($sql);
      $consulta->bindParam(':nombre', $p->getMiembro_nombre());
      $consulta->bindParam(':apellido', $p->getMiembro_apellido());
      $consulta->bindParam(':direccion', $p->getMiembro_direccion());
      $consulta->bindParam(':telefono', $p->getMiembro_telefono());
      $consulta->bindParam(':correo', $p->getMiembro_correo());
      $consulta->bindParam(':fecha_inscripcion', $p->getMiembro_fecha_inscripcion());
      $consulta->execute();
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  /***METODO PARA ACTUALIZAR IEMBRO  ****/

  public function Editar(Miembros $p)
  {
    try {
      $sql = "UPDATE miembros SET nombre = :nombre, apellido = :apellido, direccion = :direccion, telefono = :telefono, correo = :correo, fecha_inscripcion = :fecha_inscripcion WHERE id = :id";
      $consulta = $this->pdo->prepare($sql);
      $consulta->bindParam(':id', $p->getMiembro_id());
      $consulta->bindParam(':nombre', $p->getMiembro_nombre());
      $consulta->bindParam(':apellido', $p->getMiembro_apellido());
      $consulta->bindParam(':direccion', $p->getMiembro_direccion());
      $consulta->bindParam(':telefono', $p->getMiembro_telefono());
      $consulta->bindParam(':correo', $p->getMiembro_correo());
      $consulta->bindParam(':fecha_inscripcion', $p->getMiembro_fecha_inscripcion());
      $consulta->execute();
    } catch (PDOException $e) { // da igual si usamos PDOException O solo Exception
      die($e->getMessage());
    }
  }
  /***METODO PARA eliminar PRODUCTO  ****/
  public function Eliminar($id)
  {
    try {
      $sql = "DELETE FROM miembros WHERE id = :id";
      $consulta = $this->pdo->prepare($sql);
      $consulta->bindParam(':id', $id);
      $consulta->execute();
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
}
