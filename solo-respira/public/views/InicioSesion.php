<?php
session_start();
require_once __DIR__ . '/../../lib/auth.php';
require_once __DIR__ . '/../../config/conexion.php';

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
    $contraseña = $_POST["contraseña"];

    if ($email && !empty($contraseña)) {
        $stmt = $conexion->prepare("SELECT id, nombre, contraseña, rol FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado && $resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();

            if (password_verify($contraseña, $usuario["contraseña"])) {
                $_SESSION["id"] = $usuario["id"];
                $_SESSION["nombre"] = $usuario["nombre"];
                $_SESSION["email"] = $email;
                $_SESSION["rol"] = $usuario["rol"];

                header("Location: index.php");
                exit;
            } else {
                $mensaje = "Contraseña incorrecta.";
            }
        } else {
            $mensaje = "No se encontró una cuenta con ese correo.";
        }

        $stmt->close();
    } else {
        $mensaje = "Debes completar todos los campos correctamente.";
    }

    $conexion->close();
}
?>

<?php include __DIR__ . '/../../includes/header.php'; ?>

<div class="container mt-5">
    <div class="text-center mb-4">
        <a href="index.php">
            <img src="../assets/images/LOGO SOLO RESPIRA.png" alt="Logo" style="max-height: 100px;">
        </a>
    </div>

    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-header text-center">
            <h4>Iniciar Sesión</h4>
        </div>
        <div class="card-body">
            <?php if ($mensaje): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($mensaje) ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-

