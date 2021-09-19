<?php
    class Modelo_Grafico{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion=new conexion();
            $this->conexion->conectar();
        }
		function TraerGraficosBar(){
            $sql = "call SP_LITAR_GRAFI()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
        function Registrar_Gasto($tipo,$descripcion,$cantidad,$monto){
            $sql = "call SP_REGISTRAR_GASTO('$tipo','$descripcion','$cantidad','$monto')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();
        }
		function Editar_Gasto($idgasto,$tipo,$descripcion,$cantidad,$monto){
            $sql = "call SP_EDITAR_GASTO('$idgasto','$tipo','$descripcion','$cantidad','$monto')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();
        }
        function lista_gastos_busqueda($fechainicio,$fechafin){
            $sql = "call SP_LISTAR_GASTOS_BUSQUEDA('$fechainicio','$fechafin')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
    }
?>