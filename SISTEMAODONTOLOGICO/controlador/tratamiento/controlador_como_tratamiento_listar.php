<?php
    require '../../modelo/modelo_tratamiento.php';

    $MT = new Modelo_Tratamiento();
    $consulta = $MT->listar_combo_tratamiento();
    echo json_encode($consulta);

?>