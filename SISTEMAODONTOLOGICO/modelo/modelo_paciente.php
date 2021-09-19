<?php
    class Modelo_Paciente{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion=new conexion();
            $this->conexion->conectar();
        }
        function Listar_paciente(){
            $sql = "call SP_LISTAR_PACIENTE()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
        function Registrar_Paciente($dni,$nombres,$apellidos,$sexo,$fechanacimiento,$lugar_nacimiento,$celular,$direccion){
            $sql = "call SP_REGISTRAR_PACIENTE('$dni','$nombres','$apellidos','$sexo','$fechanacimiento','$lugar_nacimiento','$celular','$direccion')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                      return $id = trim($row[0]);
				}
				$this->conexion->cerrar();
			}
        }
        function Modificar_Paciente($idpaciente,$dniactual,$dni,$nombres,$apellidos,$sexo,$fechanacimiento,$lugar_nacimiento,$celular,$direccion){
            $sql = "call SP_MODIFICAR_PACIENTE('$idpaciente','$dniactual','$dni','$nombres','$apellidos','$sexo','$fechanacimiento','$lugar_nacimiento','$celular','$direccion')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                      return $id = trim($row[0]);
				}
				$this->conexion->cerrar();
			}
		}
        function Eliminar_Paciente($idpaciente){
            $sql = "call SP_ELIMINAR_PACIENTE('$idpaciente')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
				
			}else{
				return 0;
			}
		}
		function listar_total_pacientes(){
            $sql = "call SP_TOTAL_PACIENTE()";
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