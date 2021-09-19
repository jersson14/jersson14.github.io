<?php
    require '../../modelo/modelo_cita.php';

    $MC = new Modelo_Citas();
    $idcita = htmlspecialchars($_POST['idcita'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MC->Modificar_Estatus_Citas($idcita,$estatus);
    echo $consulta;

?>