<?php
session_start();
require_once __DIR__ . '/../../config/conexion.php';

// Flag de administrador
$esAdmin = isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin';
$mensaje = "";

// Carpeta de uploads (ruta absoluta)
$uploadDir = __DIR__ . '/../uploads/Investigaciones/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// 1) Procesar formulario (solo admin)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $esAdmin) {
    $titulo       = trim($_POST['titulo']);
    $contenido    = trim($_POST['contenido']);
    $autor        = $_SESSION['nombre'] ?? 'Anónimo';
    $nombreImagen = null;

    // 1a) Subir imagen si existe
    if (!empty($_FILES['imagen']['name']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $baseName    = pathinfo($_FILES['imagen']['name'], PATHINFO_FILENAME);
        $extension   = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
        // Limpiar nombre, evitar espacios/caracteres raros
        $safeName    = preg_replace('/[^A-Za-z0-9_-]/', '_', $baseName);
        $nombreImagen = time() . "_{$safeName}.{$extension}";

        $destino = $uploadDir . $nombreImagen;
        if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $destino)) {
            $mensaje = "Error al mover el archivo subido.";
        }
    }

    // 1b) Insertar en la base de datos
    $stmt = $conexion->prepare("
        INSERT INTO investigaciones
          (titulo, contenido, imagen, autor)
        VALUES (?, ?, ?, ?)
    ");
    $stmt->bind_param("ssss", $titulo, $contenido, $nombreImagen, $autor);

    if ($stmt->execute()) {
        $mensaje = "Publicación agregada correctamente.";
    } else {
        $mensaje = "Error al agregar publicación.";
    }
    $stmt->close();
}

// 2) Obtener todas las investigaciones (siempre)
$resultado = $conexion->query("
    SELECT *
      FROM investigaciones
     ORDER BY fecha_publicacion DESC
");
?>

<!-- Llamado del header -->
<?php include __DIR__ . '/../../includes/header.php'; ?>

<div class="container mt-5">
  <h2 class="mb-4 text-center">
    <span style="color:#a5a726;">
      Investigaciones sobre Fibrosis Quística
    </span>
  </h2>

  <!-- Formulario solo para admins -->
  <?php if ($esAdmin): ?>
    <div class="card mb-5">
      <div class="card-header">Agregar nueva publicación</div>
      <div class="card-body">
        <?php if ($mensaje): ?>
          <div class="alert alert-info"><?= htmlspecialchars($mensaje) ?></div>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo"
                   class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea name="contenido" id="contenido"
                      class="form-control" rows="4" required>
            </textarea>
          </div>
          <div class="mb-3">
            <label for="imagen" class="form-label">
              Imagen (opcional)
            </label>
            <input type="file" name="imagen" id="imagen"
                   class="form-control">
          </div>
          <button type="submit" class="btn btn-personal">
            Publicar
          </button>
        </form>
      </div>
    </div>
  <?php endif; ?>

  <!-- Row contenedor de tarjetas -->
  <div class="row">
    <?php while ($fila = $resultado->fetch_assoc()): ?>
      <div class="col-12 col-md-6 col-lg-4 mb-4">
        <div class="card h-100">
          <?php if ($fila['imagen']): ?>
            <img
              src="../uploads/Investigaciones/<?= htmlspecialchars($fila['imagen']) ?>"
              class="card-img-top"
              alt="Imagen de <?= htmlspecialchars($fila['titulo']) ?>"
            >
          <?php endif; ?>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">
              <span style="color:#a5a726;">
                <?= htmlspecialchars($fila['titulo']) ?>
              </span>
            </h5>
            <p class="card-text">
              <?= nl2br(htmlspecialchars($fila['contenido'])) ?>
            </p>
            <p class="text-muted mt-auto">
              <small>
                Publicado por <?= htmlspecialchars($fila['autor']) ?>
                el <?= htmlspecialchars($fila['fecha_publicacion']) ?>
              </small>
            </p>

            <?php if ($esAdmin): ?>
              <form
                method="POST"
                action="../../controllers/deleteInvestigacion.php"
                onsubmit="return confirm('¿Eliminar esta investigación?');"
              >
                <input type="hidden" name="id" value="<?= $fila['id'] ?>">
                <button class="btn btn-sm btn-danger mt-2">
                  Borrar
                </button>
              </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>


<!-- Llamado del footer -->
<?php include __DIR__ . '/../../includes/footer.php'; ?>