<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redireccionar si no se ha iniciado sesión
    exit();
}

include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $marca = $_POST["marca"];
    // Puedes agregar más campos aquí según sea necesario

    // Validar los datos (puedes agregar más validaciones)
    if (empty($marca)) {
        header("Location: proveedores.php?mensaje=falta");
        exit();
    }

    // Insertar datos en la base de datos
    $stmt = $bd->prepare("INSERT INTO proveedor (marca) VALUES (:marca)");
    $stmt->bindParam(':marca', $marca);

    if ($stmt->execute()) {
        header("Location: proveedores.php?mensaje=registrado");
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
