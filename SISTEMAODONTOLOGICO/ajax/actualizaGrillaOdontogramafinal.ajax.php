<?php



 require_once "../modelo/simbolo.modelofinal.php";


class AjaxActualizaGrillafinal{

	/*=============================================
	ACTUALIZAMOS LA GRILLA DE ODONTOGRAMA
	=============================================*/	
 
	public $btnNuevo;
   
	
	public function ajaxActualizaGrillaOdontogramafinal(){

     
		$tabla = "tbl_imagendientefinal";
      $tabla2 = "tbl_imagendiente_auxfinal";

	  $respuesta = ModeloSimbologiafinal::mdlActualizaGrillaOdontogramafinal($tabla, $tabla2);

      echo $respuesta ;

                   
	}

}


   
/*=============================================
RECIBIMOS BOTON NUEVO
=============================================*/	
if(isset($_POST["nuevo"])){

	$ValrImgSimbolo = new AjaxActualizaGrillafinal();
	$ValrImgSimbolo -> btnNuevo = $_POST["nuevo"];
  
	$ValrImgSimbolo -> ajaxActualizaGrillaOdontogramafinal();
}

