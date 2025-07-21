<?php
session_start();
require_once __DIR__ . '/../../config/conexion.php';

/**
 * Trunca un texto a $longitud caracteres, agregando "…" si se excede.
 */
function str_truncate(string $texto, int $longitud = 160): string {
    $texto = trim($texto);
    if (mb_strlen($texto) <= $longitud) {
        return $texto;
    }
    // Cortamos y buscamos el último espacio para no cortar palabras
    $cortado = mb_substr($texto, 0, $longitud);
    $ultima = mb_strrpos($cortado, ' ');
    return mb_substr($cortado, 0, $ultima ?: $longitud) . '…';
}

// Traer apadrinados
$pacientes = [];
$res = $conexion->query("SELECT * FROM apadrinados ORDER BY id ASC");
while ($row = $res->fetch_assoc()) {
    $pacientes[] = $row;
}

// Partir en grupos de 4 por slide
$slidesApd = array_chunk($pacientes, 4);

// Traer investigaciones
$investigaciones = [];
$sql = "SELECT * FROM investigaciones ORDER BY fecha_publicacion DESC";
$res = $conexion->query($sql);
while ($fila = $res->fetch_assoc()) {
    $investigaciones[] = $fila;
}

// Partir en grupos de 3 por slide
$slidesInv = array_chunk($investigaciones, 3);
?>


<!-- Llamado del header -->
<?php include __DIR__ . '/../../includes/header.php'; ?>

  <!-- Sección Hero (Portada) -->
  <header class="hero-section d-flex align-items-center" style="background-image: url('../assets/images/pexels-pixabay-236380.jpg');">
    <div class="container text-center text-light">
      <h1 class="display-4 text-uppercase">Fundación Fibrosis Quística<br>Solo Respira</h1>
      <p class="lead my-4">Apoyamos y brindamos esperanza a pacientes y familiares de Fibrosis Quística en Venezuela a través de Donaciones y Apadrinamiento.</p>
      <a href="Donaciones.php" class="btn btn-warning btn-lg">Donar Ahora</a>
    </div>
    <div class="hero-overlay"></div>
  </header>
  <!-- Fin Sección Hero -->

  <style>
        /* Limitar ancho de los controles prev/next */
    .carousel-control-prev,
    .carousel-control-next {
      width: 40px;               /* ancho reducido */
    }

    /* Reducir tamaño del icono dentro */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      width: 24px;
      height: 24px;
      background-size: 100% 100%;
    }

    /* 1. Forzar una altura de imagen idéntica y recortarla si hace falta */
    #blogCarousel .card-img-top {
      max-height: 220px;       /* ajusta a tu gusto */
      object-fit: cover;
    }

    /* 2. Asegurar que el row de slides tenga altura fija */
    #blogCarousel .carousel-item {
      min-height: 400px;       /* alto total deseado de cada slide */
    }

    /* 3. fijar altura total de la tarjeta */
    #blogCarousel .card {
      height: 100%;
    }

    /* 4. recortar texto si se desborda */
    #blogCarousel .card-text {
      overflow: hidden;
    }

    /* 1) Hacer los íconos de control negros */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      filter: invert(1) !important;
    }

  </style>

  <!-- Carrusel de Nuestras Historias -->
  <section id="historias" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Nuestras Historias</h2>
      <div id="historiasCarousel" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">
          <?php foreach ($slidesApd as $idx => $grupo): ?>
            <div class="carousel-item <?= $idx === 0 ? 'active' : '' ?>">
              <div class="row">
                <?php foreach ($grupo as $p): ?>
                  <div class="col-md-3">
                    <div class="card mb-3">
                      <img
                        src="../uploads/Pacientes/<?= htmlspecialchars($p['imagen']) ?>"
                        class="card-img-top"
                        alt="<?= htmlspecialchars($p['nombre']) ?>"
                      >
                      <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($p['nombre']) ?></h5>
                        <?php
                          // Preparamos el preview truncado a 160 caracteres
                          $preview = str_truncate($p['descripcion'], 160);
                        ?>
                        <p class="card-text">
                          <?= htmlspecialchars($p['edad']) ?> años, 
                          <?= htmlspecialchars($preview) ?>
                        </p>
                        <a href="Apadrinamiento.php" class="btn btn-warning">
                          Ayudar
                        </a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Controles prev/next -->
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#historiasCarousel"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#historiasCarousel"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Siguiente</span>
        </button>

      </div>
    </div>
  </section>
  <!-- Fin del carrusel de nuestras historias -->

  <!-- Sección Blog sobre Fibrosis Quística (dinámico) -->
<section id="blog" class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-4">Blog sobre Fibrosis Quística</h2>

    <div
      id="blogCarousel"
      class="carousel slide"
      data-bs-ride="carousel"
      data-bs-interval="5000"
      data-bs-pause="false"
    >

      <div class="carousel-inner">
        <?php foreach ($slidesInv as $i => $grupo): ?>
          <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
            <div class="row">
              <?php foreach ($grupo as $inv): ?>
                <div class="col-md-4">
                  <div class="card mb-3 h-100 d-flex flex-column">
                    <img
                      src="../uploads/Investigaciones/<?= htmlspecialchars($inv['imagen']) ?>"
                      class="card-img-top"
                      alt="<?= htmlspecialchars($inv['titulo']) ?>"
                    >
                    <div class="card-body d-flex flex-column">
                      <h5 class="card-title"><?= htmlspecialchars($inv['titulo']) ?></h5>
                      <p class="card-text">
                        <?= htmlspecialchars(str_truncate($inv['contenido'], 160)) ?>
                      </p>
                      <a
                        href="Investigaciones.php"
                        class="btn btn-warning mt-auto"
                      >
                        Leer más
                      </a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Controles Prev/Next -->
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#blogCarousel"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#blogCarousel"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>

    </div>
  </div>
</section>


<!-- Llamado del footer -->
<?php include __DIR__ . '/../../includes/footer.php'; ?>
