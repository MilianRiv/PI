<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include_once "conexion.php";

// Obtener los datos del formulario
$id_usuario = $_POST['id_usuario'];
$nombre = $_POST['nombre'];
$correo_electronico = $_POST['correo_electronico'];
$contrasena = $_POST['contrasena'];

// Preparar la consulta SQL
$sql = "UPDATE usuarios SET nombre = ?, correo_electronico = ?, contrasena = ? WHERE id_usuario = ?";
$stmt = $bd->prepare($sql);

// Ejecutar la consulta
if ($stmt->execute([$nombre, $correo_electronico, $contrasena, $id_usuario])) {
    // Redirigir a usuarios.php con un mensaje de éxito
    header("Location: usuarios.php?mensaje=editado");
} else {
    // Redirigir a usuarios.php con un mensaje de error
    header("Location: usuarios.php?mensaje=error");
}
?>
