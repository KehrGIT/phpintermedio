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
    <title>Pedidos Pendientes</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <div class="container">
        <?php
        if (isset($_GET['id'])) {
            $pedidoId = $_GET['id'];

            $updateSql = "UPDATE pedidos SET estado='finalizado' WHERE id = $pedidoId";

            if ($conn->query($updateSql) === TRUE) {
                echo "Pedido finalizado con éxito.";
            } else {
                echo "Error al finalizar el pedido: " . $conn->error;
            }
        }

        if (isset($_GET['eliminar_id'])) {
            $eliminarId = $_GET['eliminar_id'];

            $deleteSql = "DELETE FROM pedidos WHERE id = $eliminarId";

            if ($conn->query($deleteSql) === TRUE) {
                echo "Pedido eliminado con éxito.";
            } else {
                echo "Error al eliminar el pedido: " . $conn->error;
            }
        }
        $sql = "SELECT * FROM pedidos WHERE estado='procesando'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h1 class='titulo-principal'>Pedidos Pendientes</h1>";
            echo "<div class='pedidos-container'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='pedido'>";
                echo "<img src='" . $row["imagen"] . "' alt='Pedido " . $row["id"] . "' class='imagen-pedido'>";
                echo "<p>Detalles del pedido #" . $row["id"] . "</p>";
                echo "<p>Nombre: " . $row["nombre"] . "</p>";
                echo "<p>Raza: " . $row["raza"] . "</p>";
                echo "<p>Clase: " . $row["clase"] . "</p>";
                echo "<p>Caracteristicas: " . $row["caracteristicas"] . "</p>";
                echo "<a href='verpedidos.php?id=" . $row["id"] . "' class='finalizar-btn'>Finalizar Pedido</a>";
                echo "<a href='verpedidos.php?eliminar_id=" . $row["id"] . "' class='eliminar-btn'>Eliminar Pedido</a>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p class='mensaje-vacio'>No hay pedidos pendientes</p>";
        }

        ?>
    </div>
</body>

</html>

<?php
$conn->close();
?>