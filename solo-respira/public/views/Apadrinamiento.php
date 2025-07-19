<?php
session_start();
require_once __DIR__ . '/../../config/conexion.php';

// Flag admin (si luego quieres ocultar botones)
$esAdmin = isset($_SESSION['rol']) && $_SESSION['rol']==='admin';

// 1) Cargar todos los apadrinados
$sql = "SELECT * FROM apadrinados";
$res = $conexion->query($sql);
?>

<!-- Header -->
<?php include __DIR__ . '/../../includes/header.php'; ?>

<!-- CSS Personalizado de Apadrinamiento -->
<style>
   .paciente-card {
      background: #fff;
      border: 1px solid #e0e0e0;
  }

  .paciente-img-container {
      height: 200px;
      overflow: hidden;
  }
  
  .paciente-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
  }
  
  .paciente-body {
      padding: 1.5rem;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
  }
  
  .paciente-info {
      flex-grow: 1;
  }
  
  .paciente-buttons {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-top: 1rem;
  }
  
  .btn-detalle {
      min-width: 100px;
  }
  
  .modal-paciente-img {
      height: 250px;
      object-fit: cover;
      border-radius: 8px;
  }
  
  .form-apadrinamiento .form-control {
      margin-bottom: 1rem;
  }
  
  .modal-header {
  background: #9c27b0;
}
  .modal-header h5,
  .modal-header .btn-close {
      color: white;
  }
  
  .h5.text-primary,
  .h5.text-primary {
      color: #cf3681 !important;
  }
</style>

<?php if ($esAdmin): ?>
  <div class="container py-3 text-end">
    <button
      class="btn btn-success"
      data-bs-toggle="modal"
      data-bs-target="#nuevoPacienteModal"
    >
      <i class="fas fa-plus me-1"></i>Agregar Paciente
    </button>
  </div>
<?php endif; ?>

<section class="container py-4">
  <h2 class="text-center mb-4 display-4">Nuestros Pacientes</h2>
  <div class="row g-4">
    <?php while ($p = $res->fetch_assoc()): ?>
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex">
        <div class="paciente-card w-100">
          <div class="paciente-img-container">
            <img
              src="../uploads/Pacientes/<?= htmlspecialchars($p['imagen']) ?>"
              alt="<?= htmlspecialchars($p['nombre']) ?>"
              class="paciente-img"
            >
          </div>
          <div class="paciente-body">
            <div class="paciente-info">
              <h3 class="h5 mb-3"><?= htmlspecialchars($p['nombre']) ?></h3>
              <p class="text-muted"><?= htmlspecialchars($p['edad']) ?>.
                 <?= htmlspecialchars($p['descripcion']) ?></p>
            </div>
            <div class="paciente-buttons">
              <button
                class="btn btn-outline-primary btn-detalle"
                data-bs-toggle="modal"
                data-bs-target="#<?= htmlspecialchars($p['modal_id']) ?>"
              >
                Detalles
              </button>
              <button
                class="btn"
                data-bs-toggle="modal"
                data-bs-target="#apadrinarModal"
                data-paciente="<?= htmlspecialchars($p['nombre']) ?>"
              >
                <i class="fas fa-hands-helping me-2"></i>Apadrinar
              </button>
            </div>
                        <!-- BORRAR SOLO ADMIN -->
            <?php if ($esAdmin): ?>
                <form
                method="POST"
                action="../../controllers/deletePaciente.php"
                class="d-inline mt-2"
                onsubmit="return confirm('¿Eliminar este paciente?');"
                >
                <input type="hidden" name="id" value="<?= $p['id'] ?>">
                <button class="btn btn-sm btn-danger">
                    Borrar Paciente
                </button>
                </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</section>

<!-- 2) Generar Modales de detalle -->
<?php
// Volvemos al inicio del recordset
$res->data_seek(0);

while ($p = $res->fetch_assoc()):
?>
  <div class="modal fade" id="<?= htmlspecialchars($p['modal_id']) ?>" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white">
          <h5 class="modal-title">Historia Clínica</h5>
          <button type="button" class="btn-close btn-close-white"
                  data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-5 text-center">
              <img
                src="../uploads/Pacientes/<?= htmlspecialchars($p['imagen']) ?>"
                class="modal-paciente-img w-100 mb-3"
                alt="<?= htmlspecialchars($p['nombre']) ?>"
              >
              <h3 class="h4"><?= htmlspecialchars($p['nombre']) ?></h3>
              <p class="text-muted"><?= htmlspecialchars($p['edad']) ?></p>
            </div>
            <div class="col-md-7">
              <!-- Aquí necesitarás más campos en la tabla para diagnóstico, etc. -->
              <div class="mb-4">
                <h4 class="h5" style="color: #cf3681;">Descripción</h4>
                <p class="ps-3"><?= nl2br(htmlspecialchars($p['descripcion'])) ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button"
                  class="btn btn-primary"
                  data-bs-dismiss="modal">
            Cerrar
          </button>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>

<!-- 3) Modal de Apadrinar (formulario único) -->
<div class="modal fade" id="apadrinarModal" tabindex="-1">
  <div class="modal-dialog modal-sm">
    <form id="formApadrinar" action="../../controllers/apadrinar.php" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Apadrinar a <span id="apadrinarNombrePaciente"></span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="paciente" id="pacienteId">
          <div class="mb-3">
            <label for="montoApadrinamiento">Monto (USD)</label>
            <input type="number" name="monto" id="montoApadrinamiento"
                   class="form-control" min="10" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal">
            Cancelar
          </button>
          <button type="submit" id="btnEnviarApadrinamiento"
                  class="btn btn-primary">
            Enviar
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php if ($esAdmin): ?>
  <!-- Modal: Nuevo Paciente -->
  <div class="modal fade" id="nuevoPacienteModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <form
        action="../../controllers/addPaciente.php"
        method="POST"
        enctype="multipart/form-data"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Agregar Paciente</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Nombre</label>
              <input
                type="text"
                name="nombre"
                class="form-control"
                required
              >
            </div>
            <div class="mb-3">
              <label class="form-label">Edad</label>
              <input
                type="text"
                name="edad"
                class="form-control"
              >
            </div>
            <div class="mb-3">
              <label class="form-label">Descripción</label>
              <textarea
                name="descripcion"
                class="form-control"
                rows="3"
              ></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Imagen</label>
              <input
                type="file"
                name="imagen"
                class="form-control"
              >
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Cancelar
            </button>
            <button type="submit" class="btn btn-primary">
              Guardar
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
<?php endif; ?>

<!-- Scripts de evento apadrinar -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  const apadrinarModal = document.getElementById('apadrinarModal');
  apadrinarModal.addEventListener('show.bs.modal', e => {
    const nombre = e.relatedTarget.getAttribute('data-paciente');
    document.getElementById('pacienteId').value = nombre;
    document.getElementById('apadrinarNombrePaciente').textContent = nombre;
  });
});
</script>

<!-- Footer -->
<?php include __DIR__ . '/../../includes/footer.php'; ?>