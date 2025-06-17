<?php
include("conexion.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $stmt = $conexion->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($contrasena, $user['password'])) {
            $_SESSION['usuario'] = $user['username'];
            header("Location: index.php");
            exit();
        } else {
            header("Location: InicioSesion.php?error=1");
            exit();
        }
    } else {
        header("Location: InicioSesion.php?error=1");
        exit();
    }
}
?>
