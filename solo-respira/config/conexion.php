<?php
// Detecta si estás en localhost o en el hosting
if ($_SERVER['SERVER_NAME'] === 'localhost') {
    require_once __DIR__ . '/conexion.local.php';
} else {
    require_once __DIR__ . '/conexion.remoto.php';
}

// Conexión común para ambos entornos
$conexion = new mysqli($host, $usuario, $contraseña, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Charset para UTF-8 (tildes, ñ, etc.)
$conexion->set_charset("utf8");
?>
