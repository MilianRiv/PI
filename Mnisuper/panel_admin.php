<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php"); // Redireccionar si no se ha iniciado sesión
    exit();
}
?>


<?php
include 'header.php';
?>


<?php
include_once "conexion.php";

// Obtener datos de productos
$sentencia = $bd->query("SELECT * FROM productos");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
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

            <?php if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') { ?>
                <div class="alert alert-warning rounded-3 animate__animated animate__fadeInUp" role="alert">
                    <strong>Eliminado!</strong> Los datos fueron borrados.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            
            <?php if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'categoria_no_existe') { ?>
        <div class="alert alert-danger rounded-3 animate__animated animate__fadeInUp" role="alert">
            <strong>Error!</strong> La categoria no existe.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
            <?php } ?>
            <!-- fin alerta -->
            <div class="card rounded-3 shadow-lg">
                <div class="card-header">
                    Lista de productos
                </div>
                <div class="p-4">
                    <!-- Barra de búsqueda -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Buscar</span>
                        <input type="text" class="form-control" placeholder="nombre" aria-label="nombre  " aria-describedby="basic-addon1" id="search-input">
                    </div>

                    <!-- Tabla desplazable -->
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle" id="tabla-productos">
                            <thead>
                                <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Categoría</th>
                                    <th scope="col" colspan="20">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productos as $dato) { ?>
                                    <tr>
                                        <td scope="row"><?php echo $dato->codigo_producto; ?></td>
                                        <td><?php echo $dato->nombre; ?></td>
                                        <td><?php echo $dato->descripcion; ?></td>
                                        <td><?php echo $dato->precio; ?></td>
                                        <td><?php echo $dato->id_categoria; ?></td>
                                        <td><a class="text-success animate__animated animate__heartBeat" href="editar.php?codigo_producto=<?php echo $dato->codigo_producto; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a onclick="return confirm('¿Estás seguro de eliminar?');" class="text-danger animate__animated animate__bounceIn" href="eliminar.php?codigo_producto=<?php echo $dato->codigo_producto; ?>"><i class="bi bi-trash"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card rounded-3 shadow-lg">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" action="insertar_producto.php" method="post">
                    <label for="codigo_producto">Código del Producto:</label>
                    <input type="text" class="form-control rounded-pill" name="codigo_producto" required><br>

                    <label for="nombre">Nombre del Producto:</label>
                    <input type="text" class="form-control rounded-pill" name="nombre" autofocus required><br>

                    <label for="descripcion">Descripción:</label>
                    <input type="text" class="form-control rounded-pill" name="descripcion" required><br>

                    <label for="existencia">Existencia:</label>
                    <input type="number" class="form-control rounded-pill" name="existencia" required><br>

                    <label for="precio">Precio:</label>
                    <input type="number" class="form-control rounded-pill" step="0.01" name="precio" required><br>

                    <label for="id_categoria">ID de Categoría:</label>
                    <input type="number" class="form-control rounded-pill" name="id_categoria" required><br>

                    <div class="d-flex justify-content-center">
    <input type="submit" class="btn btn-primary rounded-pill animate__animated animate__rubberBand" value="Insertar Producto">
</div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- DataTables jQuery initialization -->
<script>
$(document).ready(function(){
  $("#search-input").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tabla-productos tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
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
