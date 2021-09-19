<?php
      
require_once "conexiondbodontogramafinal.php";
  
class ModeloPacientefinal{
  
   /*=============================================
    ACTUALIZA ID PACIENTE
    =============================================*/
    static public function mdlActualizarPacientefinal($tabla,$valorIdPaciente,$valorEspecificacionesfinal,$valorObservacionesfinal){
    
      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET consulta_id = '$valorIdPaciente',especificaciones='$valorEspecificacionesfinal',observaciones='$valorObservacionesfinal'");

     
     if($stmt -> execute()){

          return "ok";
      
      }else{

          return "error"; 

      }

      $stmt -> close();

      $stmt = null;

  }

  /*static public function mdlActualizarespecificaciones($tabla,$valorEspecificaciones){
    
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET especificaciones='$valorEspecificaciones'");

   
   if($stmt -> execute()){

        return "ok";
    
    }else{

        return "error"; 

    }

    $stmt -> close();

    $stmt = null;

}*/

  /*=============================================
    MOSTRAR El último dato del campo idRegistro en tabla tbl_odontograma_paciente
    =============================================*/

    static public function mdlMostrarIdRegistroOdontogramaPacientefinal($tabla, $valoridPaciente){
     
        $stmt = Conexion::conectar()->prepare("SELECT  MAX(idRegistro) as idRegistroOP 
                                               FROM $tabla 
                                               WHERE 
                                               id_consulta = '$valoridPaciente'  

                                                ");

        $stmt -> execute();

        return $stmt -> fetch();




  }





 


   

 
} // Cierra la case