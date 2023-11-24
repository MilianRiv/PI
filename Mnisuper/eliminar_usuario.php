<?php
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id_usuario"])) {
    // Obtiene el ID del usuario a eliminar
    $id_usuario = $_GET["id_usuario"];

    // Eliminar usuario de la base de datos
    $stmt = $bd->prepare("DELETE FROM usuarios WHERE id_usuario = :id_usuario");
    $stmt->bindParam(':id_usuario', $id_usuario);

    try {
        $stmt->execute();
        header("Location: usuarios.php?mensaje=eliminado");
        exit();
    } catch (Exception $e) {
        echo "". $e->getMessage() ."";
        header("Location: usuarios.php?mensaje=error");
        exit();
    }
} else {
    header("Location: usuarios.php");
    exit();
}
?>
