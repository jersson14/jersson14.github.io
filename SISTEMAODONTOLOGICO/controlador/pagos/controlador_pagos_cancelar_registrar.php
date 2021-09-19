<?php
    require '../../modelo/modelo_pagos.php';

    $MG = new Modelo_Pagos();
    $idpreciopactado = htmlspecialchars($_POST['idpreciopactado'],ENT_QUOTES,'UTF-8');
    $monto = htmlspecialchars($_POST['monto'],ENT_QUOTES,'UTF-8');
    $saldopago = htmlspecialchars($_POST['saldopago'],ENT_QUOTES,'UTF-8');
    $saldoanterior = htmlspecialchars($_POST['saldoanterior'],ENT_QUOTES,'UTF-8');

  
    $consulta = $MG->Registrar_pago_cancelado($idpreciopactado,$monto,$saldopago,$saldoanterior);
    echo $consulta;

?>