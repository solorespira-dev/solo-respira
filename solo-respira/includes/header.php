<!-- Header general -->
<!-- Navbar incluida -->
  
<!-- Header general -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Solo Respira - Fundación Fibrosis Quística</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
  <!-- CSS Personalizado -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/fullcalendar.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/home.css">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg text-light bg-light text-uppercase shadow-sm custom-navbar">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="../assets/images/LOGO SOLO RESPIRA.png" alt="Logo Solo Respira" class="img-logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="Nosotros.php">Nosotros</a></li>
        <li class="nav-item"><a class="nav-link" href="Apadrinamiento.php">Apadrinamiento</a></li>
        <li class="nav-item"><a class="nav-link" href="Eventos.php">Eventos</a></li>
        <li class="nav-item"><a class="nav-link" href="Investigaciones.php">Investigaciones</a></li>
        <li class="nav-item"><a class="nav-link" href="Contacto.php">Contacto</a></li>
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

