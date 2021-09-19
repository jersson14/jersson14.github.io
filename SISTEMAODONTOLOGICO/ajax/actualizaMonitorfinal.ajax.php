<?php

require_once "../modelo/conexiondbodontogramafinal.php";
 


class AjaxActualizaMonitor{

	/*=============================================
	ACTUALIZA MONITOR
	=============================================*/	
 
	public $monitor;
   
	


	public function ActualizaMoinitorfinal(){

		
		$valorMoinitor = $this->monitor;


        		
          
          $stmt = Conexion::conectar()->prepare("UPDATE tbl_monitorfinal SET datoMonitor = :datoMonitor ");

          $stmt->bindParam(":datoMonitor", $valorMoinitor, PDO::PARAM_INT);

        
          if($stmt->execute()){

              echo  $dato = "ok";

            }else{
               echo  $dato = "error";
             }

             //echo $dato = $valorMoinitor. "Valor Monitor";

                   
	}
}
   
/*=============================================
RECIBIR VALOR DE LA VARIABLE MONITOR
=============================================*/	
if(isset($_POST["monitor"])){

	$Valrmonitor = new AjaxActualizaMonitor();
	$Valrmonitor -> monitor = $_POST["monitor"];
  
	$Valrmonitor -> ActualizaMoinitorfinal();
}

