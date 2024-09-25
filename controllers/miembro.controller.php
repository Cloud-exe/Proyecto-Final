<?php
require_once "models/miembros.php";

class MiembroControlador
{
  private $modelo;
  public function __construct()
  {
    $this->modelo = new Miembros();
  }

  public function Inicio()
  {
    require_once "views/encabezado.php";
    require_once "views/miembros/index.php";
    require_once "views/pie.php";
  }

  /** METODO PARA CREAR MIEMBRO */
  public function CrearMiembro()
  {
    $tablaMiembro = new Miembros();
    $ListaMiembros = $this->modelo->ListarMiembros();

    require_once "views/encabezado.php";
    require_once "views/miembros/index.php";
    require_once "views/pie.php";
  }

  /** METODO PARA GUARDAR MIEMBRO CREADO  */
  public function GuardarMiembro()
  {
    $p = new Miembros();
    $p->setMiembro_id(intval($_POST['id']));
    $p->setMiembro_nombre($_POST['nombre']);
    $p->setMiembro_apellido($_POST['apellido']);
    $p->setMiembro_direccion($_POST['direccion']);
    $p->setMiembro_telefono($_POST['telefono']);
    $p->setMiembro_correo($_POST['correo']);
    $p->setMiembro_fecha_inscripcion($_POST['fecha_inscripcion']);

    //Si el id está vacío es porque es un nuevo producto
    $p->getMiembro_id() > 0
      ? $this->modelo->Editar($p)
      : $this->modelo->Insertar($p);
    header("Location: ?c=miembros");
  }

  /* ELIMINAR MIEMBRO */
  public function Borrar()
  {
    $this->modelo->Eliminar($_GET['id']);
    header("Location:?c=miembros");
  }
  public function EditarMiembro() {}
}