<?php
    require '../../modelo/modelo_historial.php';

    $MH = new Modelo_Historial();
    $consulta = $MH->listar_combo_tratamientos();
    echo json_encode($consulta);

?>