<?php
    require '../../modelo/modelo_cita.php';

    $MC = new Modelo_Citas();
    $paciente = htmlspecialchars($_POST['paciente'],ENT_QUOTES,'UTF-8');
    $fecha = htmlspecialchars($_POST['fecha'],ENT_QUOTES,'UTF-8');
    $hora = htmlspecialchars($_POST['hora'],ENT_QUOTES,'UTF-8');
    $medico = htmlspecialchars($_POST['medico'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
    
    $consulta = $MC->Registrar_cita($paciente,$fecha,$hora,$medico,$descripcion);
    echo $consulta;

?>