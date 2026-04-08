<?php


function conexion() {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=triaje_app", "root", "rootroot");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Error al conectar: " . $e->getMessage();
        exit;
    }
}


?>