<?php
require_once "database.php";
class Producto
{
  private $pdo;

  private $libro_id;
  private $libro_titulo;
  private $libro_autor;
  private $libro_genero;
  private $libro_anio_publicacion;
  private $libro_isbn;
  private $libro_cantidad_disponible;
  private $libro_descripcion;
  private $libro_imagen;


  public function __construct()
  {
    $this->pdo = Database::Conectar();
  }

  //Metodo GETTER Y SETTERS 
  //Obtener el ID
  public function getLibro_id(): ?int
  {
    return $this->libro_id;
  }
  public function setLibro_id(int $id)
  {
    $this->libro_id = $id;
  }

  //Obtener el titulo
  public function getLibro_titulo(): ?string
  {
    return $this->libro_titulo;
  }
  public function setLibro_titulo(string $titulo)
  {
    $this->libro_titulo = $titulo;
  }

  //Obtener la autor
  public function getLibro_autor(): ?string

  {
    return $this->libro_autor;
  }
  public function setLibro_autor(string $autor)
  {
    $this->libro_autor = $autor;
  }

  //Obtener el genero
  public function getLibro_genero(): ?string
  {
    return $this->libro_genero;
  }
  public function setLibro_genero(string $genero)
  {
    $this->libro_genero = $genero;
  }

  //Obtener el año publicacion
  public function getLibro_anio_publicacion(): ?int
  {
    return $this->libro_anio_publicacion;
  }
  public function setLibro_anio_publicacion(int $anio_publicacion)
  {
    $this->libro_anio_publicacion = $anio_publicacion;
  }

  //Obtener la isbn
  public function getLibro_isbn(): ?int
  {
    return $this->libro_isbn;
  }
  public function setLibro_isbn(int $isbn)
  {
    $this->libro_isbn = $isbn;
  }

  //Obtener la cantidad disponible
  public function getLibro_cantidad_disponible(): ?string
  {
    return $this->libro_cantidad_disponible;
  }
  public function setLibro_cantidad_disponible(string $cantidad_disponible)
  {
    $this->libro_cantidad_disponible = $cantidad_disponible;
  }

  //Obtener la descripcion
  public function getLibro_descripcion(): ?string
  {
    return $this->libro_descripcion;
  }
  public function setLibro_descripcion(string $descripcion)
  {
    $this->libro_descripcion = $descripcion;
  }

  //Obtener la imagen
  public function getLibro_imagen(): ?string
  {
    return $this->libro_imagen;
  }
  public function setLibro_imagen(string $imagen)
  {
    $this->libro_imagen = $imagen;
  }


  //Metodo Cantidad
  public function Cantidad()
  {
    try {
      $sql = "SELECT SUM(cantidad_disponible) as Cantidad FROM libros;";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute();

      return $consulta->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  // Metodo Listar productos
  public function Listar()
  {
    try {
      $sql = "SELECT * FROM libros;";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }


  // // Metodo Para mostrar los libros mas vistos
  // public function Listar()
  // {
  //   try {
  //     $sql = "SELECT * FROM libros ORDER BY vista DESC;";
  //     $consulta = $this->pdo->prepare($sql);
  //     $consulta->execute();
  //     return $consulta->fetchAll(PDO::FETCH_OBJ);
  //   } catch (Exception $e) {
  //     die($e->getMessage());
  //   }
  // }


  // Metodo Para mostrar los libros mas vistos

  public function Incrementar_Vistas($id)
  {
    try {
      $sql = "UPDATE libros SET vistas = vistas + 1 WHERE id = $id";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
