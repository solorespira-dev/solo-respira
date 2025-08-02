<?php
// validar_login.php
session_start();

// 1) Incluye la conexión y las funciones de auth
require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../lib/auth.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email      = trim($_POST['email']);
    $contrasena = $_POST['contrasena'];

    // 2) Selecciona de la tabla correcta y campos que necesitas
    $stmt = $conexion->prepare("
        SELECT id, nombre, email, rol, contraseña 
        FROM usuarios 
        WHERE email = ?
        LIMIT 1
    ");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // 3) Verifica existencia y contraseña
    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($contrasena, $user['contraseña'])) {
            // 4) Guarda en sesión el array completo que espera auth.php
            $_SESSION['usuario'] = [
                'id'     => $user['id'],
                'nombre' => $user['nombre'],
                'email'  => $user['email'],
                'rol'    => $user['rol'],       // 'admin' o 'miembro'
            ];

            // 5) Redirige a la vista protegida
            header("Location: ../public/views/dashboard.php");
            exit;
        }
    }

    // 6) Login fallido
    $_SESSION['error'] = "Credenciales incorrectas";
    header("Location: ../public/views/InicioSesion.php");
    exit;
}