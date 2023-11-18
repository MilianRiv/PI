<?php
include_once "conexion.php";

$sentencia = $bd->query("SELECT * FROM productos");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ver Registros</title>
</head>
<body>
    <h2>Registros</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <!-- Agrega más encabezados según tus necesidades -->
        </tr>
        <?php foreach ($productos as $producto) { ?>
            <tr>
                <td><?php echo $producto->nombre; ?></td>
                <td><?php echo $producto->descripcion; ?></td>
                <td><?php echo $producto->precio; ?></td>
                <!-- Agrega más celdas según tus necesidades -->
            </tr>
        <?php } ?>
    </table>
</body>
</html>
