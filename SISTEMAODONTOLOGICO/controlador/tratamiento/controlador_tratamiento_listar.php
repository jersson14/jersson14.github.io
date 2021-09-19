<?php
    require '../../modelo/modelo_tratamiento.php';

    $MT = new Modelo_Tratamiento();
    $consulta = $MT->Listar_tratamiento();
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