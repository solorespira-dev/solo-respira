<?php
require_once __DIR__ . '/../lib/auth.php';

// Evitar redirección si se llama por AJAX
if (!isAdmin()) {
    http_response_code(403);
    echo json_encode(['success' => false, 'error' => 'No autorizado']);
    exit;
}

require_once __DIR__ . '/../config/conexion.php';

// Validar el ID
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

if ($id > 0) {
    $stmt = $conexion->prepare("DELETE FROM eventoscalendar WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Error al eliminar']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'ID no válido']);
}

$conexion->close();
exit;