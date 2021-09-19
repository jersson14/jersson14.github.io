<?php

 
 require_once "../controlador/simbolo.controlador.php";
 require_once "../modelo/simbolo.modelo.php";
 require_once "../controlador/paciente.controlador.php";
 require_once "../modelo/paciente.modelo.php";
 require_once "actualizaGrillaOdontograma.ajax.php";

 class AjaxGuardarOdontograma{

	/*=============================================
	
	=============================================*/	
 
	public $btnGuardar;
    public $idPaciente;
    public $especificaciones;
    public $observaciones;

   
	
	public function ajaxGuardarOdontogramaPaciente(){

    

      $valorBtnGuardar = $this->btnGuardar; 
      $valoridPaciente = $this->idPaciente; 
      $valorespecificaciones = $this->especificaciones;
      $valorobservaciones = $this->observaciones; 

		  //
        if(isset($valorBtnGuardar)){

            if($valoridPaciente != ""){
                 //Consultamos si existe el id paciente
                 $row = ctrSimbolos::ctrConsultarIdPaciente($valoridPaciente);
                 $dato = $row["consulta_id"];

                 if($dato != ""){

                  //Actualizamos el id paciente en la tabla tbl_imagendiente
                    $row2 = ctrPacientes::ctrActualizarIdPaciente($valoridPaciente,$valorespecificaciones,$valorobservaciones);
                    //$row9 = ctrPacientes::ctrActualizarespecificaciones($valorespecificaciones);

                  //Consultamos el último valor de idRegistro en la tabla tbl_odontograma_paciente para generar el siguiente consecutivo
                    $row3 = ctrPacientes::ctrConsultarIdRegistroOdontograma($valoridPaciente);
                    $idRegistro = $row3["idRegistroOP"];

                    //Se guarda

                     if($idRegistro == ""){
                     // sino hay registro en la tabla tbl_odontograma_paciente guardamos de una
                        $respuesta = ctrSimbolos::ctrGuardarOdontograma();

                         //Limpiamos la tabla tbl_imagendiente
                        $row6 = ctrSimbolos::ctrNuevoOdontograma();
                            
                        //Cargamos la tabla tbl_imagendiente nuevamente en blanco
                         $row7 = AjaxActualizaGrilla::ajaxActualizaGrillaOdontograma();

                        echo $respuesta = 1;

                     }else{

                           if($idRegistro != ""){

                            //Mandamos a actualizar el campo idRegistro en la tabla tbl_imagendiente
                            $valorIdRegistro = $idRegistro + 1;
                            $row4 = ctrSimbolos::ctrActualizarIdRegistro($valorIdRegistro); 

                            //Mandamos a guardar el nuevo registro
                            $respuesta = ctrSimbolos::ctrGuardarOdontograma();


                            //Limpiamos la tabla tbl_imagendiente
                            $row6 = ctrSimbolos::ctrNuevoOdontograma();

                              //Cargamos la tabla tbl_imagendiente nuevamente en blanco
                            $row7 = AjaxActualizaGrilla::ajaxActualizaGrillaOdontograma();




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

	$ValorRecibido = new AjaxGuardarOdontograma();
	$ValorRecibido -> btnGuardar = $_POST["guardar"];
    $ValorRecibido -> idPaciente = $_POST["consulta_id"];
    $ValorRecibido -> especificaciones = $_POST["especificaciones"];
    $ValorRecibido -> observaciones = $_POST["observaciones"];

	$ValorRecibido -> ajaxGuardarOdontogramaPaciente();
}

