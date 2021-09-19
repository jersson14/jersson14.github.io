<?php
    class Modelo_Consulta{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion=new conexion();
            $this->conexion->conectar();
        }
        function lista_consulta_busqueda($fechainicio,$fechafin){
            $sql = "call SP_LISTAR_CONSULTA_BUSQUEDA('$fechainicio','$fechafin')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
		function lista_consulta(){
            $sql = "call SP_LISTAR_CONSULTA()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
        function listar_combo_paciente_consulta(){
            $sql = "call SP_LISTAR_PACIENTE_CITA()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
        function Registrar_consulta($paciente,$descripcion,$diagnostico1,$diagnostico2){
            $sql = "call SP_REGISTRAR_CONSULTA('$paciente','$descripcion','$diagnostico1','$diagnostico2')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();
        }
		function Modificar_Estatus_Citas($idcita,$estatus){
            $sql = "call SP_MODIFICAR_ESTATUS_CITA('$idcita','$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
				
			}else{
				return 0;
			}
		}
		function Editar_consulta($idconsulta,$descripcion,$diagnostico1,$diagnostico2){
            $sql = "call SP_EDITAR_CONSULTA('$idconsulta','$descripcion','$diagnostico1','$diagnostico2')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();
        }
    }
?>