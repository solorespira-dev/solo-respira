<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Solo Respira - Fundación Fibrosis Quística</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome para íconos -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
  <!-- CSS Personalizado -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg text-light bg-light text-uppercase shadow-sm custom-navbar">
    <div class="container">
      <a class="navbar-brand" href="/index.php">
        <img src="assets/img/LOGO SOLO RESPIRA.png" alt="Logo Solo Respira" class="img-logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ms-auto align-items-lg-center">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Nosotros.php">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Apadrinamiento.php">Apadrinamiento</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Eventos.php">Eventos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Investigaciones.php">Investigaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Contacto.php">Contacto</a>
          </li>
          <li class="nav-item">
            <?php if (isset($_SESSION['email'])): ?>
              <a class="btn" href="dashboard.php">Mi Cuenta</a>
            <?php else: ?>
              <a class="btn" href="InicioSesion.php">Mi Cuenta</a>
            <?php endif; ?>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Fin Navbar -->
  <!-- Sección Hero (Portada) -->
  <header class="hero-section d-flex align-items-center" style="background-image: url('images/pexels-pixabay-236380.jpg');">
    <div class="container text-center text-light">
      <h1 class="display-4 text-uppercase">Fundación Fibrosis Quística<br>Solo Respira</h1>
      <p class="lead my-4">Apoyamos y brindamos esperanza a pacientes y familiares de Fibrosis Quística en Venezuela a través de Donaciones y Apadrinamiento.</p>
      <a href="Donaciones.php" class="btn btn-warning btn-lg">Donar Ahora</a>
    </div>
    <div class="hero-overlay"></div>
  </header>
  <!-- Fin Sección Hero -->
  <!-- Carrusel de Nuestras Historias -->
  <section id="historias" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Nuestras Historias</h2>
      <div id="historiasCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <!-- Slide 1 (Tarjetas 1 a 4) -->
          <div class="carousel-item active">
            <div class="row">
              <!-- Tarjeta 1 -->
              <div class="col-md-3">
                <div class="card mb-3">
                  <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Mariana Lopez">
                  <div class="card-body">
                    <h5 class="card-title">Mariana Lopez</h5>
                    <p class="card-text">10 años, Maracaibo. Diagnosticada a los 3 años, toca el violín y sueña en grande.</p>
                    <a href="Apadrinamiento.php" class="btn btn-warning">Ayudar</a>
                  </div>
                </div>
              </div>
              <!-- Tarjeta 2 -->
              <div class="col-md-3">
                <div class="card mb-3">
                  <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Juanito Martinez">
                  <div class="card-body">
                    <h5 class="card-title">Juanito Martinez</h5>
                    <p class="card-text">8 años, Caracas. A pesar de la adversidad, sueña con ser médico.</p>
                    <a href="Apadrinamiento.php" class="btn btn-warning">Ayudar</a>
                  </div>
                </div>
              </div>
              <!-- Tarjeta 3 -->
              <div class="col-md-3">
                <div class="card mb-3">
                  <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Andrés Rodriguez">
                  <div class="card-body">
                    <h5 class="card-title">Andrés Rodriguez</h5>
                    <p class="card-text">7 años, Valencia. Amante del dibujo y con sueños artísticos.</p>
                    <a href="Apadrinamiento.php" class="btn btn-warning">Ayudar</a>
                  </div>
                </div>
              </div>
              <!-- Tarjeta 4 (Ejemplo) -->
              <div class="col-md-3">
                <div class="card mb-3">
                  <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Historia 4">
                  <div class="card-body">
                    <h5 class="card-title">Historia 4</h5>
                    <p class="card-text">Una historia inspiradora que llena de esperanza.</p>
                    <a href="Apadrinamiento.php" class="btn btn-warning">Ayudar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Slide 2 (Tarjetas 5 a 8) -->
          <div class="carousel-item">
            <div class="row">
              <!-- Tarjeta 5 -->
              <div class="col-md-3">
                <div class="card mb-3">
                  <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Historia 5">
                  <div class="card-body">
                    <h5 class="card-title">Historia 5</h5>
                    <p class="card-text">Historias de coraje y superación.</p>
                    <a href="Apadrinamiento.php" class="btn btn-warning">Ayudar</a>
                  </div>
                </div>
              </div>
              <!-- Tarjeta 6 -->
              <div class="col-md-3">
                <div class="card mb-3">
                  <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Historia 6">
                  <div class="card-body">
                    <h5 class="card-title">Historia 6</h5>
                    <p class="card-text">Inspiración para seguir luchando.</p>
                    <a href="Apadrinamiento.php" class="btn btn-warning">Ayudar</a>
                  </div>
                </div>
              </div>
              <!-- Tarjeta 7 -->
              <div class="col-md-3">
                <div class="card mb-3">
                  <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Historia 7">
                  <div class="card-body">
                    <h5 class="card-title">Historia 7</h5>
                    <p class="card-text">Una batalla diaria con una gran sonrisa.</p>
                    <a href="Apadrinamiento.php" class="btn btn-warning">Ayudar</a>
                  </div>
                </div>
              </div>
              <!-- Tarjeta 8 -->
              <div class="col-md-3">
                <div class="card mb-3">
                  <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Historia 8">
                  <div class="card-body">
                    <h5 class="card-title">Historia 8</h5>
                    <p class="card-text">La esperanza se renueva cada día.</p>
                    <a href="Apadrinamiento.php" class="btn btn-warning">Ayudar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Slide 3 (Tarjetas 9 a 12) -->
          <div class="carousel-item">
            <div class="row">
              <!-- Tarjeta 9 -->
              <div class="col-md-3">
                <div class="card mb-3">
                  <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Historia 9">
                  <div class="card-body">
                    <h5 class="card-title">Historia 9</h5>
                    <p class="card-text">Historias que inspiran y unen.</p>
                    <a href="Apadrinamiento.php" class="btn btn-warning">Ayudar</a>
                  </div>
                </div>
              </div>
              <!-- Tarjeta 10 -->
              <div class="col-md-3">
                <div class="card mb-3">
                  <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Historia 10">
                  <div class="card-body">
                    <h5 class="card-title">Historia 10</h5>
                    <p class="card-text">Cada historia es un motivo para seguir adelante.</p>
                    <a href="Apadrinamiento.php" class="btn btn-warning">Ayudar</a>
                  </div>
                </div>
              </div>
              <!-- Tarjeta 11 -->
              <div class="col-md-3">
                <div class="card mb-3">
                  <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Historia 11">
                  <div class="card-body">
                    <h5 class="card-title">Historia 11</h5>
                    <p class="card-text">La lucha diaria convertida en fortaleza.</p>
                    <a href="Apadrinamiento.php" class="btn btn-warning">Ayudar</a>
                  </div>
                </div>
              </div>
              <!-- Tarjeta 12 -->
              <div class="col-md-3">
                <div class="card mb-3">
                  <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Historia 12">
                  <div class="card-body">
                    <h5 class="card-title">Historia 12</h5>
                    <p class="card-text">El valor y la resiliencia en cada paso.</p>
                    <a href="Apadrinamiento.php" class="btn btn-warning">Ayudar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Slide 4 (Tarjetas 13 a 16) -->
          <div class="carousel-item">
            <div class="row">
              <!-- Tarjeta 13 -->
              <div class="col-md-3">
                <div class="card mb-3">
                  <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Historia 13">
                  <div class="card-body">
                    <h5 class="card-title">Historia 13</h5>
                    <p class="card-text">Cada lucha cuenta, cada historia importa.</p>
                    <a href="Apadrinamiento.php" class="btn btn-warning">Ayudar</a>
                  </div>
                </div>
              </div>
              <!-- Tarjeta 14 -->
              <div class="col-md-3">
                <div class="card mb-3">
                  <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Historia 14">
                  <div class="card-body">
                    <h5 class="card-title">Historia 14</h5>
                    <p class="card-text">Inspiración en medio de la adversidad.</p>
                    <a href="Apadrinamiento.php" class="btn btn-warning">Ayudar</a>
                  </div>
                </div>
              </div>
              <!-- Tarjeta 15 -->
              <div class="col-md-3">
                <div class="card mb-3">
                  <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Historia 15">
                  <div class="card-body">
                    <h5 class="card-title">Historia 15</h5>
                    <p class="card-text">Esperanza y determinación en cada historia.</p>
                    <a href="Apadrinamiento.php" class="btn btn-warning">Ayudar</a>
                  </div>
                </div>
              </div>
              <!-- Tarjeta 16 -->
              <div class="col-md-3">
                <div class="card mb-3">
                  <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Historia 16">
                  <div class="card-body">
                    <h5 class="card-title">Historia 16</h5>
                    <p class="card-text">El coraje que inspira a todos.</p>
                    <a href="Apadrinamiento.php" class="btn btn-warning">Ayudar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Controles del Carrusel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#historiasCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#historiasCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Siguiente</span>
        </button>
      </div>
    </div>
  </section>
  <!-- Fin Carrusel de Nuestras Historias -->
  <!-- Sección Blog sobre Fibrosis Quística -->
  <section id="blog" class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-4">Blog sobre Fibrosis Quística</h2>
      <div class="row">
        <!-- Artículo 1 -->
        <div class="col-md-4">
          <div class="card mb-3">
            <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Artículo 1">
            <div class="card-body">
              <h5 class="card-title">Entendiendo la Fibrosis Quística</h5>
              <p class="card-text">Descubre los fundamentos de esta enfermedad genética y cómo afecta la vida de quienes la padecen.</p>
              <a href="#" class="btn btn-warning">Leer más</a>
            </div>
          </div>
        </div>
        <!-- Artículo 2 -->
        <div class="col-md-4">
          <div class="card mb-3">
            <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Artículo 2">
            <div class="card-body">
              <h5 class="card-title">Historias de Esperanza</h5>
              <p class="card-text">Relatos inspiradores de pacientes y familias que luchan contra la Fibrosis Quística.</p>
              <a href="#" class="btn btn-warning">Leer más</a>
            </div>
          </div>
        </div>
        <!-- Artículo 3 -->
        <div class="col-md-4">
          <div class="card mb-3">
            <img src="https://picsum.photos/id/101/400/400" class="card-img-top" alt="Artículo 3">
            <div class="card-body">
              <h5 class="card-title">Avances en Tratamientos</h5>
              <p class="card-text">Explora los últimos avances médicos y terapéuticos en la lucha contra la Fibrosis Quística.</p>
              <a href="#" class="btn btn-warning">Leer más</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Fin Sección Blog -->
  <!-- Footer -->
  <footer class="footer text-light pt-4">
    <div class="container">
      <div class="row">
        <!-- Acerca de -->
        <div class="col-md-4 mb-3">
          <h5><i class="fas fa-lungs"></i> Fundación Solo Respira</h5>
          <p>Brindamos apoyo y esperanza a pacientes y familiares de Fibrosis Quística en Venezuela.</p>
        </div>
        <!-- Enlaces -->
        <div class="col-md-4 mb-3">
          <h5>Enlaces</h5>
          <ul class="list-unstyled">
            <li><a href="index.php" class="text-light">Inicio</a></li>
            <li><a href="Nosotros.php" class="text-light">Nosotros</a></li>
            <li><a href="Apadrinamiento.php" class="text-light">Apadrinamiento</a></li>
            <li><a href="Eventos.php" class="text-light">Eventos</a></li>
            <li><a href="Investigaciones.php" class="text-light">Investigaciones</a></li>
            <li><a href="Contacto.php" class="text-light">Contacto</a></li>
          </ul>
        </div>
        <!-- Contacto -->
        <div class="col-md-4 mb-3">
          <h5>Contacto</h5>
          <p><i class="fas fa-map-marker-alt"></i> Maracay, Edo. Aragua, VE</p>
          <p><i class="fas fa-envelope"></i> fundacionsolorespira@gmail.com</p>
          <p><i class="fas fa-phone"></i> +58 414 460 3879</p>
        </div>
      </div>
      <div class="text-center py-3 border-top border-secondary mt-3">
        © 2025 Copyright
      </div>
    </div>
  </footer>
  <!-- Fin Footer -->
  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- JS Personalizado -->
  <script src="js/main.js"></script>
</body>
</html>