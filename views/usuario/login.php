<?php
// include 'config/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo_electronico = $_POST['correo_electronico'];
    $telefono = $_POST['telefono'];

    // Consulta para obtener el usuario por correo electrónico
    $query = "SELECT * FROM miembros WHERE correo_electronico = :correo_electronico";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':correo_electronico', $correo_electronico);
    $stmt->execute();
    $miembro = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontró un miembro y si la contraseña (teléfono) coincide
    if ($miembro && password_verify($telefono, $miembro['telefono'])) {
        // Establecer variables de sesión
        $_SESSION['id_usuario'] = $miembro['id'];  // Asumiendo que 'id' es el nombre del campo ID en la tabla 'miembros'
        $_SESSION['nombre'] = $miembro['nombre'];  // Guardar el nombre del usuario

        // Redirigir al área personal
        header('Location: usuario/area_personal.php'); 
        exit();
    } else {
        $error = "Correo electrónico o contraseña incorrectos.";
    }
}
?>



<div class="col-md-6 offset-md-3">
  <div class="card p-3">
    <h2 class="card-title text-center">Iniciar Sesión</h2>
    <?php if (isset($error)) : ?>
    <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form action="login.php" method="post">
      <div class="mb-3">
        <label for="correo_electronico" class="form-label">Correo Electrónico</label>
        <input type="email" class="form-control" name="correo_electronico" id="correo_electronico" required>
      </div>
      <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono (Contraseña)</label>
        <input type="password" class="form-control" name="telefono" id="telefono" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
    </form>
    <p class="mt-3 text-center">¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
  </div>
</div>

<?php include 'views/pie.php'; ?>
