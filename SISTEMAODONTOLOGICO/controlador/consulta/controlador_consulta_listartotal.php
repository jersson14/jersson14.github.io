<?php
    require '../../modelo/modelo_consulta.php';

    $MCO = new Modelo_Consulta();
    $consulta = $MCO->lista_consulta();
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