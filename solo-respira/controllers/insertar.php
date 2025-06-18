<?php
require_once __DIR__ . '/../config/conexion.php';

// Verificar que los datos llegaron por POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST['nombre']);
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);

    if (!empty($nombre) && $email) {
        // Preparar consulta segura
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $nombre, $email);

        if ($stmt->execute()) {
            $mensaje = "Datos insertados correctamente.";
        } else {
            $mensaje = "Error al insertar datos: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $mensaje = "Datos incompletos o inválidos.";
    }

    $conexion->close();

    // Redirigir con mensaje por GET (opcional)
    header("Location: ../public/views/index.php?mensaje=" . urlencode($mensaje));
    exit;
} else {
    // Si alguien accede por GET, lo rediriges
    header("Location: ../public/views/index.php");
    exit;
}
