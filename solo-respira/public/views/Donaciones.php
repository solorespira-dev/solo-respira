<?php
session_start();
require_once __DIR__ . '/../../config/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donaciones - Fundación Fibrosis Quística</title>
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
      <a class="navbar-brand" href="#">
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
<!-- Sección Hero -->
<header class="hero-section" style="background-image: url('../assets/images/pexels-pixabay-236380.jpg');">
  <!-- Overlay -->
  <div class="hero-overlay"></div>
  <!-- Contenido del Hero -->
  <div class="container text-center text-light py-5">
    <h1 class="display-4 text-uppercase">Donaciones</h1>
    <p class="lead my-4">Con tu ayuda, brindamos apoyo y esperanza a quienes luchan contra la Fibrosis Quística.</p>
    <p class="lead my-4">¡Gracias por tu colaboración!</p> <br>
  </div>
  <!-- Sección de Opciones de Donación -->
  <div class="container py-4">
    <h2 class="text-center mb-4 text-light">Elige tu método de donación</h2>
    <div class="row justify-content-center">
      <!-- Tarjeta PayPal -->
      <div class="col-md-4 mb-3 d-flex">
        <div class="card text-center shadow-sm h-100">
          <div class="card-body d-flex flex-column">
            <i class="fab fa-paypal fa-3x mb-3 text-primary"></i>
            <h5 class="card-title">Donar con PayPal</h5>
            <p class="card-text flex-grow-1">Realiza tu donación de manera rápida y segura.</p>
            <a href="https://www.paypal.com/donate?hosted_button_id=XXXX" class="btn btn-warning" target="_blank">Donar ahora</a>
          </div>
        </div>
      </div>
      <!-- Tarjeta Binance -->
      <div class="col-md-4 mb-3 d-flex">
        <div class="card text-center shadow-sm h-100">
          <div class="card-body d-flex flex-column">
            <i class="fab fa-btc fa-3x mb-3 text-warning"></i>
            <h5 class="card-title">Donar con Binance</h5>
            <p class="card-text flex-grow-1">Apoya a la fundación utilizando criptomonedas de forma segura.</p>
            <a href="https://www.binance.com/es" class="btn btn-warning" target="_blank">Donar ahora</a>
          </div>
        </div>
      </div>
      <!-- Tarjeta Tarjeta Visa -->
      <div class="col-md-4 mb-3 d-flex">
        <div class="card text-center shadow-sm h-100">
          <div class="card-body d-flex flex-column">
            <i class="fas fa-credit-card fa-3x mb-3 text-info"></i>
            <h5 class="card-title">Donar en Bolívares</h5>
            <p class="card-text flex-grow-1">Realiza tu donación de forma segura con cuenta de banco nacional.</p>
            <a href="https://www.tuproveedordepagos.com/visa" class="btn btn-warning" target="_blank">Donar ahora</a>
          </div>
        </div>
      </div>
    </div>
  </div>
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