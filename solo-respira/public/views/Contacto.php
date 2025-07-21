<?php
session_start();
require_once __DIR__ . '/../../config/conexion.php';
?>

<!-- Llamado del header -->
<?php include __DIR__ . '/../../includes/header.php'; ?>


  <!-- Sección Hero -->
  <header class="hero-section" style="background-image: url('../assets/images/pexels-pixabay-236380.jpg'); position: relative;">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.042); z-index: 1;"></div>
    <div class="container-1" style="position: relative; z-index: 2;">
        <div class="box-info">
            <h1>CONTÁCTANOS</h1>
            <div class="data" style="text-align: left;">
                <p><i class="fas fa-map-marker-alt"></i> Maracay, Edo. Aragua, VE</p>
                <p><i class="fas fa-envelope"></i> fundacionsolorespira@gmail.com</p>
                <p><i class="fas fa-phone"></i> +58 414 460 3879</p>
            </div>
            <div class="links">
              <a
                href="https://www.facebook.com/fundacionsolorespira"
                target="_blank"
                rel="noopener noreferrer"
              >
                <i class="fab fa-facebook"></i>
              </a>
              <a
                href="https://www.instagram.com/fundacionsolorespira?igsh=MW4yN21qdnN6cDNxaA=="
                target="_blank"
                rel="noopener noreferrer"
              >
                <i class="fab fa-instagram"></i>
              </a>
              <a
                href="https://youtube.com/@fundacionsolorespira?si=zLKrvh6C0VIe-GPr"
                target="_blank"
                rel="noopener noreferrer"
              >
                <i class="fab fa-youtube"></i>
              </a>
              <a
                href="https://wa.me/qr/TFTPZVV5GDCWM1"
                target="_blank"
                rel="noopener noreferrer"
              >
                <i class="fab fa-whatsapp"></i>
              </a>

                <!-- Enlaces provisionales: X y LinkedIn--> 
                <!--
                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a> 
                -->

            </div>
        </div>
        <form action="https://formsubmit.co/705a130deea5a962c38bfa4a3c12b9d9" method="POST">
            <div class="input-box">
                <input type="text" name="name" required placeholder="Nombre y apellido">
                <!-- <i class="fas fa-user"></i> -->
            </div>
            <div class="input-box">
                <input type="email" required name="email" placeholder="Correo electrónico">
                <!-- <i class="fas fa-envelope"></i> -->
            </div>
            <div class="input-box">
                <input type="text" name="subject" placeholder="Asunto">
                <!-- <i class="fas fa-pen"></i> -->
            </div>
            <div class="input-box">
                <textarea name="comments" placeholder="Escribe tu mensaje..."></textarea>
            </div>
            <button type="submit">Enviar mensaje</button>

            <input type="hidden" name="_captcha" value="false">
        </form>
    </div>

    <!-- Modal de confirmación -->
<div class="modal fade" id="confirmacionModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fas fa-paper-plane me-2"></i> Mensaje enviado
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center py-4">
        <div class="mb-3">
          <i class="fas fa-check-circle text-success fa-4x"></i>
        </div>
        <h4 class="mb-2 text-dark">¡Gracias por contactarte con nosotros!</h4>
        <p class="mb-0 text-dark">Tendrás una respuesta lo más pronto posible.</p>
      </div>
      <div class="modal-footer justify-content-center border-0">
        <button type="button" class="btn btn-primary px-4" data-bs-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>
    <header class="hero-overlay"></header>
  </header>
  <!-- Fin Sección Hero -->
   
  <!-- Footer particular (por diferencias estructurales con respecto a otras páginas)-->
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
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.querySelector('form');
      
      form.addEventListener('submit', function(e) {
        e.preventDefault(); // Detenemos el envío temporalmente
        
        // Validación básica
        if (form.checkValidity()) {
          // Mostrar modal
          const modal = new bootstrap.Modal(document.getElementById('confirmacionModal'));
          modal.show();
          
          // Enviar formulario después de 3 segundos
          setTimeout(() => {
            form.submit(); 
          }, 3000);
          
          // Limpiar formulario
          form.reset();
        } else {
          form.reportValidity();
        }
      });
    });
  </script>
</body>
</html>