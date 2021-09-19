<?php
session_start();
if(!isset($_SESSION['S_IDUSUARIO'])){
	header('Location: ../../../Login/index.php');
}
?>
<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once '../../../conexion_reporte/r_conexion.php';
$consultafua= "SELECT
pacientes.dni_paci, 
pacientes.nombres_paci, 
pacientes.apellidos_paci, 
pacientes.sexo_paci, 
pacientes.fecha_nacimiento, 
pacientes.edad, 
pacientes.celular_paci, 
pacientes.direccion_paci,
pacientes.lugar_nacimiento,
citas.cita_descripcion, 
consulta.consulta_descripcion, 
consulta.consulta_fecharegisro, 
consulta.consulta_diagnostico_presuntivo, 
consulta.consulta_diagnostico_definitivo, 
fua.id_fua, 
historia.*, 
medico.COP, 
medico.medico_nombre, 
medico.medico_apellidos, 
fua.fecharegis_fua,
fua.totaltratamiento

FROM
pacientes
INNER JOIN
citas
ON 
    pacientes.paciente_id = citas.id_paciente
INNER JOIN
consulta
ON 
    citas.cita_id = consulta.cita_id
INNER JOIN
fua
ON 
    consulta.consulta_id = fua.id_consulta
INNER JOIN
historia
ON 
    fua.id_historia = historia.historia_id AND
    pacientes.paciente_id = historia.id_paciente
INNER JOIN
medico
ON 
    citas.medico_id = medico.medico_id
