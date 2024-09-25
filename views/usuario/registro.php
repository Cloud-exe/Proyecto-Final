<?php
//include 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo_electronico = $_POST['correo_electronico'];
    $telefono = $_POST['telefono'];
  
    // Encriptar el número de teléfono (contraseña)
    $telefono_encriptado = password_hash($telefono, PASSWORD_DEFAULT);

    // Consulta para insertar un nuevo miembro
    $query = "INSERT INTO miembros (nombre, apellido, correo_electronico, telefono) VALUES (:nombre, :apellido, :correo_electronico, :telefono)";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':correo_electronico', $correo_electronico);
    $stmt->bindParam(':telefono', $telefono_encriptado);  // Guardar la contraseña encriptada
    $stmt->execute();
  
    // Redirigir al login o a otra página de confirmación
    header('Location: login.php');
    exit();
}
?>



<div class="col-md-6 offset-md-3">
  <div class="card p-3">
    <h2 class="card-title text-center">Registro de Usuario</h2>
    <form action="registro.php" method="post">
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" required>
      </div>
      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" name="apellido" id="apellido" required>
      </div>
      <div class="mb-3">
        <label for="correo_electronico" class="form-label">Correo Electrónico</label>
        <input type="email" class="form-control" name="correo_electronico" id="correo_electronico" required>
      </div>
      <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono (Contraseña)</label>
        <input type="password" class="form-control" name="telefono" id="telefono" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Registrar</button>
    </form>
  </div>
</div>

<?php include 'views/pie.php'; ?>
