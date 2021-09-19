<?php
    require '../../modelo/modelo_hc.php';

    $MHC = new Modelo_Hc();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $consulta = $MHC->Traerdnipaciente($id);
    echo json_encode($consulta);

?>