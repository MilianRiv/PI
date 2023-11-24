<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redireccionar si no se ha iniciado sesión
    exit();
}
?>


<?php
include 'header.php';
?>


<?php
include_once "conexion.php";

// Obtener datos de personal (ajusta la consulta según tu estructura de base de datos)
$sentencia = $bd->query("SELECT * FROM encargados");
$personal = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- Alertas -->
            <?php if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') { ?>
                <div class="alert alert-danger rounded-3 animate__animated animate__fadeInUp" role="alert">
                    <strong>Error!</strong> Rellena todos los campos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') { ?>
                <div class="alert alert-success rounded-3 animate__animated animate__fadeInUp" role="alert">
                    <strong>Hecho</strong> Se agregaron los datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') { ?>
                <div class="alert alert-danger rounded-3 animate__animated animate__fadeInUp" role="alert">
                    <strong>Error!</strong> Vuelve a intentar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') { ?>
                <div class="alert alert-success rounded-3 animate__animated animate__fadeInUp" role="alert">
                    <strong>Cambiado!</strong> Los datos fueron actualizados.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php
if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'editado') {
    echo '<div class="alert alert-success">El personal ha sido editado con éxito.</div>';
}
?>

            <?php if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') { ?>
                <div class="alert alert-warning rounded-3 animate__animated animate__fadeInUp" role="alert">
                    <strong>Eliminado!</strong> Los datos fueron borrados.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <!-- Fin alertas -->

            <div class="card rounded-3 shadow-lg">
                <div class="card-header">
                    Lista de personal
                </div>
                <div class="p-4">
                    <!-- Barra de búsqueda -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Buscar</span>
                        <input type="text" class="form-control" placeholder="nombre" aria-label="nombre" aria-describedby="basic-addon1" id="search-input">
                    </div>

                    <!-- Tabla desplazable -->
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle" id="tabla-personal">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido_paterno</th>
                                    <th scope="col">Apellido_materno</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Codigo_postal</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Ciudad</th>
                                    <th scope="col">Colonia</th>
                                    <th scope="col">Salario</th>
                                    <th scope="col">Sexo</th>
                                    <th scope="col">Correo electronico</th>
                                    <!-- Agrega más columnas según tu estructura de datos -->
                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($personal as $dato) { ?>
                                    <tr>
                                        <td scope="row"><?php echo $dato->id_encargado; ?></td>
                                        <td><?php echo $dato->nombre; ?></td>
                                        <td><?php echo $dato->apellido_paterno; ?></td>
                                        <td><?php echo $dato->apellido_materno; ?></td>
                                        <td><?php echo $dato->fecha; ?></td>
                                        <td><?php echo $dato->telefono; ?></td>
                                        <td><?php echo $dato->codigo_postal; ?></td>
                                        <td><?php echo $dato->estado; ?></td>
                                        <td><?php echo $dato->ciudad; ?></td>
                                        <td><?php echo $dato->colonia; ?></td>
                                        <td><?php echo $dato->salario; ?></td>
                                        <td><?php echo $dato->sexo; ?></td>
                                        <td><?php echo $dato->correo_electronico; ?></td>
                                        <!-- Agrega más celdas según tu estructura de datos -->
                                        <td><a class="text-success animate__animated animate__heartBeat" href="editar_personal.php?id_encargado=<?php echo $dato->id_encargado; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a onclick="return confirm('¿Estás seguro de eliminar?');" class="text-danger animate__animated animate__bounceIn" href="eliminar_personal.php?id_encargado=<?php echo $dato->id_encargado; ?>"><i class="bi bi-trash"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
    <!-- Formulario para insertar personal -->
    <div class="card rounded-3 shadow-lg">
        <div class="card-header">
            Ingresar datos de personal:
        </div>
        <form class="p-4" action="insertar_personal.php" method="post" enctype="multipart/form-data">
            <label for="nombre">Nombre :</label>
            <input type="text" class="form-control rounded-pill" name="nombre" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" autofocus required><br>
            <label for="apellido_paterno">Apellido paterno:</label>
            <input type="text" class="form-control rounded-pill" name="apellido_paterno" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" required><br>
            <label for="apellido_materno">Apellido materno:</label>
            <input type="text" class="form-control rounded-pill" name="apellido_materno" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" required><br>
            <label for="fecha">Fecha:</label>
            <input type="date" class="form-control rounded-pill" name="fecha" required><br>
            <label for="telefono">Telefono:</label>
            <input type="text" class="form-control rounded-pill" name="telefono" pattern="\d{10}" title="Solo se permiten 10 dígitos" required><br>
            <label for="codigo_postal">Codigo postal:</label>
            <input type="text" class="form-control rounded-pill" name="codigo_postal" pattern="\d{5}" title="Solo se permiten 5 dígitos" required><br>
            <label for="estado">Estado:</label>
            <input type="text" class="form-control rounded-pill" name="estado" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" required><br>
            <label for="ciudad">Ciudad:</label>
            <input type="text" class="form-control rounded-pill" name="ciudad" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" required><br>
            <label for="colonia">Colonia:</label>
            <input type="text" class="form-control rounded-pill" name="colonia" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" required><br>
            <label for="salario">Salario:</label>
            <input type="text" class="form-control rounded-pill" name="salario" pattern="\d+(\.\d{2})?" title="Solo se permiten números y dos decimales" required><br>
             <label for="sexo">Sexo:</label>
            <select class="form-control rounded-pill" name="sexo" required>
                <option value="">Seleccione...</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Femenino">Otro</option>
            </select><br>
            <label for="correo_electronico">Correo electronico:</label>
            <input type="email" class="form-control rounded-pill" name="correo_electronico" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Por favor, introduce una dirección de correo electrónico válida" required>
    
                    <!-- Agrega más campos según tu estructura de datos -->

                    <input type="submit" class="btn btn-primary rounded-pill animate__animated animate__rubberBand" value="Insertar Personal">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- DataTables jQuery initialization -->
<script>
    $(document).ready(function() {
        // Inicializar DataTables en la tabla
        var table = $('#tabla-personal').DataTable({
            paging: false,
            searching: false
        });

        // Filtrar la tabla al escribir en el campo de búsqueda
        $('#search-input').on('keyup', function() {
            table.search(this.value).draw();
        });
    });
</script>

</div>

<br>
<br>
<br>

<?php include 'footer.php'; ?>
