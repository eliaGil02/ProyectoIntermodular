<?php
require_once '/../config/conexion.php';

// obtener todos los pacientes
function getPacientes()
{
    $db = conexion();
    $sql = "SELECT * from pacientes order by fecha_llegada desc";
    return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

// insertar paciente
function insertarPaciente($nhc, $nombre, $edad, $telefono, $alergias, $motivo)
{
    $db = conexion();
    $sql = "INSERT into pacientes (nhc, nombre, edad, telefono, alergias, motivo_consulta)
            values (:nhc, :nombre, :edad, :telefono, :alergias, :motivo)";

    $stmt = $db->prepare($sql);
    return $stmt->execute([
        ':nhc' => $nhc,
        ':nombre' => $nombre,
        ':edad' => $edad,
        ':telefono' => $telefono,
        ':alergias' => $alergias,
        ':motivo' => $motivo
    ]);
}

// obtener paciente por ID
function getPacientePorId($id)
{
    $db = conexion();
    $stmt = $db->prepare("SELECT * from pacientes where id = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

?>