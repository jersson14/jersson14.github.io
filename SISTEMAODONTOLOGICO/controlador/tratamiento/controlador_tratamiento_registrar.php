<?php
    require '../../modelo/modelo_tratamiento.php';

    $MT = new Modelo_Tratamiento();
    $tratamiento = htmlspecialchars($_POST['tratamiento'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
    $especialidad = htmlspecialchars($_POST['especialidad'],ENT_QUOTES,'UTF-8');
    $precio = htmlspecialchars($_POST['precio'],ENT_QUOTES,'UTF-8');
  
    $consulta = $MT->Registrar_tratamiento($tratamiento,$descripcion,$especialidad,$precio);
    echo $consulta;

?>