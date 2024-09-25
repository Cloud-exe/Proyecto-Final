<header class="bg-dark py-5">
  <div class="container px-5">
    <div class="row gx-5 align-items-center justify-content-center">
      <div class="col-lg-8 col-xl-7 col-xxl-6">
        <div class="my-5 text-center text-xl-start">
          <h1 class="display-5 fw-bolder text-white mb-2">Libreria CME, tu gestor de libros favorito.</h1>
          <p class="lead fw-normal text-white-50 mb-4">Explora mundos sin salir de casa. <br>
            Encuentra sabiduría en cada página. <br>
            Tu próxima historia comienza aquí.</p>
          <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
            <a class="btn btn-danger btn-lg px-4 me-sm-3" href="#features">Explora nuestros libros</a>
            <!-- <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a> -->
          </div>
        </div>
      </div>
      <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5"
          src="https://www.shutterstock.com/image-photo/bangkok-thailand-january-01-2023-600nw-2344734155.jpg"
          alt="..." /></div>
    </div>
  </div>
</header>

<section class="py-5" id="features">
  <div class="container px-5 my-5">
    <div class="row gx-5">
      <div class="col-lg-4 mb-5 mb-lg-0">
        <h2 class="fw-bolder mb-0">Los libros más vistos:</h2>
      </div>
      <div class="col-lg-8">
        <div class="row gx-5 row-cols-1 row-cols-md-2">
          <?php foreach ($this->modelo->Listar() as $res): ?>
          <div class="col mb-5">
            <div class="card mb-3">
              <h3 class="card-header"><?= $res->titulo ?></h3>
              <div class="card-body">
                <h5 class="card-title"><?= $res->autor ?></h5>
                <h6 class="card-subtitle text-muted"><?= $res->genero ?> / <?= $res->anio_publicacion ?></h6>
              </div>
              <img src="assets/images/libros/<?= $res->imagen ?>" alt="<?= $res->titulo ?>">


              <div class="card-body">
                <p class="card-text"><?= $res->descripcion ?></p>
              </div>

              <div class="card-body">
                <a href="?c=producto&a=VistasLibros&id=<?= $res->id ?>">Ver detalles del libro</a> /
                <a href="#" class="card-link">Reservar</a>
              </div>
              <div class="card-footer text-muted">
                Cantidad disponible: <?= $res->cantidad_disponible ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
</section>


<!-- Testimonial section-->
<div class="py-5 bg-light">
  <div class="container px-5 my-5">
    <div class="row gx-5 justify-content-center">
      <div class="col-lg-10 col-xl-7">
        <div class="text-center">
          <div class="fs-4 mb-4 fst-italic">"Descubre un universo de conocimiento y entretenimiento en cada página.
            Nuestra colección cuidadosamente seleccionada te invita a explorar nuevas ideas, viajar a mundos lejanos,
            y disfrutar de las historias más fascinantes. Ven y encuentra tu próximo gran libro en nuestra
            biblioteca."</div>
          <div class="d-flex align-items-center justify-content-center">
            <img class="rounded-circle me-3" src="assets/images/perfil/perfil-mujer.jpg" alt="perfil-mujer.jpg" />
            <div class="fw-bold">
              Carolina
              <span class="fw-bold text-primary mx-1">/</span>
              CEO, Examen CME
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Blog preview section-->
<!-- <section class="py-5">
  <div class="container px-5 my-5">
    <div class="row gx-5 justify-content-center">
      <div class="col-lg-8 col-xl-6">
        <div class="text-center">
          <h2 class="fw-bolder">NUESTROS LIBROS MAS POPULARES</h2>
          <p class="lead fw-normal text-muted mb-5">Descubre los libros que nuestros lectores adoran. Estos títulos
            son los más leídos y recomendados, desde clásicos hasta las novedades más emocionantes</p>
        </div>
      </div>
    </div>
    <div class="row gx-5">
      <div class="col-lg-4 mb-5">
        <div class="card h-100 shadow border-0">
          <img class="card-img-top" src="https://dummyimage.com/600x350/ced4da/6c757d" alt="..." />
          <div class="card-body p-4">
            <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
            <a class="text-decoration-none link-dark stretched-link" href="#!">
              <h5 class="card-title mb-3">Blog post title</h5>
            </a>
            <p class="card-text mb-0">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
          </div>
          <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
            <div class="d-flex align-items-end justify-content-between">
              <div class="d-flex align-items-center">
                <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                <div class="small">
                  <div class="fw-bold">Kelly Rowan</div>
                  <div class="text-muted">March 12, 2023 &middot; 6 min read</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
<!-- <div class="col-lg-4 mb-5">
        <div class="card h-100 shadow border-0">
          <img class="card-img-top" src="https://dummyimage.com/600x350/adb5bd/495057" alt="..." />
          <div class="card-body p-4">
            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Media</div>
            <a class="text-decoration-none link-dark stretched-link" href="#!">
              <h5 class="card-title mb-3">Another blog post title</h5>
            </a>
            <p class="card-text mb-0">This text is a bit longer to illustrate the adaptive height of each card. Some
              quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
          <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
            <div class="d-flex align-items-end justify-content-between">
              <div class="d-flex align-items-center">
                <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                <div class="small">
                  <div class="fw-bold">Josiah Barclay</div>
                  <div class="text-muted">March 23, 2023 &middot; 4 min read</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
<!-- <div class="col-lg-4 mb-5">
        <div class="card h-100 shadow border-0">
          <img class="card-img-top" src="https://dummyimage.com/600x350/6c757d/343a40" alt="..." />
          <div class="card-body p-4">
            <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
            <a class="text-decoration-none link-dark stretched-link" href="#!">
              <h5 class="card-title mb-3">The last blog post title is a little bit longer than the others</h5>
            </a>
            <p class="card-text mb-0">Some more quick example text to build on the card title and make up the bulk of
              the card's content.</p>
          </div>
          <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
            <div class="d-flex align-items-end justify-content-between">
              <div class="d-flex align-items-center">
                <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                <div class="small">
                  <div class="fw-bold">Evelyn Martinez</div>
                  <div class="text-muted">April 2, 2023 &middot; 10 min read</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
<!-- </div>

  </div>
</section> -->
</main>