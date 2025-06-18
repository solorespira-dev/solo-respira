<!-- Llamado del header -->
<?php include __DIR__ . '/includes/header.php'; ?>

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

<section class="container py-4">
  <h2 class="text-center mb-4 display-4">Nuestros Pacientes</h2>
  
  <div class="row g-4">
      <!-- Paciente 1 -->
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex">
          <div class="paciente-card w-100">
              <div class="paciente-img-container">
                  <img src="https://picsum.photos/id/101/400/400" alt="María González" class="paciente-img">
              </div>
              <div class="paciente-body">
                  <div class="paciente-info">
                      <h3 class="h5 mb-3">María González</h3>
                      <p class="text-muted">8 años. Fisioterapia respiratoria 3 veces al día.</p>
                  </div>
                  <div class="paciente-buttons">
                      <button class="btn btn-outline-primary btn-detalle" data-bs-toggle="modal" data-bs-target="#pacienteModal1">
                          Detalles
                      </button>
                      <button class="btn" data-bs-toggle="modal" data-bs-target="#apadrinarModal" data-paciente="María González">
                          <i class="fas fa-hands-helping me-2"></i>Apadrinar
                      </button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Paciente 2 -->
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex">
          <div class="paciente-card w-100">
              <div class="paciente-img-container">
                  <img src="https://picsum.photos/id/102/400/400" alt="Carlos Rodríguez" class="paciente-img">
              </div>
              <div class="paciente-body">
                  <div class="paciente-info">
                      <h3 class="h5 mb-3">Carlos Rodríguez</h3>
                      <p class="text-muted">12 años. Enzimas pancreáticas con cada comida.</p>
                  </div>
                  <div class="paciente-buttons">
                      <button class="btn btn-outline-primary btn-detalle" data-bs-toggle="modal" data-bs-target="#pacienteModal2">
                          Detalles
                      </button>
                      <button class="btn" data-bs-toggle="modal" data-bs-target="#apadrinarModal" data-paciente="Carlos Rodríguez">
                          <i class="fas fa-hands-helping me-2"></i>Apadrinar
                      </button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Paciente 3 -->
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex">
          <div class="paciente-card w-100">
              <div class="paciente-img-container">
                  <img src="https://picsum.photos/id/103/400/400" alt="Ana Martínez" class="paciente-img">
              </div>
              <div class="paciente-body">
                  <div class="paciente-info">
                      <h3 class="h5 mb-3">Ana Martínez</h3>
                      <p class="text-muted">6 años. Suplementos vitamínicos A, D, E, K.</p>
                  </div>
                  <div class="paciente-buttons">
                      <button class="btn btn-outline-primary btn-detalle" data-bs-toggle="modal" data-bs-target="#pacienteModal3">
                          Detalles
                      </button>
                      <button class="btn" data-bs-toggle="modal" data-bs-target="#apadrinarModal" data-paciente="Ana Martínez">
                          <i class="fas fa-hands-helping me-2"></i>Apadrinar
                      </button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Paciente 4 -->
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex">
          <div class="paciente-card w-100">
              <div class="paciente-img-container">
                  <img src="https://picsum.photos/id/104/400/400" alt="José López" class="paciente-img">
              </div>
              <div class="paciente-body">
                  <div class="paciente-info">
                      <h3 class="h5 mb-3">José López</h3>
                      <p class="text-muted">10 años. Dornasa alfa diaria.</p>
                  </div>
                  <div class="paciente-buttons">
                      <button class="btn btn-outline-primary btn-detalle" data-bs-toggle="modal" data-bs-target="#pacienteModal4">
                          Detalles
                      </button>
                      <button class="btn" data-bs-toggle="modal" data-bs-target="#apadrinarModal" data-paciente="José López">
                          <i class="fas fa-hands-helping me-2"></i>Apadrinar
                      </button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Paciente 5 -->
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex">
          <div class="paciente-card w-100">
              <div class="paciente-img-container">
                  <img src="https://picsum.photos/id/105/400/400" alt="Laura Sánchez" class="paciente-img">
              </div>
              <div class="paciente-body">
                  <div class="paciente-info">
                      <h3 class="h5 mb-3">Laura Sánchez</h3>
                      <p class="text-muted">9 años. Antibióticos inhalados.</p>
                  </div>
                  <div class="paciente-buttons">
                      <button class="btn btn-outline-primary btn-detalle" data-bs-toggle="modal" data-bs-target="#pacienteModal5">
                          Detalles
                      </button>
                      <button class="btn" data-bs-toggle="modal" data-bs-target="#apadrinarModal" data-paciente="Laura Sánchez">
                          <i class="fas fa-hands-helping me-2"></i>Apadrinar
                      </button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Paciente 6 -->
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex">
          <div class="paciente-card w-100">
              <div class="paciente-img-container">
                  <img src="https://picsum.photos/id/106/400/400" alt="Miguel Pérez" class="paciente-img">
              </div>
              <div class="paciente-body">
                  <div class="paciente-info">
                      <h3 class="h5 mb-3">Miguel Pérez</h3>
                      <p class="text-muted">11 años. Moduladores CFTR.</p>
                  </div>
                  <div class="paciente-buttons">
                      <button class="btn btn-outline-primary btn-detalle" data-bs-toggle="modal" data-bs-target="#pacienteModal6">
                          Detalles
                      </button>
                      <button class="btn" data-bs-toggle="modal" data-bs-target="#apadrinarModal" data-paciente="Miguel Pérez">
                          <i class="fas fa-hands-helping me-2"></i>Apadrinar
                      </button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Paciente 7 -->
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex">
          <div class="paciente-card w-100">
              <div class="paciente-img-container">
                  <img src="https://picsum.photos/id/107/400/400" alt="Sofía Ramírez" class="paciente-img">
              </div>
              <div class="paciente-body">
                  <div class="paciente-info">
                      <h3 class="h5 mb-3">Sofía Ramírez</h3>
                      <p class="text-muted">7 años. Oxigenoterapia nocturna.</p>
                  </div>
                  <div class="paciente-buttons">
                      <button class="btn btn-outline-primary btn-detalle" data-bs-toggle="modal" data-bs-target="#pacienteModal7">
                          Detalles
                      </button>
                      <button class="btn" data-bs-toggle="modal" data-bs-target="#apadrinarModal" data-paciente="Sofía Ramírez">
                          <i class="fas fa-hands-helping me-2"></i>Apadrinar
                      </button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Paciente 8 -->
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex">
          <div class="paciente-card w-100">
              <div class="paciente-img-container">
                  <img src="https://picsum.photos/id/108/400/400" alt="Daniel Torres" class="paciente-img">
              </div>
              <div class="paciente-body">
                  <div class="paciente-info">
                      <h3 class="h5 mb-3">Daniel Torres</h3>
                      <p class="text-muted">13 años. Suplementos nutricionales especiales.</p>
                  </div>
                  <div class="paciente-buttons">
                      <button class="btn btn-outline-primary btn-detalle" data-bs-toggle="modal" data-bs-target="#pacienteModal8">
                          Detalles
                      </button>
                      <button class="btn" data-bs-toggle="modal" data-bs-target="#apadrinarModal" data-paciente="Daniel Torres">
                          <i class="fas fa-hands-helping me-2"></i>Apadrinar
                      </button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Paciente 9 -->
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex">
          <div class="paciente-card w-100">
              <div class="paciente-img-container">
                  <img src="https://picsum.photos/id/109/400/400" alt="Valentina Díaz" class="paciente-img">
              </div>
              <div class="paciente-body">
                  <div class="paciente-info">
                      <h3 class="h5 mb-3">Valentina Díaz</h3>
                      <p class="text-muted">5 años. Vest de terapia de percusión.</p>
                  </div>
                  <div class="paciente-buttons">
                      <button class="btn btn-outline-primary btn-detalle" data-bs-toggle="modal" data-bs-target="#pacienteModal9">
                          Detalles
                      </button>
                      <button class="btn" data-bs-toggle="modal" data-bs-target="#apadrinarModal" data-paciente="Valentina Díaz">
                          <i class="fas fa-hands-helping me-2"></i>Apadrinar
                      </button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Paciente 10 -->
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex">
          <div class="paciente-card w-100">
              <div class="paciente-img-container">
                  <img src="https://picsum.photos/id/110/400/400" alt="Alejandro Vargas" class="paciente-img">
              </div>
              <div class="paciente-body">
                  <div class="paciente-info">
                      <h3 class="h5 mb-3">Alejandro Vargas</h3>
                      <p class="text-muted">14 años. Visitas trimestrales a centro especializado.</p>
                  </div>
                  <div class="paciente-buttons">
                      <button class="btn btn-outline-primary btn-detalle" data-bs-toggle="modal" data-bs-target="#pacienteModal10">
                          Detalles
                      </button>
                      <button class="btn" data-bs-toggle="modal" data-bs-target="#apadrinarModal" data-paciente="Alejandro Vargas">
                          <i class="fas fa-hands-helping me-2"></i>Apadrinar
                      </button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Paciente 11 -->
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex">
          <div class="paciente-card w-100">
              <div class="paciente-img-container">
                  <img src="https://picsum.photos/id/111/400/400" alt="Camila Herrera" class="paciente-img">
              </div>
              <div class="paciente-body">
                  <div class="paciente-info">
                      <h3 class="h5 mb-3">Camila Herrera</h3>
                      <p class="text-muted">8 años. Nebulizador portátil.</p>
                  </div>
                  <div class="paciente-buttons">
                      <button class="btn btn-outline-primary btn-detalle" data-bs-toggle="modal" data-bs-target="#pacienteModal11">
                          Detalles
                      </button>
                      <button class="btn" data-bs-toggle="modal" data-bs-target="#apadrinarModal" data-paciente="Camila Herrera">
                          <i class="fas fa-hands-helping me-2"></i>Apadrinar
                      </button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Paciente 12 -->
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex">
          <div class="paciente-card w-100">
              <div class="paciente-img-container">
                  <img src="https://picsum.photos/id/112/400/400" alt="Juan Castro" class="paciente-img">
              </div>
              <div class="paciente-body">
                  <div class="paciente-info">
                      <h3 class="h5 mb-3">Juan Castro</h3>
                      <p class="text-muted">10 años. Medicación especializada.</p>
                  </div>
                  <div class="paciente-buttons">
                      <button class="btn btn-outline-primary btn-detalle" data-bs-toggle="modal" data-bs-target="#pacienteModal12">
                          Detalles
                      </button>
                      <button class="btn" data-bs-toggle="modal" data-bs-target="#apadrinarModal" data-paciente="Juan Castro">
                          <i class="fas fa-hands-helping me-2"></i>Apadrinar
                      </button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Paciente 13 -->
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex">
          <div class="paciente-card w-100">
              <div class="paciente-img-container">
                  <img src="https://picsum.photos/id/113/400/400" alt="Isabella Rojas" class="paciente-img">
              </div>
              <div class="paciente-body">
                  <div class="paciente-info">
                      <h3 class="h5 mb-3">Isabella Rojas</h3>
                      <p class="text-muted">6 años. Fisioterapia diaria intensiva.</p>
                  </div>
                  <div class="paciente-buttons">
                      <button class="btn btn-outline-primary btn-detalle" data-bs-toggle="modal" data-bs-target="#pacienteModal13">
                          Detalles
                      </button>
                      <button class="btn" data-bs-toggle="modal" data-bs-target="#apadrinarModal" data-paciente="Isabella Rojas">
                          <i class="fas fa-hands-helping me-2"></i>Apadrinar
                      </button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Paciente 14 -->
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex">
          <div class="paciente-card w-100">
              <div class="paciente-img-container">
                  <img src="https://picsum.photos/id/114/400/400" alt="Sebastián Méndez" class="paciente-img">
              </div>
              <div class="paciente-body">
                  <div class="paciente-info">
                      <h3 class="h5 mb-3">Sebastián Méndez</h3>
                      <p class="text-muted">9 años. Terapia de reemplazo enzimático.</p>
                  </div>
                  <div class="paciente-buttons">
                      <button class="btn btn-outline-primary btn-detalle" data-bs-toggle="modal" data-bs-target="#pacienteModal14">
                          Detalles
                      </button>
                      <button class="btn" data-bs-toggle="modal" data-bs-target="#apadrinarModal" data-paciente="Sebastián Méndez">
                          <i class="fas fa-hands-helping me-2"></i>Apadrinar
                      </button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Paciente 15 -->
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex">
          <div class="paciente-card w-100">
              <div class="paciente-img-container">
                  <img src="https://picsum.photos/id/115/400/400" alt="Martina Silva" class="paciente-img">
              </div>
              <div class="paciente-body">
                  <div class="paciente-info">
                      <h3 class="h5 mb-3">Martina Silva</h3>
                      <p class="text-muted">7 años. Antibióticos intravenosos periódicos.</p>
                  </div>
                  <div class="paciente-buttons">
                      <button class="btn btn-outline-primary btn-detalle" data-bs-toggle="modal" data-bs-target="#pacienteModal15">
                          Detalles
                      </button>
                      <button class="btn" data-bs-toggle="modal" data-bs-target="#apadrinarModal" data-paciente="Martina Silva">
                          <i class="fas fa-hands-helping me-2"></i>Apadrinar
                      </button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Paciente 16 -->
      <div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex">
          <div class="paciente-card w-100">
              <div class="paciente-img-container">
                  <img src="https://picsum.photos/id/116/400/400" alt="Diego Flores" class="paciente-img">
              </div>
              <div class="paciente-body">
                  <div class="paciente-info">
                      <h3 class="h5 mb-3">Diego Flores</h3>
                      <p class="text-muted">11 años. Trasplante pulmonar en evaluación.</p>
                  </div>
                  <div class="paciente-buttons">
                      <button class="btn btn-outline-primary btn-detalle" data-bs-toggle="modal" data-bs-target="#pacienteModal16">
                          Detalles
                      </button>
                      <button class="btn" data-bs-toggle="modal" data-bs-target="#apadrinarModal" data-paciente="Diego Flores">
                          <i class="fas fa-hands-helping me-2"></i>Apadrinar
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

