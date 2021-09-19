<?php
    require '../../modelo/modelo_usuario.php';

    $MU = new Modelo_Usuario();
    $idusuario = htmlspecialchars($_POST['idusuario'],ENT_QUOTES,'UTF-8');
    $usuarioactual = htmlspecialchars($_POST['usuarioactual'],ENT_QUOTES,'UTF-8');
    $usuarionuevo = htmlspecialchars($_POST['usuarionuevo'],ENT_QUOTES,'UTF-8');
    $correoactual = htmlspecialchars($_POST['correoactual'],ENT_QUOTES,'UTF-8');
    $correonuevo = htmlspecialchars($_POST['correonuevo'],ENT_QUOTES,'UTF-8');
    $sexo = htmlspecialchars($_POST['sexo'],ENT_QUOTES,'UTF-8');
    $rol = htmlspecialchars($_POST['rol'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->Modificar_Datos_Usuario($idusuario,$usuarioactual,$usuarionuevo,$correoactual,$correonuevo,$sexo,$rol);
    echo $consulta;

?>