WHERE
id_fua ='".$_GET['id']."'";
    $resultado=$mysqli->query($consultafua);
    while($row=$resultado->fetch_assoc()){
$html='<div margin: 0;><h2  style="text-align:center;float:left;width:100%; margin: 0;font-family:Cooper Black; color:#E75480">CONSULTORIO DENTAL "ODONTO STETIC COLLAVINO"</h2></div><div style="float:left;widht:100%; text-align:center">
<img src="../../../img/acepto/diente2.png" alt="Girl in a jacket" width="120" height="115">
</div>

<div style="margin: 0; text-align:center; color:blue"><h2 style="margin: 0; ">HISTORIA CLÍNICA</h2></div>
<div style="text-align:center; margin: 0;"><span style="text-align:center;"><b align="center">'.utf8_encode($row['fecharegis_fua']).'</b></span></div>
<div style="margin: 0; border-radius:10px;border: 1px black solid;"><h4 style="color: white; background-color:#E75480;border-radius:10px;text-align:center ;widht:300px"><b>DATOS PERSONALES</b></h4></div>
<table style="  font-size: 12px;width:100%;border-collapse:collapse; border-color:#FF0080; margin: 0;" border="1">
<thead align="left">
<tr>
<td align="left"><b>DNI: </b><span>'.utf8_encode($row['dni_paci']).'</span></td>

<td align="left">
<span font-style: normal ><b>PACIENTE: </b>'.utf8_encode($row['nombres_paci']).' '.utf8_encode($row['apellidos_paci']).'</span>
</td>

<td align="left">
<span><b>SEXO: </b>'.utf8_encode($row['sexo_paci']).'</span>
</td>

</tr>
</thead>
</table>


<table style="font-size: 12px;width:100%;border-collapse:collapse;text-align: left; border-color:#FF0080;" border="1">
<thead>
<tr>
<td align="left" style="float: left;width:40%">
<span><b>FECHA NACIMIENTO: </b>'.utf8_encode($row['fecha_nacimiento']).'</span>
</td>
<td align="left" style="float: left;width:30%">
<span><b>EDAD: </b>'.$row['edad'].'</span>
</td>
<td align="left" style="float: left;width:30%">
<span><b>CELULAR: </b>'.$row['celular_paci'].'</span>
</td>
</tr>
</thead>
</table>

<table style="font-size: 12px;width:100%;border-collapse:collapse;text-align: right; border-color:#FF0080;" border="1">
<thead>
<tr>
<td align="left">
<span><b>DIRECCION: </b>'.utf8_encode($row['direccion_paci']).'</span>
</td>
</tr>
</thead>
</table>

<table style="font-size: 12px;width:100%;border-collapse:collapse;text-align: right; border-color:#FF0080;" border="1">
<thead>
<tr>
<td align="left" style="float: left;width:50%">
<span><b>NRO. HISTORIA CLINICA: </b>'.utf8_encode($row['nro_historia']).'</span>
</td>
<td align="left" style="float: left;width:50%">
<span><b>LUGAR DE NACIMIENTO: </b>'.utf8_encode($row['lugar_nacimiento']).'</span>
</td>
</tr>
</thead>
</table>

<table style="font-size: 12px;width:100%;border-collapse:collapse;text-align: right; border-color:#FF0080;" border="1">
<thead>
<tr>
<td align="left" style="float: left;width:50%" >
<span><b>OCUPACIÓN: </b>'.utf8_encode($row['ocupacion']).'</span>
</td>
<td align="left" style="float: left;width:50%">
<span><b>ESTADO CIVIL: </b>'.utf8_encode($row['estado_civil']).'</span>
</td>
</tr>
</thead>
</table>

<table style="font-size: 12px;width:100%;border-collapse:collapse;text-align: right; border-color:#FF0080; " border="1">
<thead>
<tr>
<td align="left" style="float: left;width:50%" >
<span><b>RAZA: </b>'.utf8_encode($row['Raza']).'</span>
</td>
<td align="left" style="float: left;width:50%" >
<span><b>GRADO DE INSTRUCCIÓN: </b>'.utf8_encode($row['grado_instruccion']).'</span>
</td>
</tr>
</thead>
</table>

<table style="font-size: 12px;width:100%;border-collapse:collapse;text-align: right; border-color:#FF0080;" border="1">
<thead>
<tr>
<td align="left" style="float: left;width:50%" >
<span><b>RELIGIÓN: </b>'.utf8_encode($row['religion']).'</span>
</td>
<td align="left" style="float: left;width:50%" >
<span><b>LUGAR DE PROCEDENCIA: </b>'.utf8_encode($row['lugar_procedencia']).'</span>
</td>
</tr>
</thead>
</table>

<table style="font-size: 12px;width:100%;border-collapse:collapse;text-align: right; border-color:#FF0080;" border="1">
<thead>
<tr>
<td align="left" style="float: left;width:100%" >
<span><b>NOMBRE Y APELLIDOS DEL ACOMPAÑANTE: </b>'.utf8_encode($row['nombre_ape_acompañante']).'</span></td>
</tr>
</thead>
</table>

<table style="font-size: 12px;width:100%;border-collapse:collapse;text-align: right; border-color:#FF0080;" border="1">
<thead>
<tr>
<td align="left" style="float: left;width:50%" >
<span><b>ENFERMEDAD ACTUAL: </b>'.utf8_encode($row['enfermedad_actual']).'</span>
</td>
<td align="left" style="float: left;width:50%" >
<span><b>SINTOMAS PRINCIPALES: </b>'.utf8_encode($row['sig_sintomas_principales']).'</span>
</td>
</tr>
</thead>
</table>

<table style="font-size: 12px;width:100%;border-collapse:collapse;text-align: right; border-color:#FF0080;" border="1">
<thead>
<tr>
<td align="left" style="float: left;width:50%" >
<span><b>FUNCIONES BIOLÓGICAS: </b>'.utf8_encode($row['funciones_biologicas']).'</span>
</td>
<td align="left" style="float: left;width:50%" >
<span><b>ANTECEDENTES: </b>'.utf8_encode($row['antecedentes']).'</span>
</td>
</tr>
</thead>
</table>

<table style="font-size: 12px;width:100%;border-collapse:collapse;text-align: right; border-color:#FF0080;" border="1">
<thead>
<tr>
<td align="left" style="float: left;width:100%" >
<span><b>ANTECEDENTES FAMILIARES: </b>'.utf8_encode($row['antecedentes']).'</span>
</td>
</tr>
</thead>
</table>

<table style="font-size: 12px;width:100%;border-collapse:collapse;text-align: right; border-color:#FF0080;" border="1">
<thead>
<tr>
<td align="left" style="float: left;width:50%" >
<span><b>TIPO DE ENFERMEDAD: </b>'.utf8_encode($row['antecedentes']).'</span>
</td>
<td align="left" style="float: left;width:50%" >
<span><b>RELATO CRONOLÓGICO: </b>'.utf8_encode($row['antecedentes']).'</span>
</td>
</tr>
</thead>
</table>

<table style="font-size: 12px;width:100%;border-collapse:collapse;text-align: right; border-color:#FF0080;" border="1">
<thead>
<tr>
<td align="left" style="float: left;width:100%" >
<span><b>ANTECEDENTES PERSONALES: </b>'.utf8_encode($row['antecedentes']).'</span>
</td>
</tr>
</thead>
</table>


<div style="border-radius:10px;border: 1px black solid;"><h4 style="color:white; background-color:#E75480;border-radius:10px;text-align:center;"><b>EXPLORACIÓN FÍSICA: EXÁMEN CLÍNICO GENERAL</b></h4></div>

<table style="font-size: 12px;width:100%;border-collapse:collapse;text-align: right; border-color:#FF0080;" border="1">
<thead>
<tr>
<td align="left" style="float: left;width:50%" >
<span><b>PRESIÓN ARTERIAL(PA): </b>'.utf8_encode($row['presion_arterial']).'</span>
</td>
<td align="left" style="float: left;width:50%" >
<span><b>FRECUENCIA CARDIACA(FC): </b>'.utf8_encode($row['frecuencia_cardiaca']).'</span>
</td>
</tr>
</thead>
</table>


<table style="font-size: 12px;width:100%;border-collapse:collapse;text-align: right; border-color:#FF0080;" border="1">
<thead>
<tr>
<td align="left" style="float: left;width:50%" >
<span><b>FRECUENCIA RESPIRATORIA(FR): </b>'.utf8_encode($row['frecuencia_respiratoria']).'</span>
</td>
<td align="left" style="float: left;width:50%" >
<span><b>PULSO: </b>'.utf8_encode($row['pulso']).'</span>
</td>
</tr>
</thead>
</table>

<table style="font-size: 12px;width:100%;border-collapse:collapse;text-align: right; border-color:#FF0080;" border="1">
<thead>
<tr>
<td align="left" style="float: left;width:100%" >
<span><b>TEMPERATURA: </b>'.utf8_encode($row['temperatura']).'</span>
</td>
</tr>
</thead>
</table>

<div style="border-radius:10px;border: 1px black solid;"><h4 style="color:white; background-color:#E75480;border-radius:10px;text-align:center;"><b>DIAGNÓSTICO</b></h4></div>

<table style="font-size: 12px;width:100%;border-collapse:collapse;text-align: right; border-color:#E75480;" border="1">
<thead>
<tr>
<td align="left" style="float: left;width:100%" >
<span><b>MOTIVO DE CONSULTA: </b>'.utf8_encode($row['consulta_descripcion']).'</span>
</td>
</tr>
</thead>
</table>

<table style="font-size: 12px;width:100%;border-collapse:collapse;text-align: right; border-color:#E75480;" border="1">
<thead>
<tr>
<td align="left" style="float: left;width:100%" >
<span><b>DIAGNÓSTICO PRESUNTIVO: </b>'.utf8_encode($row['consulta_diagnostico_presuntivo']).'</span>
</td>
</tr>
</thead>
</table>

<table style="font-size: 12px;width:100%;border-collapse:collapse;text-align: right; border-color:#E75480;" border="1">
<thead>
<tr>
<td align="left" style="float: left;width:100%" >
<span><b>DIAGNÓSTICO DEFINITIVO: </b>'.utf8_encode($row['consulta_diagnostico_definitivo']).'</span>
</td>
</tr>
</thead>
</table>

<div style="border-radius:10px;border: 1px black solid;"><h4 style="color:white; background-color:#E75480;border-radius:10px;text-align:center;"><b>TRATAMIENTO</b></h4></div>
<table style="font-size: 12px; width:100%; border-collapse:collapse" border="1">
<thead style="">
        <tr bgcolor="#E75480" >
            <th style="color:white">Orden</th>
            <th style="color:white">Tratamiento</th>
            <th style="color:white">Fecha Cita</th>
            <th style="color:white">Hora</th>
            <th style="color:white">Precio</th>
            <th style="color:white">Cantidad</th>
            <th style="color:white">Subtotal</th>


        </tr>
</thead>';
$consultatratamiento= "SELECT
fua.id_fua, 
tratamiento.nombre_trata, 
detalle_tratamiento.Fecha, 
detalle_tratamiento.Hora, 
CONCAT_WS(' ','S/.',fua.totaltratamiento)as totaltodo,
detalle_tratamiento.cantidad, 
detalle_tratamiento.SubTotal, 
tratamiento.tarifa_trata
FROM
fua
INNER JOIN
detalle_tratamiento
ON 
    fua.id_fua = detalle_tratamiento.fua_id
INNER JOIN
tratamiento
ON 
    detalle_tratamiento.id_tratamiento = tratamiento.tratamiento_id where  fua.id_fua='".$_GET['id']."'";
    $resultadotratamiento=$mysqli->query($consultatratamiento);
    $contadortratamiento=0;
    while($rowtratamiento=$resultadotratamiento->fetch_assoc()){
    $contadortratamiento++;
    $html.='<tr>
                <td  style="text-align:center">'.$contadortratamiento.'</td>
                <td  style="text-align:center">'.utf8_encode($rowtratamiento['nombre_trata']).'</td>
                <td  style="text-align:center">'.utf8_encode($rowtratamiento['Fecha']).'</td>
                <td  style="text-align:center">'.utf8_encode($rowtratamiento['Hora']).'</td>
                <td  style="text-align:center">'.'S/. '.utf8_encode($rowtratamiento['tarifa_trata']).'</td>
                <td  style="text-align:center">'.utf8_encode($rowtratamiento['cantidad']).'</td>
                <td  style="text-align:center">'.utf8_encode($rowtratamiento['SubTotal']).'</td>
    
    ';

}
$html.='</tr><tbody>
</tbody>
</table>
<div style="text-align:right">


<b style="text-align: right;">TOTAL: '.'S/. '.utf8_encode($row['totaltratamiento']).'</b>
</div>

<br>
<div style="border: 2px solid black;border-radius:5px;">
<div style="font-size: 12px;border-style: solid; border-radius: 10px; borde-color: black" border="2">
<p style="border-style: solid; border-radius:10px; borde-color:black; text-align: justify">Yo <b>'.utf8_encode($row['nombres_paci']).' '.utf8_encode($row['apellidos_paci']).'</b> de <b>'.utf8_encode($row['edad']).'</b> años de edad
identificado con DNI N° <b>'.utf8_encode($row['dni_paci']).'</b> Domiciliado en <b>'.utf8_encode($row['direccion_paci']).'</b> y/o Sr / Sra <b>'.utf8_encode($row['nombres_paci']).' '.utf8_encode($row['apellidos_paci']).'</b> de <b>'.utf8_encode($row['edad']).'</b> años
con DNI N° <b>'.utf8_encode($row['dni_paci']).'</b> domiciliado en <b>'.utf8_encode($row['direccion_paci']).'</b> en calidad de representante legal y/o apoderado del paciente en pleno uso de mis facultades y bajo mi absoluta responsabilidad MANIFIESTO VOLUNTARIAMENTE LO PRIMERO
que el Dr(a) <b>'.utf8_encode($row['medico_nombre']).' '.utf8_encode($row['medico_apellidos']).'</b> con el registro COP N° <b>'.utf8_encode($row['COP']).'</b> de manera confidencial respetuosa comprensible y veraz el diagnóstico y pronóstico de mi enfermedad<br>
a)................................................................................ b)................................................................................... <br>
Asi mismo con la necesidad de realizar en mi persona/familiar el procedimiento odontológico o quirúrgico que a continuación se describe<br>
a)................................................................................ b)................................................................................... <br>
SEGUNDO tambien ME HA INFORMADO, con la misma claridad, la naturaleza y el proposito de la operación o procedimiento los métodos alternativos, los cuales a pesar de su conveniencia no están exentos de existiendo riesgo antes durante y después, así como, los efectos secundarios, contra indicaciones, advertencias de los
medicamentos que se prescriben y administren.<br>
TERCERO. ESTANDO PLENAMENTE INFORMADO Y HABIENDO COMPRENDIDO los dos puntos anteriores DOY CONSENTIMIENTO AL DR(a) que me atiende a su equipo y al consultorio dental "ODONTO STETIC COLLAVINO" para............................... procedimientos que puedan contemplarse durante el acto previamente autorizado y que
en opinión se considere necesario y/o aconsejable en el curso de la intervención.<br>
Luego deja lectura preocedente en señal de libre manifestación, voluntad y conformidad con todo lo que tenga necesidad de autenticación notarial suscribo y estampo mi huella digital el día <b>'.utf8_encode($row['fecharegis_fua']).'</b>, asi mismo doy fe de la firma del odontólogo(a) tratante.
 </p>
