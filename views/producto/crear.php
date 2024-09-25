<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4"><?= $titulo ?></h1>
    <ol class="breadcrumb mb-4">
      <!-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li> -->
      <li class="breadcrumb-item"><a href="?c=producto">Productos</a></li>
      <li class="breadcrumb-item"><?= $titulo ?></li>

    </ol>
    <div class="card mb-4">
      <div class="card-body">
        <?= $titulo ?> productos
        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
        .
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        <?= $titulo ?> productos
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7">
            <div class="card-body">
              <form method="post" action="?c=producto&a=Guardar">
                <!-- Hidden input para el id del producto -->
                <input type="hidden" id="idLibro" name="idLibro" value="<?= $p->getLibro_id() ?>" />

                <div class="row mb-3">
                  <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                      <input class="form-control" id="inputTitulo" type="text" name="titulo"
                        value="<?= $p->getLibro_titulo() ?>" />
                      <label for=" inputTitulo">Titulo</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input class="form-control" id="inputAutor" type="text" name="autor"
                        value="<?= $p->getLibro_autor() ?>" />
                      <label for="inputAutor">Autor</label>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                      <input class="form-control" id="inputgenero" type="number" name="genero"
                        value="<?= $p->getLibro_genero() ?>" />
                      <label for="inputGenero">Género</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                      <input class="form-control" id="inputAnioPublicacion" type="number" name="anio_publicacion"
                        value="<?= $p->getLibro_anio_publicacion() ?>" />
                      <label for=" inputAnio_publicacion">Año de publicación</label>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                      <input class="form-control" id="inputIsbn" type="number" name="isbn"
                        value="<?= $p->getLibro_isbn() ?>" />
                      <label for="inputCantidad">ISBN</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="inputCantidadDisponible" type="file" name="cantidad_disponible"
                      value="<?= $p->getLibro_cantidad_disponible() ?>" />
                    <label for="inputCantidadDisponible">Cantidad disponible</label>
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