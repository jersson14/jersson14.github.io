<?php
    require '../../modelo/modelo_cita.php';

    $MC = new Modelo_Citas();
    $consulta = $MC->listar_combo_medico();
    echo json_encode($consulta);

?>