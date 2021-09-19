<?php
    class Modelo_Especialidad{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion=new conexion();
            $this->conexion->conectar();
        }
        function Listar_Especialidad(){
            $sql = "call SP_LISTAR_ESPECIALIDAD()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
        function Modificar_Estatus_Especialidad($servicio_id,$estatus){
            $sql = "call SP_MODIFICAR_ESTATUS_ESPECIALIDAD('$servicio_id','$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
				
			}else{
				return 0;
			}
		}
        function Modificar_Datos_Especialidad($idespecialidad,$nombre,$descripcion){
            $sql = "call SP_MODIFICAR_ESPECIALIDAD('$idespecialidad','$nombre','$descripcion')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
				
			}else{
				return 0;
			}
		}
        function Registrar_Especialidad($nombre,$descripcion){
            $sql = "call SP_REGISTRAR_ESPECIALIDAD('$nombre','$descripcion')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                      return $id = trim($row[0]);
				}
				$this->conexion->cerrar();
			}
        }
       
    }

?>