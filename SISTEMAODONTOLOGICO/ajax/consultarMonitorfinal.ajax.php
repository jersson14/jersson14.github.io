<?php
 

require_once "../controlador/simbolo.controladorfinal.php";
require_once "../modelo/simbolo.modelofinal.php";
 
 

class AjaxConsultaMonitorfinal{


  
    public function consultaMonitorfinal(){
        
        //$tabla = "tbl_monitor";

        $respuesta = ctrSimbolosfinal::ctrConsultarMonitorfinal();

        echo $dato = $respuesta["datoMonitor"];
        
                    
    }
}
   
/*=============================================
CONSULTAMOS ESTADO DEL MONITOR
=============================================*/ 


    $Valrmonitor = new AjaxConsultaMonitorfinal();
    $Valrmonitor -> consultaMonitorfinal();


