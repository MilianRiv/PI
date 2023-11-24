<?php
session_start();
include_once "conexion.php";

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

// Mostrar la animación de carga
echo '
<!DOCTYPE html>
<html>
<head>
    <title>Verificando credenciales</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center">
                    <div class="spinner-border" role="status"><span class="sr-only">Cargando...</span></div>
                    <p>Verificando credenciales...</p>
                    <p>DREAM software solutions tiene las mejores opciones para tu aplicacion web.<p>
                </div>
            </div>
        </div>
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