<!-- Modal Detalles Paciente 1 -->
<div class="modal fade" id="pacienteModal1" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-white">
              <h5 class="modal-title">Historia Clínica</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-5 text-center">
                      <img src="https://picsum.photos/id/101/400/400" class="modal-paciente-img w-100 mb-3" alt="María González">
                      <h3 class="h4">María González</h3>
                      <p class="text-muted">8 años</p>
                  </div>
                  <div class="col-md-7">
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Diagnóstico</h4>
                          <p class="ps-3">Fibrosis Quística Clásica (F508del homocigoto)</p>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Tratamiento Actual</h4>
                          <ul class="ps-3">
                              <li>Fisioterapia respiratoria 3 veces al día</li>
                              <li>Enzimas pancreáticas con cada comida</li>
                              <li>Suplementos vitamínicos A, D, E, K</li>
                              <li>Dornasa alfa diaria</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Necesidades Específicas</h4>
                          <ul class="ps-3">
                              <li>Nebulizador portátil</li>
                              <li>Vest de terapia de percusión</li>
                              <li>Suplementos nutricionales especiales</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Historial Médico</h4>
                          <p class="ps-3">Diagnosticada a los 3 meses de edad. Dos hospitalizaciones por exacerbaciones pulmonares en el último año. Función pulmonar actual al 65%.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal Detalles Paciente 2 -->
