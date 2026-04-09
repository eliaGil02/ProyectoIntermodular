<?php
session_start();

// Si ya está logueado, redirigir según rol
if (isset($_SESSION['id'])) {
    if ($_SESSION['rol'] == 'profesor') 
    {
        header("Location: panelView.php");
    } else {
        header("Location: index.php");
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Triaje</title>
    <link rel="stylesheet" href="../../public/css/login.css">

</head>
<body>

<div class="cajaLogin">
    <h1>Sistema de Triaje</h1>
    <h2>Iniciar Sesión</h2>

    <?php
        if (isset($_GET['error'])) 
        {
            echo '<p class="error">Usuario o contraseña incorrectos</p>';
        }
    ?>

    <form method="POST" action="../controllers/SesionController.php">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="clave" placeholder="Contraseña" required>
        <button type="submit" name="accion" value="login">Entrar</button>
    </form>

    <div class="linkRegistro">
        ¿Eres alumno y no tienes cuenta?<br>
        <a href="registroAlumnoView.php">Registrarse como nuevo alumno</a>
    </div>

    <p style="margin-top: 30px; font-size: 0.9em; color: #95a5a6;">
        Solo la profesora puede crear cuentas de profesor.
    </p>
</div>

</body>
</html>