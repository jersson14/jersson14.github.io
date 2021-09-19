<?php
    require '../../modelo/modelo_paciente.php';

    $MP = new Modelo_Paciente();
    $dni = htmlspecialchars($_POST['dni'],ENT_QUOTES,'UTF-8');
    $nombres = htmlspecialchars($_POST['nombres'],ENT_QUOTES,'UTF-8');
    $apellidos = htmlspecialchars($_POST['apellidos'],ENT_QUOTES,'UTF-8');
    $sexo = htmlspecialchars($_POST['sexo'],ENT_QUOTES,'UTF-8');
    $fechanacimiento = htmlspecialchars($_POST['fechanacimiento'],ENT_QUOTES,'UTF-8');
    $lugar_nacimiento = htmlspecialchars($_POST['lugar_nacimiento'],ENT_QUOTES,'UTF-8');
    $celular = htmlspecialchars($_POST['celular'],ENT_QUOTES,'UTF-8');
    $direccion = htmlspecialchars($_POST['direccion'],ENT_QUOTES,'UTF-8');
    $consulta = $MP->Registrar_Paciente($dni,$nombres,$apellidos,$sexo,$fechanacimiento,$lugar_nacimiento,$celular,$direccion);
    echo $consulta;

?>