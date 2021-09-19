<?php

 
 require_once "../controlador/simbolo.controladorfinal.php";
 require_once "../modelo/simbolo.modelofinal.php";


class AjaxNuevoOdontograma{

	/*=============================================
	LIMPIAMOS GRILLA DE ODONTOGRAMA
	=============================================*/	
 
	public $btnNuevo;
   
	
	public function ajaxLimpiarGrillafinal(){

      $valorBtnNuevo = $this->btnNuevo; 
	 
     if(isset($valorBtnNuevo)){	
	
    	$respuesta = ctrSimbolosfinal::ctrNuevoOdontogramafinal();
        echo $respuesta ;
       }
                   
	}

}


   
/*=============================================
RECIBIR IMAGEN DEL SIMBOLO SELECCIONADO
=============================================*/	
if(isset($_POST["nuevo"])){

	$ValrImgSimbolo = new AjaxNuevoOdontograma();
	$ValrImgSimbolo -> btnNuevo = $_POST["nuevo"];
  
	$ValrImgSimbolo -> ajaxLimpiarGrillafinal();
}

