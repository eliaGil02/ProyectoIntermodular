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
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .cajaLogin {
            background: white;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            max-width: 420px;
            width: 100%;
            text-align: center;
        }
        h1 {
            color: #2c3e50;
            margin-bottom: 8px;
        }
        h2 {
            color: #34495e;
            margin-bottom: 30px;
        }
        input {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            font-size: 1.05em;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 14px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.15em;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background: #2980b9;
        }
        .error {
            color: #e74c3c;
            font-weight: bold;
            margin: 15px 0;
        }
        .linkRegistro {
            margin-top: 25px;
            color: #7f8c8d;
        }
        .linkRegistro a {
            color: #3498db;
            text-decoration: none;
        }
        .linkRegistro a:hover {
            text-decoration: underline;
        }
    </style>
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

    <form method="POST" action="../controllers/sesionController.php">
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