</div>

<br>
<div style="float:left;width:33%; text-align:center">
<img src="../../../img/firma.png" width="200" height="100">
<b style="margin-top:0">__________________________________</b> 
<br><b style="font-size: 12px;">Firma Odontólogo Responsable</b> 
</div>
<br><br><br><br><br>
<div style="float:left;width:33%; text-align:center;margin-top:0">
<b >____________________________</b> 
<br><b style="font-size: 12px;text-align:center">Firma de Paciente</b> 
</div>
<div style="float:right;width:33%; text-align:right">
<img src="../../../img/acepto/check.png" alt="Girl in a jacket" width="500" height="600">
</div><br><br>
</div>



<div style="border-radius:10px"><h4 style="color:white; background-color:#E75480;border-radius:10px;text-align:center;"><b>ODONTOGRAMA INICIAL</b></h4></div>
<table style="font-size: 12px; width:100%; height:100%; border-collapse:collapse" border="1">
<thead style="">
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
</thead>';
$consultaodontogramainicial= "SELECT
fua.id_fua, 
consulta.consulta_id, 
tbl_odontograma_paciente.img1, 
tbl_odontograma_paciente.img2, 
tbl_odontograma_paciente.img3, 
tbl_odontograma_paciente.img4, 
tbl_odontograma_paciente.img5, 
tbl_odontograma_paciente.img6, 
tbl_odontograma_paciente.img7, 
tbl_odontograma_paciente.img8, 
tbl_odontograma_paciente.img9, 
tbl_odontograma_paciente.img10, 
tbl_odontograma_paciente.img11, 
tbl_odontograma_paciente.img12, 
tbl_odontograma_paciente.img13, 
tbl_odontograma_paciente.img14, 
tbl_odontograma_paciente.img15, 
tbl_odontograma_paciente.img16, 
tbl_odontograma_paciente.especificaciones, 
tbl_odontograma_paciente.observaciones
FROM
tbl_odontograma_paciente
INNER JOIN
consulta
ON 
    tbl_odontograma_paciente.id_consulta = consulta.consulta_id
