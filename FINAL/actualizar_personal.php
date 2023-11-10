<?php
include 'header.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include_once "conexion.php";

// Obtener los datos del formulario
$id_persona = $_POST['id_persona'];
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
$imagen_personal = $_FILES['imagen_personal']['name'];
$cargo = $_POST['cargo'];
$sexo = $_POST['sexo'];

// Subir la imagen
$directorio = "imagenes/";
$archivo = $directorio . basename($_FILES["imagen_personal"]["name"]);
move_uploaded_file($_FILES["imagen_personal"]["tmp_name"], $archivo);

// Preparar la consulta SQL
$sql = "UPDATE personal SET nombre = ?, apellido_paterno = ?, apellido_materno = ?, fecha = ?, telefono = ?, codigo_postal = ?, estado = ?, ciudad = ?, colonia = ?, salario = ?, imagen_personal = ?, cargo = ?, sexo = ? WHERE id_persona = ?";
$stmt = $bd->prepare($sql);

// Ejecutar la consulta
if ($stmt->execute([$nombre, $apellido_paterno, $apellido_materno, $fecha, $telefono, $codigo_postal, $estado, $ciudad, $colonia, $salario, $imagen_personal, $cargo, $sexo, $id_persona])) {
    // Redirigir a personal.php con un mensaje de éxito
    header("Location: personal.php?mensaje=editado");
} else {
    // Redirigir a personal.php con un mensaje de error
    header("Location: personal.php?mensaje=error");
}