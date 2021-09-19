<?php
    require '../../modelo/modelo_gastos.php';

    $MG = new Modelo_Gastos();
    $idgasto = htmlspecialchars($_POST['idgasto'],ENT_QUOTES,'UTF-8');
    $tipo = htmlspecialchars($_POST['tipo'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
    $cantidad = htmlspecialchars($_POST['cantidad'],ENT_QUOTES,'UTF-8');
    $monto = htmlspecialchars($_POST['monto'],ENT_QUOTES,'UTF-8');
    $consulta = $MG->Editar_Gasto($idgasto,$tipo,$descripcion,$cantidad,$monto);
    echo $consulta;

?>