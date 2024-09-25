<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4"><?= $titulo ?></h1>
    <ol class="breadcrumb mb-4">
      <!-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li> -->
      <li class="breadcrumb-item"><a href="?c=miembros">Miembros</a></li>
      <li class="breadcrumb-item"><?= $titulo ?></li>

    </ol>
    <div class="card mb-4">
      <div class="card-body">
        <?= $titulo ?> miembros
        <a target="_blank" href="https://datatables.net/"></a>
        .
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        <?= $titulo ?> miembros
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7">
            <div class="card-body">
              <form method="post" action="?c=miembros&a=GuardarMiembro">
                <!-- Hidden input para el id del producto -->
                <input type="hidden" id="idLibro" name="idLibro" value="<?= $p->getMiembro_id() ?>" />

                <div class="row mb-3">
                  <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                      <input class="form-control" id="inputTitulo" type="text" name="titulo"
                        value="<?= $p->getMiembro_nombre() ?>" />
                      <label for=" inputTitulo">Nombre</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input class="form-control" id="apellido" type="text" name="apellido"
                        value="<?= $p->getMiembro_apellido() ?>" />
                      <label for="inputAutor">Apellido</label>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                      <input class="form-control" id="direccion" type="text" name="direccion"
                        value="<?= $p->getMiembro_direccion() ?>" />
                      <label for="direccion">Direccion</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                      <input class="form-control" id="telefono" type="number" name="telefono"
                        value="<?= $p->getMiembro_telefono() ?>" />
                      <label for=" inputAnio_publicacion">Telefono</label>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                      <input class="form-control" id="correo" type="email" name="correo"
                        value="<?= $p->getMiembro_correo() ?>" />
                      <label for="correo">Correo</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="fecha_inscripcion" type="file" name="fecha_inscripcion"
                      value="<?= $p->getLibro_cantidad_disponible() ?>" />
                    <label for="fecha_inscripcion">Fecha de Inscripcion</label>
                  </div>
                </div>

                <div class="mt-4 mb-0 text-center">
                  <button type="submit" class="btn btn-primary">
                    Enviar
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>