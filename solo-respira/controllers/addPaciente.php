<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
  header('Location: ../public/views/Apadrinamiento.php');
  exit;
}

require_once __DIR__ . '/../config/conexion.php';

// Carpeta uploads
$uploadDir = __DIR__ . '/../public/uploads/Pacientes/';
if (!is_dir($uploadDir)) {
  mkdir($uploadDir, 0755, true);
}

$nombre      = trim($_POST['nombre']);
$edad        = trim($_POST['edad']);
$descripcion = trim($_POST['descripcion']);
$modalId     = 'pacienteModal' . uniqid();

// Procesar imagen
$imgName = null;
if (!empty($_FILES['imagen']['name']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
  $ext     = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
  $imgName = uniqid() . ".$ext";
  move_uploaded_file(
    $_FILES['imagen']['tmp_name'],
    $uploadDir . $imgName
  );
}

// Insertar en BD
$stmt = $conexion->prepare("
  INSERT INTO apadrinados
    (nombre, edad, descripcion, imagen, modal_id)
  VALUES (?,?,?,?,?)
");
$stmt->bind_param("sssss", $nombre, $edad, $descripcion, $imgName, $modalId);
$stmt->execute();
$stmt->close();

header('Location: ../public/views/Apadrinamiento.php');
exit;