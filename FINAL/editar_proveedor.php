<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include_once "header.php";

//revisar bug de header y dar estilo a la pagina//
include_once "conexion.php";

// Verificar si se proporciona un ID de proveedor
if (!isset($_GET['id_proveedor']) || empty($_GET['id_proveedor'])) {
    header("Location: proveedores.php");
    exit();
}

$id_proveedor = $_GET['id_proveedor'];

// Obtener datos del proveedor con el ID proporcionado
$stmt = $bd->prepare("SELECT * FROM proveedores WHERE id_proveedor = :id_proveedor");
$stmt->bindParam(':id_proveedor', $id_proveedor);
$stmt->execute();
$proveedor = $stmt->fetch(PDO::FETCH_OBJ);

// Verificar si se encontró un proveedor con el ID proporcionado
if (!$proveedor) {
    header("Location: proveedores.php");
    exit();
}

// Procesar el formulario si se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y obtener datos del formulario
    $marca = $_POST['marca'];
    // Agrega más campos según tu estructura de datos

    // Actualizar datos en la base de datos
    $stmt = $bd->prepare("UPDATE proveedor SET marca = :marca /* Agrega más campos según tu estructura de datos */ WHERE id_proveedor = :id_proveedor");
    $stmt->bindParam(':marca', $marca);
    // Vincula más parámetros según tus campos
    $stmt->bindParam(':id_proveedor', $id_proveedor);

    try {
        $stmt->execute();
        header("Location: proveedores.php?mensaje=editado");
        exit();
    } catch (PDOException $e) {
        header("Location: proveedores.php?mensaje=error");
        exit();
    }
}
?>

<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
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
                        <input type="submit" class="btn btn-primary rounded-pill animate__animated animate__rubberBand" value="Editar proveedor">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
