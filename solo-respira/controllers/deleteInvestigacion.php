<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
  http_response_code(403);
  exit('No autorizado');
}

require_once __DIR__ . '/../config/conexion.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if ($id) {
  $stmt = $conexion->prepare("DELETE FROM investigaciones WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $stmt->close();
}

header('Location: ../public/views/Investigaciones.php?deleted=1');
exit;