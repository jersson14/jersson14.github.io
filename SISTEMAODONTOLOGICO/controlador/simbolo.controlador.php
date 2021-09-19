<?php
    
class ctrSimbolos{

     

    /*=============================================
    MOSTRAR IMAGEN GUARDADA EN TABLA tbl_auxiliar
    =============================================*/

    static public function ctrMostrarImgDeAuxiliar(){

        $tabla = "auxiliar";

        $respuesta = ModeloSimbologia::mdlMostrarImgDeAuxiliar($tabla);

        return $respuesta;
  
    }



    /*=============================================
    ACTUALZIAR SOMBOLO EN GRILLA
    =============================================*/

    static public function ctrActualiarSimboloEnGrilla($valorIdImg, $valorCol, $imgSeleccionada, $rutaImagenGrilla){

        $tabla = "tbl_imagendiente";
         

        $respuesta = ModeloSimbologia::mdlActualizarSimbolo($tabla,  $valorIdImg, $valorCol, $imgSeleccionada, $rutaImagenGrilla);

        return $respuesta;
  
    } 

    
    /*=============================================
    LIMPIAR GRILLA PARA NUEVO ODONTOGRAMA
    =============================================*/

    static public function ctrNuevoOdontograma(){

        $tabla = "tbl_imagendiente";
         

        $respuesta = ModeloSimbologia::mdlNuevoOdontograma($tabla);

        return $respuesta;

       
  
    } 

    
      /*=============================================
    CONSULTAMOS MONITOR
    =============================================*/

    static public function ctrConsultarMonitor(){

        $tabla = "tbl_monitor";
         

        $respuesta = ModeloSimbologia::mdlConsultaMonitor($tabla);

        return $respuesta;

       
  
    } 
 /*=============================================
    CONSULTAMOS ID PACIENTE
    =============================================*/

    static public function ctrConsultarIdPaciente($valorIdConsulta){

        $tabla = "consulta";
       
        $respuesta = ModeloSimbologia::mdlConsultarIdPaciente($tabla, $valorIdConsulta);

        return $respuesta;

       
  
    } 

    /*=============================================
    GUARDAR ODONTOGRAMA
    =============================================*/

    static public function ctrGuardarOdontograma(){

        $tabla = "tbl_odontograma_paciente";
        $tabla2 = "tbl_imagendiente";
         

        $respuesta = ModeloSimbologia::mdlGuardarOdontograma($tabla, $tabla2);

        return $respuesta;
  
    } 


    

    /*=============================================
    ACTUALIZAR IdRegistro
    =============================================*/

    static public function ctrActualizarIdRegistro($valorIdRegistro){

        $tabla = "tbl_imagendiente";
         

        $respuesta = ModeloSimbologia::mdlActualizarIdRegistro($tabla,  $valorIdRegistro);

        return $respuesta;
  
    } 
 


    





}