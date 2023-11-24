<?php
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];

    if (empty($nombre)) {
        // Redirecciona con un mensaje de error si faltan campos
        header("Location: categorias.php?mensaje=falta");
        exit();
    } else {
        // Inserta la categoría en la base de datos
        $sentencia = $bd->prepare("INSERT INTO categorias (nombre) VALUES (?)");
        $resultado = $sentencia->execute([$nombre]);

        if ($resultado) {
            // Redirecciona con un mensaje de éxito si se inserta correctamente
            header("Location: categorias.php?mensaje=registrado");
        } else {
            // Redirecciona con un mensaje de error si hay un problema en la inserción
            header("Location: categorías.php?mensaje=error");
        }
    }
} else {
    // Redirecciona a la página de categorías si se intenta acceder directamente a este script
    header("Location: categorias.php");
}
?>