<div class="modal fade" id="pacienteModal2" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-white">
              <h5 class="modal-title">Historia Clínica</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-5 text-center">
                      <img src="https://picsum.photos/id/102/400/400" class="modal-paciente-img w-100 mb-3" alt="Carlos Rodríguez">
                      <h3 class="h4">Carlos Rodríguez</h3>
                      <p class="text-muted">12 años</p>
                  </div>
                  <div class="col-md-7">
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Diagnóstico</h4>
                          <p class="ps-3">Fibrosis Quística con insuficiencia pancreática</p>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Tratamiento Actual</h4>
                          <ul class="ps-3">
                              <li>Enzimas pancreáticas con cada comida</li>
                              <li>Suplementos nutricionales hipercalóricos</li>
                              <li>Terapia con tobramicina inhalada</li>
                              <li>Control de glucosa cada 3 meses</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Necesidades Específicas</h4>
                          <ul class="ps-3">
                              <li>Glucómetro y tiras reactivas</li>
                              <li>Báscula de precisión para alimentos</li>
                              <li>Suplementos vitamínicos liposolubles</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Historial Médico</h4>
                          <p class="ps-3">Diagnosticado a los 2 años. Presenta diabetes relacionada con FQ desde los 9 años. Última hospitalización hace 8 meses por neumonía.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal Detalles Paciente 3 -->
