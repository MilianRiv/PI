<?php 
    if(!isset($_GET['codigo_producto'])){
        header('Location: panel_admin.php?mensaje=error');
        exit();
    }

    include 'conexion.php';
    $codigo_producto = $_GET['codigo_producto'];

    $sentencia = $bd->prepare("DELETE FROM productos where codigo_producto = ?;");
    $resultado = $sentencia->execute([$codigo_producto]);

    if ($resultado === TRUE) {
        header('Location: panel_admin.php?mensaje=eliminado');
    } else {
        header('Location: panel_admin.php?mensaje=error');
    }
    
?>