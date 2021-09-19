<?php
 
   
require_once "../modelo/conexiondbodontogramafinal.php";
require_once "../controlador/simbolo.controladorfinal.php";
require_once "../modelo/simbolo.modelofinal.php";

   
    
class AjaxCargarImgEnGrilla{

	/*=============================================
	ACTUALIZAR  SIMBOLO EN GRILLA
	=============================================*/	
 
   public $imagen1;
   public $idImg1;
   public $col1;
  
   
	


	public function ajaxActualizaSimboloEnGrillafinal(){

		
		$rutaImagenGrilla = $this->imagen1;
        $valorIdImg = $this->idImg1;
        $valorCol = $this->col1;
        

       

        //EXTRAEMOS PRIMERO EL VALOR DE LA IMAGEN SELECCIONADA EN LA TABLA DE SIMBOLOS
           
        $respuesta = ctrSimbolosfinal::ctrMostrarImgDeAuxiliarfinal();
        $imgSeleccionada =  $respuesta["nomSimbolo"];

     
         $respuesta = ctrSimbolosfinal::ctrActualiarSimboloEnGrillafinal($valorIdImg, $valorCol, $imgSeleccionada, $rutaImagenGrilla);
		
         echo  $respuesta;
          
                   
	}


}
   
/*=============================================
RECIBIR IMAGEN DEL SIMBOLO SELECCIONADO
=============================================*/	
if(isset($_POST["imagen1"])){

	$ValrImgSimbolo = new AjaxCargarImgEnGrilla();
	$ValrImgSimbolo -> imagen1 = $_POST["imagen1"];
    $ValrImgSimbolo -> idImg1 = $_POST["idImg1"];
    $ValrImgSimbolo -> col1 = $_POST["col1"];
    
  
	$ValrImgSimbolo -> ajaxActualizaSimboloEnGrillafinal();
}


?>