<div class="modal fade" id="pacienteModal3" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-white">
              <h5 class="modal-title">Historia Clínica</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-5 text-center">
                      <img src="https://picsum.photos/id/103/400/400" class="modal-paciente-img w-100 mb-3" alt="Ana Martínez">
                      <h3 class="h4">Ana Martínez</h3>
                      <p class="text-muted">6 años</p>
                  </div>
                  <div class="col-md-7">
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Diagnóstico</h4>
                          <p class="ps-3">Fibrosis Quística con mutación G551D</p>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Tratamiento Actual</h4>
                          <ul class="ps-3">
                              <li>Ivacaftor (Kalydeco) 2 veces al día</li>
                              <li>Fisioterapia respiratoria matutina</li>
                              <li>Suplementos vitamínicos A, D, E, K</li>
                              <li>Control de función hepática mensual</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Necesidades Específicas</h4>
                          <ul class="ps-3">
                              <li>Dispositivo de inhalación especial</li>
                              <li>Monitorización de enzimas hepáticas</li>
                              <li>Suplementos nutricionales</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Historial Médico</h4>
                          <p class="ps-3">Diagnosticada mediante tamiz neonatal. Buen control actual con modulador CFTR. Última exacerbación pulmonar hace 14 meses.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal Detalles Paciente 4 -->
<div class="modal fade" id="pacienteModal4" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-white">
              <h5 class="modal-title">Historia Clínica</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-5 text-center">
                      <img src="https://picsum.photos/id/104/400/400" class="modal-paciente-img w-100 mb-3" alt="José López">
                      <h3 class="h4">José López</h3>
                      <p class="text-muted">10 años</p>
                  </div>
                  <div class="col-md-7">
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Diagnóstico</h4>
                          <p class="ps-3">Fibrosis Quística con afectación pulmonar severa</p>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Tratamiento Actual</h4>
                          <ul class="ps-3">
                              <li>Dornasa alfa diaria</li>
                              <li>Hipercapa matutina y nocturna</li>
                              <li>Antibióticos inhalados alternados</li>
                              <li>Oxigenoterapia nocturna</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Necesidades Específicas</h4>
                          <ul class="ps-3">
                              <li>Concentrador de oxígeno portátil</li>
                              <li>Vest de terapia de alta frecuencia</li>
                              <li>Nebulizador de última generación</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Historial Médico</h4>
                          <p class="ps-3">Diagnosticado a los 3 años. Tres hospitalizaciones en el último año por exacerbaciones. Función pulmonar actual al 45%.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal Detalles Paciente 5 -->
