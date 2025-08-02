<?php
session_start();
header('Content-Type: application/json');

// Validación básica
if (!isset($_SESSION['usuario'])) {
  http_response_code(401);
  echo json_encode(['success'=>false,'msg'=>'Debes iniciar sesión']);
  exit;
}

require_once __DIR__ . '/../config/conexion.php';

$paciente = $_POST['paciente'] ?? '';
$monto    = floatval($_POST['monto']);

// Guardar la donación
$stmt = $conexion->prepare("
  INSERT INTO donaciones
    (usuario, paciente, monto, fecha)
  VALUES (?,?,?,NOW())
");
$stmt->bind_param("ssd", $_SESSION['usuario'], $paciente, $monto);
if ($stmt->execute()) {
  echo json_encode(['success'=>true]);
} else {
  http_response_code(500);
  echo json_encode([
    'success'=>false,
    'msg'=>'Error al registrar donación'
  ]);
}
$stmt->close();
?>