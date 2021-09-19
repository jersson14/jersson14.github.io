<?php
    require '../../modelo/modelo_hc.php';

    $MHC = new Modelo_Hc();
    $idhistoria = htmlspecialchars($_POST['idhistoria'],ENT_QUOTES,'UTF-8');
    $ocupacion = htmlspecialchars($_POST['ocupacion'],ENT_QUOTES,'UTF-8');
    $estado_civil = htmlspecialchars($_POST['estado_civil'],ENT_QUOTES,'UTF-8');
    $raza = htmlspecialchars($_POST['raza'],ENT_QUOTES,'UTF-8');
    $grado_instruccion = htmlspecialchars($_POST['grado_instruccion'],ENT_QUOTES,'UTF-8');
    $religion = htmlspecialchars($_POST['religion'],ENT_QUOTES,'UTF-8');
    $lugar_procedencia = htmlspecialchars($_POST['lugar_procedencia'],ENT_QUOTES,'UTF-8');
    $nombre_acompañante = htmlspecialchars($_POST['nombre_acompañante'],ENT_QUOTES,'UTF-8');
    $enfermedad_actual = htmlspecialchars($_POST['enfermedad_actual'],ENT_QUOTES,'UTF-8');
    $sintomas_principales = htmlspecialchars($_POST['sintomas_principales'],ENT_QUOTES,'UTF-8');
    $funciones_biologicas = htmlspecialchars($_POST['funciones_biologicas'],ENT_QUOTES,'UTF-8');
    $antecedentes = htmlspecialchars($_POST['antecedentes'],ENT_QUOTES,'UTF-8');
    $antecedentes_familia = htmlspecialchars($_POST['antecedentes_familia'],ENT_QUOTES,'UTF-8');
    $tipo_enfermedad = htmlspecialchars($_POST['tipo_enfermedad'],ENT_QUOTES,'UTF-8');
    $relato_cronologico = htmlspecialchars($_POST['relato_cronologico'],ENT_QUOTES,'UTF-8');
    $antecedentes_personales = htmlspecialchars($_POST['antecedentes_personales'],ENT_QUOTES,'UTF-8');
    $presion_arterial = htmlspecialchars($_POST['presion_arterial'],ENT_QUOTES,'UTF-8');
    $frecuencia_cardiaca = htmlspecialchars($_POST['frecuencia_cardiaca'],ENT_QUOTES,'UTF-8');
    $frecuencia_respiratoria = htmlspecialchars($_POST['frecuencia_respiratoria'],ENT_QUOTES,'UTF-8');
    $pulso = htmlspecialchars($_POST['pulso'],ENT_QUOTES,'UTF-8');
    $temperatura = htmlspecialchars($_POST['temperatura'],ENT_QUOTES,'UTF-8');
    $descripcion_examen = htmlspecialchars($_POST['descripcion_examen'],ENT_QUOTES,'UTF-8');
    $hilodental = htmlspecialchars($_POST['hilodental'],ENT_QUOTES,'UTF-8');
    $piezadental = htmlspecialchars($_POST['piezadental'],ENT_QUOTES,'UTF-8');
    $olorsabor = htmlspecialchars($_POST['olorsabor'],ENT_QUOTES,'UTF-8');

    $consulta = $MHC->Editar_hc($idhistoria,$ocupacion,$estado_civil,$raza,$grado_instruccion,$religion,$lugar_procedencia,$nombre_acompañante,$enfermedad_actual,
    $sintomas_principales,$funciones_biologicas,$antecedentes,$antecedentes_familia,$tipo_enfermedad,$relato_cronologico,$antecedentes_personales,$presion_arterial,$frecuencia_cardiaca,
    $frecuencia_respiratoria,$pulso,$temperatura,$descripcion_examen,$hilodental,$piezadental,$olorsabor);
    echo $consulta;

?>