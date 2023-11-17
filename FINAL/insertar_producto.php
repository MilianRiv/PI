<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "dream";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}

// Recibir los datos del formulario
$codigo_producto = $_POST['codigo_producto'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$existencia = $_POST['existencia'];
$precio = $_POST['precio'];
$id_categoria = $_POST['id_categoria'];

// Consulta SQL para insertar un nuevo producto
$sql = "INSERT INTO `productos` (`codigo_producto`, `nombre`, `descripcion`, `existencia`, `precio`, `id_categoria`) 
        VALUES ('$codigo_producto', '$nombre', '$descripcion', '$existencia', '$precio', '$id_categoria')";

if ($conn->query($sql) === TRUE) {
    header('Location: panel_admin.php?mensaje=registrado');
} else {
    header('Location: panel_admin.php?mensaje=error');
}

// Cerrar la conexión
$conn->close();
?>
