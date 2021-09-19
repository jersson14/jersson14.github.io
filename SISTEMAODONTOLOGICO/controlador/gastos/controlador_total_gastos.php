<?php
    require '../../modelo/modelo_gastos.php';

    $MG = new Modelo_Gastos();
    $consulta = $MG->listar_total_gastos();
    echo json_encode($consulta);

?>