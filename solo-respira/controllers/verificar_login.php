<?php
require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../lib/auth.php';session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $contrasena = $_POST['contrasena'];

    $stmt = $conexion->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($contrasena, $user['password'])) {
            $_SESSION['usuario'] = $user['username'];

            // Redirigir correctamente al index
            header("Location: ../public/views/index.php");
            exit();
        }
    }

    // Si no se verificó, redirige al login con error
    header("Location: ../public/views/InicioSesion.php?error=1");
    exit();
}
?>