INNER JOIN
fua
ON 
    consulta.consulta_id = fua.id_consulta where  fua.id_fua='".$_GET['id']."'";
    $resultadoodontogramainicial=$mysqli->query($consultaodontogramainicial);
    while($rowodontogramainicial=$resultadoodontogramainicial->fetch_assoc()){
    $html.='<tr>
                <td  style="text-align:center;margin: 4;"><img src="../../'.utf8_encode($rowodontogramainicial['img1']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramainicial['img2']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramainicial['img3']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramainicial['img4']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramainicial['img5']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramainicial['img6']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramainicial['img7']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramainicial['img8']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramainicial['img9']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramainicial['img10']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramainicial['img11']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramainicial['img12']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramainicial['img13']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramainicial['img14']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramainicial['img15']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramainicial['img16']).'" width="30" height="46" ></td>
                
    ';

}
$html.='</tr><tbody>
</tbody>
</table><br>';
$consultafinal= "SELECT distinct
fua.id_fua, 
consulta.consulta_id, 
tbl_odontograma_paciente.especificaciones, 
tbl_odontograma_paciente.observaciones
FROM
tbl_odontograma_paciente
INNER JOIN
consulta
ON 
    tbl_odontograma_paciente.id_consulta = consulta.consulta_id
