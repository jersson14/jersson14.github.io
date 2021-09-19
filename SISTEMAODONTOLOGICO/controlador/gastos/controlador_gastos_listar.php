<?php
    require '../../modelo/modelo_gastos.php';

    $MG = new Modelo_Gastos();
    $consulta = $MG->lista_gastos();
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