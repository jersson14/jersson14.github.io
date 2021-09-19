<?php
    require '../../modelo/modelo_pagos.php';

    $MG = new Modelo_Pagos();
    $consulta = $MG->Listar_pagos();
    if($consulta){
        echo json_encode($consulta);
    }else{
        echo '{
            "sEcho": 1,
            "iTotalRecords": "0",
            "iTotalDisplayRecords": "0",
            "aaData":[]
        }';
    }

?>