<?php
    require '../../modelo/modelo_especialidad.php';

    $ME = new Modelo_Especialidad();
    $nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
    $consulta = $ME->Registrar_Especialidad($nombre,$descripcion);
    echo $consulta;

?>