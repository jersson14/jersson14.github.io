<?php
 
   
require_once "../modelo/conexiondbodontograma.php";
require_once "../controlador/simbolo.controlador.php";
require_once "../modelo/simbolo.modelo.php";

   
    
class AjaxCargarImgEnGrilla{

	/*=============================================
	ACTUALIZAR  SIMBOLO EN GRILLA
	=============================================*/	
 
   public $imagen;
   public $idImg;
   public $col;
  
   
	


	public function ajaxActualizaSimboloEnGrilla(){

		
		$rutaImagenGrilla = $this->imagen;
        $valorIdImg = $this->idImg;
        $valorCol = $this->col;
        

       

        //EXTRAEMOS PRIMERO EL VALOR DE LA IMAGEN SELECCIONADA EN LA TABLA DE SIMBOLOS
           
        $respuesta = ctrSimbolos::ctrMostrarImgDeAuxiliar();
        $imgSeleccionada =  $respuesta["nomSimbolo"];

     
         $respuesta = ctrSimbolos::ctrActualiarSimboloEnGrilla($valorIdImg, $valorCol, $imgSeleccionada, $rutaImagenGrilla);
		
         echo  $respuesta;
          
                   
	}


}
   
/*=============================================
RECIBIR IMAGEN DEL SIMBOLO SELECCIONADO
=============================================*/	
if(isset($_POST["imagen"])){

	$ValrImgSimbolo = new AjaxCargarImgEnGrilla();
	$ValrImgSimbolo -> imagen = $_POST["imagen"];
    $ValrImgSimbolo -> idImg = $_POST["idImg"];
    $ValrImgSimbolo -> col = $_POST["col"];
    
  
	$ValrImgSimbolo -> ajaxActualizaSimboloEnGrilla();
}


?>

