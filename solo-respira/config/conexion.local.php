<?php
// Configuración para entorno LOCAL (XAMPP)
$host = "localhost";
$usuario = "root";
$contraseña = ""; // Por defecto XAMPP no tiene contraseña
$base_datos = "if0_38704646_SoloRespiraDB"; // Cambiar al nombre de la base de datos si esta cambia

$conexion = new mysqli($host, $usuario, $contraseña, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");
?>