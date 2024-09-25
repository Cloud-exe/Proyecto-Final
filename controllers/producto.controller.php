<?php
require_once "models/producto.php";

class ProductoControlador
{
  private $modelo;
  public function __construct()
  {
    $this->modelo = new Producto();
  }

  public function Inicio()
  {
    require_once "views/encabezado.php";
    require_once "views/producto/index.php";
    require_once "views/pie.php";
  }

  //Metodo crear Producto
  public function CrearProducto()
  {
    // $titulo = "Registrar";
    // $p = new Producto();
    // if (isset($_GET['id']))

    require_once "views/encabezado.php";
    require_once "views/producto/crear.php";
    require_once "views/pie.php";
  }

  /** GUARDAR PRODUCTO */
  public function Guardar()
  {
    $p = new Producto();
    $p->setLibro_id(intval($_POST['idLibro']));
    $p->setLibro_titulo($_POST['titulo']);
    $p->setLibro_autor($_POST['autor']);
    $p->setLibro_genero($_POST['genero']);
    $p->setLibro_anio_publicacion($_POST['anio_publicacion']);
    $p->setLibro_isbn($_POST['isbn']);
    $p->setLibro_cantidad_disponible($_POST['cantidad_disponible']);

    //Si el id está vacío es porque es un nuevo producto
    $p->getLibro_id() > 0
      ? $this->modelo->Actualizar($p)
      : $this->modelo->Insertar($p);
    header("Location: ?c=producto");
  }

  /* BORRAR PRODUCTO */
  public function Borrar()
  {
    $this->modelo->Eliminar($_GET['id']);
    header("Location:?c=producto");
  }


  public function VistasLibros()
  {
    require_once "views/encabezado.php";
    require_once "views/inicio/index.php";
    require_once "views/pie.php";

    $vistas = $this->modelo->Incrementar_Vistas($_GET['id']);
  }
}
