<?php
session_start();
include_once "conexion.php";

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

// Mostrar la animación de carga
echo '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificando credenciales</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #E1E9FA; /* Cambia este color de fondo según tus preferencias */
        }

        .loading-container {
            text-align: center;
            margin-top: 20%;
        }

        .loading-message {
            font-size: 24px;
            margin-top: 20px;
        }

        .loading-text {
            font-size: 18px;
            color: #6c757d; /* Cambia este color de texto según tus preferencias */
        }
    </style>
</head>
<body>
    <div class="container loading-container">
        <div class="spinner-border text-primary" role="status"></div>
        <p class="loading-message">Verificando credenciales...</p>
        <p class="loading-text">DREAM software solutions tiene las mejores opciones para tu aplicación web.</p>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Agregar una redirección después de un breve retraso
        setTimeout(function () {
            window.location.href = "panel_admin.php";
        }, 1100); // Cambia este valor para ajustar la duración de la animación
    </script>
</body>
</html>
';

// Consulta SQL para verificar las credenciales del administrador
$consulta = $bd->prepare("SELECT * FROM usuarios WHERE nombre = ? AND contrasena = ?");
$consulta->execute([$usuario, $contraseña]);

if ($consulta->rowCount() == 1) {
    $_SESSION['admin'] = true;
}
?>
