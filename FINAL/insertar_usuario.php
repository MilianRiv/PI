<?php

// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "minisuper";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}
    // Recibir datos del formulario
    $nombre = $_POST["nombre"];
    $correo_electronico = $_POST["correo_electronico"];
    $contrasena = $_POST["contrasena"];
    // Agrega más variables según tu estructura de datos

    $sql = "INSERT INTO `usuarios` (`nombre`, `correo_electronico`, `contrasena`) 
            VALUES ('$nombre', '$correo_electronico', '$contrasena')";

if ($conn->query($sql) === TRUE) {
header('Location: usuarios.php?mensaje=registrado');
} else {
header('Location: usuarios.php?mensaje=error');
}

// Cerrar la conexión
$conn->close();
?>