<div class="modal fade" id="pacienteModal5" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-white">
              <h5 class="modal-title">Historia Clínica</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-5 text-center">
                      <img src="https://picsum.photos/id/105/400/400" class="modal-paciente-img w-100 mb-3" alt="Laura Sánchez">
                      <h3 class="h4">Laura Sánchez</h3>
                      <p class="text-muted">9 años</p>
                  </div>
                  <div class="col-md-7">
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Diagnóstico</h4>
                          <p class="ps-3">Fibrosis Quística con colonización por Pseudomonas</p>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Tratamiento Actual</h4>
                          <ul class="ps-3">
                              <li>Antibióticos inhalados (Colistina)</li>
                              <li>Terapia combinada Lumacaftor/Ivacaftor</li>
                              <li>Fisioterapia respiratoria intensiva</li>
                              <li>Probióticos gastrointestinales</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Necesidades Específicas</h4>
                          <ul class="ps-3">
                              <li>Equipo de esterilización para nebulizador</li>
                              <li>Medicación antibiótica específica</li>
                              <li>Control microbiológico mensual</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Historial Médico</h4>
                          <p class="ps-3">Diagnosticada a los 18 meses. Colonización crónica por Pseudomonas aeruginosa. Última hospitalización hace 3 meses para tratamiento IV.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal Detalles Paciente 6 -->
<div class="modal fade" id="pacienteModal6" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-white">
              <h5 class="modal-title">Historia Clínica</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-5 text-center">
                      <img src="https://picsum.photos/id/106/400/400" class="modal-paciente-img w-100 mb-3" alt="Miguel Pérez">
                      <h3 class="h4">Miguel Pérez</h3>
                      <p class="text-muted">11 años</p>
                  </div>
                  <div class="col-md-7">
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Diagnóstico</h4>
                          <p class="ps-3">Fibrosis Quística con mutación W1282X</p>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Tratamiento Actual</h4>
                          <ul class="ps-3">
                              <li>Moduladores CFTR (Trikafta)</li>
                              <li>Enzimas pancreáticas de alta dosis</li>
                              <li>Terapia de ejercicio supervisada</li>
                              <li>Suplementos de ácidos grasos</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Necesidades Específicas</h4>
                          <ul class="ps-3">
                              <li>Bicicleta estática para terapia</li>
                              <li>Balón de reanimación portátil</li>
                              <li>Monitor de saturación continuo</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Historial Médico</h4>
                          <p class="ps-3">Diagnosticado a los 4 años. Mejoría significativa con moduladores. Función pulmonar mejoró de 60% a 85% en último año.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal Detalles Paciente 7 -->
<div class="modal fade" id="pacienteModal7" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-white">
              <h5 class="modal-title">Historia Clínica</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-5 text-center">
                      <img src="https://picsum.photos/id/107/400/400" class="modal-paciente-img w-100 mb-3" alt="Sofía Ramírez">
                      <h3 class="h4">Sofía Ramírez</h3>
                      <p class="text-muted">7 años</p>
                  </div>
                  <div class="col-md-7">
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Diagnóstico</h4>
                          <p class="ps-3">Fibrosis Quística con afectación hepática</p>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Tratamiento Actual</h4>
                          <ul class="ps-3">
                              <li>Ursodiol para protección hepática</li>
                              <li>Fisioterapia respiratoria modificada</li>
                              <li>Dieta hiperproteica controlada</li>
                              <li>Suplementos de vitamina K semanales</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Necesidades Específicas</h4>
                          <ul class="ps-3">
                              <li>Ecografías hepáticas trimestrales</li>
                              <li>Monitorización de coagulación</li>
                              <li>Equipo de nutrición enteral</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Historial Médico</h4>
                          <p class="ps-3">Diagnosticada a los 6 meses. Cirrosis biliar incipiente. Última endoscopia sin varices esofágicas. Enzimas hepáticas estables.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal Detalles Paciente 8 -->
<div class="modal fade" id="pacienteModal8" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-white">
              <h5 class="modal-title">Historia Clínica</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-5 text-center">
                      <img src="https://picsum.photos/id/108/400/400" class="modal-paciente-img w-100 mb-3" alt="Daniel Torres">
                      <h3 class="h4">Daniel Torres</h3>
                      <p class="text-muted">13 años</p>
                  </div>
                  <div class="col-md-7">
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Diagnóstico</h4>
                          <p class="ps-3">Fibrosis Quística con alergia múltiple a antibióticos</p>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Tratamiento Actual</h4>
                          <ul class="ps-3">
                              <li>Terapia fágica experimental</li>
                              <li>Inmunomoduladores</li>
                              <li>Fisioterapia con chaleco vibratorio</li>
                              <li>Probióticos específicos</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Necesidades Específicas</h4>
                          <ul class="ps-3">
                              <li>Equipo de terapia fágica</li>
                              <li>Medicación de soporte inmunológico</li>
                              <li>Pruebas de sensibilidad mensuales</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Historial Médico</h4>
                          <p class="ps-3">Diagnosticado a los 3 años. Alérgico a betalactámicos y aminoglucósidos. Última exacerbación controlada con terapia alternativa.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal Detalles Paciente 9 -->
