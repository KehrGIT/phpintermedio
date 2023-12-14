<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_valido = "admin / 20123456";
    $password_valido = "admin123";

    $usuario_ingresado = $_POST["usuario"];
    $password_ingresado = $_POST["password"];

    if ($usuario_ingresado == $usuario_valido && $password_ingresado == $password_valido) {
        $_SESSION['usuario'] = $usuario_valido;
        header("Location: index.php");
        exit();
    } else {
        $mensaje_error = "Credenciales incorrectas. Inténtalo de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="estilos.css">

</head>

<body>
    <div class="container login-container">
        <h1 class="titulo-principal">Iniciar Sesión</h1>
        <?php if (isset($mensaje_error)) : ?>
            <p class="mensaje-error"><?php echo $mensaje_error; ?></p>
        <?php endif; ?>

        <form action="login.php" method="post" class="formulario login-form">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" required><br>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>
</body>

</html>