<?php
    
class ctrSimbolosfinal{

     

    /*=============================================
    MOSTRAR IMAGEN GUARDADA EN TABLA tbl_auxiliar
    =============================================*/

    static public function ctrMostrarImgDeAuxiliarfinal(){

        $tabla = "auxiliarfinal";

        $respuesta = ModeloSimbologiafinal::mdlMostrarImgDeAuxiliarfinal($tabla);

        return $respuesta;
  
    }



    /*=============================================
    ACTUALZIAR SOMBOLO EN GRILLA
    =============================================*/

    static public function ctrActualiarSimboloEnGrillafinal($valorIdImg, $valorCol, $imgSeleccionada, $rutaImagenGrilla){

        $tabla = "tbl_imagendientefinal";
         

        $respuesta = ModeloSimbologiafinal::mdlActualizarSimbolofinal($tabla,  $valorIdImg, $valorCol, $imgSeleccionada, $rutaImagenGrilla);

        return $respuesta;
  
    } 

    
    /*=============================================
    LIMPIAR GRILLA PARA NUEVO ODONTOGRAMA
    =============================================*/

    static public function ctrNuevoOdontogramafinal(){

        $tabla = "tbl_imagendientefinal";
         

        $respuesta = ModeloSimbologiafinal::mdlNuevoOdontogramafinal($tabla);

        return $respuesta;

       
  
    } 

    
      /*=============================================
    CONSULTAMOS MONITOR
    =============================================*/

    static public function ctrConsultarMonitorfinal(){

        $tabla = "tbl_monitorfinal";
         

        $respuesta = ModeloSimbologiafinal::mdlConsultaMonitorfinal($tabla);

        return $respuesta;

       
  
    } 
 /*=============================================
    CONSULTAMOS ID PACIENTE
    =============================================*/

    static public function ctrConsultarIdPacientefinal($valorIdConsulta){

        $tabla = "consulta";
       
        $respuesta = ModeloSimbologiafinal::mdlConsultarIdPacientefinal($tabla, $valorIdConsulta);

        return $respuesta;

       
  
    } 

    /*=============================================
    GUARDAR ODONTOGRAMA
    =============================================*/

    static public function ctrGuardarOdontogramafinal(){

        $tabla = "tbl_odontograma_pacientefinal";
        $tabla2 = "tbl_imagendientefinal";
         

        $respuesta = ModeloSimbologiafinal::mdlGuardarOdontogramafinal($tabla, $tabla2);

        return $respuesta;
  
    } 


    

    /*=============================================
    ACTUALIZAR IdRegistro
    =============================================*/

    static public function ctrActualizarIdRegistrofinal($valorIdRegistro){

        $tabla = "tbl_imagendientefinal";
         

        $respuesta = ModeloSimbologiafinal::mdlActualizarIdRegistrofinal($tabla,  $valorIdRegistro);

        return $respuesta;
  
    } 
 


    





}