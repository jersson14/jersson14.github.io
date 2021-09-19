<?php
    require '../../modelo/modelo_doctor.php';

    $MD = new Modelo_Doctor();
    $dni = htmlspecialchars($_POST['dni'],ENT_QUOTES,'UTF-8');
    $nombres = htmlspecialchars($_POST['nombres'],ENT_QUOTES,'UTF-8');
    $apellidos = htmlspecialchars($_POST['apellidos'],ENT_QUOTES,'UTF-8');
    $direccion = htmlspecialchars($_POST['direccion'],ENT_QUOTES,'UTF-8');
    $celular = htmlspecialchars($_POST['celular'],ENT_QUOTES,'UTF-8');
    $sexo = htmlspecialchars($_POST['sexo'],ENT_QUOTES,'UTF-8');
    $usuario = htmlspecialchars($_POST['usuario'],ENT_QUOTES,'UTF-8');
    $contraseña = password_hash($_POST['contraseña'],PASSWORD_DEFAULT,['cost'=>10]);
    $rol = htmlspecialchars($_POST['rol'],ENT_QUOTES,'UTF-8');
    $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
    $consulta = $MD->Registrar_Doctor($dni,$nombres,$apellidos,$direccion,$celular
    ,$sexo,$usuario,$contraseña,$rol,$email);
    echo $consulta;

?>