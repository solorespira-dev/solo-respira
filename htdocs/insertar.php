<?php
include 'conexion.php';

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];

// Preparar y ejecutar consulta SQL
$sql = "INSERT INTO usuarios (nombre, email) VALUES ('$nombre', '$email')";

if ($conexion->query($sql)) {
    $message = "Datos insertados correctamente.";
} else {
    $message = "Error: " . $conexion->error;
}

$conexion->close();

// Redirigir de vuelta al formulario
header("Location: ../../index.php");
exit;

?>