<div class="modal fade" id="pacienteModal9" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-white">
              <h5 class="modal-title">Historia Clínica</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-5 text-center">
                      <img src="https://picsum.photos/id/109/400/400" class="modal-paciente-img w-100 mb-3" alt="Valentina Díaz">
                      <h3 class="h4">Valentina Díaz</h3>
                      <p class="text-muted">5 años</p>
                  </div>
                  <div class="col-md-7">
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Diagnóstico</h4>
                          <p class="ps-3">Fibrosis Quística con atelectasias recurrentes</p>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Tratamiento Actual</h4>
                          <ul class="ps-3">
                              <li>Hipercapa diaria</li>
                              <li>Broncodilatadores pre-fisioterapia</li>
                              <li>Drenaje postural guiado</li>
                              <li>Suplementos nutricionales</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Necesidades Específicas</h4>
                          <ul class="ps-3">
                              <li>Chaleco de percusión de última generación</li>
                              <li>Pulsiómetro pediátrico</li>
                              <li>Equipo de fisioterapia domiciliaria</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Historial Médico</h4>
                          <p class="ps-3">Diagnosticada a los 4 meses. Tres episodios de atelectasia en lóbulo superior derecho en el último año. Mejoría con tratamiento intensivo.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal Detalles Paciente 10 -->
<div class="modal fade" id="pacienteModal10" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-white">
              <h5 class="modal-title">Historia Clínica</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-5 text-center">
                      <img src="https://picsum.photos/id/110/400/400" class="modal-paciente-img w-100 mb-3" alt="Alejandro Vargas">
                      <h3 class="h4">Alejandro Vargas</h3>
                      <p class="text-muted">14 años</p>
                  </div>
                  <div class="col-md-7">
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Diagnóstico</h4>
                          <p class="ps-3">Fibrosis Quística en evaluación para trasplante</p>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Tratamiento Actual</h4>
                          <ul class="ps-3">
                              <li>Oxigenoterapia continua</li>
                              <li>Antibióticos intravenosos mensuales</li>
                              <li>Terapia nutricional parenteral</li>
                              <li>Preparación pre-trasplante</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Necesidades Específicas</h4>
                          <ul class="ps-3">
                              <li>Concentrador de oxígeno de alto flujo</li>
                              <li>Silla de ruedas para desplazamientos</li>
                              <li>Equipo de monitorización continua</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Historial Médico</h4>
                          <p class="ps-3">Diagnosticado a los 2 años. Función pulmonar actual al 28%. En lista de espera para trasplante bipulmonar desde hace 4 meses.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal Detalles Paciente 11 -->
<div class="modal fade" id="pacienteModal11" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-white">
              <h5 class="modal-title">Historia Clínica</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-5 text-center">
                      <img src="https://picsum.photos/id/111/400/400" class="modal-paciente-img w-100 mb-3" alt="Camila Herrera">
                      <h3 class="h4">Camila Herrera</h3>
                      <p class="text-muted">8 años</p>
                  </div>
                  <div class="col-md-7">
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Diagnóstico</h4>
                          <p class="ps-3">Fibrosis Quística con colonización por MRSA</p>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Tratamiento Actual</h4>
                          <ul class="ps-3">
                              <li>Linezolid inhalado</li>
                              <li>Descontaminación nasal con mupirocina</li>
                              <li>Aislamiento respiratorio en consultas</li>
                              <li>Refuerzo de medidas higiénicas</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Necesidades Específicas</h4>
                          <ul class="ps-3">
                              <li>Equipo de protección para cuidadores</li>
                              <li>Medicación antibiótica específica</li>
                              <li>Material desechable para fisioterapia</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Historial Médico</h4>
                          <p class="ps-3">Diagnosticada a los 5 meses. Colonización por MRSA detectada hace 1 año. Sin exacerbaciones en los últimos 6 meses gracias al protocolo de control.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal Detalles Paciente 12 -->
