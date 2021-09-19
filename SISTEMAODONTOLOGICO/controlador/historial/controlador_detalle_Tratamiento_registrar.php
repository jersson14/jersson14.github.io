<?php
    require '../../modelo/modelo_historial.php';

    $MH = new Modelo_Historial();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $tratamiento = htmlspecialchars($_POST['tratamiento'],ENT_QUOTES,'UTF-8');
    $fecha = htmlspecialchars($_POST['fecha'],ENT_QUOTES,'UTF-8');
    $hora = htmlspecialchars($_POST['hora'],ENT_QUOTES,'UTF-8');
    $cantidad = htmlspecialchars($_POST['cantidad'],ENT_QUOTES,'UTF-8');
    $subtotal = htmlspecialchars($_POST['subtotal'],ENT_QUOTES,'UTF-8');
    //convertimos los datos a arreglos con explode()
    $array_tratamiento=explode(",",$tratamiento);
    $array_fecha=explode(",",$fecha);
    $array_hora=explode(",",$hora);
    $array_cantidad=explode(",",$cantidad);
    $array_subtotal=explode(",",$subtotal);
    for ($i=0; $i < count($array_tratamiento); $i++) { 
        $consulta = $MH->Registrar_detalle_Tratamiento($id,$array_tratamiento[$i],$array_fecha[$i],$array_hora[$i],$array_cantidad[$i],$array_subtotal[$i]);
        echo $consulta;
    }   
?>