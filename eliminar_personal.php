<?php
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_persona'])) {
    // Obtiene el ID de la persona a eliminar
    $id_persona = $_GET['id_persona'];

    // Consulta SQL para eliminar la persona
    $sql = "DELETE FROM personal WHERE id_persona = ?";
    $stmt = $bd->prepare($sql);
    $stmt->execute([$id_persona]);

    // Redirige con mensaje de éxito
    header("Location: personal.php?mensaje=eliminado");
    exit();
} else {
    // Redirige con mensaje de error si no se proporciona el ID
    header("Location: personal.php?mensaje=error");
    exit();
}
?>