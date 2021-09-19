<?php
 

require_once "../controlador/simbolo.controlador.php";
require_once "../modelo/simbolo.modelo.php";
 
 

class AjaxConsultaMonitor{


  
    public function consultaMonitor(){
        
        //$tabla = "tbl_monitor";

        $respuesta = ctrSimbolos::ctrConsultarMonitor();

        echo $dato = $respuesta["datoMonitor"];
        
                    
    }
}
   
/*=============================================
CONSULTAMOS ESTADO DEL MONITOR
=============================================*/ 


    $Valrmonitor = new AjaxConsultaMonitor();
    $Valrmonitor -> consultaMonitor();


