<?php
    require '../../modelo/modelo_consulta.php';

    $MCO = new Modelo_Consulta();
    $consulta = $MCO->listar_combo_paciente_consulta();
    echo json_encode($consulta);

?>