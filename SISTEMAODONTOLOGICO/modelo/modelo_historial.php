<?php
    class Modelo_Historial{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion=new conexion();
            $this->conexion->conectar();
        }
        function lista_historial_busqueda($fechainicio,$fechafin){
            $sql = "call SP_LISTAR_HISTORIAL_FECHAS('$fechainicio','$fechafin')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
		function lista_historial(){
            $sql = "call SP_LISTAR_HISTORIAL()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
		function lista_historial_consulta(){
            $sql = "call SP_LISTAR_CONSULTA_HISTO()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
        function listar_combo_tratamientos(){
            $sql = "call SP_LISTAR_TRATAMIENTO_COMBO()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
		function Traerpreciotratamiento($id){
            $sql = "call SP_TRAER_PRECIO_TRATAMIENTO_H($id)";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
		function Registrar_historial($consulta_id,$historiaid,$total,$observacion){
            $sql = "call SP_REGISTRAR_HISTORIAL('$consulta_id','$historiaid','$total','$observacion')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                      return $id = trim($row[0]);
				}
				$this->conexion->cerrar();
			}
        }
		function Registrar_detalle_Tratamiento($id,$array_tratamiento,$array_fecha,$array_hora,$array_cantidad,$array_subtotal){
            $sql = "call SP_REGISTRAR_DETALLE_TRATAMIENTO('$id','$array_tratamiento','$array_fecha','$array_hora','$array_cantidad','$array_subtotal')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
			}else{
				return 0;

			}
			$this->conexion->cerrar();

        }
		function lista_detalletratamiento($id){
            $sql = "call SP_LISTAR_DETALLE_TRATAMIENTO('$id')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
		function lista_vercontroles($id){
            $sql = "call SP_LISTAR_VER_CONTROLES('$id')";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
					$arreglo["data"][]=$consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
		function Eliminar_fua($id_fua){
            $sql = "call SP_ELIMINAR_FUA('$id_fua')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
				
			}else{
				return 0;
			}
		}
		function Registrar_control($idfua,$nrocontrol,$descripcion){
            $sql = "call SP_REGISTRO_CONTROL('$idfua','$nrocontrol','$descripcion')";
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