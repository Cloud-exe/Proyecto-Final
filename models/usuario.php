<?php
require_once 'database.php';

class Usuario
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = Database::Conectar();
  }

  public function registrar($nombre, $apellido, $direccion, $telefono, $correo_electronico)
  {
    try {
      $stmt = $this->pdo->prepare("INSERT INTO miembros (nombre, apellido, direccion, telefono, correo_electronico, fecha_inscripcion) VALUES (?, ?, ?, ?, ?, NOW())");
      $stmt->execute([$nombre, $apellido, $direccion, $telefono, $correo_electronico]);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function obtenerPorCorreo($correo_electronico)
  {
    try {
      $stmt = $this->pdo->prepare("SELECT * FROM miembros WHERE correo_electronico = ?");
      $stmt->execute([$correo_electronico]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
}