INNER JOIN
fua
ON 
    consulta.consulta_id = fua.id_consulta
WHERE
id_fua ='".$_GET['id']."'";
    $resultadofinal=$mysqli->query($consultafinal);
    while($rowfinal=$resultadofinal->fetch_assoc()){

$html.='<div style="border: 2px solid black;border-radius:5px"><div style="font-size: 12px;border-style: solid; border-radius: 10px; borde-color: black" border="2">
<b>Especificaciones: </b><p style="border-style: solid; border-radius:10px; borde-color:black; text-align: justify">'.utf8_encode($rowfinal['especificaciones']).'</p>

</div>
<div style="font-size: 12px;border-style: solid; border-radius: 10px; borde-color: black" border="2">
<b>Observaciones: </b><p style="border-style: solid; border-radius:10px; borde-color:black; text-align: justify">'.utf8_encode($rowfinal['observaciones']).'</p>

</div>
</div>

<div style="border-radius:10px;border: 1px black solid;"><h4 style="color:white; background-color:#E75480;border-radius:10px;text-align:center;"><b>CONTROLES DE TRATAMIENTO</b></h4></div>
<table style="font-size: 12px; width:100%; border-collapse:collapse" border="1">
<thead style="">
        <tr bgcolor="#E75480" >
            <th style="color:white">Orden</th>
            <th style="color:white">Nro. Control</th>
            <th style="color:white">Descripción</th>
            <th style="color:white">Fecha y hora</th>
        </tr>
</thead>';
    }
