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

<!-- Llamado del header -->
<?php include __DIR__ . '/includes/header.php'; ?>

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

<!-- Llamado del footer -->
<?php include __DIR__ . '/includes/footer.php'; ?>

