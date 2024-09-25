<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Miembros Asociados</h1>

    <div class="card mb-4">
      <div class="card-body">
        Lista de Miembros Asociados
        <a target="_blank" href="https://datatables.net/"></a>

      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between aling-items-center">
        <div>
          <i class="fas fa-table me-1"></i>
        </div>
        Lista de miembros Asociados
        <!-- Creo un boton para agregar -->
        <div>
          <a href="?c=miembros&a=AgregarMiembro" class="btn btn-primary btn-flat">
            <i class="fa fa-lg fa-plus"><img src="imagenes/agregar.png" alt="agregar" width="30" height="30"></i>
          </a>
        </div>
      </div>

      <div class="card-body d-flex justify-content-center">
        <table id="datatablesSimple">
          <thead>
            <tr>
              <th>ID</th>
              <br>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Direccion</th>
              <th>Telefono</th>
              <th>Correo</th>
              <th>Fecha de inscripcion </th>
              <th>Acciones</th>

            </tr>
          </thead>

          <tbody>
            <?php foreach ($ListaMiembros as $res): ?>
            <tr>
              <td><?= $res->id ?></td>
              <td><?= $res->nombre ?></td>
              <td><?= $res->apellido ?></td>
              <td><?= $res->direccion ?></td>
              <td><?= $res->telefono ?></td>
              <td><?= $res->correo_electronico ?></td>
              <td><?= $res->fecha_inscripcion ?></td>
              <!-- Botones para editar y eliminar con iconos- EDITAR-->
              <td>
                <!-- Verifica la URL de edición -->
                <a href="?c=miembro&a=EditarMiembro&id=<?= $res->id ?>" class="btn btn-success btn-flat">
                  <i class="fa fa-l fa-refresh"><img src="imagenes/editar.png" alt="editar" width="30" height="30"></i>
                </a>

                <!-- BORRAR-->
                <a href="?c=miembro&a=Eliminar&id=<?= $res->id ?>" class="btn btn-danger btn-flat">
                  <i class="fa fa-l fa-trash"><img src="imagenes/eliminar.png" alt="eliminar" width="30"
                      height="30"></i>
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
            <!-- Se recorre el array para mostrar los datos en la tabla -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>