<?php
      
require_once "conexiondbodontograma.php";
  
class ModeloSimbologia{
  
     
   
  /*=============================================
    ADMINISTRACIÓN DE SIMBOLOGIA
    =============================================*/

    static public function mdlMostrarImgDeAuxiliar($tabla){
     
      

    $stmt = Conexion::conectar()->prepare("SELECT nomSimbolo FROM $tabla");


        //$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();


}



   /*=============================================
    ACTUALIZA SIMBOLO DE GRILLA GENERAL
    =============================================*/

    static public function mdlActualizarSimbolo($tabla,  $valorIdImg, $valorCol, $imgSeleccionada, $rutaImagenGrilla){
    
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
    static public function mdlGuardarOdontograma($tabla, $tabla2){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla SELECT * FROM $tabla2 ");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt->close();
        $stmt = null;

} 


    
    /*=============================================
    LIPIAR GRILLA PARA NUEVO ODONTOGRAMA
    =============================================*/

    static public function mdlNuevoOdontograma($tabla){

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
    static public function mdlActualizaGrillaOdontograma($tabla, $tabla2){

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla SELECT * FROM $tabla2");

            $stmt -> execute();

            return $stmt -> fetch();

            $stmt->close();
            $stmt = null;

    } 


 /*=============================================
    CONSULTAMOS EL ESTADO DEL MONITOR
    =============================================*/

    static public function mdlConsultaMonitor($tabla){
     
       

    $stmt = Conexion::conectar()->prepare("SELECT datoMonitor FROM $tabla");
 

        $stmt -> execute();

        return $stmt -> fetch();

}
 


   /*=============================================
    CONSULTAMOS EL  ID DEL PACIENTE
    =============================================*/

    static public function mdlConsultarIdPaciente($tabla, $valorIdConsulta){
    
      $stmt = Conexion::conectar()->prepare("SELECT consulta_id FROM $tabla WHERE consulta_id = '$valorIdConsulta'  ");
      $stmt -> execute();
      return $stmt -> fetch();

   }

   

   /*=============================================
    ACTUALIZAR IdRegistro en tbl_imagendiente
    =============================================*/

    static public function mdlActualizarIdRegistro($tabla,  $valorIdRegistro){
    
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