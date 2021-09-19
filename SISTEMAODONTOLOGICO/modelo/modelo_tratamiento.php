<?php
    class Modelo_Tratamiento{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion=new conexion();
            $this->conexion->conectar();
        }
        function Listar_tratamiento(){
            $sql = "call SP_LISTAR_TRATAMIENTO()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
		function listar_combo_tratamiento(){
            $sql = "call SP_LISTAR_COMBO_TRATAMIENTO()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
		function Registrar_tratamiento($tratamiento,$descripcion,$especialidad,$precio){
            $sql = "call SP_REGISTRAR_TRATAMIENTO('$tratamiento','$descripcion','$especialidad','$precio')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                      return $id = trim($row[0]);
				}
				$this->conexion->cerrar();
			}
        }
		function Modificar_Datos_Tratamiento($idtratamiento,$tratamiento,$descripcion,$especialidad,$precio){
            $sql = "call SP_MODIFICAR_TRATAMIENTO('$idtratamiento','$tratamiento','$descripcion','$especialidad','$precio')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
				
			}else{
				return 0;
			}
		}
		function Modificar_Estatus_Tratamiento($tratamiento_id,$estatus){
            $sql = "call SP_MODIFICAR_ESTATUS_TRATAMIENTO('$tratamiento_id','$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
				
			}else{
				return 0;
			}
		}
       
    }

?>