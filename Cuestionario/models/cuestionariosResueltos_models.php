<?php 

	class cuestionariosResueltos_models{

		public static function listarT1(){
			$sql = "SELECT cuestionarioresuelto.idCuestionarioResuelto, cuestionario.nombre AS nombreCuestionario, paciente.nombre AS nombrePaciente, paciente.apellidoPaterno, cuestionarioresuelto.puntuacion, cuestionarioresuelto.intento, cuestionarioresuelto.estatus FROM cuestionario INNER JOIN cuestionarioresuelto ON cuestionario.idCuestionario = cuestionarioresuelto.idCuestionario INNER JOIN paciente ON cuestionarioresuelto.idPaciente = paciente.idPaciente WHERE cuestionarioresuelto.estatus = '1'";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}
		public static function listarT2(){
			$sql = "SELECT cuestionarioresuelto.idCuestionarioResuelto, cuestionario.nombre AS nombreCuestionario, paciente.nombre AS nombrePaciente, paciente.apellidoPaterno, cuestionarioresuelto.intento, cuestionarioresuelto.estatus FROM cuestionario INNER JOIN cuestionarioresuelto ON cuestionario.idCuestionario = cuestionarioresuelto.idCuestionario INNER JOIN paciente ON cuestionarioresuelto.idPaciente = paciente.idPaciente WHERE cuestionarioresuelto.estatus = '0'";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}
		public static function detalleRP($id){
			$sql = "SELECT cuestionarioresuelto.idCuestionarioResuelto, cuestionario.nombre AS nombreCuestionario, paciente.nombre AS nombrePaciente, paciente.apellidoPaterno, paciente.apellidoMaterno, cuestionarioresuelto.puntuacion, cuestionarioresuelto.intento, cuestionarioresuelto.fecha, TIMEDIFF(tiempoFin,tiempoInicio) AS tiempoRealizacion, cuestionarioresuelto.limiteTiempo FROM cuestionario INNER JOIN cuestionarioresuelto ON cuestionario.idCuestionario = cuestionarioresuelto.idCuestionario INNER JOIN paciente ON cuestionarioresuelto.idPaciente = paciente.idPaciente WHERE cuestionarioresuelto.idCuestionarioResuelto = '$id'";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}
	}
?>