$consultacontrol= "SELECT
controles.Nro_control, 
controles.Descripcion, 
controles.Fecha_Control, 
fua.id_fua
FROM
fua
INNER JOIN
controles
ON 
    fua.id_fua = controles.fua_id where  fua.id_fua='".$_GET['id']."'";
    $resultadocontrol=$mysqli->query($consultacontrol);
    $contadorcontrol=0;
    while($rowcontrol=$resultadocontrol->fetch_assoc()){
    $contadorcontrol++;
    $html.='<tr>
                <td  style="text-align:center">'.$contadorcontrol.'</td>
                <td  style="text-align:center">'.utf8_encode($rowcontrol['Nro_control']).'</td>
                <td  style="text-align:center">'.utf8_encode($rowcontrol['Descripcion']).'</td>
                <td  style="text-align:center">'.utf8_encode($rowcontrol['Fecha_Control']).'</td>

    
    ';

}
$html.='</tr><tbody>
</tbody>
</table>


<div style="border-radius:10px"><h4 style="color:white; background-color:#E75480;border-radius:10px;text-align:center;"><b>ODONTOGRAMA FINAL</b></h4></div>
<table style="font-size: 12px; width:100%; height:100%; border-collapse:collapse" border="1">
<thead style="">
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
</thead>';
$consultaodontogramafinal= "SELECT
fua.id_fua, 
consulta.consulta_id, 
tbl_odontograma_pacientefinal.img1, 
tbl_odontograma_pacientefinal.img2, 
tbl_odontograma_pacientefinal.img3, 
tbl_odontograma_pacientefinal.img4, 
tbl_odontograma_pacientefinal.img5, 
tbl_odontograma_pacientefinal.img6, 
tbl_odontograma_pacientefinal.img7, 
tbl_odontograma_pacientefinal.img8, 
tbl_odontograma_pacientefinal.img9, 
tbl_odontograma_pacientefinal.img10, 
tbl_odontograma_pacientefinal.img11, 
tbl_odontograma_pacientefinal.img12, 
tbl_odontograma_pacientefinal.img13, 
tbl_odontograma_pacientefinal.img14, 
tbl_odontograma_pacientefinal.img15, 
tbl_odontograma_pacientefinal.img16
FROM
consulta
INNER JOIN
fua
ON 
    consulta.consulta_id = fua.id_consulta
