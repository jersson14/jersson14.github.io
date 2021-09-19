<?php
    require '../../modelo/modelo_historial.php';

    $MH = new Modelo_Historial();
    $idfua = htmlspecialchars($_POST['idfua'],ENT_QUOTES,'UTF-8');
    $nrocontrol = htmlspecialchars($_POST['nrocontrol'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
  
    $consulta = $MH->Registrar_control($idfua,$nrocontrol,$descripcion);
    echo $consulta;

?>