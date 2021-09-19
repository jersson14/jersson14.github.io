<?php
    require '../../modelo/modelo_grafico.php';

    $MG = new Modelo_Grafico();
    $consulta = $MG->TraerGraficosBar();
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