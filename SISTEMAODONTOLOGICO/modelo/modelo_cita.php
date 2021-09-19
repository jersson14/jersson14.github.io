<?php
    class Modelo_Citas{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion=new conexion();
            $this->conexion->conectar();
        }
        function Listar_Citas($fechainicio,$fechafin){
            $sql = "call SP_LISTAR_CITA('$fechainicio','$fechafin')";
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
            $sql = "call SP_LISTAR_COMBO_PACIENTE()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
        function listar_total_Citas(){
            $sql = "call SP_TOTAL_CITAS()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
		function listar_combo_medico(){
            $sql = "call SP_LISTAR_COMBO_MEDICO()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
        function Registrar_cita($paciente,$fecha,$hora,$medico,$descripcion){
            $sql = "call SP_REGISTRAR_CITA('$paciente','$fecha','$hora','$medico','$descripcion')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                      return $id = trim($row[0]);
				}
				$this->conexion->cerrar();
			}
        }
		function Modificar_Estatus_Citas($idcita,$estatus){
            $sql = "call SP_MODIFICAR_ESTATUS_CITA('$idcita','$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
				
			}else{
				return 0;
			}
		}
		function Editar_cita($idcita,$paciente,$fecha_actual,$fecha,$hora_actual,$hora,$estado,$descripcion){
            $sql = "call SP_MODIFICAR_CITA('$idcita','$paciente','$fecha_actual','$fecha','$hora_actual','$hora','$estado','$descripcion')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                      return $id = trim($row[0]);
				}
				$this->conexion->cerrar();
			}
		}
    }
?>