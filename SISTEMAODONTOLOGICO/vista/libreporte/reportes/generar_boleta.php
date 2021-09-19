<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once '../../../conexion_reporte/r_conexion.php';
$consulta= "SELECT
pacientes.dni_paci, 
pacientes.nombres_paci, 
pacientes.apellidos_paci, 
citas.cita_id, 
CONCAT_WS(' ',nombres_paci,apellidos_paci)as Paciente, 
consulta.consulta_id, 
fua.id_fua, 
fua.fecharegis_fua, 
fua.totaltratamiento,
CONCAT_WS(' ','S/.',fua.totaltratamiento)as total,
tratamiento.tratamiento_id, 
detalle_tratamiento.cantidad, 
CONCAT_WS(' ','S/.',detalle_tratamiento.SubTotal)as Sub_total, 
tratamiento.nombre_trata
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
detalle_tratamiento
ON 
    fua.id_fua = detalle_tratamiento.fua_id
INNER JOIN
tratamiento
ON 
    detalle_tratamiento.id_tratamiento = tratamiento.tratamiento_id
    
where fua.id_fua='".$_GET['id']."'";
$resultado=$mysqli->query($consulta);
while($row=$resultado->fetch_assoc()){
$html="
<table width='100%' style='border-collapse:collapse;margin: 0;' border='1'>
    <tr>
    <td style='font-size: 11px;text-align:center;color:#E75480'><h2 style='text-align: center;'>CONSULTORIO DENTAL ODONTO STETIC COLLAVINO</h2></td>
    <td style='font-size: 11px;text-align:center'><img src='../../../img/acepto/diente2.png' alt='Girl in a jacket' width='60' height='55'>
    </td>

    </tr>

</table><br>

<h2 style='text-align: center;margin: 0;text-decoration: underline;'>BOLETA DE ATENCIÓN</h2>
<div style='text-align:center'>
<br><b>Fecha de Emisión: </b><b>".utf8_encode($row['fecharegis_fua'])."</b>
<br><b>DNI: </b><b>".utf8_encode($row['dni_paci'])."</b>
<br><b>Paciente: </b>".utf8_encode($row['Paciente'])."<hr>

<table width='100%' style='margin: 0;border-bottom:1px solid;border-left:0px;border-right:0px;border-top:0px;'>
<thead>
    <tr style='background-color: #CCCDCF;'>
        <th width:'40%' style='margin: 0;border-bottom:0px solid;border-left:0px;border-right:0px;border-top:0px;'>Tratamientos</th>
        <th width:'30%' style='margin: 0;border-bottom:0px solid;border-left:0px;border-right:0px;border-top:0px;'>Cantidad</th>
        <th width:'30%' style='margin: 0;border-bottom:0px solid;border-left:0px;border-right:0px;border-top:0px;'>Subtotal</th>

    </tr>
</thead>

";
$consultatabla= "SELECT
pacientes.dni_paci, 
pacientes.nombres_paci, 
pacientes.apellidos_paci, 
citas.cita_id, 
CONCAT_WS(' ',nombres_paci,apellidos_paci)as Paciente, 
consulta.consulta_id, 
fua.id_fua, 
fua.fecharegis_fua, 
fua.totaltratamiento,
CONCAT_WS(' ','S/.',fua.totaltratamiento)as totaltodo,
tratamiento.tratamiento_id, 
detalle_tratamiento.cantidad, 
CONCAT_WS(' ','S/.',detalle_tratamiento.SubTotal)as Sub_total, 
tratamiento.nombre_trata
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
detalle_tratamiento
ON 
    fua.id_fua = detalle_tratamiento.fua_id
INNER JOIN
tratamiento
ON 
    detalle_tratamiento.id_tratamiento = tratamiento.tratamiento_id
    
where fua.id_fua='".$_GET['id']."'";
$resultadotabla=$mysqli->query($consultatabla);
while($rowtabla=$resultadotabla->fetch_assoc()){
    $html.="
    <tr>
    <td  style='text-align:center'>".utf8_encode($rowtabla['nombre_trata'])."</td>
    <td  style='text-align:center'>".utf8_encode($rowtabla['cantidad'])."</td>
    <td  style='text-align:center'>".utf8_encode($rowtabla['Sub_total'])."</td>

   
";
}
$html.="</tr><tbody>
</tbody>
</table>
<div style='text-align:center'>


<b style='text-align:center'>TOTAL: ".utf8_encode($row['total'])."</b>
</div>
<hr>
<div style='text-align:center'>
<b>!Gracias por su preferencia¡</b>

<br><b>Tel&eacute;fono: </b>993 854 005<br>
<b style='text-align: center;'>Direcci&oacute;n:</b> Jr. Cusco N° 218 (Segundo Nivel).<br>
<b style='text-align: center;'>Abancay-Apurímac-Perú</b></div>
</div>
";
}
$mpdf = new \Mpdf\Mpdf(['mode' => ' utf-8', 'format' => [120, 175]]);
$mpdf->WriteHTML($html);
$mpdf->Output();