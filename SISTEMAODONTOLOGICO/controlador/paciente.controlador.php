<?php
    
class ctrPacientes{



   
    /*=============================================
    ACTUALZIAR ID DE PACIENTE
    =============================================*/

    static public function ctrActualizarIdPaciente($valorIdPaciente,$valorEspecificaciones,$valorObservaciones){

        $tabla = "tbl_imagendiente";
         

        $respuesta = ModeloPaciente::mdlActualizarPaciente($tabla,$valorIdPaciente,$valorEspecificaciones,$valorObservaciones);

        return $respuesta;
  
    } 
    /*static public function ctrActualizarespecificaciones($valorEspecificaciones){

        $tabla = "tbl_imagendiente";
         

        $respuesta = ModeloPaciente::mdlActualizarespecificaciones($tabla,$valorEspecificaciones);

        return $respuesta;
  
    } */





    /*=============================================
    CONSULTAMOS EL ÚLTIMO REGISTRO DEL ODONTOGRAMA PARA EL PACIENTE
    =============================================*/

    static public function ctrConsultarIdRegistroOdontograma($valoridPaciente){

        $tabla = "tbl_odontograma_paciente";

        $respuesta = ModeloPaciente::mdlMostrarIdRegistroOdontogramaPaciente($tabla, $valoridPaciente);

        return $respuesta;
  
    }


  

 




}