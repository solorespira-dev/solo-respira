<?php
session_start();
require_once 'conexion.php';

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $contraseña = $_POST["contraseña"];

    $stmt = $conexion->prepare("SELECT id, nombre, contraseña, rol FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
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
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="text-center mb-4">
        <a href="index.php">
            <img src="images/LOGO SOLO RESPIRA.png" alt="Logo" style="max-height: 100px;">
        </a>
    </div>

    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-header text-center">
            <h4>Iniciar Sesión</h4>
        </div>
        <div class="card-body">
            <?php if ($mensaje): ?>
                <div class="alert alert-danger"><?= $mensaje ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>

                <div class="form-group">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" class="form-control" name="contraseña" id="contraseña" required>
                </div>

                <button type="submit" class="btn btn-personal btn-block">Iniciar sesión</button>
            </form>

            <div class="text-center mt-3">
                <p>¿No tienes una cuenta? <a href="registro.php">Regístrate</a></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
