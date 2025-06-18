<?php
include 'conexion.php';

// Consulta SQL
$sql = "SELECT nombre, email FROM usuarios";
$resultado = $conexion->query($sql);

// Convertir resultados a JSON
$datos = array();
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $datos[] = $fila;
    }
}

// Enviar JSON al frontend
header('Content-Type: application/json');
echo json_encode($datos);

$conexion->close();
?><?php
include 'conexion.php';

// Consulta SQL
$sql = "SELECT nombre, email FROM usuarios";
$resultado = $conexion->query($sql);

// Convertir resultados a JSON
$datos = array();
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $datos[] = $fila;
    }
}

// Enviar JSON al frontend
header('Content-Type: application/json');
echo json_encode($datos);

$conexion->close();
?>