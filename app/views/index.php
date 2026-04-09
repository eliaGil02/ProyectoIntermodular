<?php
session_start();

// Si no hay sesión → login
if (!isset($_SESSION['id'])) {
    header("Location: loginView.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Triaje</title>
    <link rel="stylesheet" href="../../public/css/index.css">
    
</head>
<body>
    <div class="container">

    <h1>Bienvenido, <?= $_SESSION['usuario'] ?></h1>
    <p>Selecciona una opcion del sistema</p>

        <div class="menu">

            <h2>Menú</h2>

                    <a href="admisionView.php" class="card">
                        <h3>Registrar paciente</h3>
                        <p>Alta de pacientes en urgencias</p>
                    </a>

                    <a href="triajeView.php" class="card">
                        <h3>Triaje</h3>
                        <p>Evaluación de gravedad</p>
                    </a>

                    <a href="atencionView.php" class="card">
                        <h3>Atención</h3>
                        <p>Diagnóstico y tratamiento</p>
                    </a>
        </div>

        <a class="logout" href="../controllers/SesionController.php?accion=logout">
                <strong>Cerrar sesión</strong>
        </a>

    </div>

</body>
</html>