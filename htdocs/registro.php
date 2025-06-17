<?php
require_once 'conexion.php';

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $contraseña = password_hash($_POST["contraseña"], PASSWORD_DEFAULT);
    $rol = $_POST["rol"];

    // Verificar si el correo ya está registrado
    $stmt = $conexion->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $mensaje = "Este correo ya está registrado.";
    } else {
        $stmt->close();
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, contraseña, rol) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $email, $contraseña, $rol);

        if ($stmt->execute()) {
            header("Location: InicioSesion.php");
            exit;
        } else {
            $mensaje = "Error al registrar el usuario.";
        }
    }

    $stmt->close();
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Incluye tu CSS personalizado -->
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
            <h4>Crear Cuenta</h4>
        </div>
        <div class="card-body">
            <?php if ($mensaje): ?>
                <div class="alert alert-danger"><?= $mensaje ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="nombre">Nombre completo</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required>
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>

                <div class="form-group">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" class="form-control" name="contraseña" id="contraseña" required>
                </div>

                <div class="form-group">
                    <label for="rol">Tipo de usuario</label>
                    <select class="form-control" name="rol" id="rol" required>
                        <option value="miembro">Miembro</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-personal btn-block">Registrarse</button>
            </form>

            <div class="text-center mt-3">
                <p>¿Ya tienes una cuenta? <a href="InicioSesion.php">Inicia sesión</a></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
