<?php
require_once __DIR__ . '/../lib/auth.php';
redirectIfNotAdmin(); // Solo los admins pueden eliminar

require_once __DIR__ . '/../config/conexion.php';

// Validar el ID
$id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;

if ($id > 0) {
    $stmt = $conexion->prepare("DELETE FROM eventoscalendar WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Redirección con mensaje
header("Location: ../public/views/Eventos.php?deleted=1");
exit();
