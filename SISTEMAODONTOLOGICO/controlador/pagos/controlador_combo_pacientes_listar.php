<?php
    require '../../modelo/modelo_pagos.php';

    $MG = new Modelo_Pagos();
    $consulta = $MG->listar_combo_pacientes();
    echo json_encode($consulta);

?>