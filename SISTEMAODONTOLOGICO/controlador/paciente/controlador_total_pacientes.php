<?php
    require '../../modelo/modelo_paciente.php';

    $MP = new Modelo_Paciente();
    $consulta = $MP->listar_total_pacientes();
    echo json_encode($consulta);

?>