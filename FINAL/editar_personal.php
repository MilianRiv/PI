<?php
include 'header.php';
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_persona'])) {
    // Obtiene el ID del personal a editar
    $id_persona = $_GET['id_persona'];

    // Consulta SQL para obtener los datos del personal
    $sql = "SELECT * FROM personal WHERE id_persona = ?";
    $stmt = $bd->prepare($sql);
    $stmt->execute([$id_persona]);
    $personal = $stmt->fetch(PDO::FETCH_OBJ);

    if (!$personal) {
        // Redirige con mensaje de error si no se encuentra el personal
        header("Location: personal.php?mensaje=error");
        exit();
    }
    ?>

    <!-- Formulario de edición -->
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- Aquí puedes mostrar mensajes de error o éxito como en personal.php -->
            <div class="card rounded-3 shadow-lg">
                <div class="card-header">
                    Editar Personal
                </div>
    <form class="p-4" action="actualizar_personal.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_persona" value="<?php echo $id_persona; ?>">
        <label for="nombre">Nombre :</label>
        <input type="text" class="form-control rounded-pill" name="nombre" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" value="<?php echo $personal->nombre; ?>" autofocus required><br>
        <label for="apellido_paterno">Apellido paterno:</label>
        <input type="text" class="form-control rounded-pill" name="apellido_paterno" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" value="<?php echo $personal->apellido_paterno; ?>" required><br>
        <label for="apellido_materno">Apellido materno:</label>
        <input type="text" class="form-control rounded-pill" name="apellido_materno" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" value="<?php echo $personal->apellido_materno; ?>" required><br>
        <label for="fecha">Fecha:</label>
        <input type="date" class="form-control rounded-pill" name="fecha" value="<?php echo $personal->fecha; ?>" required><br>
        <label for="telefono">Telefono:</label>
        <input type="text" class="form-control rounded-pill" name="telefono" pattern="\d{10}" title="Solo se permiten 10 dígitos" value="<?php echo $personal->telefono; ?>" required><br>
        <label for="codigo_postal">Codigo postal:</label>
        <input type="text" class="form-control rounded-pill" name="codigo_postal" pattern="\d{5}" title="Solo se permiten 5 dígitos" value="<?php echo $personal->codigo_postal; ?>" required><br>
        <label for="estado">Estado:</label>
        <input type="text" class="form-control rounded-pill" name="estado" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" value="<?php echo $personal->estado; ?>" required><br>
        <label for="ciudad">Ciudad:</label>
        <input type="text" class="form-control rounded-pill" name="ciudad" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" value="<?php echo $personal->ciudad; ?>" required><br>
        <label for="colonia">Colonia:</label>
        <input type="text" class="form-control rounded-pill" name="colonia" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" value="<?php echo $personal->colonia; ?>" required><br>
        <label for="salario">Salario:</label>
        <input type="text" class="form-control rounded-pill" name="salario" pattern="\d+(\.\d{2})?" title="Solo se permiten números y dos decimales" value="<?php echo $personal->salario; ?>" required><br>
        <label for="imagen_personal">Imagen Personal:</label>
        <input type="file" class="form-control rounded-pill" name="imagen_personal" required><br>
        <label for="cargo">Cargo:</label>
        <input type="text" class="form-control rounded-pill" name="cargo" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" value="<?php echo $personal->cargo; ?>" required><br>
        <label for="sexo">Sexo:</label>
        <select class="form-control rounded-pill" name="sexo" required>
            <option value="">Seleccione...</option>
            <option value="Masculino" <?php echo $personal->sexo == 'Masculino' ? 'selected' : ''; ?>>Masculino</option>
            <option value="Femenino" <?php echo $personal->sexo == 'Femenino' ? 'selected' : ''; ?>>Femenino</option>
            <option value="Otro" <?php echo $personal->sexo == 'Otro' ? 'selected' : ''; ?>>Otro</option>
        </select><br>

        <!-- Agrega más campos según tu estructura de datos -->

        <input type="submit" class="btn btn-primary rounded-pill animate__animated animate__rubberBand" value="Actualizar Personal">
    </form>
    </div>
        </div>
    </div>
</div>

    <?php
} else {
    // Redirige con mensaje de error si no se proporciona el ID
    header("Location: personal.php?mensaje=error");
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
    $cargo = $_POST['cargo'];
    $sexo = $_POST['sexo'];

    // Verifica si se seleccionó un archivo para la imagen personal
    if(isset($_FILES['imagen_personal']) && $_FILES['imagen_personal']['error'] === UPLOAD_ERR_OK) {
        $imagen_personal = $_FILES['imagen_personal']['name'];
        // Guarda la imagen en el directorio deseado (ajusta la ruta según tu estructura)
        move_uploaded_file($_FILES['imagen_personal']['tmp_name'], 'ruta/del/directorio/' . $imagen_personal);
    } else {
        // Manejar el caso en que no se selecciona ninguna imagen
        $imagen_personal = ''; // O asigna el valor por defecto que desees
    }

    // Agrega más variables según tu estructura de datos

    // Prepara la consulta SQL
    $sql = "UPDATE personal SET nombre = ?, apellido_paterno = ?, apellido_materno = ?, fecha = ?, telefono = ?, codigo_postal = ?, estado = ?, ciudad = ?, colonia = ?, salario = ?, cargo = ?, sexo = ?, imagen_personal = ? WHERE id_persona = ?";

    // Ejecuta la consulta
    $stmt = $bd->prepare($sql);
    $stmt->execute([$nombre, $apellido_paterno, $apellido_materno, $fecha, $telefono, $codigo_postal, $estado, $ciudad, $colonia, $salario, $cargo, $sexo, $imagen_personal, $id_persona]);

    // Redirige con mensaje de éxito
    header("Location: personal.php?mensaje=editado");
    exit();
}

include 'footer.php';
?>
