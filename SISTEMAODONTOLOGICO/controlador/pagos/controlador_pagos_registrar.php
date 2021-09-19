<?php
    require '../../modelo/modelo_pagos.php';

    $MG = new Modelo_Pagos();
    $paciente = htmlspecialchars($_POST['paciente'],ENT_QUOTES,'UTF-8');
    $total = htmlspecialchars($_POST['total'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
  
    $consulta = $MG->Registrar_pago($paciente,$total,$descripcion);
    echo $consulta;

?>