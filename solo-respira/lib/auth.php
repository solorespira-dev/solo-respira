<?php
// Iniciar sesión solo si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config/conexion.php';

// Registro de usuario
if (isset($_POST['register'])) {
    $nombre = trim($_POST['name']);
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Las contraseñas no coinciden";
        header("Location: ../public/views/registro.php");
        exit();
    }

    // Verificar si el correo ya existe
    $stmt = $conexion->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error'] = "El correo ya está registrado";
        header("Location: ../public/views/registro.php");
        exit();
    }

    $stmt->close();

    // Hash y registro
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, contraseña, rol) VALUES (?, ?, ?, 'miembro')");
    $stmt->bind_param("sss", $nombre, $email, $hash);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Registro exitoso. Ahora puedes iniciar sesión.";
        header("Location: ../public/views/InicioSesion.php");
    } else {
        $_SESSION['error'] = "Error al registrar el usuario";
        header("Location: ../public/views/registro.php");
    }

    $stmt->close();
    exit();
}

// Inicio de sesión
if (isset($_POST['login'])) {
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado && $resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($password, $usuario['contraseña'])) {
            $_SESSION['usuario'] = [
                'id' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'email' => $usuario['email'],
                'rol' => $usuario['rol']
            ];
            header("Location: ../public/views/dashboard.php");
            exit();
        }
    }

    $_SESSION['error'] = "Credenciales incorrectas";
    header("Location: ../public/views/InicioSesion.php");
    exit();
}

// Cierre de sesión
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../public/views/index.php");
    exit();
}
