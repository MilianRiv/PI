<?php
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nombre'], $_POST['apellido_paterno'], $_POST['apellido_materno'], $_POST['fecha'], $_POST['telefono'], $_POST['codigo_postal'], $_POST['estado'], $_POST['ciudad'], $_POST['colonia'], $_POST['salario'], $_POST['sexo'])) {
        // Recibe los datos del formulario
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

        // Prepara la consulta SQL
        $sql = "INSERT INTO encargados (nombre, apellido_paterno, apellido_materno, fecha, telefono, codigo_postal, estado, ciudad, colonia, salario, sexo, correo_electronico) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Ejecuta la consulta
        $stmt = $bd->prepare($sql);
        $stmt->execute([$nombre, $apellido_paterno, $apellido_materno, $fecha, $telefono, $codigo_postal, $estado, $ciudad, $colonia, $salario, $sexo, $correo_electronico]);

        // Redirige con mensaje de éxito
        header("Location: personal.php?mensaje=registrado");
        exit();
    } else {
        // Redirige con mensaje de error si faltan datos
        header("Location: personal.php?mensaje=falta");
        exit();
    }
}
?>