<div class="modal fade" id="pacienteModal12" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-white">
              <h5 class="modal-title">Historia Clínica</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-5 text-center">
                      <img src="https://picsum.photos/id/112/400/400" class="modal-paciente-img w-100 mb-3" alt="Juan Castro">
                      <h3 class="h4">Juan Castro</h3>
                      <p class="text-muted">10 años</p>
                  </div>
                  <div class="col-md-7">
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Diagnóstico</h4>
                          <p class="ps-3">Fibrosis Quística con pancreatitis recurrente</p>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Tratamiento Actual</h4>
                          <ul class="ps-3">
                              <li>Analgesia controlada</li>
                              <li>Enzimas pancreáticas de alta potencia</li>
                              <li>Dieta baja en grasas</li>
                              <li>Suplementos de antioxidantes</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Necesidades Específicas</h4>
                          <ul class="ps-3">
                              <li>Monitor de dolor pediátrico</li>
                              <li>Bomba de analgesia portátil</li>
                              <li>Equipo de nutrición parenteral</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Historial Médico</h4>
                          <p class="ps-3">Diagnosticado a los 3 años. Tres episodios de pancreatitis aguda en el último año. Control actual con dieta y medicación específica.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal Detalles Paciente 13 -->
<div class="modal fade" id="pacienteModal13" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-white">
              <h5 class="modal-title">Historia Clínica</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-5 text-center">
                      <img src="https://picsum.photos/id/113/400/400" class="modal-paciente-img w-100 mb-3" alt="Isabella Rojas">
                      <h3 class="h4">Isabella Rojas</h3>
                      <p class="text-muted">6 años</p>
                  </div>
                  <div class="col-md-7">
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Diagnóstico</h4>
                          <p class="ps-3">Fibrosis Quística con bronquiectasias tempranas</p>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Tratamiento Actual</h4>
                          <ul class="ps-3">
                              <li>Fisioterapia diaria intensiva</li>
                              <li>Hipercapa con broncodilatadores</li>
                              <li>Antibioterapia profiláctica</li>
                              <li>Inmunomoduladores</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Necesidades Específicas</h4>
                          <ul class="ps-3">
                              <li>Equipo de fisioterapia avanzada</li>
                              <li>Monitorización de función pulmonar</li>
                              <li>Dispositivos de drenaje postural</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Historial Médico</h4>
                          <p class="ps-3">Diagnosticada a los 4 meses. Bronquiectasias detectadas en TC a los 3 años. Programa de prevención de progresión con buenos resultados.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal Detalles Paciente 14 -->
<div class="modal fade" id="pacienteModal14" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-white">
              <h5 class="modal-title">Historia Clínica</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-5 text-center">
                      <img src="https://picsum.photos/id/114/400/400" class="modal-paciente-img w-100 mb-3" alt="Sebastián Méndez">
                      <h3 class="h4">Sebastián Méndez</h3>
                      <p class="text-muted">9 años</p>
                  </div>
                  <div class="col-md-7">
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Diagnóstico</h4>
                          <p class="ps-3">Fibrosis Quística con síndrome de pérdida de sal</p>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Tratamiento Actual</h4>
                          <ul class="ps-3">
                              <li>Suplementos de sodio y electrolitos</li>
                              <li>Monitorización hidroelectrolítica</li>
                              <li>Dieta hipercalórica rica en sal</li>
                              <li>Control de función renal</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Necesidades Específicas</h4>
                          <ul class="ps-3">
                              <li>Medidor portátil de electrolitos</li>
                              <li>Suplementos electrolíticos especiales</li>
                              <li>Equipo de rehidratación urgente</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Historial Médico</h4>
                          <p class="ps-3">Diagnosticado a los 2 meses por crisis de hiponatremia. Dos ingresos por deshidratación grave en el último año. Estable con tratamiento actual.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal Detalles Paciente 15 -->
<div class="modal fade" id="pacienteModal15" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-white">
              <h5 class="modal-title">Historia Clínica</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-5 text-center">
                      <img src="https://picsum.photos/id/115/400/400" class="modal-paciente-img w-100 mb-3" alt="Martina Silva">
                      <h3 class="h4">Martina Silva</h3>
                      <p class="text-muted">7 años</p>
                  </div>
                  <div class="col-md-7">
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Diagnóstico</h4>
                          <p class="ps-3">Fibrosis Quística con alergia broncopulmonar</p>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Tratamiento Actual</h4>
                          <ul class="ps-3">
                              <li>Corticoides inhalados</li>
                              <li>Antihistamínicos</li>
                              <li>Inmunoterapia específica</li>
                              <li>Control ambiental estricto</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Necesidades Específicas</h4>
                          <ul class="ps-3">
                              <li>Purificador de aire HEPA</li>
                              <li>Medicación antialérgica específica</li>
                              <li>Pruebas de alergia periódicas</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Historial Médico</h4>
                          <p class="ps-3">Diagnosticada a los 3 años. Reactividad bronquial severa a ácaros y hongos. Última crisis controlada con tratamiento combinado.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal Detalles Paciente 16 -->
