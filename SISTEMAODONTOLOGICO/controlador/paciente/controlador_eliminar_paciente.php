<?php
    require '../../modelo/modelo_paciente.php';

    $MP = new Modelo_Paciente();
    $idpaciente = htmlspecialchars($_POST['idpaciente'],ENT_QUOTES,'UTF-8');
    $consulta = $MP->Eliminar_Paciente($idpaciente);
    echo $consulta;

?>