<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include_once "conexion.php";

// Obtener los datos del formulario
$id_encargado = $_POST['id_encargado'];
$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$fecha = $_POST['fecha'];
$telefono = $_POST['telefono'];
$codigo_postal = $_POST['codigo_postal'];
$estado = $_POST['estado'];
$ciudad = $_POST['ciudad'];
$colonia = $_POST['colonia'];
$salario = $_POST['salario'];
$sexo = $_POST['sexo'];
$correo_electronico = $_POST['correo_electronico'];

// Preparar la consulta SQL
$sql = "UPDATE encargados SET nombre = ?, apellido_paterno = ?, apellido_materno = ?, fecha = ?, telefono = ?, codigo_postal = ?, estado = ?, ciudad = ?, colonia = ?, salario = ?, sexo = ?, correo_electronico = ? WHERE id_encargado = ?";
$stmt = $bd->prepare($sql);

// Ejecutar la consulta
$params = [$nombre, $apellido_paterno, $apellido_materno, $fecha, $telefono, $codigo_postal, $estado, $ciudad, $colonia, $salario, $sexo, $correo_electronico, $id_encargado];
if ($stmt->execute($params)) {
    // Redirigir a personal.php con un mensaje de éxito
    header("Location: personal.php?mensaje=editado");
} else {
    // Redirigir a personal.php con un mensaje de error
    header("Location: personal.php?mensaje=error");
}
?>