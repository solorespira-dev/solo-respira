<?php
require_once __DIR__ . '/../../lib/auth.php';
// redirectIfNotAdmin(); // Solo admin puede acceder

require_once __DIR__ . '/../../config/conexion.php';

// Configuración de idioma (opcional para fechas)
setlocale(LC_ALL, "es_ES");

// Recibir y limpiar datos
$evento       = ucwords(trim($_REQUEST['evento']));
$f_inicio     = $_REQUEST['fecha_inicio'];
$fecha_inicio = date('Y-m-d', strtotime($f_inicio));

$f_fin        = $_REQUEST['fecha_fin'];
$fecha_fin1   = strtotime(date('Y-m-d', strtotime($f_fin)) . " +1 days");
$fecha_fin    = date('Y-m-d', $fecha_fin1);

$color_evento = $_REQUEST['color_evento'];

// Inserción segura
$stmt = $conexion->prepare("INSERT INTO 
                            eventoscalendar
                            (evento, 
                            fecha_inicio, 
                            fecha_fin, 
                            color_evento) 
                            VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", 
                  $evento, 
                  $fecha_inicio, 
                  $fecha_fin, 
                  $color_evento);
$stmt->execute();
$stmt->close();

// Redirección
header("Location: Eventos.php?e=1");
exit();
