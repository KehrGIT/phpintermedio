<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Creación de Personajes</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <div class="container">
        <h1 class="titulo-principal">Bienvenido al Sistema Creación de Personajes</h1>
        <p>Podrá realizar su pedido para la creación de personajes dirigiéndose a Realizar Pedido.</p>
    </div>
</body>

</html>