<?php
require_once '/../config/conexion.php';

// Login
function loginUsuario($usuario, $clave)
{
    $db = conexion();

    $sql = "SELECT * from usuarios 
            where usuario = :usuario and clave = :clave";

    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':usuario' => $usuario,
        ':clave' => $clave
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>