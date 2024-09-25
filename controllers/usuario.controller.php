<?php

require_once 'models/usuario.php';

class UsuarioControlador
{
  private $modelo;

  public function __construct()
  {
    $this->modelo = new Usuario();
  }

  public function login()
  {
    require_once "views/encabezado.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $correo_electronico = $_POST['correo_electronico'];
      $telefono = $_POST['telefono'];

      $usuario = $this->modelo->obtenerPorCorreo($correo_electronico);

      if ($usuario && $telefono === $usuario['telefono']) {
        session_start();
        $_SESSION['usuario'] = $usuario['nombre'];
        header('Location: index.php');
      } else {
        echo "Correo electrónico o teléfono incorrectos.";
      }
    }

    require_once 'views/usuario/login.php';
  }

  public function registro()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $direccion = $_POST['direccion'];
      $telefono = $_POST['telefono'];
      $correo_electronico = $_POST['correo_electronico'];

      $this->modelo->registrar($nombre, $apellido, $direccion, $telefono, $correo_electronico);
      header('Location: index.php?controller=Usuario&action=login');
    }

    require_once 'views/usuario/registro.php';
  }

  public function logout()
  {
    session_start();
    session_destroy();
    header('Location: index.php');
  }
}
