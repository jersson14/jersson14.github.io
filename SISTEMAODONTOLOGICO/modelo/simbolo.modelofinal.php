<?php
      
require_once "conexiondbodontogramafinal.php";
  
class ModeloSimbologiafinal{
  
     
   
  /*=============================================
    ADMINISTRACIÓN DE SIMBOLOGIA
    =============================================*/

    static public function mdlMostrarImgDeAuxiliarfinal($tabla){
     
      

    $stmt = Conexion::conectar()->prepare("SELECT nomSimbolo FROM $tabla");


        //$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();


}



   /*=============================================
    ACTUALIZA SIMBOLO DE GRILLA GENERAL
    =============================================*/

    static public function mdlActualizarSimbolofinal($tabla,  $valorIdImg, $valorCol, $imgSeleccionada, $rutaImagenGrilla){
    
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $valorCol = '$imgSeleccionada'
                                               WHERE  $valorCol = '$rutaImagenGrilla'
                                               AND  idimagen = '$valorIdImg'
                                               

                                               ");

       
       if($stmt -> execute()){

            return "ok";
        
        }else{

            return "error"; 

        }

        $stmt -> close();

        $stmt = null;

    }
  /*================== ===========================
    CARGAMOS LA GRILLA DE ODONTOGRAMA CON IMAGENES EN BLANCO
    =============================================*/

    
    /*=============================================
    LIPIAR GRILLA PARA NUEVO ODONTOGRAMA
    =============================================*/

    static public function mdlNuevoOdontogramafinal($tabla){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla");

        

        if($stmt -> execute()){

            return "ok";
        
        }else{

            return "error"; 

        }

        $stmt -> close();

        $stmt = null;

    }

    
    /*================== ===========================
    CARGAMOS LA GRILLA DE ODONTOGRAMA CON IMAGENES EN BLANCO
    =============================================*/
    static public function mdlActualizaGrillaOdontogramafinal($tabla, $tabla2){

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla SELECT * FROM $tabla2");

            $stmt -> execute();

            return $stmt -> fetch();

            $stmt->close();
            $stmt = null;

    } 


 /*=============================================
    CONSULTAMOS EL ESTADO DEL MONITOR
    =============================================*/

    static public function mdlConsultaMonitorfinal($tabla){
     
       

    $stmt = Conexion::conectar()->prepare("SELECT datoMonitor FROM $tabla");
 

        $stmt -> execute();

        return $stmt -> fetch();

}
 


   /*=============================================
    CONSULTAMOS EL  ID DEL PACIENTE
    =============================================*/

    static public function mdlConsultarIdPacientefinal($tabla, $valorIdConsulta){
    
      $stmt = Conexion::conectar()->prepare("SELECT consulta_id FROM $tabla WHERE consulta_id = '$valorIdConsulta'  ");
      $stmt -> execute();
      return $stmt -> fetch();

   }

     
    /*================== ===========================
    CARGAMOS LA GRILLA DE ODONTOGRAMA CON IMAGENES EN BLANCO
    =============================================*/
    static public function mdlGuardarOdontogramafinal($tabla, $tabla2){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla SELECT * FROM $tabla2");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt->close();
        $stmt = null;

} 


   /*=============================================
    ACTUALIZAR IdRegistro en tbl_imagendiente
    =============================================*/

    static public function mdlActualizarIdRegistrofinal($tabla,  $valorIdRegistro){
    
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET idRegistro = '$valorIdRegistro'");

       
       if($stmt -> execute()){

            return "ok";
        
        }else{

            return "error"; 

        }

        $stmt -> close();

        $stmt = null;

    }

}  