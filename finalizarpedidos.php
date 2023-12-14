<?php
include 'navbar.php';
include 'conexion.php';
?>
<?php

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pedidos Finalizados</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <div class="container">
        <?php
        $sql = "SELECT * FROM pedidos WHERE estado='finalizado'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h1 class='titulo-principal'>Pedidos Finalizados</h1>";
            echo "<div class='pedidos-container'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='pedido'>";
                echo "<img src='" . $row["imagen"] . "' alt='Pedido Finalizado " . $row["id"] . "' class='imagen-pedido'>";
                echo "<p>Detalles del pedido finalizado #" . $row["id"] . "</p>";
                echo "<p>Nombre: " . $row["nombre"] . "</p>";
                echo "<p>Raza: " . $row["raza"] . "</p>";
                echo "<p>Clase: " . $row["clase"] . "</p>";
                echo "<p>Características: " . $row["caracteristicas"] . "</p>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p class='mensaje-vacio'>No hay pedidos finalizados</p>";
        }
        ?>
    </div>
</body>

</html>

<?php
$conn->close();
?>