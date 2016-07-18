<?php 

	class cuestionariosResueltos_models{

		public static function listarT1(){
			$sql = "SELECT cuestionarioresuelto.idCuestionarioResuelto, cuestionarioresuelto.idCuestionario, cuestionarioresuelto.idPaciente, cuestionario.nombre AS nombreCuestionario, paciente.nombre AS nombrePaciente, paciente.apellidoPaterno, MAX(cuestionarioresuelto.intento) AS intentos FROM cuestionario INNER JOIN cuestionarioresuelto ON cuestionario.idCuestionario = cuestionarioresuelto.idCuestionario INNER JOIN paciente ON cuestionarioresuelto.idPaciente = paciente.idPaciente WHERE cuestionarioresuelto.estatus = '1' GROUP BY cuestionarioresuelto.idPaciente, cuestionarioresuelto.idCuestionario";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}
		public static function listarT2(){
			$sql = "SELECT cuestionarioresuelto.idCuestionarioResuelto, cuestionarioresuelto.idCuestionario, cuestionarioresuelto.idPaciente, cuestionario.nombre AS nombreCuestionario, paciente.nombre AS nombrePaciente, paciente.apellidoPaterno, cuestionarioresuelto.intento, cuestionarioresuelto.estatus FROM cuestionario INNER JOIN cuestionarioresuelto ON cuestionario.idCuestionario = cuestionarioresuelto.idCuestionario INNER JOIN paciente ON cuestionarioresuelto.idPaciente = paciente.idPaciente WHERE cuestionarioresuelto.estatus = '0'";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}		
		public static function listarT1Intentos($idPaciente, $idCuestionario){
			$sql = "SELECT cuestionarioresuelto.idCuestionarioResuelto, cuestionarioresuelto.idCuestionario, cuestionario.nombre AS nombreCuestionario, paciente.nombre AS nombrePaciente, paciente.apellidoPaterno, cuestionarioresuelto.puntuacion, cuestionarioresuelto.intento, cuestionarioresuelto.estatus FROM cuestionario INNER JOIN cuestionarioresuelto ON cuestionario.idCuestionario = cuestionarioresuelto.idCuestionario INNER JOIN paciente ON cuestionarioresuelto.idPaciente = paciente.idPaciente WHERE cuestionarioresuelto.estatus = '1' AND cuestionarioresuelto.idPaciente = '$idPaciente' AND cuestionarioresuelto.idCuestionario = '$idCuestionario' ORDER BY cuestionarioresuelto.intento ASC";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}
		public static function detalleRP($id){
			$sql = "SELECT cuestionarioresuelto.idCuestionario, cuestionario.nombre AS nombreCuestionario, paciente.nombre AS nombrePaciente, paciente.apellidoPaterno, paciente.apellidoMaterno, cuestionarioresuelto.puntuacion, cuestionarioresuelto.intento, cuestionarioresuelto.fecha, TIMEDIFF(tiempoFin,tiempoInicio) AS tiempoRealizacion, cuestionarioresuelto.limiteTiempo FROM cuestionario INNER JOIN cuestionarioresuelto ON cuestionario.idCuestionario = cuestionarioresuelto.idCuestionario INNER JOIN paciente ON cuestionarioresuelto.idPaciente = paciente.idPaciente WHERE cuestionarioresuelto.idCuestionarioResuelto = '$id'";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}
		public static function detalleANP($id){
			$sql = "SELECT cuestionarioresuelto.idCuestionario, cuestionario.nombre AS nombreCuestionario, paciente.nombre AS nombrePaciente, paciente.apellidoPaterno, paciente.apellidoMaterno, cuestionarioresuelto.intento, cuestionarioresuelto.limiteTiempo FROM cuestionario INNER JOIN cuestionarioresuelto ON cuestionario.idCuestionario = cuestionarioresuelto.idCuestionario INNER JOIN paciente ON cuestionarioresuelto.idPaciente = paciente.idPaciente WHERE cuestionarioresuelto.idCuestionarioResuelto = '$id'";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}
		public static function reasignarANP(){
			$sql = "SELECT paciente.idPaciente, paciente.nombre, paciente.apellidoPaterno, paciente.apellidoMaterno FROM paciente";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}
		public static function reasignarPaciente($nuevoIdPaciente, $tiempo, $idPaciente, $idCuestionario){
			$sql = "SELECT idPaciente FROM cuestionarioresuelto WHERE idPaciente = '$nuevoIdPaciente' AND idCuestionario = '$idCuestionario' AND estatus = '0'";

			$id = Conexion::consultaDevolver($sql);
			$id = mysqli_num_rows($id);

			
				if($nuevoIdPaciente == $idPaciente){
					$sql = "UPDATE cuestionarioresuelto SET limiteTiempo = '$tiempo' WHERE idPaciente = '$idPaciente' AND idCuestionario = '$idCuestionario' AND estatus = '0'";
					Conexion::consultaSimple($sql);
					echo '<script>alert("Tiempo límite de cuestionario modificado");</script>';
				}else{
					if($id == 0){
						$sql = "SELECT MAX(intento) AS intento FROM cuestionarioresuelto WHERE idPaciente = '$nuevoIdPaciente' AND idCuestionario = '$idCuestionario'";

						$intento = Conexion::consultaDevolver($sql);
						$intento = mysqli_fetch_row($intento);
						$intento = $intento[0] + 1;

						//echo "<script>alert('Modificacion fallida".$intento."');</script>";
						$sql = "UPDATE cuestionarioresuelto SET intento = '$intento', idPaciente = '$nuevoIdPaciente', limiteTiempo = '$tiempo' WHERE idPaciente = '$idPaciente' AND idCuestionario = '$idCuestionario' AND estatus = '0'";
						Conexion::consultaSimple($sql);
						echo '<script>alert("Cuestionario reasignado a un nuevo paciente");</script>';
					}else{
						echo '<script>alert("El paciente ya tiene asignado este cuestionario");</script>';
					}
				}
		}
		public static function eliminarAsignacion($idPaciente,$idCuestionario){
			$sql = "DELETE FROM cuestionarioresuelto WHERE idPaciente = '$idPaciente' AND idCuestionario = '$idCuestionario' AND estatus = '0'";
			Conexion::consultaSimple($sql);
			echo '<script>alert("Se ha eliminado la asignación del cuestionario");</script>';
		}
		public static function buscarRP($cadena){

			$sql = "SELECT cuestionarioresuelto.idCuestionarioResuelto, cuestionarioresuelto.idCuestionario, cuestionarioresuelto.idPaciente, cuestionario.nombre AS nombreCuestionario, paciente.nombre AS nombrePaciente, paciente.apellidoPaterno, MAX(cuestionarioresuelto.intento) AS intentos FROM cuestionario INNER JOIN cuestionarioresuelto ON cuestionario.idCuestionario = cuestionarioresuelto.idCuestionario INNER JOIN paciente ON cuestionarioresuelto.idPaciente = paciente.idPaciente WHERE cuestionarioresuelto.estatus = '1' AND (paciente.nombre LIKE '%$cadena%' OR paciente.apellidoPaterno LIKE '%$cadena%' OR paciente.apellidoMaterno = '%$cadena%') GROUP BY cuestionarioresuelto.idPaciente, cuestionarioresuelto.idCuestionario";
			
			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}
		public static function buscarANP($cadena){

			$sql = "SELECT cuestionarioresuelto.idCuestionarioResuelto, cuestionarioresuelto.idCuestionario, cuestionarioresuelto.idPaciente, cuestionario.nombre AS nombreCuestionario, paciente.nombre AS nombrePaciente, paciente.apellidoPaterno, cuestionarioresuelto.intento, cuestionarioresuelto.estatus FROM cuestionario INNER JOIN cuestionarioresuelto ON cuestionario.idCuestionario = cuestionarioresuelto.idCuestionario INNER JOIN paciente ON cuestionarioresuelto.idPaciente = paciente.idPaciente WHERE cuestionarioresuelto.estatus = '0' AND (paciente.nombre LIKE '%$cadena%' OR paciente.apellidoPaterno LIKE '%$cadena%' OR paciente.apellidoMaterno = '%$cadena%')";
			
			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}
		/*
		public static function dividirCadena($cadena){
			$lon = strlen($cadena);
			$ind = 0;
			$arrayNombre = array(
				'nombre' => "",
				'apellidoPaterno' => "",
				'apellidoMaterno' => ""
			);

			for($k = 0; $k<$lon; $k++){
				$caracter = substr($cadena, $k, 1);
				//echo $caracter;
				if($caracter != " " && $ind == 2){
					$arrayNombre['apellidoMaterno'] = $arrayNombre['apellidoMaterno'] . $caracter;
				}else{
					if($caracter == " " && $ind == 2){
						$ind = 3;
					}
				}
				if($caracter != " " && $ind == 1){
					$arrayNombre['apellidoPaterno'] = $arrayNombre['apellidoPaterno'] . $caracter;
				}else{
					if($caracter == " " && $ind == 1){
						$ind = 2;
					}
				}
				if($caracter != " " && $ind == 0){
					$arrayNombre['nombre'] = $arrayNombre['nombre'] . $caracter;
				}else{
					if($caracter == " " && $ind == 0){
						$ind = 1;
					}
				}		
			}
			return $arrayNombre;
		}*/

	}
?>