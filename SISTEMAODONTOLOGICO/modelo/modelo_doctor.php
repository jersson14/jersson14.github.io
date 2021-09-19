<?php
    class Modelo_Doctor{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion=new conexion();
            $this->conexion->conectar();
        }
        function Listar_doctor(){
            $sql = "call SP_LISTAR_DOCTOR()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
        function Registrar_Doctor($dni,$nombres,$apellidos,$direccion,$celular
		,$sexo,$usuario,$contraseña,$rol,$email){
            $sql = "call SP_REGISTRAR_DOCTOR('$dni','$nombres','$apellidos','$direccion','$celular','$sexo',
			'$usuario','$contraseña','$rol','$email')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                      return $id = trim($row[0]);
				}
				$this->conexion->cerrar();
			}
        }
        function Editar_Doctor($idmedico,$dni_actual,$dni_nuevo,$nombres,$apellidos,$direccion,$celular
		,$sexo){
            $sql = "call SP_MODIFICAR_DOCTOR('$idmedico','$dni_actual','$dni_nuevo','$nombres','$apellidos','$direccion','$celular','$sexo')";
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
    }
?>