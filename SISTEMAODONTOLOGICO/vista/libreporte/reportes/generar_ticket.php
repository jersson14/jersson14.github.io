<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once '../../../conexion_reporte/r_conexion.php';
$consulta= "SELECT
citas.cita_nroatencion, 
citas.cita_id, 
citas.fecha_cita,
citas.hora_cita, 
citas.medico_id,
CONCAT_WS(' ',medico_nombre,medico.medico_apellidos) AS Medico, 
CONCAT_WS(' ',nombres_paci,apellidos_paci)as Paciente, 
citas.cita_descripcion, 
medico.medico_celular
FROM
citas INNER JOIN medico
ON citas.medico_id = medico.medico_id
INNER JOIN pacientes
ON citas.id_paciente = pacientes.paciente_id
where cita_id='".$_GET['id']."'";
$html="
<table style='border-collapse:collapse;margin: 0;' border='1'>
    <tr>
    <td style='font-size: 11px;text-align:center;color:#E75480'><h2 style='text-align: center;'>ODONTO STETIC COLLAVINO</h2></td>
    <td style='font-size: 11px;text-align:center'><img src='../../../img/acepto/diente2.png' alt='Girl in a jacket' width='60' height='55'>
    </td>

    </tr>

</table><br>
<table style='border-collapse:collapse;text-align:center' border='1'>
    <tr>
    <td style=' text-align:center;margin: 0;border-bottom:1px solid;border-left:0px;border-right:0px;border-top:0px;'><h2 style='text-align: center;margin: 0;'>DATOS DE LA CITA</h2></td>
    
    </tr>

</table>


";
$resultado=$mysqli->query($consulta);
while($row=$resultado->fetch_assoc()){
    $html.="
    <br><b>N&uacute;mero atención: </b><b>".$row['cita_nroatencion']."</b>
    <br><br><b>Paciente: </b>".utf8_encode($row['Paciente'])."
    <br><br><b>Médico: </b>".$row['Medico']."
    <br><br><b>Fecha: </b>".$row['fecha_cita']."
    <br><br><b>Hora: </b>".$row['hora_cita']."
    <br><br><b>Descripci&oacute;n: </b>".utf8_encode($row['cita_descripcion'])."<br>
    __________________________________<br>
    <table style='text-align:center;'>
    <tr style='text-align:center;'>
        <td style='text-align:center;'><b>!Gracias por su preferencia¡</b></td> 
    </tr>
    </table>
    <div style='text-align:center'>
    <br><b>Tel&eacute;fono: </b>993 854 005<br>
    <b style='text-align: center;'>Direcci&oacute;n:</b> Jr. Cusco N° 218 (Segundo Nivel).<br>
    <b style='text-align: center;'>Abancay-Apurímac-Perú</b></div>
    </div>
";
}


$mpdf = new \Mpdf\Mpdf(['mode' => ' utf-8', 'format' => [90, 180]]);
$mpdf->WriteHTML($html);
$mpdf->Output();