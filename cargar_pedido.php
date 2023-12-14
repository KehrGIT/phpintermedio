<?php
include 'conexion.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$raza = $_POST['raza'];
$clase = $_POST['clase'];
$caracteristicas = $_POST['caracteristicas'];

// Procesar la imagen (guardar en carpeta img y obtener la ruta)
$imagen_path = "img/" . $_FILES['imagen']['name'];
move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_path);

// Insertar el pedido en la base de datos
$sql = "INSERT INTO pedidos (nombre, raza, clase, caracteristicas, imagen, estado) VALUES ('$nombre', '$raza', '$clase', '$caracteristicas', '$imagen_path', 'procesando')";

if ($conn->query($sql) === TRUE) {
    echo "<div class='container'>";
    echo "<h1 class='titulo-principal'>Pedido realizado con éxito</h1>";
    echo "<a class='volver' href='realizar_pedidos.php'>Volver</a>";
    echo "</div>";
} else {
    echo "<div class='container'>";
    echo "<h1 class='titulo-principal'>Error al realizar el pedido</h1>";
    echo "<p class='error-message'>" . $conn->error . "</p>";
    echo "<a class='volver' href='realizar_pedidos.php'>Volver</a>";
    echo "</div>";
}

$conn->close();
