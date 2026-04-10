<?php
require_once '/../config/conexion.php';

// Insertar triaje completo
function insertarTriaje($datos)
{
    $db = conexion();

    $sql = "INSERT into triajes (
        paciente_id, tension_sistolica, tension_diastolica,
        frecuencia_cardiaca, frecuencia_respiratoria, temperatura,
        saturacion_oxigeno, glasgow, eva, glucemia,
        vomitos, deposiciones, diuresis,
        peso, talla, usuario_id, categoria, flujo
    ) values (
        :paciente_id, :ts, :td,
        :fc, :fr, :temp,
        :sat, :glasgow, :eva, :glucemia,
        :vomitos, :deposiciones, :diuresis,
        :peso, :talla, :usuario_id, :categoria, :flujo
    )";

    $stmt = $db->prepare($sql);
    return $stmt->execute($datos);
}

// obtener triaje por paciente
function getTriajePorPaciente($paciente_id)
{
    $db = conexion();
    $stmt = $db->prepare("SELECT * from triajes where paciente_id = :id");
    $stmt->execute([':id' => $paciente_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>