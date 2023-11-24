<?php
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_encargado'])) {
    // Obtiene el ID del encargado a eliminar
    $id_encargado = $_GET['id_encargado'];

    // Consulta SQL para eliminar el encargado
    $sql = "DELETE FROM encargados WHERE id_encargado = ?";
    $stmt = $bd->prepare($sql);
    $stmt->execute([$id_encargado]);

    // Redirige con mensaje de éxito
    header("Location: personal.php?mensaje=eliminado");
    exit();
} else {
    // Redirige con mensaje de error si no se proporciona el ID
    header("Location: personal.php?mensaje=error");
    exit();
}
?>