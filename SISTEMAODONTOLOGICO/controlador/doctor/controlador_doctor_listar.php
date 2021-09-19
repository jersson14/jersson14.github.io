<?php
    require '../../modelo/modelo_doctor.php';

    $MD = new Modelo_Doctor();
    $consulta = $MD->Listar_doctor();
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