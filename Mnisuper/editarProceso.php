<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: panel_admin.php?mensaje=error');
    exit();
}

if (!isset($_POST['codigo_producto']) || !isset($_POST['txtNombre']) || !isset($_POST['txtDescripcion']) || !isset($_POST['txtPrecio'])) {
    header('Location: panel_admin.php?mensaje=error');
    exit();
}

include 'conexion.php';

$codigo_producto = $_POST['codigo_producto'];
$nombre = $_POST['txtNombre'];
$descripcion = $_POST['txtDescripcion'];
$precio = $_POST['txtPrecio'];

// Preparar la sentencia SQL para actualizar el producto
$sentencia = $bd->prepare("UPDATE productos SET nombre = ?, descripcion = ?, precio = ? WHERE codigo_producto = ?");

// Ejecutar la sentencia SQL con los valores proporcionados
$resultado = $sentencia->execute([$nombre, $descripcion, $precio, $codigo_producto]);

if ($resultado) {
    header('Location: panel_admin.php?mensaje=editado');
} else {
    header('Location: panel_admin.php?mensaje=error');
    exit();
}
?>
