<?php
session_start();
require_once 'conexion.php';

$esAdmin = isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin';
$mensaje = "";

// Procesar nueva publicación (solo admin)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $esAdmin) {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $autor = $_SESSION['nombre'];
    $nombreImagen = null;

    // Procesar imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombreOriginal = basename($_FILES['imagen']['name']);
        $nombreImagen = time() . '_' . $nombreOriginal;
        $rutaDestino = 'uploads/' . $nombreImagen;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);
    }

    $stmt = $conexion->prepare("INSERT INTO investigaciones (titulo, contenido, imagen, autor) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $titulo, $contenido, $nombreImagen, $autor);
    if ($stmt->execute()) {
        $mensaje = "Publicación agregada correctamente.";
    } else {
        $mensaje = "Error al agregar publicación.";
    }
    $stmt->close();
}

// Obtener todas las investigaciones
$resultado = $conexion->query("SELECT * FROM investigaciones ORDER BY fecha_publicacion DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Investigaciones - Solo Respira</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
<div class="container mt-5">

  <h2 class="mb-4 text-center"><span style="color:#a5a726;">Investigaciones sobre Fibrosis Quística</span></h2>

  <?php if ($esAdmin): ?>
  <div class="card mb-5">
    <div class="card-header">Agregar nueva publicación</div>
    <div class="card-body">
      <?php if ($mensaje): ?>
        <div class="alert alert-info"><?= $mensaje ?></div>
      <?php endif; ?>
      <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="titulo" class="form-label">Título</label>
          <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="contenido" class="form-label">Contenido</label>
          <textarea name="contenido" id="contenido" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
          <label for="imagen" class="form-label">Imagen (opcional)</label>
          <input type="file" name="imagen" id="imagen" class="form-control">
        </div>
        <button type="submit" class="btn btn-personal">Publicar</button>
      </form>
    </div>
  </div>
  <?php endif; ?>

  <!-- Mostrar investigaciones -->
  <?php while ($fila = $resultado->fetch_assoc()): ?>
    <div class="card mb-4">
      <?php if ($fila['imagen']): ?>
        <img src="uploads/<?= htmlspecialchars($fila['imagen']) ?>" class="card-img-top" alt="Imagen de investigación">
      <?php endif; ?>
      <div class="card-body">
        <h5 class="card-title"><span style="color:#a5a726;"><?= htmlspecialchars($fila['titulo']) ?></span></h5>
        <p class="card-text"><?= nl2br(htmlspecialchars($fila['contenido'])) ?></p>
        <p class="text-muted"><small>Publicado por <?= htmlspecialchars($fila['autor']) ?> el <?= $fila['fecha_publicacion'] ?></small></p>
      </div>
    </div>
  <?php endwhile; ?>

</div>

<footer class="footer text-light pt-4">
    <div class="container">
      <div class="row">
        <!-- Acerca de -->
        <div class="col-md-4 mb-3">
          <h5><span style="color:#a5a726;"><i class="fas fa-lungs"></i> Fundación Solo Respira</span></h5>
          <p>Brindamos apoyo y esperanza a pacientes y familiares de Fibrosis Quística en Venezuela.</p>
        </div>
        <!-- Enlaces -->
        <div class="col-md-4 mb-3">
          <h5><span style="color:#a5a726;">Enlaces</span></h5>
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
          <h5><span style="color:#a5a726;">Contacto</span></h5>
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
</body>
</html>
