<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Alumno</title>
    <link rel="stylesheet" href="../../public/css/login.css">
</head>
<body>

<div class="cajaLogin">
    <h1>Sistema de Triaje</h1>
    <h2>Registro de Alumno</h2>

    <form method="POST" action="../controllers/SesionController.php">
        <input type="text" name="usuario" placeholder="Nombre de usuario" required>
        <input type="password" name="clave" placeholder="Contraseña" required>
        <button type="submit" name="accion" value="registro">Registrarse</button>
    </form>

    <div class="linkRegistro">
        <a href="loginView.php">Volver al login</a>
    </div>
</div>

</body>
</html>