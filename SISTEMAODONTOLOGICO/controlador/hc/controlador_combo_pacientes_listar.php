<?php
    require '../../modelo/modelo_hc.php';

    $MHC = new Modelo_Hc();
    $consulta = $MHC->listar_combo_pacientes();
    echo json_encode($consulta);

?>