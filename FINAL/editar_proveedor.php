<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

//revisar bug de header y dar estilo a la pagina//
include_once "conexion.php";

// Verificar si se proporciona un ID de proveedor
if (!isset($_GET['id_proveedor']) || empty($_GET['id_proveedor'])) {
    header("Location: proveedores.php");
    exit();
}

$id_proveedor = $_GET['id_proveedor'];

// Obtener datos del proveedor con el ID proporcionado
$stmt = $bd->prepare("SELECT * FROM proveedor WHERE id_proveedor = :id_proveedor");
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
                    Editar Proveedor
                </div>
                <div class="p-4">
                    <form action="editar_proveedor.php?id_proveedor=<?php echo $id_proveedor; ?>" method="post">
                        <div class="mb-3">
                            <label for="marca" class="form-label">Marca:</label>
                            <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $proveedor->marca; ?>" required>
                        </div>
                        <!-- Agrega más campos según tu estructura de datos -->

                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
