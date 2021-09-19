<?php
    require '../../modelo/modelo_tratamiento.php';

    $MT = new Modelo_Tratamiento();
    $tratamiento_id = htmlspecialchars($_POST['tratamiento_id'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MT->Modificar_Estatus_Tratamiento($tratamiento_id,$estatus);
    echo $consulta;

?>