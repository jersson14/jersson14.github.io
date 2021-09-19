<?php
    require '../../modelo/modelo_doctor.php';

    $MD = new Modelo_Doctor();
    $idmedico = htmlspecialchars($_POST['idmedico'],ENT_QUOTES,'UTF-8');
    $dni_actual = htmlspecialchars($_POST['dni_actual'],ENT_QUOTES,'UTF-8');
    $dni_nuevo = htmlspecialchars($_POST['dni_nuevo'],ENT_QUOTES,'UTF-8');
    $nombres = htmlspecialchars($_POST['nombres'],ENT_QUOTES,'UTF-8');
    $apellidos = htmlspecialchars($_POST['apellidos'],ENT_QUOTES,'UTF-8');
    $direccion = htmlspecialchars($_POST['direccion'],ENT_QUOTES,'UTF-8');
    $celular = htmlspecialchars($_POST['celular'],ENT_QUOTES,'UTF-8');
    $sexo = htmlspecialchars($_POST['sexo'],ENT_QUOTES,'UTF-8');

    $consulta = $MD->Editar_Doctor($idmedico,$dni_actual,$dni_nuevo,$nombres,$apellidos,$direccion,$celular
    ,$sexo);
    echo $consulta;

?>