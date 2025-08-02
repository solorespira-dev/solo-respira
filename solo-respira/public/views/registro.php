<?php
session_start();
require_once __DIR__ . '/../../config/conexion.php';

$mensaje = '';

// Si el usuario ya está logueado, lo redirigimos o destruimos la sesión según el flujo deseado
if (isset($_SESSION['usuario'])) {
    session_destroy(); // O redirigir: header("Location: dashboard.php"); exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"]);
    $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
    $contraseñaPlano = $_POST["contraseña"];
    $rol = isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] === 'admin'
        ? $_POST["rol"]
        : 'miembro';

    if ($email && !empty($nombre) && !empty($contraseñaPlano)) {
        $stmt = $conexion->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $mensaje = "Este correo ya está registrado.";
        } else {
            $stmt->close();

            $hash = password_hash($contraseñaPlano, PASSWORD_DEFAULT);
            $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, contraseña, rol) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nombre, $email, $hash, $rol);

            if ($stmt->execute()) {
                header("Location: InicioSesion.php?registrado=1");
                exit;
            } else {
                $mensaje = "Error al registrar el usuario.";
            }
        }

        $stmt->close();
        $conexion->close();
    } else {
        $mensaje = "Debes completar todos los campos correctamente.";
    }
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
            <h4>Crear Cuenta</h4>
        </div>
        <div class="card-body">
            <?php if ($mensaje): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($mensaje) ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group mb-3">
                    <label for="nombre">Nombre completo</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>

                <div class="form-group mb-3">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" class="form-control" name="contraseña" id="contraseña" required>
                </div>

                <!-- Campo de rol solo visible si un admin está logueado -->
                <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] === 'admin'): ?>
                    <div class="form-group mb-3">
                        <label for="rol">Tipo de usuario</label>
                        <select class="form-control" name="rol" id="rol" required>
                            <option value="miembro">Miembro</option>
                            <option value="admin">Administrador</option>
                        </select>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="rol" value="miembro">
                <?php endif; ?>

                <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
            </form>

            <div class="text-center mt-3">
                <p>¿Ya tienes una cuenta? <a href="InicioSesion.php">Inicia sesión</a></p>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>


