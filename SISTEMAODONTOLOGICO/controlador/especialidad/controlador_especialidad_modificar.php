<?php
    require '../../modelo/modelo_especialidad.php';

    $MP = new Modelo_Especialidad();
    $idespecialidad = htmlspecialchars($_POST['idespecialidad'],ENT_QUOTES,'UTF-8');
    $nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
    $consulta = $MP->Modificar_Datos_Especialidad($idespecialidad,$nombre,$descripcion);
    echo $consulta;

?>