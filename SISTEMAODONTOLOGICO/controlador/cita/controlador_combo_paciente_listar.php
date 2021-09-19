<?php
    require '../../modelo/modelo_cita.php';

    $MC = new Modelo_Citas();
    $consulta = $MC->listar_combo_pacientes();
    echo json_encode($consulta);

?>