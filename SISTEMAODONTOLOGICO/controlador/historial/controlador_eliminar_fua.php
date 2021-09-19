<?php
    require '../../modelo/modelo_historial.php';

    $MH = new Modelo_Historial();
    $id_fua = htmlspecialchars($_POST['id_fua'],ENT_QUOTES,'UTF-8');
    $consulta = $MH->Eliminar_fua($id_fua);
    echo $consulta;

?>