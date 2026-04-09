<?php
session_start();

// Si no hay sesión → login
if (!isset($_SESSION['id'])) {
    header("Location: loginView.php");
    exit;
}

// Solo profesor
if ($_SESSION['rol'] != 'profesor') {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control</title>
    <link rel="stylesheet" href="/Riz/Php2/ProyectoIntermodular/public/css/panel.css">
</head>
<body>
<div class="container">

    <div class="cabecera">
        <h1>Panel de Profesor</h1>
        <p>Bienvenido, <?= $_SESSION['usuario'] ?></p>
    </div>

    <h2>Gestión del sistema</h2>
    
    <div class = "menu">

            <a href="admisionView.php" class="card">
                <h3>Admisión</h3>
                <p>Registrar pacientes y consultar ingresos</p>
            </a>

            <a href="triajeView.php" class="card">
                <h3>Triaje</h3>
                <p>Clasificar pacientes según gravedad</p>
            </a>

            <a href="atencionView.php" class="card">
                <h3>Atención</h3>
                <p>Gestionar anamnesis, pruebas y tratamiento</p>
            </a>

            <a href="panelView.php" class="card">
                <h3>Panel de seguimiento</h3>
                <p>Visualizar control general del servicio</p>
            </a>

            <a href="registroAlumnoView.php" class="card">
                <h3>Registrar alumno</h3>
                <p>Dar de alta nuevos alumnos en el sistema</p>
            </a>

    </div>

    <a class="logout" href="../controllers/SesionController.php?accion=logout">
            Cerrar sesión </a>

</div>

</body>
</html>