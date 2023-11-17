<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redireccionar si no se ha iniciado sesión
    exit();
}

include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id_proveedor"])) {
    // Obtener el ID del proveedor a eliminar
    $id_proveedor = $_GET["id_proveedor"];

    // Validar que el ID sea un número entero
    if (!filter_var($id_proveedor, FILTER_VALIDATE_INT)) {
        header("Location: proveedores.php?mensaje=error");
        exit();
    }

    // Eliminar el proveedor de la base de datos
    $stmt = $bd->prepare("DELETE FROM proveedor WHERE id_proveedor = :id_proveedor");
    $stmt->bindParam(':id_proveedor', $id_proveedor);

    if ($stmt->execute()) {
        header("Location: proveedores.php?mensaje=eliminado");
        exit();
    } else {
        header("Location: proveedores.php?mensaje=error");
        exit();
    }
} else {
    header("Location: proveedores.php");
    exit();
}
?>
