<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include_once "conexion.php";

// Obtener los datos del formulario
$id_categoria = $_POST['id_categoria'];
$nombre = $_POST['nombre'];

// Actualizar la categoría en la base de datos
$sentencia = $bd->prepare("UPDATE categorias SET nombre = ? WHERE id_categoria = ?");
$resultado = $sentencia->execute([$nombre, $id_categoria]);

if ($resultado === true) {
    // Redirigir con un mensaje de éxito
    header("Location: categorias.php?mensaje=editado");
} else {
    // Redirigir con un mensaje de error
    header("Location: categorias.php?mensaje=error");
}
?>