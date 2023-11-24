<?php
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $marca = $_POST["marca"];
    $rfc = $_POST["rfc"];
    $nombre = $_POST["nombre"];
    $apellido_paterno = $_POST["apellido_paterno"];
    $apellido_materno = $_POST["apellido_materno"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo_electronico"];

    // Puedes agregar más campos aquí según sea necesario

    // Validar los datos (puedes agregar más validaciones)
    if (empty($marca)) {
        header("Location: proveedores.php?mensaje=falta");
        exit();
    }

    // Insertar datos en la base de datos
    $stmt = $bd->prepare("INSERT INTO proveedores (marca, rfc, nombre, apellido_paterno, apellido_materno, telefono, correo_electronico) VALUES (:marca, :rfc, :nombre, :apellido_paterno, :apellido_materno, :telefono, :correo)");
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':rfc', $rfc);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido_paterno', $apellido_paterno);
    $stmt->bindParam(':apellido_materno', $apellido_materno);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':correo', $correo);

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
