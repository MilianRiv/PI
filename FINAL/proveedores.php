<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'header.php';
include_once "conexion.php";

// Obtener datos de proveedores
$sentencia = $bd->query("SELECT * FROM proveedores");
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
                                    <th scope="col">RFC</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido paterno</th>
                                    <th scope="col">Apellido materno</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Correo</th>
                                    <!-- Agrega más columnas según tu estructura de datos -->
                                    <th scope="col">Opcion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($proveedores as $proveedor) { ?>
                                    <tr>
                                        <td scope="row"><?php echo $proveedor->id_proveedor; ?></td>
                                        <td><?php echo $proveedor->marca; ?></td>
                                        <td><?php echo $proveedor->rfc; ?></td>
                                        <td><?php echo $proveedor->nombre; ?></td>
                                        <td><?php echo $proveedor->apellido_paterno; ?></td>
                                        <td><?php echo $proveedor->apellido_materno; ?></td>
                                        <td><?php echo $proveedor->telefono; ?></td>
                                        <td><?php echo $proveedor->correo_electronico; ?></td>
                                        <td>
<!--                                             <a class="text-success" href="editar_proveedor.php?id_proveedor=<?php echo $proveedor->id_proveedor; ?>"><i class="bi bi-pencil-square"></i></a> -->
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
                    <input type="text" class="form-control" id="marca" name="marca" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" required>
                </div>
                <div class="mb-3">
                    <label for="rfc" class="form-label">RFC:</label>
                    <input type="text" class="form-control" id="rfc" name="rfc" required>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" required>
                </div>
                <div class="mb-3">
                    <label for="apellido_paterno" class="form-label">Apellido paterno:</label>
                    <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" required>
                </div>
                <div class="mb-3">
                    <label for="apellido_materno" class="form-label">Apellido materno:</label>
                    <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" pattern="\d{10}" title="Solo se permiten 10 dígitos" required>
                </div>
                <div class="mb-3">
                    <label for="correo_electronico" class="form-label">Correo electrónico:</label>
                    <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Por favor, introduce una dirección de correo electrónico válida" required>
                </div>
                <!-- Otros campos del formulario, si los hay -->
                        <!-- Agrega más campos según tu estructura de datos -->
                        <input type="submit" class="btn btn-primary rounded-pill animate__animated animate__rubberBand" value="Agregar proveedor">
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
