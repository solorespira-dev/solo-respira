<?php
session_start();
require_once __DIR__ . '/../../config/conexion.php';
?>

<!-- Llamado del header -->
<?php include __DIR__ . '/../../includes/header.php'; ?>

<?php
if (isset($_GET['deleted'])) {
  $_SESSION['success'] = "Evento eliminado correctamente.";
}
if (isset($_GET['success'])) {
  $_SESSION['success'] = "Evento guardado correctamente.";
}
if (isset($_GET['error'])) {
  $_SESSION['error'] = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : 'Ocurrió un error inesperado.';
}

include __DIR__ . '/../../includes/alerts.php';
?>
 
  <?php
  require_once __DIR__ . '/../../config/conexion.php';

    $SqlEventos   = ("SELECT * FROM eventoscalendar");
    $resulEventos = mysqli_query($conexion, $SqlEventos);
  
  ?>
  <div class="mt-5"></div>
  
  <div class="container">
    <div class="row">
      <div class="col msjs">
        <?php
          include('msjs.php');
        ?>
      </div>
    </div>
  

  
  
  
  <div id="calendar"></div>
  
  <div class="row">
    <div class="col text-center mt-3 mb-3">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Nuevo Evento</button>
    </div>
  </div>
  </div>

  <?php  
    include('modalNuevoEvento.php');
    include('modalUpdateEvento.php');
  ?>


<script src ="../assets/js/jquery-3.0.0.min.js"> </script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/moment.min.js"></script>	
<script type="text/javascript" src="../assets/js/fullcalendar.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/es.js'></script>

<script type="text/javascript">
$(document).ready(function() {
  $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,agendaDay"
    },

    locale: 'es',

    defaultView: "month",
    navLinks: true, 
    editable: true,
    eventLimit: true, 
    selectable: true,
    selectHelper: false,

//Nuevo Evento
  select: function(start, end){
      $("#exampleModal").modal();
      $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));
       
      var valorFechaFin = end.format("DD-MM-YYYY");
      var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
      $('input[name=fecha_fin').val(F_final);  

    },
      
    events: [
      <?php
       while($dataEvento = mysqli_fetch_array($resulEventos)){ ?>
        {
          _id: '<?php echo $dataEvento['id']; ?>',
          title: '<?php echo $dataEvento['evento']; ?>',
          start: '<?php echo $dataEvento['fecha_inicio']; ?>',
          end:   '<?php echo $dataEvento['fecha_fin']; ?>',
          color: '<?php echo $dataEvento['color_evento']; ?>'
        },
        <?php } ?>
    ],


//Eliminar Evento
eventRender: function(event, element) {
    element
      .find(".fc-content")
      .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");
    
    //Eliminar evento
    element.find(".closeon").on("click", function() {

  var pregunta = confirm("Deseas Borrar este Evento?");   
  if (pregunta) {

    $("#calendar").fullCalendar("removeEvents", event._id);

     $.ajax({
            type: "POST",
            url: '../../controllers/deleteEvento.php',
            data: {id:event._id},
            success: function(datos)
            {
              $(".alert-danger").show();

              setTimeout(function () {
                $(".alert-danger").slideUp(500);
              }, 3000); 

            }
        });
      }
    });
  },


//Moviendo Evento Drag - Drop
eventDrop: function (event, delta) {
  var idEvento = event._id;
  var start = (event.start.format('DD-MM-YYYY'));
  var end = (event.end.format("DD-MM-YYYY"));

    $.ajax({
        type: "POST",
        url: '../../controllers/deleteEvento.php',
        data: { id: event._id },
        success: function(response) {
            try {
                const res = typeof response === "string" ? JSON.parse(response) : response;
                if (res.success) {
                    alert("Evento eliminado correctamente.");
                } else {
                    alert("Error al eliminar: " + res.error);
                }
            } catch (e) {
                console.error("Error al interpretar la respuesta:", e);
                alert("Respuesta inesperada del servidor.");
            }
        },
        error: function(xhr) {
            alert("Error en la solicitud: " + xhr.statusText);
        }
    });
},

//Modificar Evento del Calendario 
eventClick:function(event){
    var idEvento = event._id;
    $('input[name=idEvento').val(idEvento);
    $('input[name=evento').val(event.title);
    $('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY'));
    $('input[name=fecha_fin').val(event.end.format("DD-MM-YYYY"));

    $("#modalUpdateEvento").modal();
  },


  });


//Oculta mensajes de Notificacion
  setTimeout(function () {
    $(".alert").slideUp(300);
  }, 3000); 


});

</script>

<!-- Llamado del footer -->
<?php include __DIR__ . '/../../includes/footer.php'; ?>