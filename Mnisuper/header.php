<!DOCTYPE html>
<html lang="es">

<head>
    <title>Página de administración Minisuper "Isabel"</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <!-- CDN de iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Estilos personalizados -->
    <style>

        /* Estilo del cuerpo */
        body {
            background-color: #E3F5EF; /* Cambia este color de fondo según tus preferencias */
        }
        
        /* Estilo del encabezado */
        .header {
            background-color: #CCDBE8;
            padding: 10px 0;
            position: fixed; /* Fijar el encabezado en la parte superior */
            width: 100%; /* Ancho completo */
            z-index: 1000; /* Asegurar que esté por encima de otros elementos */
        }

        .header h3 {
            color: #5F6A6A;
            font-size: 20px;
            text-align: center;
            text-transform: uppercase;
        }

        /* Estilo del botón de cierre de sesión */
        .logout-button {
            background-color: #FDA6A6;
            color: #4F1515;
            border: none;
            border-radius: 40%;
            padding: 5px 10px;
        }

        /* Espacio para evitar que el contenido se solape con el encabezado */
        .content {
            padding-top: 70px; /* Ajusta según la altura del encabezado */
        }

        /* Estilo para los botones de tabla */
        .table-buttons {
            margin-top: 10px;
        }

        .table-buttons a {
            margin-right: 10px;
            border-radius: 50px; /* Hacer los botones más redondos */
            font-size: 14px; /* Reducir el tamaño del texto en los botones */
        }
        .dropdown-menu{
            transition: all 0.1s ease;
            background-color: #B8DAF8;
        }

        .menu-button {
    transition: all 0.5s ease; /* Esto hace que los cambios se animen en lugar de ser instantáneos */
}

.menu-button:hover {
    background-color: #B8DAF8; /* Cambiar el color de fondo al pasar el cursor */
    transform: scale(1.05); /* Hacer que el botón sea un poco más grande al pasar el cursor */
}
    </style>
</head>

<body>

    <div class="container-xpand">
        <div class="row">
            <div class="col-md">
                <!-- Encabezado mejorado -->
                <header class="header">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col text-start">
                            </div>
                            <div class="col text-center">
                                <h3>Minisuper "Isabel"</h3>
                            </div>
                            <div class="col text-end">
                                <!-- Botón desplegable -->
                                <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle menu-button" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
    Menú
</button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="panel_admin.php">Productos</a></li>
                                        <li><a class="dropdown-item" href="categorias.php">Categorías</a></li>
                                        <li><a class="dropdown-item" href="personal.php">Encargados</a></li>
                                        <li><a class="dropdown-item" href="proveedores.php">Proveedores</a></li>
                                        <li><a class="dropdown-item" href="usuarios.php">Usuarios</a></li>
                                        <li class="d-flex justify-content-center"> 
    <a href="logout.php" class="logout-button"><i class="bi bi-door-open"></i></a>
</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
            </div>  
        </div>
    </div>
    <!-- jQuery and Bootstrap JS (Añádelos al final de tu documento) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+83I5IVb9Lr3q4p5bB6v3E5ne9t4a7ur3vA6pWhBy5gRVndF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-jZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYlT" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

</body>

</html>

<br>
<br>