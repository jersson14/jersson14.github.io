<?php



 require_once "../modelo/simbolo.modelo.php";


class AjaxActualizaGrilla{

	/*=============================================
	ACTUALIZAMOS LA GRILLA DE ODONTOGRAMA
	=============================================*/	
 
	public $btnNuevo;
   
	
	public function ajaxActualizaGrillaOdontograma(){

     
		$tabla = "tbl_imagendiente";
      $tabla2 = "tbl_imagendiente_aux";

	  $respuesta = ModeloSimbologia::mdlActualizaGrillaOdontograma($tabla, $tabla2);

      echo $respuesta ;

                   
	}

}


   
/*=============================================
RECIBIMOS BOTON NUEVO
=============================================*/	
if(isset($_POST["nuevo"])){

	$ValrImgSimbolo = new AjaxActualizaGrilla();
	$ValrImgSimbolo -> btnNuevo = $_POST["nuevo"];
  
	$ValrImgSimbolo -> ajaxActualizaGrillaOdontograma();
}

