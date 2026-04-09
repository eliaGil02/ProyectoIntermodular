<?php
session_start();

require_once '../../config/conexion.php';


$conn = conexion();

if (isset($_POST['accion']) && $_POST['accion'] == 'login') {

    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND clave = :clave";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':clave', $clave);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        $_SESSION['id'] = $resultado['id'];
        $_SESSION['usuario'] = $resultado['usuario'];
        $_SESSION['rol'] = $resultado['rol'];

        if ($resultado['rol'] == 'profesor') {
            header("Location: ../views/panelView.php");
        } else {
            header("Location: ../views/index.php");
        }
        exit;
    } else {
        header("Location: ../views/loginView.php?error=1");
        exit;
    }
}

if (isset($_POST['accion']) && $_POST['accion'] == 'registro') {

    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $rol = 'alumno';

    $sqlComprobar = "SELECT * FROM usuarios WHERE usuario = :usuario";
    $stmtComprobar = $conn->prepare($sqlComprobar);
    $stmtComprobar->bindParam(':usuario', $usuario);
    $stmtComprobar->execute();

    if ($stmtComprobar->fetch(PDO::FETCH_ASSOC)) {
        header("Location: ../views/registroAlumnoView.php?error=1");
        exit;
    }

    $sqlInsert = "INSERT INTO usuarios (usuario, clave, rol) VALUES (:usuario, :clave, :rol)";
    $stmtInsert = $conn->prepare($sqlInsert);
    $stmtInsert->bindParam(':usuario', $usuario);
    $stmtInsert->bindParam(':clave', $clave);
    $stmtInsert->bindParam(':rol', $rol);

    if ($stmtInsert->execute()) {
        header("Location: ../views/loginView.php?registro=ok");
        exit;
    } else {
        header("Location: ../views/registroAlumnoView.php?error=2");
        exit;
    }
}

if (isset($_GET['accion']) && $_GET['accion'] == 'logout') {
    session_destroy();
    header("Location: ../views/loginView.php");
    exit;
}
?>