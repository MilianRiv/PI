<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'header.php';
include_once "conexion.php";

// Obtener datos de usuarios
$sentencia = $bd->query("SELECT * FROM usuarios");
$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- Alertas -->
            <?php if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') { ?>
                <div class="alert alert-danger rounded-3 animate__animated animate__fadeInUp" role="alert">
                    <strong>Error!</strong> Hubo un problema al procesar tu solicitud.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') { ?>
                <div class="alert alert-success rounded-3 animate__animated animate__fadeInUp" role="alert">
                    <strong>Hecho!</strong> El usuario ha sido registrado exitosamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') { ?>
                <div class="alert alert-info rounded-3 animate__animated animate__fadeInUp" role="alert">
                    <strong>Hecho!</strong> El usuario ha sido editado exitosamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') { ?>
                <div class="alert alert-warning rounded-3 animate__animated animate__fadeInUp" role="alert">
                    <strong>Hecho!</strong> El usuario ha sido eliminado.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>  
            <?php } ?>

            <!-- Fin alertas -->

            <div class="card rounded-3 shadow-lg">
                <div class="card-header">
                    Lista de Usuarios
                </div>
                <div class="p-4">
                    <!-- Tabla desplazable -->
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle" id="tabla-usuarios">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre de Usuario</th>
                                    <th scope="col">Correo electrónico</th>
                                    <!-- Agrega más columnas según tu estructura de datos -->
                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($usuarios as $usuario) { ?>
                                    <tr>
                                        <td scope="row"><?php echo $usuario->id_usuario; ?></td>
                                        <td><?php echo $usuario->nombre; ?></td>
                                        <td><?php echo $usuario->correo_electronico; ?></td>
                                        <!-- Agrega más celdas según tu estructura de datos -->
                                        <td><a class="text-success animate__animated animate__heartBeat" href="editar_usuario.php?id_usuario=<?php echo $usuario->id_usuario; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a onclick="return confirm('¿Estás seguro de eliminar?');" class="text-danger animate__animated animate__bounceIn" href="eliminar_usuario.php?id_usuario=<?php echo $usuario->id_usuario; ?>"><i class="bi bi-trash"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulario para agregar usuario en la columna de la derecha -->
        <div class="col-md-4">
            <div class="card rounded-3 shadow-lg">
                <div class="card-header">
                    Agregar Usuario
                </div>
                <div class="p-4">
                    <form action="insertar_usuario.php" method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre de Usuario:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="correo_electronico" class="form-label">Correo electrónico:</label>
                            <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required>
                        </div>
                        <div class="mb-3">
                            <label for="contrasena" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                        </div>
                        <!-- Agrega más campos según tu estructura de datos -->

                        <button type="submit" class="btn btn-primary">Agregar Usuario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTables jQuery initialization -->
<script>
    $(document).ready(function() {
        // Inicializar DataTables en la tabla
        var table = $('#tabla-usuarios').DataTable({
            paging: false,
            searching: false
        });
    });
</script>

<?php include 'footer.php'; ?>
