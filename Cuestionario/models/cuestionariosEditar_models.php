<?php 

	class cuestionariosEditar_models{
		public static function listarCuestionarios(){
			$sql = "SELECT idCuestionario, nombre FROM cuestionario";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}
	}

?>