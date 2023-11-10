<?php
include 'header.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include_once "conexion.php";

// Obtener el ID de la categoría de la URL
$id_categoria = $_GET['id_categoria'];

// Obtener los datos de la categoría específica
$sentencia = $bd->prepare("SELECT * FROM categoria WHERE id_categoria = ?");
$sentencia->execute([$id_categoria]);
$categoria = $sentencia->fetch(PDO::FETCH_OBJ);

if ($categoria === false) {
    // La categoría no fue encontrada, manejar este error
    exit('La categoría no fue encontrada.');
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- Aquí puedes mostrar mensajes de error o éxito como en categorias.php -->
            <div class="card rounded-3 shadow-lg">
                <div class="card-header">
                    Editar Categoría
                </div>
                <form class="p-4" action="actualizar_categoria.php" method="post">
                    <input type="hidden" name="id_categoria" value="<?php echo $categoria->id_categoria; ?>">
                    <label for="nombre">Nombre de la Categoría:</label>
                    <input type="text" class="form-control rounded-pill" name="nombre" value="<?php echo $categoria->nombre; ?>" required><br>
                    <input type="submit" class="btn btn-primary rounded-pill animate__animated animate__rubberBand" value="Actualizar Categoría">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>