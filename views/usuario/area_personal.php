<?php
session_start();

// Verifica si el usuario ha iniciado sesión, si no, redirige al login
if (!isset($_SESSION['id_usuario'])) {
    header('Location: ../login.php'); // Redirige al login si no ha iniciado sesión
    exit();
}

include '../models/database.php';
include '../encabezado.php';

$id_usuario = $_SESSION['id_usuario'];

// Obtener datos personales desde la tabla miembros
$query = "SELECT * FROM miembros WHERE id = :id_usuario";
$stmt = $conexion->prepare($query);
$stmt->bindParam(':id_usuario', $id_usuario);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Obtener todas las películas
$peliculas = []; // Inicializar la variable para evitar errores si la consulta falla
$query = "SELECT * FROM peliculas";
$stmt = $conexion->prepare($query);

if ($stmt->execute()) {
    $peliculas = $stmt->fetchAll(PDO::FETCH_ASSOC); // Asignar los resultados a $peliculas
}

// Obtener películas favoritas del usuario
$query = "SELECT p.* FROM peliculas p 
          JOIN favoritas f ON p.id = f.id_pelicula 
          WHERE f.id_usuario = :id_usuario";
$stmt = $conexion->prepare($query);
$stmt->bindParam(':id_usuario', $id_usuario);
$stmt->execute();
$favoritas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<main class="container d-flex flex-row gap-5">

  <div class="col-3">
    <h1>Área Personal</h1>

    <h2>Datos Personales</h2>
    <p><strong>Nombre:</strong> <?= htmlspecialchars($usuario['nombre']) ?></p>
    <p><strong>Apellido:</strong> <?= htmlspecialchars($usuario['apellido']) ?></p>
    <p><strong>Correo Electrónico:</strong> <?= htmlspecialchars($usuario['correo_electronico']) ?></p>
    <a href="editar_perfil.php" class="btn btn-primary">Editar Perfil</a>
  </div>
  <div class="col-9">
    <h2>Mis Películas Favoritas</h2>
    <div class="row">
      <?php if (!empty($favoritas)) : ?>
      <?php foreach ($favoritas as $pelicula) : ?>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="../uploads/<?= $pelicula['imagen'] ?>" class="card-img-top" height="250"
            alt="<?= $pelicula['titulo'] ?>" onerror="this.src='../img/default.jpg';">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($pelicula['titulo']) ?></h5>
            <p class="card-text">Director: <?= htmlspecialchars($pelicula['director']) ?></p>
            <p class="card-text">Año: <?= htmlspecialchars($pelicula['anio']) ?></p>
            <p class="card-text">Género: <?= htmlspecialchars($pelicula['genero']) ?></p>
            <form action="eliminar_favorito.php" method="post">
              <input type="hidden" name="id_pelicula" value="<?= $pelicula['id'] ?>">
              <button type="submit" class="btn btn-danger">Eliminar de Favoritos</button>
            </form>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
      <?php else : ?>
      <p>No tienes películas favoritas aún.</p>
      <?php endif; ?>
    </div>
  </div>
</main>
<br><br>
<h2>Todas las Películas</h2>
<div class="row">
  <?php if (!empty($peliculas)) : ?>
  <?php foreach ($peliculas as $pelicula) : ?>
  <div class="col-md-4">
    <div class="card mb-4">
      <img src="../uploads/<?= $pelicula['imagen'] ?>" class="card-img-top" alt="<?= $pelicula['titulo'] ?>"
        onerror="this.src='../img/default.jpg';">
      <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($pelicula['titulo']) ?></h5>
        <p class="card-text">Director: <?= htmlspecialchars($pelicula['director']) ?></p>
        <p class="card-text">Año: <?= htmlspecialchars($pelicula['anio']) ?></p>
        <p class="card-text">Género: <?= htmlspecialchars($pelicula['genero']) ?></p>
        <form action="marcar_favorito.php" method="post">
          <input type="hidden" name="id_pelicula" value="<?= $pelicula['id'] ?>">
          <button type="submit" class="btn btn-primary">Marcar como Favorito</button>
        </form>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  <?php else : ?>
  <p>No hay películas disponibles.</p>
  <?php endif; ?>
</div>

<?php include '../templates/pie.php'; ?>
