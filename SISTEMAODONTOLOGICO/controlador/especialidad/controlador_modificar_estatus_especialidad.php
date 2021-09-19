<?php
    require '../../modelo/modelo_especialidad.php';

    $ME = new Modelo_Especialidad();
    $servicio_id = htmlspecialchars($_POST['servicio_id'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $ME->Modificar_Estatus_Especialidad($servicio_id,$estatus);
    echo $consulta;

?>