<?php
include 'header.php';

if (!isset($_GET['id_categoria'])) {
    header('Location: categorias.php?mensaje=error');
    exit();
}

include_once 'conexion.php';
$id_categoria = $_GET['id_categoria'];

$sentencia = $bd->prepare("SELECT * FROM categoria WHERE id_categoria = ?;");
$sentencia->execute([$id_categoria]);
$categoria = $sentencia->fetch(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card rounded-3 shadow-lg">
                <div class="card-header">
                    Editar Categoría
                </div>
                <form class="p-4" method="POST" action="editar_categoria.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control rounded-pill" name="nombre" required 
                        value="<?php echo isset($categoria->nombre) ? $categoria->nombre : ''; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id_categoria" value="<?php echo $id_categoria; ?>">
                        <input type="submit" class="btn btn-primary rounded-pill animate__animated animate__rubberBand" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>
