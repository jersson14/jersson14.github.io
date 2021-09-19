<?php

require_once "../modelo/conexiondbodontograma.php";
 


class AjaxActualizaMonitor{

	/*=============================================
	ACTUALIZA MONITOR
	=============================================*/	
 
	public $monitor;
   
	


	public function ActualizaMoinitor(){

		
		$valorMoinitor = $this->monitor;


        		
          
          $stmt = Conexion::conectar()->prepare("UPDATE tbl_monitor SET datoMonitor = :datoMonitor ");

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
  
	$Valrmonitor -> ActualizaMoinitor();
}

