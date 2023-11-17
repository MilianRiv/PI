<?php
include_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_categoria'])) {
    $id_categoria = $_GET['id_categoria'];

    // Verificar si la categoría tiene productos asociados
    $sentencia = $bd->prepare("SELECT * FROM productos WHERE id_categoria = ?");
    $sentencia->execute([$id_categoria]);
    $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);

    if (count($productos) > 0) {
        header('Location: categorias.php?mensaje=productos_asociados');
        exit();
    }

    // Eliminar la categoría con el ID proporcionado
    $sentencia = $bd->prepare("DELETE FROM categoria WHERE id_categoria = ?");
    $resultado = $sentencia->execute([$id_categoria]);

    if ($resultado) {
        header('Location: categorias.php?mensaje=eliminado');
        exit();
    } else {
        header('Location: categorias.php?mensaje=error');
        exit();
    }
} else {
    header('Location: categorias.php?mensaje=error');
    exit();
}
?>