<?php
    class Modelo_Hc{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion=new conexion();
            $this->conexion->conectar();
        }
        function Listar_historiac(){
            $sql = "call SP_LISTAR_HC()";
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
            $sql = "call SP_LISTAR_COMBO_PACIENTES()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
        function Traerdnipaciente($id){
            $sql = "call SP_TRAER_DNI_PACIENTE_H($id)";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
        function Registrar_hc($paciente,$ocupacion,$estado_civil,$raza,$grado_instruccion,$religion,$lugar_procedencia,$nombre_acompañante,$enfermedad_actual,
        $sintomas_principales,$funciones_biologicas,$antecedentes,$antecedentes_familia,$tipo_enfermedad,$relato_cronologico,$antecedentes_personales,$presion_arterial,$frecuencia_cardiaca,
        $frecuencia_respiratoria,$pulso,$temperatura,$descripcion_examen,$hilodental,$piezadental,$olorsabor){
            $sql = "call SP_REGISTRAR_HC1('$paciente','$ocupacion','$estado_civil','$raza','$grado_instruccion','$religion','$lugar_procedencia','$nombre_acompañante','$enfermedad_actual',
            '$sintomas_principales','$funciones_biologicas','$antecedentes','$antecedentes_familia','$tipo_enfermedad','$relato_cronologico','$antecedentes_personales','$presion_arterial','$frecuencia_cardiaca',
            '$frecuencia_respiratoria','$pulso','$temperatura','$descripcion_examen','$hilodental','$piezadental','$olorsabor')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();
        }

		function Editar_hc($idhistoria,$ocupacion,$estado_civil,$raza,$grado_instruccion,$religion,$lugar_procedencia,$nombre_acompañante,$enfermedad_actual,
        $sintomas_principales,$funciones_biologicas,$antecedentes,$antecedentes_familia,$tipo_enfermedad,$relato_cronologico,$antecedentes_personales,$presion_arterial,$frecuencia_cardiaca,
        $frecuencia_respiratoria,$pulso,$temperatura,$descripcion_examen,$hilodental,$piezadental,$olorsabor){
            $sql = "call SP_EDITAR_HC('$idhistoria','$ocupacion','$estado_civil','$raza','$grado_instruccion','$religion','$lugar_procedencia','$nombre_acompañante','$enfermedad_actual',
            '$sintomas_principales','$funciones_biologicas','$antecedentes','$antecedentes_familia','$tipo_enfermedad','$relato_cronologico','$antecedentes_personales','$presion_arterial','$frecuencia_cardiaca',
            '$frecuencia_respiratoria','$pulso','$temperatura','$descripcion_examen','$hilodental','$piezadental','$olorsabor')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
			}
			else{
				return 0;
			}
			$this->conexion->cerrar();
        }
		function lista_hc_por_fecha($fechainicio,$fechafin){
            $sql = "call SP_LISTAR_HC_POR_FECHAS1('$fechainicio','$fechafin')";
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