<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Realizar Pedido</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <div class="container">
        <h1 class="titulo-principal">Realice su Pedido</h1>
        <form action="cargar_pedido.php" method="post" enctype="multipart/form-data" class="formulario realizar-pedido">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required><br>

            <label for="raza">Raza:</label>
            <input type="text" name="raza" required><br>

            <label for="clase">Clase:</label>
            <input type="text" name="clase" required><br>

            <label for="caracteristicas">Características:</label>
            <input type="text" name="caracteristicas" required><br>

            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" accept="image/*" required><br>

            <input type="submit" value="Realizar Pedido">
        </form>
    </div>

</body>

</html>