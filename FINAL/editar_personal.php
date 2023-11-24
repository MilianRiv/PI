<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redireccionar si no se ha iniciado sesión
    exit();
}

include 'header.php';

include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_encargado'])) {
    // Obtiene el ID del encargado a editar
    $id_encargado = $_GET['id_encargado'];

    // Consulta SQL para obtener los datos del encargado
    $sql = "SELECT * FROM encargados WHERE id_encargado = ?";
    $stmt = $bd->prepare($sql);
    $stmt->execute([$id_encargado]);
    $encargado = $stmt->fetch(PDO::FETCH_OBJ);

    if (!$encargado) {
        // Redirige con mensaje de error si no se encuentra el encargado
        header("Location: encargados.php?mensaje=error");
        exit();
    }
?>

    <!-- Formulario de edición -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card rounded-3 shadow-lg">
                    <div class="card-header">
                        Editar Encargado
                    </div>
                    <form class="p-4" action="actualizar_personal.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_encargado" value="<?php echo $id_encargado; ?>">
                        <label for="nombre">Nombre :</label>
                        <input type="text" class="form-control rounded-pill" name="nombre" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" value="<?php echo $encargado->nombre; ?>" autofocus required><br>
                        <label for="apellido_paterno">Apellido paterno:</label>
                        <input type="text" class="form-control rounded-pill" name="apellido_paterno" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" value="<?php echo $encargado->apellido_paterno; ?>" required><br>
                        <label for="apellido_materno">Apellido materno:</label>
                        <input type="text" class="form-control rounded-pill" name="apellido_materno" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" value="<?php echo $encargado->apellido_materno; ?>" required><br>
                        <label for="fecha">Fecha:</label>
                        <input type="date" class="form-control rounded-pill" name="fecha" value="<?php echo $encargado->fecha; ?>" required><br>
                        <label for="telefono">Telefono:</label>
                        <input type="text" class="form-control rounded-pill" name="telefono" pattern="\d{10}" title="Solo se permiten 10 dígitos" value="<?php echo $encargado->telefono; ?>" required><br>
                        <label for="codigo_postal">Codigo postal:</label>
                        <input type="text" class="form-control rounded-pill" name="codigo_postal" pattern="\d{5}" title="Solo se permiten 5 dígitos" value="<?php echo $encargado->codigo_postal; ?>" required><br>
                        <label for="estado">Estado:</label>
                        <input type="text" class="form-control rounded-pill" name="estado" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" value="<?php echo $encargado->estado; ?>" required><br>
                        <label for="ciudad">Ciudad:</label>
                        <input type="text" class="form-control rounded-pill" name="ciudad" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" value="<?php echo $encargado->ciudad; ?>" required><br>
                        <label for="colonia">Colonia:</label>
                        <input type="text" class="form-control rounded-pill" name="colonia" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" value="<?php echo $encargado->colonia; ?>" required><br>
                        <label for="salario">Salario:</label>
                        <input type="text" class="form-control rounded-pill" name="salario" pattern="\d+(\.\d{2})?" title="Solo se permiten números y dos decimales" value="<?php echo $encargado->salario; ?>" required><br>
                        <label for="sexo">Sexo:</label>
                        <select class="form-control rounded-pill" name="sexo" required>
                            <option value="">Seleccione...</option>
                            <option value="Masculino" <?php echo $encargado->sexo == 'Masculino' ? 'selected' : ''; ?>>Masculino</option>
                            <option value="Femenino" <?php echo $encargado->sexo == 'Femenino' ? 'selected' : ''; ?>>Femenino</option>
                            <option value="Otro" <?php echo $encargado->sexo == 'Otro' ? 'selected' : ''; ?>>Otro</option>
                        </select><br>
                        <label for="correo_electronico">Correo electronico:</label>
                        <input type="email" class="form-control rounded-pill" name="correo_electronico" value="<?php echo $encargado->correo_electronico; ?>" required><br>

                        <!-- Agrega más campos según tu estructura de datos -->

                        <input type="submit" class="btn btn-primary rounded-pill animate__animated animate__rubberBand" value="Actualizar Encargado">
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
} else {
    // Redirige con mensaje de error si no se proporciona el ID
    header("Location: encargados.php?mensaje=error");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $fecha = $_POST['fecha'];
    $telefono = $_POST['telefono'];
    $codigo_postal = $_POST['codigo_postal'];
    $estado = $_POST['estado'];
    $ciudad = $_POST['ciudad'];
    $colonia = $_POST['colonia'];
    $salario = $_POST['salario'];
    $sexo = $_POST['sexo'];
    $correo_electronico = $_POST['correo_electronico'];

    // Agrega más variables según tu estructura de datos

    // Prepara la consulta SQL
    $sql = "UPDATE encargados SET nombre = ?, apellido_paterno = ?, apellido_materno = ?, fecha = ?, telefono = ?, codigo_postal = ?, estado = ?, ciudad = ?, colonia = ?, salario = ?, sexo = ?, correo_electronico = ? WHERE id_encargado = ?";

    // Ejecuta la consulta
    $stmt = $bd->prepare($sql);
    $stmt->execute([$nombre, $apellido_paterno, $apellido_materno, $fecha, $telefono, $codigo_postal, $estado, $ciudad, $colonia, $salario, $sexo, $correo_electronico, $id_encargado]);

    // Redirige con mensaje de éxito
    header("Location: encargados.php?mensaje=editado");
    exit();
}

include 'footer.php';
?>
