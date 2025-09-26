Proyecto PI - UTCV

Sistema web desarrollado en PHP con MySQL, que permite gestionar información de personal, productos y categorías.
Incluye autenticación de usuarios, operaciones CRUD y un panel administrativo sencillo para su administración.

✨ Características principales

👥 Gestión de personal: alta, edición, eliminación y listado de personal.

📦 Gestión de productos: registro, edición, eliminación y visualización de productos.

🗂 Gestión de categorías: administración de categorías asociadas a los productos.

🔐 Autenticación de usuarios: login, logout y control de sesiones.

🖼 Interfaz básica con plantillas reutilizables (header, footer).

🗄 Base de datos MySQL lista para importar con el script incluido.

📁 Estructura del proyecto
📦 PI
 ┣ 📂 assets/          # Recursos estáticos (CSS, imágenes, scripts)
 ┣ 📂 includes/        # Header, footer y archivos reutilizables
 ┣ 📂 sql/             # Script de la base de datos (dream.sql)
 ┣ 📜 conexion.php     # Conexión a la base de datos
 ┣ 📜 login.php        # Inicio de sesión
 ┣ 📜 logout.php       # Cierre de sesión
 ┣ 📜 auth.php         # Validación de usuarios
 ┣ 📜 index.php        # Página principal
 ┣ 📜 insertar_*.php   # Scripts de inserción (productos, personal, etc.)
 ┣ 📜 editar_*.php     # Scripts de edición
 ┣ 📜 eliminar_*.php   # Scripts de eliminación
 ┗ 📜 README.md        # Documentación

⚙️ Requisitos

PHP >= 7.4

MySQL >= 5.7

Servidor web (Apache recomendado, con XAMPP o WAMP)

🚀 Instalación y uso

Clonar este repositorio:

git clone https://github.com/MilianRiv/PI.git


Importar la base de datos:

Abrir phpMyAdmin (o cualquier cliente MySQL).

Crear una base de datos nueva.

Importar el archivo dream (1).sql.

Configurar conexión a la base de datos:

Editar conexion.php con tus credenciales (host, usuario, contraseña, nombre_bd).

Iniciar el servidor:

Colocar el proyecto en la carpeta htdocs (si usas XAMPP).

Acceder en el navegador a:

http://localhost/PI

🔒 Seguridad (pendiente de mejoras)

Actualmente el sistema es funcional, pero se recomienda:

Usar consultas preparadas (PDO o MySQLi) para evitar inyecciones SQL.

Implementar tokens CSRF para mayor seguridad en formularios.

Cifrar contraseñas con password_hash() en vez de guardarlas en texto plano.

📌 Próximos pasos / mejoras sugeridas

 Migrar a un patrón MVC para mayor mantenibilidad.

 Implementar sistema de roles (admin / usuario).

 Mejorar el diseño con frameworks CSS (Bootstrap, Tailwind).

 Agregar pruebas automatizadas (PHPUnit).

 Documentar endpoints y estructura de la DB.
