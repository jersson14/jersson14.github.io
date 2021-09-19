<?php
    class Modelo_Gastos{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion=new conexion();
            $this->conexion->conectar();
        }
		function lista_gastos(){
            $sql = "call SP_LISTAR_GASTOS()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][]=$consulta_VU;
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


		
		function lista_total_gasto(){
			$sql = "call SP_LISTAR_TOTAL()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
		}
		function lista_gastos_total_x_fecha($fechainicio,$fechafin){
            $sql = "call SP_LISTAR_TOTAL_PORFECHA('$fechainicio','$fechafin')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
		function ver_diferencia($fechainicio,$fechafin){
            $sql = "call SP_LISTAR_DIFERENCIA1('$fechainicio','$fechafin')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
		function lista_pagos_por_fecha($fechainicio,$fechafin){
            $sql = "call SP_LISTAR_PAGOS_POR_FECHA('$fechainicio','$fechafin')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
		function listar_total_gastos(){
            $sql = "call SP_TOTAL_GASTOS_DIA()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
    }
?>