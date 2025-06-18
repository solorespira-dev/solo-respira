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
      <a class="navbar-brand" href="index.php">
        <img src="images/LOGO SOLO RESPIRA.png" alt="Logo Solo Respira" class="img-logo">
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
    <div class="container text-center">
      <main class="py-1">
        <div class="accordion" id="accordionPanelsStayOpenExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                LA FUNDACIÓN
              </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
              <div class="accordion-body">
                  Establecida el 16 de febrero de 2021 en Maracay,
                  Venezuela, esta organización sin fines de lucro se
                  dedica a apoyar a personas afectadas por la fibrosis
                  quística. Su labor incluye la gestión de medicamentos,
                  la capacitación de familias, la investigación y la
                  realización de actividades de concienciación, con el
                  objetivo de mejorar su calidad de vida y bienestar
                  integral.
               </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                MISIÓN
              </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
              <div class="accordion-body">
                <strong>Brindar apoyo integral a pacientes con fibrosis quística y sus
                  familias,</strong> promoviendo su calidad de vida mediante la
                sensibilización social, la gestión de recursos esenciales, la
                atención psicológica y médica, y la construcción de alianzas
                estratégicas que fortalezcan nuestra labor.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                VISIÓN
              </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
              <div class="accordion-body">
                <strong>Ser un referente regional</strong> en el tratamiento integral de la
                fibrosis quística, garantizando el acceso a medicamentos de
                alto costo, atención multidisciplinaria de calidad y
                hospitalizaciones dignas, transformando la vida de los
                pacientes y sus familias con un modelo ejemplar en el campo
                de la salud</div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <div class="hero-overlay"></div>
  </header>
  <!-- Fin Sección Hero -->
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
            <li><a href="Nosotros-LaFundacion.php" class="text-light">Nosotros</a></li>
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