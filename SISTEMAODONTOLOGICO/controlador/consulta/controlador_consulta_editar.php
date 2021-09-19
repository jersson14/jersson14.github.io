<?php
    require '../../modelo/modelo_consulta.php';

    $MCO = new Modelo_Consulta();
    $idconsulta = htmlspecialchars($_POST['idconsulta'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
    $diagnostico1 = htmlspecialchars($_POST['diagnostico1'],ENT_QUOTES,'UTF-8');
    $diagnostico2 = htmlspecialchars($_POST['diagnostico2'],ENT_QUOTES,'UTF-8');
    
    $consulta = $MCO->Editar_consulta($idconsulta,$descripcion,$diagnostico1,$diagnostico2);
    echo $consulta;

?>