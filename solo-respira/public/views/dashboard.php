<?php
require_once __DIR__ . '/../../lib/auth.php'; // Esto inicia sesión y carga funciones
redirectIfNotLoggedIn(); // Redirige si no hay sesión

// Conexión
require_once __DIR__ . '/../../config/conexion.php';

// Mostrar errores (solo para pruebas)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!$conexion) {
    die("Error al conectar con la base de datos.");
}

// Obtener datos del usuario autenticado
$email = $_SESSION['usuario']['email'];
$nombre = $_SESSION['usuario']['nombre'];

// Obtener ID del usuario
$queryUsuario = $conexion->prepare("SELECT id FROM usuarios WHERE email = ?");
$queryUsuario->bind_param("s", $email);
$queryUsuario->execute();
$resultUsuario = $queryUsuario->get_result();
$rowUsuario = $resultUsuario->fetch_assoc();
$userId = $rowUsuario['id'];

// Total donado por el usuario
$queryDonaciones = $conexion->prepare("SELECT SUM(monto) AS total FROM donaciones WHERE id = ?");
$queryDonaciones->bind_param("i", $userId);
$queryDonaciones->execute();
$resultDonaciones = $queryDonaciones->get_result();
$rowDonaciones = $resultDonaciones->fetch_assoc();
$totalDonado = $rowDonaciones['total'] ?? 0;

// Obtener próximo evento (si se desea)
$evento = null; // Aquí se puede agregar lógica

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Solo Respira</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }
        .sidebar {
            width: 250px;
            background-color: #1c1e21;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }
        .sidebar img {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            width: 100%;
            padding: 10px 20px;
            display: flex;
            align-items: center;
        }
        .sidebar a:hover {
            background-color: #343a40;
        }
        .sidebar i {
            margin-right: 10px;
        }
        .sidebar .logout {
            margin-top: auto;
            color: #e74c3c;
        }
        .content {
            flex-grow: 1;
            padding: 30px;
            background-color: #f8f9fa;
        }
        .card-icon {
            font-size: 1.5rem;
            background: #800080;
            color: white;
            padding: 10px;
            border-radius: 50%;
        }
        .card-title {
            font-weight: bold;
        }
        .card-box {
            border-left: 5px solid #800080;
        }
        .section-title {
            background-color: #800080;
            color: white;
            padding: 10px;
            font-weight: bold;
            border-radius: 5px 5px 0 0;
        }
        .message-section, .events-section {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin-top: 20px;
            background: white;
        }
        .btn-purple {
            background-color: #800080;
            color: white;
        }
        .btn-purple:hover {
            background-color: #6a006a;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <a href="index.php">
        <img src="images/LOGO SOLO RESPIRA.png" alt="Logo Solo Respira">
    </a>
    <a href="#"><i class="bi bi-speedometer2"></i> Dashboard</a>
    <a href="msjs.php"><i class="bi bi-envelope"></i> Mensajes</a>
    <a href="#"><i class="bi bi-cash-stack"></i> Mis Donaciones</a>
    <a href="#"><i class="bi bi-calendar-event"></i> Eventos</a>
    <a href="#"><i class="bi bi-people"></i> Mis Apadrinados</a>
    <a href="logout.php" class="logout"><i class="bi bi-box-arrow-left"></i> Cerrar Sesión</a>
</div>

<div class="content">
    <h2 class="text-primary">Bienvenido, <?php echo htmlspecialchars($nombre); ?>.</h2>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card card-box">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="card-title text-muted">Total Donado</div>
                            <h4>$<?php echo number_format($totalDonado, 2); ?></h4>
                        </div>
                        <div class="card-icon"><i class="bi bi-currency-dollar"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-box">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="card-title text-muted">Personas Ayudadas</div>
                            <h4>0</h4>
                            <small class="text-success">↑ datos pendientes</small>
                        </div>
                        <div class="card-icon"><i class="bi bi-people-fill"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-box">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="card-title text-muted">Próximo Evento</div>
                            <?php if ($evento): ?>
                                <h4><?php echo date('d M', strtotime($evento['fecha'])); ?></h4>
                                <small><?php echo htmlspecialchars($evento['nombre']); ?></small>
                            <?php else: ?>
                                <h4>---</h4>
                                <small>Sin eventos próximos</small>
                            <?php endif; ?>
                        </div>
                        <div class="card-icon"><i class="bi bi-calendar-check"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mensajes recientes -->
    <div class="row">
        <div class="col-md-6">
            <div class="message-section">
                <div class="section-title"><i class="bi bi-envelope-fill"></i> Últimos Mensajes</div>
                <div class="p-3">
                    <?php if ($resultMensajes->num_rows > 0): ?>
                        <ul class="list-group">
                            <?php while ($msg = $resultMensajes->fetch_assoc()): ?>
                                <li class="list-group-item">
                                    <strong><?php echo htmlspecialchars($msg['remitente']); ?>:</strong>
                                    <?php echo htmlspecialchars($msg['mensaje']); ?><br>
                                    <small class="text-muted"><?php echo $msg['fecha']; ?></small>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                        <a href="msjs.php" class="btn btn-purple mt-2">Ver todos los mensajes</a>
                    <?php else: ?>
                        <p>No tienes mensajes nuevos.</p>
                        <a href="msjs.php" class="btn btn-purple">Ir a mensajes</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="events-section">
                <div class="section-title"><i class="bi bi-bar-chart-fill"></i> Estadísticas (próximamente)</div>
                <div class="p-3">
                    <p>Sección en construcción.</p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
