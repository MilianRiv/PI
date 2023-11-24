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
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_usuario'])) {
    // Obtiene el ID del usuario a editar
    $id_usuario = $_GET['id_usuario'];

    // Consulta SQL para obtener los datos del usuario
    $sql = "SELECT * FROM usuarios WHERE id_usuario = ?";
    $stmt = $bd->prepare($sql);
    $stmt->execute([$id_usuario]);
    $usuario = $stmt->fetch(PDO::FETCH_OBJ);

    if (!$usuario) {
        // Redirige con mensaje de error si no se encuentra el usuario
        header("Location: usuarios.php?mensaje=error");
        exit();
    }
    ?>

    <!-- Formulario de edición -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <!-- Aquí puedes mostrar mensajes de error o éxito como en usuarios.php -->
                <div class="card rounded-3 shadow-lg">
                    <div class="card-header">
                        Editar Usuario
                    </div>
                    <form class="p-4" action="actualizar_usuario.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
    <div class="mb-3">
        <label for="nombre">Nombre de Usuario:</label>
        <input type="text" class="form-control rounded-pill" name="nombre" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" value="<?php echo $usuario->nombre; ?>" autofocus required>
    </div>
    <div class="mb-3">
        <label for="correo_electronico">Correo Electrónico:</label>
        <input type="email" class="form-control rounded-pill" name="correo_electronico" value="<?php echo $usuario->correo_electronico; ?>" required>
    </div>
    <div class="mb-3">
        <label for="contrasena">Contraseña:</label>
        <div class="input-group">
            <input type="password" class="form-control rounded-pill" name="contrasena" value="<?php echo $usuario->contrasena; ?>" id="passwordField" required>
            <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                <i class="bi bi-eye"></i>
            </button>
        </div>
    </div>
    <!-- Agrega más campos según tu estructura de datos -->
    <li class="d-flex justify-content-center">
        <input type="submit" class="btn btn-primary rounded-pill animate__animated animate__rubberBand" value="Actualizar Usuario">
    </li>
</form>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Script para alternar la visibilidad de la contraseña
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('passwordField');

    togglePassword.addEventListener('click', function () {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        // Cambiar el icono del botón según el estado de visibilidad de la contraseña
        this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
    });
</script>

<?php
} else {
    // Redirige con mensaje de error si no se proporciona el ID
    header("Location: usuarios.php?mensaje=error");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $nombre = $_POST['nombre'];
    $correo_electronico = $_POST['correo_electronico'];
    $contrasena = $_POST['contrasena'];

    // Agrega más variables según tu estructura de datos

    // Prepara la consulta SQL
    $sql = "UPDATE usuarios SET nombre = ?, correo_electronico = ?, contrasena = ? WHERE id_usuario = ?";

    // Ejecuta la consulta
    $stmt = $bd->prepare($sql);
    $stmt->execute([$nombre, $correo_electronico, $contrasena, $id_usuario]);

    // Redirige con mensaje de éxito
    header("Location: usuarios.php?mensaje=editado");
    exit();
}

include 'footer.php';
?>
