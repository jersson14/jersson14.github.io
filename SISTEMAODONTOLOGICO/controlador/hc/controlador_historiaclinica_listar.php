<?php
    require '../../modelo/modelo_hc.php';

    $MHC = new Modelo_Hc();
    $consulta = $MHC->Listar_historiac();
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