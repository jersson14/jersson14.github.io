<?php
    require '../../modelo/modelo_cita.php';

    $MC = new Modelo_Citas();
    $consulta = $MC->listar_total_Citas();
    echo json_encode($consulta);

?>