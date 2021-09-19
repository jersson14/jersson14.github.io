<?php
    require '../../modelo/modelo_ingresos.php';

    $MI = new Modelo_Ingresos();
    $consulta = $MI->lista_total_ingresos();
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