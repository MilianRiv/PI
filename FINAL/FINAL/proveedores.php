<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'header.php';
include_once "conexion.php";

// Obtener datos de proveedores
$sentencia = $bd->query("SELECT * FROM proveedor");
$proveedores = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- Inicio de alertas -->
            <?php if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') { ?>
                <div class="alert alert-warning" role="alert">
                    Falta información en el formulario.
                </div>
            <?php } ?>

            <?php if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') { ?>
                <div class="alert alert-success" role="alert">
                    El proveedor ha sido registrado exitosamente.
                </div>
            <?php } ?>

            <?php if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') { ?>
                <div class="alert alert-danger" role="alert">
                    Hubo un error al procesar tu solicitud.
                </div>
            <?php } ?>

            <?php if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') { ?>
                <div class="alert alert-info" role="alert">
                    El proveedor ha sido editado exitosamente.
                </div>
            <?php } ?>

            <?php if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') { ?>
                <div class="alert alert-warning" role="alert">
                    El proveedor ha sido eliminado.
                </div>
            <?php } ?>
            <!-- Fin de alertas -->

            <div class="card rounded-3 shadow-lg">
                <div class="card-header">
                    Lista de Proveedores
                </div>
                <div class="p-4">
                    <!-- Tabla desplazable -->
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle" id="tabla-proveedores">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Marca</th>
                                    <!-- Agrega más columnas según tu estructura de datos -->
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($proveedores as $proveedor) { ?>
                                    <tr>
                                        <td scope="row"><?php echo $proveedor->id_proveedor; ?></td>
                                        <td><?php echo $proveedor->marca; ?></td>
                                        <td>
                                            <a class="text-success" href="editar_proveedor.php?id_proveedor=<?php echo $proveedor->id_proveedor; ?>"><i class="bi bi-pencil-square"></i></a>
                                            <a onclick="return confirm('¿Estás seguro de eliminar?');" class="text-danger" href="eliminar_proveedor.php?id_proveedor=<?php echo $proveedor->id_proveedor; ?>"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulario para agregar proveedor en la columna de la derecha -->
        <div class="col-md-4">
            <div class="card rounded-3 shadow-lg">
                <div class="card-header">
                    Agregar Proveedor
                </div>
                <div class="p-4">
                    <form action="insertar_proveedor.php" method="post">
                        <div class="mb-3">
                            <label for="marca" class="form-label">Marca:</label>
                            <input type="text" class="form-control" id="marca" name="marca" required>
                        </div>
                        <!-- Agrega más campos según tu estructura de datos -->

                        <button type="submit" class="btn btn-primary">Agregar Proveedor</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTables jQuery initialization -->
<script>
    $(document).ready(function () {
        // Inicializar DataTables en la tabla
        var table = $('#tabla-proveedores').DataTable({
            paging: false,
            searching: false
        });
    });
</script>

<?php include 'footer.php'; ?>