<div class="modal fade" id="pacienteModal16" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-white">
              <h5 class="modal-title">Historia Clínica</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-5 text-center">
                      <img src="https://picsum.photos/id/116/400/400" class="modal-paciente-img w-100 mb-3" alt="Diego Flores">
                      <h3 class="h4">Diego Flores</h3>
                      <p class="text-muted">11 años</p>
                  </div>
                  <div class="col-md-7">
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Diagnóstico</h4>
                          <p class="ps-3">Fibrosis Quística en evaluación para trasplante</p>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Tratamiento Actual</h4>
                          <ul class="ps-3">
                              <li>Oxigenoterapia continua</li>
                              <li>Antibióticos intravenosos mensuales</li>
                              <li>Terapia nutricional parenteral</li>
                              <li>Preparación pre-trasplante</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Necesidades Específicas</h4>
                          <ul class="ps-3">
                              <li>Concentrador de oxígeno de alto flujo</li>
                              <li>Silla de ruedas para desplazamientos</li>
                              <li>Equipo de monitorización continua</li>
                          </ul>
                      </div>
                      <div class="mb-4">
                          <h4 class="h5" style="color: #cf3681;">Historial Médico</h4>
                          <p class="ps-3">Diagnosticado a los 2 años. Función pulmonar actual al 28%. En lista de espera para trasplante bipulmonar desde hace 4 meses.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal Apadrinar -->
<div class="modal fade" id="apadrinarModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-white">
              <h5 class="modal-title">Apadrinar a <span id="apadrinarNombrePaciente"></span></h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <form id="formApadrinar" class="form-apadrinamiento" action="https://formsubmit.co/705a130deea5a962c38bfa4a3c12b9d9" method="POST">
                  <input type="hidden" id="pacienteId">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="mb-3">
                              <label for="nombreApadrinador" class="form-label">Nombre Completo *</label>
                              <input type="text" class="form-control" id="nombreApadrinador" name="Nombre" required>
                          </div>
                          <div class="mb-3">
                              <label for="emailApadrinador" class="form-label">Correo Electrónico *</label>
                              <input type="email" class="form-control" id="emailApadrinador" name="email" required>
                          </div>
                          <div class="mb-3">
                              <label for="telefonoApadrinador" class="form-label">Teléfono</label>
                              <input type="tel" class="form-control" id="telefonoApadrinador" name="telefono" required>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="mb-3">
                              <label for="tipoApadrinamiento" class="form-label">Tipo de Apadrinamiento *</label>
                              <select class="form-select" id="tipoApadrinamiento" name="tipoApadrinamiento" required>
                                  <option value="">Seleccione...</option>
                                  <option value="mensual">Mensual</option>
                                  <option value="trimestral">Trimestral</option>
                                  <option value="anual">Anual</option>
                                  <option value="unico">Único</option>
                              </select>
                          </div>
                          <div class="mb-3">
                              <label for="montoApadrinamiento" class="form-label">Monto (USD) *</label>
                              <input type="number" class="form-control" id="montoApadrinamiento" min="10" name="montoApadrinamiento" required>
                          </div>
                          <div class="mb-3">
                              <label for="mensajeApadrinador" class="form-label">Mensaje (Opcional)</label>
                              <textarea class="form-control" id="mensajeApadrinador" rows="2" name="texto"></textarea>
                          </div>
                      </div>
                  </div>
                  <div class="form-check mb-3">
                      <input class="form-check-input" type="checkbox" id="aceptoTerminos" required>
                      <label class="form-check-label" for="aceptoTerminos">
                          Acepto los términos y condiciones *
                      </label>
                  </div>
              </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-success" id="btnEnviarApadrinamiento">Enviar Solicitud</button>
          </div>
      </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const apadrinarModal = document.getElementById('apadrinarModal');
  
  apadrinarModal.addEventListener('show.bs.modal', function(event) {
    const button = event.relatedTarget;
    const pacienteNombre = button.getAttribute('data-paciente');
    
    document.getElementById('pacienteId').value = pacienteNombre;
    document.getElementById('apadrinarNombrePaciente').textContent = pacienteNombre;
  });
});
document.getElementById('montoApadrinamiento').addEventListener('input', function(e) {
  const monto = parseFloat(this.value) || 0;
  
  if (monto < 10) {
    this.setCustomValidity('El monto mínimo es $10 USD');
    this.classList.add('is-invalid');
  } else {
    this.setCustomValidity('');
    this.classList.remove('is-invalid');
  }
});

document.getElementById('btnEnviarApadrinamiento').addEventListener('click', async function(e) {
  e.preventDefault();
  const form = document.getElementById('formApadrinar');
  
  if (form.checkValidity()) {
    try {
      const response = await fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        headers: { 'Accept': 'application/json' }
      });
      
      if (response.ok) {
        bootstrap.Modal.getInstance(document.getElementById('apadrinarModal')).hide();
        alert('✅ Solicitud enviada. ¡Gracias por tu apoyo!');
        form.reset();
      } else {
        throw new Error('Error en el servidor');
      }
    } catch (error) {
      alert('❌ Error al enviar. Por favor, inténtalo nuevamente.');
      console.error(error);
    }
  } else {
    form.reportValidity();
  }
});
</script>

<!-- Llamado del footer -->
<?php include __DIR__ . '/includes/footer.php'; ?>