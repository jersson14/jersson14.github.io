<?php
    require '../../modelo/modelo_ingresos.php';

    $MI = new Modelo_Ingresos();
    $consulta = $MI->listar_total_ingresos();
    echo json_encode($consulta);

?>