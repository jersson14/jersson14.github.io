<?php
    require '../../modelo/modelo_historial.php';

    $MH = new Modelo_Historial();
    $consulta_id = htmlspecialchars($_POST['consulta_id'],ENT_QUOTES,'UTF-8');
    $historiaid = htmlspecialchars($_POST['historiaid'],ENT_QUOTES,'UTF-8');
    $total = htmlspecialchars($_POST['total'],ENT_QUOTES,'UTF-8');
    $observacion = htmlspecialchars($_POST['observacion'],ENT_QUOTES,'UTF-8');
    $consulta = $MH->Registrar_historial($consulta_id,$historiaid,$total,$observacion);
    echo $consulta;

?>