<?php
    require '../../modelo/modelo_especialidad.php';

    $ME = new Modelo_Especialidad();
    $consulta = $ME->Listar_Especialidad();
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