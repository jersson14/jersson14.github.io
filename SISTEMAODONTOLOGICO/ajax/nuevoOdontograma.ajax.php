<?php

 
 require_once "../controlador/simbolo.controlador.php";
 require_once "../modelo/simbolo.modelo.php";


class AjaxNuevoOdontograma{

	/*=============================================
	LIMPIAMOS GRILLA DE ODONTOGRAMA
	=============================================*/	
 
	public $btnNuevo;
   
	
	public function ajaxLimpiarGrilla(){

      $valorBtnNuevo = $this->btnNuevo; 
	 
     if(isset($valorBtnNuevo)){	
	
    	$respuesta = ctrSimbolos::ctrNuevoOdontograma();
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
  
	$ValrImgSimbolo -> ajaxLimpiarGrilla();
}

