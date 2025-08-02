<?php
require_once __DIR__ . '/../lib/auth.php';
if (!isAdmin()) {
    http_response_code(403);
    echo json_encode(['success' => false, 'error' => 'No autorizado']);
    exit;
}

require_once __DIR__ . '/../config/conexion.php';
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL, "es_ES");

// Validación básica
$idEvento = isset($_POST['idEvento']) ? intval($_POST['idEvento']) : 0;
if ($idEvento <= 0) {
    echo json_encode(['success' => false, 'error' => 'ID no válido']);
    exit;
}

$evento        = ucwords(trim($_POST['evento']));
$f_inicio      = $_POST['fecha_inicio'];
$fecha_inicio  = date('Y-m-d', strtotime($f_inicio));
$f_fin         = $_POST['fecha_fin'];
$fecha_fin     = date('Y-m-d', strtotime($f_fin . ' +1 days'));
$color_evento  = $_POST['color_evento'];

$stmt = $conexion->prepare("UPDATE eventoscalendar 
                            SET evento = ?, fecha_inicio = ?, fecha_fin = ?, color_evento = ? 
                            WHERE id = ?");
$stmt->bind_param("ssssi", $evento, $fecha_inicio, $fecha_fin, $color_evento, $idEvento);
$success = $stmt->execute();

echo json_encode(['success' => $success]);
$stmt->close();
$conexion->close();
exit;
