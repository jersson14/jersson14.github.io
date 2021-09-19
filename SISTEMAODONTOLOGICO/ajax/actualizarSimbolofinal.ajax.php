<?php

require_once "../modelo/conexiondbodontogramafinal.php";
 
 
  
class AjaxActualizaSimbolo{

  /*=============================================
  ACTUALIZAR IMG SIMBOLO
  =============================================*/ 
 
  public $imgSimbolo;


    public function ajaxActualizaImgSimbolofinal(){

    
    $imgSeleccionada = $this->imgSimbolo;
     
          
          $stmt = Conexion::conectar()->prepare("UPDATE auxiliarfinal SET nomSimbolo = :nomSimbolo ");

          $stmt->bindParam(":nomSimbolo", $imgSeleccionada, PDO::PARAM_STR);

          //$stmt->execute();

          if($stmt->execute()){

              echo  $dato = 1;

            }else{
               echo  $dato = 2;
            }
                 
  }
  


}


   
/*=============================================
RECIBIR IMAGEN DEL SIMBOLO SELECCIONADO
=============================================*/ 
if(isset($_POST["imgSimbolo"])){

  $ValrImgSimbolo = new AjaxActualizaSimbolo();
  $ValrImgSimbolo -> imgSimbolo = $_POST["imgSimbolo"];
  
  $ValrImgSimbolo -> ajaxActualizaImgSimbolofinal();
}

