<?php
    class Modelo_Pagos{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion=new conexion();
            $this->conexion->conectar();
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
		function Listar_pagos(){
            $sql = "call SP_LISTAR_PAGOS()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
        function listar_combo_pacientes(){
            $sql = "call SP_LISTAR_PACIENTE_COMBO()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
        function Registrar_pago($paciente,$total,$descripcion){
            $sql = "call SP_REGISTRAR_PAGOS('$paciente','$total','$descripcion')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();
        }

		function Editar_pago($idpago,$paciente,$total,$descripcion){
            $sql = "call SP_EDITAR_PAGO('$idpago','$paciente','$total','$descripcion')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();
        }

        function Registrar_pago_cancelado($idpreciopactado,$monto,$saldopago,$saldoanterior){
            $sql = "call SP_DISMINUIR_MONTO('$idpreciopactado','$monto','$saldopago','$saldoanterior')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                      return $id = trim($row[0]);
				}
				$this->conexion->cerrar();
			}
        }
		
    }
?>