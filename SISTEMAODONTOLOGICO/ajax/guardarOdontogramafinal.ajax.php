<?php

 
 require_once "../controlador/simbolo.controladorfinal.php";
 require_once "../modelo/simbolo.modelofinal.php";
 require_once "../controlador/paciente.controladorfinal.php";
 require_once "../modelo/paciente.modelofinal.php";
 require_once "actualizaGrillaOdontogramafinal.ajax.php";

 class AjaxGuardarOdontogramafinal{

	/*=============================================
	
	=============================================*/	
 
	public $btnGuardar;
    public $idPaciente;
    public $especificacionesfinal;
    public $observacionesfinal;

   
	
	public function ajaxGuardarOdontogramaPacientefinal(){

      $valorBtnGuardar = $this->btnGuardar; 
      $valoridPaciente = $this->idPaciente; 
      $valorespecificacionesfinal = $this->especificacionesfinal;
      $valorobservacionesfinal = $this->observacionesfinal; 

		  //
        if(isset($valorBtnGuardar)){

            if($valoridPaciente != ""){

                 //Consultamos si existe el id paciente
                 $row = ctrSimbolosfinal::ctrConsultarIdPacientefinal($valoridPaciente);
                 $dato = $row["consulta_id"];

                 if($dato != ""){

                  //Actualizamos el id paciente en la tabla tbl_imagendiente
                    $row2 = ctrPacientesfinal::ctrActualizarIdPacientefinal($valoridPaciente,$valorespecificacionesfinal,$valorobservacionesfinal);
                    //$row9 = ctrPacientes::ctrActualizarespecificaciones($valorespecificaciones);

                  //Consultamos el último valor de idRegistro en la tabla tbl_odontograma_paciente para generar el siguiente consecutivo
                    $row3 = ctrPacientesfinal::ctrConsultarIdRegistroOdontogramafinal($valoridPaciente);
                    $idRegistro = $row3["idRegistroOP"];

                    //Se guarda

                     if($idRegistro == ""){
                     // sino hay registro en la tabla tbl_odontograma_paciente guardamos de una
                        $respuesta = ctrSimbolosfinal::ctrGuardarOdontogramafinal();

                         //Limpiamos la tabla tbl_imagendiente
                        $row6 = ctrSimbolosfinal::ctrNuevoOdontogramafinal();
                            
                        //Cargamos la tabla tbl_imagendiente nuevamente en blanco
                         $row7 = AjaxActualizaGrillafinal::ajaxActualizaGrillaOdontogramafinal();

                        echo $respuesta = 1;

                     }else{

                           if($idRegistro != ""){

                            //Mandamos a actualizar el campo idRegistro en la tabla tbl_imagendiente
                            $valorIdRegistro = $idRegistro + 1;
                            $row4 = ctrSimbolosfinal::ctrActualizarIdRegistrofinal($valorIdRegistro); 

                            //Mandamos a guardar el nuevo registro
                            $respuesta = ctrSimbolosfinal::ctrGuardarOdontogramafinal();


                            //Limpiamos la tabla tbl_imagendiente
                            $row6 = ctrSimbolosfinal::ctrNuevoOdontogramafinal();

                              //Cargamos la tabla tbl_imagendiente nuevamente en blanco
                            $row7 = AjaxActualizaGrillafinal::ajaxActualizaGrillaOdontogramafinal();




                            echo $respuesta = 1;
                          }  

                        

                       

                     }

                    //echo $respuesta = $idRegistro. "Id recibido" ;
                 }else{
                    //se notifica que no existe el paciente
                    echo $respuesta = 2 ;
                 }
 
            }else{
                echo $respuesta = 3 ;
            }
          
        }

                   
	}

}


   
/*=============================================
RECIBIR DATOS
=============================================*/	
if(isset($_POST["guardar"])){

	$ValorRecibido = new AjaxGuardarOdontogramafinal();
	$ValorRecibido -> btnGuardar = $_POST["guardar"];
    $ValorRecibido -> idPaciente = $_POST["consulta_id"];
    $ValorRecibido -> especificacionesfinal = $_POST["especificacionesfinal"];
    $ValorRecibido -> observacionesfinal = $_POST["observacionesfinal"];

	$ValorRecibido -> ajaxGuardarOdontogramaPacientefinal();
}