INNER JOIN
tbl_odontograma_pacientefinal
ON 
    consulta.consulta_id = tbl_odontograma_pacientefinal.id_consulta where  fua.id_fua='".$_GET['id']."'";
    $resultadoodontogramafinal=$mysqli->query($consultaodontogramafinal);
    while($rowodontogramafinal=$resultadoodontogramafinal->fetch_assoc()){
    $html.='<tr>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramafinal['img1']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramafinal['img2']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramafinal['img3']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramafinal['img4']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramafinal['img5']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramafinal['img6']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramafinal['img7']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramafinal['img8']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramafinal['img9']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramafinal['img10']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramafinal['img11']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramafinal['img12']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramafinal['img13']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramafinal['img14']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramafinal['img15']).'" width="30" height="46" ></td>
                <td  style="text-align:center"><img src="../../'.utf8_encode($rowodontogramafinal['img16']).'" width="30" height="46" ></td>
                
    ';

}
$html.='</tr><tbody>
</tbody>
</table><br>';
$consultafinal1= "SELECT DISTINCT
fua.id_fua, 
consulta.consulta_id, 
tbl_odontograma_pacientefinal.especificaciones, 
tbl_odontograma_pacientefinal.observaciones
FROM
consulta
INNER JOIN
fua
ON 
    consulta.consulta_id = fua.id_consulta
INNER JOIN
tbl_odontograma_pacientefinal
ON 
    consulta.consulta_id = tbl_odontograma_pacientefinal.id_consulta
WHERE
id_fua ='".$_GET['id']."'";
    $resultadofinal1=$mysqli->query($consultafinal1);
    while($rowfinal1=$resultadofinal1->fetch_assoc()){

$html.='<div style="border: 2px solid black;border-radius:5px">
<div style="font-size: 12px; border-radius: 10px; borde-color: black" border="2">
<b>Especificaciones: </b><p style="border-style: solid; border-radius:10px; borde-color:black; text-align: justify">'.utf8_encode($rowfinal1['especificaciones']).'</p>

</div>
<div style="font-size: 12px;border-style: solid; border-radius: 10px; borde-color: black" border="2">
<b>Observaciones: </b><p style="border-style: solid; border-radius:10px; borde-color:black; text-align: justify">'.utf8_encode($rowfinal1['observaciones']).'</p>

</div>
</div>
';
    }
}

$mpdf = new \Mpdf\Mpdf(['mode' => ' utf-8', 'format' => 'letter']);
$mpdf->WriteHTML($html);
$mpdf->Output();

