<?php
require_once '/../config/conexion.php';

// insertar atencion
function insertarAtencion($paciente_id, $anamnesis, $dp, $ds, $trat, $plan)
{
    $db = conexion();

    $sql = "INSERT into atenciones (
        paciente_id, anamnesis, diagnostico_principal,
        diagnosticos_secundarios, tratamiento, plan_seguimiento
    ) values (
        :paciente_id, :anamnesis, :dp, :ds, :trat, :plan
    )";

    $stmt = $db->prepare($sql);

    return $stmt->execute([
        ':paciente_id' => $paciente_id,
        ':anamnesis' => $anamnesis,
        ':dp' => $dp,
        ':ds' => $ds,
        ':trat' => $trat,
        ':plan' => $plan
    ]);
}

// Obtener atención por paciente
function getAtencionPorPaciente($id)
{
    $db = conexion();

    $sql = "SELECT * from atenciones where paciente_id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([':id' => $id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>