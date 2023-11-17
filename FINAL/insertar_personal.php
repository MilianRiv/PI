<?php
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nombre'], $_POST['apellido_paterno'], $_POST['apellido_materno'], $_POST['fecha'], $_POST['telefono'], $_POST['codigo_postal'], $_POST['estado'], $_POST['ciudad'], $_POST['colonia'], $_POST['salario'], $_FILES['imagen_personal'], $_POST['cargo'], $_POST['sexo'])) {
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
        $imagen_personal = $_FILES['imagen_personal']['name'];
        $cargo = $_POST['cargo'];
        $sexo = $_POST['sexo'];

        // Mueve el archivo cargado a la carpeta deseada
        move_uploaded_file($_FILES['imagen_personal']['tmp_name'], 'ruta/a/la/carpeta/' . $imagen_personal);

        // Prepara la consulta SQL
        $sql = "INSERT INTO personal (nombre, apellido_paterno, apellido_materno, fecha, telefono, codigo_postal, estado, ciudad, colonia, salario, imagen_personal, cargo, sexo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Ejecuta la consulta
        $stmt = $bd->prepare($sql);
        $stmt->execute([$nombre, $apellido_paterno, $apellido_materno, $fecha, $telefono, $codigo_postal, $estado, $ciudad, $colonia, $salario, $imagen_personal, $cargo, $sexo]);

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