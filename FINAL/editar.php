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

$codigo_producto = $_GET['codigo_producto'];

$sentencia = $bd->prepare("select * from productos where codigo_producto = ?;");
$sentencia->execute([$codigo_producto]);
$productos = $sentencia->fetch(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card rounded-3 shadow-lg">
                <div class="card-header">
                    Editar Producto
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control rounded-pill" name="txtNombre" required 
                        value="<?php echo isset($productos->nombre) ? $productos->nombre : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="number" class="form-control rounded-pill" step="0.01" name="txtPrecio" required
                        value="<?php echo isset($productos->precio) ? $productos->precio : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción: </label>
                        <input type="text" class="form-control rounded-pill" name="txtDescripcion" required
                        value="<?php echo isset($productos->descripcion) ? $productos->descripcion : ''; ?>">
                    </div>
                    <!-- Agregar las variables no utilizadas en el formulario -->
                    <div class="mb-3">
                        <label class="form-label">Existencia: </label>
                        <input type="number" class="form-control rounded-pill" name="txtExistencia" required
                        value="<?php echo isset($productos->existencia) ? $productos->existencia : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID de Categoría: </label>
                        <input type="number" class="form-control rounded-pill" name="txtIdCategoria" required
                        value="<?php echo isset($productos->id_categoria) ? $productos->id_categoria : ''; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo_producto" value="<?php echo $codigo_producto; ?>">
                        <input type="submit" class="btn btn-primary rounded-pill animate__animated animate__rubberBand" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>
