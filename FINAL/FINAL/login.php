<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <!-- Agrega el enlace al archivo CSS de Bootstrap si no lo has hecho ya -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilo personalizado para la pantalla de carga */
        .loader-container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #ffffff;
            opacity: 1;
            z-index: 9999;
            transition: opacity 0.5s;
        }
        
        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
        }

        /* Agrega un estilo personalizado para la tarjeta */
        .custom-card {
            display: none;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            opacity: 0; /* Inicialmente, establece la opacidad en 0 para la animación */
            transform: translateY(20px); /* Inicialmente, mueve la tarjeta hacia abajo */
            transition: opacity 0.5s, transform 0.5s;
        }

        /* Estilo personalizado para el botón de inicio */
        .custom-btn {
            border-radius: 25px;
            padding: 10px 20px;
            font-weight: bold;
        }

        /* Clase de animación para mostrar la tarjeta con transición */
        .card-animation {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="loader-container">
        <div class="loader"></div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card custom-card card-animation"> <!-- Utiliza la clase personalizada custom-card y la clase de animación -->
                    <div class="card-header">
                        <h2 class="text-center">Minisuper Isabel</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="auth.php">
                            <div class="form-group">
                                <label for="usuario">Nombre de usuario</label>
                                <input type="text" class="form-control rounded-pill" id="usuario" name="usuario" placeholder="Nombre de usuario" required>
                            </div>
                            <div class="form-group">
                                <label for "contraseña">Contraseña</label>
                                <input type="password" class="form-control rounded-pill" id="contraseña" name="contraseña" placeholder="Contraseña" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block custom-btn">Iniciar Sesión</button> <!-- Utiliza la clase personalizada custom-btn -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Agrega el enlace al archivo JavaScript de Bootstrap si es necesario -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Simula una carga ficticia y oculta la pantalla de carga
        window.addEventListener('load', function () {
            const loaderContainer = document.querySelector('.loader-container');
            const customCard = document.querySelector('.custom-card');
            setTimeout(() => {
                loaderContainer.style.opacity = '0';
                setTimeout(() => {
                    loaderContainer.style.display = 'none';
                    customCard.classList.add('card-animation');
                }, 500);
            }, 1000); // Cambia este valor para ajustar la duración de la carga ficticia
        });
    </script>
</body>
</html>
