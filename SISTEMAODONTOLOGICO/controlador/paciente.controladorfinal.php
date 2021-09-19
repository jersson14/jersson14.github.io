<?php
    
class ctrPacientesfinal{



   
    /*=============================================
    ACTUALZIAR ID DE PACIENTE
    =============================================*/

    static public function ctrActualizarIdPacientefinal($valorIdPaciente,$valorEspecificacionesfinal,$valorObservacionesfinal){

        $tabla = "tbl_imagendientefinal";
         

        $respuesta = ModeloPacientefinal::mdlActualizarPacientefinal($tabla,$valorIdPaciente,$valorEspecificacionesfinal,$valorObservacionesfinal);

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

    static public function ctrConsultarIdRegistroOdontogramafinal($valoridPaciente){

        $tabla = "tbl_odontograma_pacientefinal";

        $respuesta = ModeloPacientefinal::mdlMostrarIdRegistroOdontogramaPacientefinal($tabla, $valoridPaciente);

        return $respuesta;
  
    }


  

 




}