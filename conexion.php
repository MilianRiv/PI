<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dream";

try {
    $bd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexión exitosa";
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
$sentencia = $bd->query("select * from productos");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
