<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once '../../../conexion_reporte/r_conexion.php';
$consulta= "SELECT
pacientes.dni_paci, 
pacientes.nombres_paci, 
pacientes.apellidos_paci,
CONCAT_WS(' ',nombres_paci,apellidos_paci)as Paciente, 
precio_pactado.monto, 
CONCAT_WS(' ','S/.',monto)as MONTOTOTAL, 

precio_pactado.saldo_pendiente,
CONCAT_WS(' ','S/.',saldo_pendiente)as SALDO, 
CONCAT_WS(' ','S/.',monto_pago)as MONTOPAGADO, 
pagos.fechar_regis, 
pagos.monto_pago, 
pagos.id_pago,
CONCAT_WS(' ','S/.',pagos.saldo)as saldito,
pagos.saldoanterior,
CONCAT_WS(' ','S/.',pagos.saldoanterior)as saldoantiguo
FROM
pacientes
INNER JOIN
precio_pactado
ON 
    pacientes.paciente_id = precio_pactado.id_paciente
INNER JOIN
pagos
ON 
    precio_pactado.id_precio_pactado = pagos.precio_pactado_id
    
where pagos.id_pago= '".$_GET['id']."'";
$html="
<table style='border-collapse:collapse' border='1'>
    <tr>
    <td style='font-size: 11px;text-align:center;color:#E75480'><h2 style='text-align: center;'>ODONTO STETIC COLLAVINO</h2></td>
    <td style='font-size: 11px;text-align:center'><img src='../../../img/acepto/diente2.png' alt='Girl in a jacket' width='60' height='55'>
    </td>

    </tr>
</table><br>

<h2 style='text-align: center;margin: 0;text-decoration: underline;'>BOLETA DE PAGO</h2>


";
$resultado=$mysqli->query($consulta);
while($row=$resultado->fetch_assoc()){
    $html.="
    <div style='text-align:center'>
    <br><b>Fecha de Pago: </b><b>".$row['fechar_regis']."</b>
    <br><b>DNI: </b><b>".$row['dni_paci']."</b>
    <br><b>Paciente: </b>".utf8_encode($row['Paciente'])."<hr>
    <br><b>Monto total a pagar: </b>".utf8_encode($row['MONTOTOTAL'])."
    <br><b>Saldo anterior: </b>".utf8_encode($row['saldoantiguo'])."
    <br><b>Monto pagado: </b>".utf8_encode($row['MONTOPAGADO'])."<hr>
    <br><b style='text-align:center'>Saldo pendiente:</b> <br>".utf8_encode($row['saldito'])."
    __________________________________<br></div>
    <div style='text-align:center'>
        <h4 style='margin: 0;'>!Gracias por su preferencia¡</h4>
     <div>
    <div style='text-align:center'>
    <div style='text-align:center'>
    <br><b>Tel&eacute;fono: </b>993 854 005<br>
    <b style='text-align: center;'>Direcci&oacute;n:</b> Jr. Cusco N° 218 (Segundo Nivel).<br>
    <b style='text-align: center;'>Abancay-Apurímac-Perú</b></div>
    </div>

";
}


$mpdf = new \Mpdf\Mpdf(['mode' => ' utf-8', 'format' => [90, 170]]);
$mpdf->WriteHTML($html);
$mpdf->Output();