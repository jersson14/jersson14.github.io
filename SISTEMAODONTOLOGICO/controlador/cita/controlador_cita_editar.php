<?php
    require '../../modelo/modelo_cita.php';

    $MC = new Modelo_Citas();
    $idcita = htmlspecialchars($_POST['idcita'],ENT_QUOTES,'UTF-8');
    $paciente = htmlspecialchars($_POST['paciente'],ENT_QUOTES,'UTF-8');
    $fecha_actual = htmlspecialchars($_POST['fecha_actual'],ENT_QUOTES,'UTF-8');
    $fecha = htmlspecialchars($_POST['fecha'],ENT_QUOTES,'UTF-8');
    $hora_actual = htmlspecialchars($_POST['hora_actual'],ENT_QUOTES,'UTF-8');
    $hora = htmlspecialchars($_POST['hora'],ENT_QUOTES,'UTF-8');
    $estado = htmlspecialchars($_POST['estado'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
    
    $consulta = $MC->Editar_cita($idcita,$paciente,$fecha_actual,$fecha,$hora_actual,$hora,$estado,$descripcion);
    echo $consulta;

?>