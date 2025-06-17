<?php
$host = "sql303.infinityfree.com"; // cambia esto por tu hostname real
$base_datos = "if0_38704646_SoloRespiraDB";
$usuario = "if0_38704646";
$contraseña = "Solorespira123";

// Crear conexión
$conexion = new mysqli($host, $usuario, $contraseña, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Opcional: establecer el charset para evitar problemas con acentos
$conexion->set_charset("utf8");
?>