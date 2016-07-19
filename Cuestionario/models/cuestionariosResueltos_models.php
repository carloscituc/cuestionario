<?php 

	class cuestionariosResueltos_models{

		//Se utiliza para recuperar todos los cuestionarios presentados por todos los pacientes
		public static function listarT1(){
			$sql = "SELECT cuestionarioresuelto.idCuestionarioResuelto, cuestionarioresuelto.idCuestionario, cuestionarioresuelto.idPaciente, cuestionario.nombre AS nombreCuestionario, paciente.nombre AS nombrePaciente, paciente.apellidoPaterno, MAX(cuestionarioresuelto.intento) AS intentos FROM cuestionario INNER JOIN cuestionarioresuelto ON cuestionario.idCuestionario = cuestionarioresuelto.idCuestionario INNER JOIN paciente ON cuestionarioresuelto.idPaciente = paciente.idPaciente WHERE cuestionarioresuelto.estatus = '1' GROUP BY cuestionarioresuelto.idPaciente, cuestionarioresuelto.idCuestionario";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}

		//Se utiliza para recuperar todas las asignaciones de todos los cuestionarios no presentados
		public static function listarT2(){
			$sql = "SELECT cuestionarioresuelto.idCuestionarioResuelto, cuestionarioresuelto.idCuestionario, cuestionarioresuelto.idPaciente, cuestionario.nombre AS nombreCuestionario, paciente.nombre AS nombrePaciente, paciente.apellidoPaterno, cuestionarioresuelto.intento, cuestionarioresuelto.estatus FROM cuestionario INNER JOIN cuestionarioresuelto ON cuestionario.idCuestionario = cuestionarioresuelto.idCuestionario INNER JOIN paciente ON cuestionarioresuelto.idPaciente = paciente.idPaciente WHERE cuestionarioresuelto.estatus = '0'";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}

		//Se utiliza para consultar un determinado cuestionario presentado x veces por un determinado paciente
		public static function listarT1Intentos($idPaciente, $idCuestionario){
			$sql = "SELECT cuestionarioresuelto.idCuestionarioResuelto, cuestionarioresuelto.idCuestionario, cuestionario.nombre AS nombreCuestionario, paciente.nombre AS nombrePaciente, paciente.apellidoPaterno, cuestionarioresuelto.puntuacion, cuestionarioresuelto.intento, cuestionarioresuelto.estatus FROM cuestionario INNER JOIN cuestionarioresuelto ON cuestionario.idCuestionario = cuestionarioresuelto.idCuestionario INNER JOIN paciente ON cuestionarioresuelto.idPaciente = paciente.idPaciente WHERE cuestionarioresuelto.estatus = '1' AND cuestionarioresuelto.idPaciente = '$idPaciente' AND cuestionarioresuelto.idCuestionario = '$idCuestionario' ORDER BY cuestionarioresuelto.intento ASC";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}

		//Se utiliza para mostrar todos los datos de cuestionario presentado por un determinado paciente
		public static function detalleRP($id){
			$sql = "SELECT cuestionarioresuelto.idCuestionario, cuestionario.nombre AS nombreCuestionario, paciente.nombre AS nombrePaciente, paciente.apellidoPaterno, paciente.apellidoMaterno, cuestionarioresuelto.puntuacion, cuestionarioresuelto.intento, cuestionarioresuelto.fecha, TIMEDIFF(tiempoFin,tiempoInicio) AS tiempoRealizacion, cuestionarioresuelto.limiteTiempo FROM cuestionario INNER JOIN cuestionarioresuelto ON cuestionario.idCuestionario = cuestionarioresuelto.idCuestionario INNER JOIN paciente ON cuestionarioresuelto.idPaciente = paciente.idPaciente WHERE cuestionarioresuelto.idCuestionarioResuelto = '$id'";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}

		//Se utiliza para mostrar todos los datos de una asignación de un cuestionario a un determinado paciente
		public static function detalleANP($id){
			$sql = "SELECT cuestionarioresuelto.idCuestionario, cuestionario.nombre AS nombreCuestionario, paciente.nombre AS nombrePaciente, paciente.apellidoPaterno, paciente.apellidoMaterno, cuestionarioresuelto.intento, cuestionarioresuelto.limiteTiempo FROM cuestionario INNER JOIN cuestionarioresuelto ON cuestionario.idCuestionario = cuestionarioresuelto.idCuestionario INNER JOIN paciente ON cuestionarioresuelto.idPaciente = paciente.idPaciente WHERE cuestionarioresuelto.idCuestionarioResuelto = '$id'";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}

		//Esta función se utiliza para consultar todos los pacientes existentes dentro del sistema y el especialista pueda seleccionar alguno
		public static function reasignarANP(){
			$sql = "SELECT paciente.idPaciente, paciente.nombre, paciente.apellidoPaterno, paciente.apellidoMaterno FROM paciente";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}

		//Se utiliza para reasignar a determinado paciente un determinado cuestionario
		//nuevoIdPaciente = paciente a quien se le asignará el cuestionario
		//tiempo = el límite de tiempo que tendrá el paciente para presentar completamente el cuestionario
		//idPaciente = id del paciente a quien se le quitará el cuestionario
		//idCuestionario = id del cuestionario que será reasignado
		public static function reasignarPaciente($nuevoIdPaciente, $tiempo, $idPaciente, $idCuestionario){

			//Consultamos si al paciente a quien se le asignará el cuestionario ya tiene asignado este cuestionario
			$sql = "SELECT idPaciente FROM cuestionarioresuelto WHERE idPaciente = '$nuevoIdPaciente' AND idCuestionario = '$idCuestionario' AND estatus = '0'";
			//Ejecutamos la consulta
			$id = Conexion::consultaDevolver($sql);
			//Contamos cuantos registros se obtuvieron
			$id = mysqli_num_rows($id);

				//Si el nuevo paciente a quien se le asignará el cuestionario es
				//el mismo que ya tenía asignado este cuestionario, sólo modificamos el tiempo 
				if($nuevoIdPaciente == $idPaciente){
					$sql = "UPDATE cuestionarioresuelto SET limiteTiempo = '$tiempo' WHERE idPaciente = '$idPaciente' AND idCuestionario = '$idCuestionario' AND estatus = '0'";
					Conexion::consultaSimple($sql);
					echo '<script>alert("Tiempo límite de cuestionario modificado");</script>';
				//Si no es el mismo paciente se hace la reasignación de paciente
				}else{
					//si $id != 0 significa que el usuario a quien se le quiere asignar el cuestionario es el mismo
					if($id == 0){
						$sql = "SELECT MAX(intento) AS intento FROM cuestionarioresuelto WHERE idPaciente = '$nuevoIdPaciente' AND idCuestionario = '$idCuestionario'";
						//Recuperamos el número de intentos que tiene el paciente con relación al cuestionario que se le quiere asignar
						$intento = Conexion::consultaDevolver($sql);
						$intento = mysqli_fetch_row($intento);
						//Se le suma 1 intento, el cual será el que se almacenará en la base de datos
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

		//Se utiliza para eliminar la asignación de un cuestionario no resuelto por un determinado paciente, en base al id del cuestionario y el id del paciente
		public static function eliminarAsignacion($idPaciente,$idCuestionario){
			$sql = "DELETE FROM cuestionarioresuelto WHERE idPaciente = '$idPaciente' AND idCuestionario = '$idCuestionario' AND estatus = '0'";
			Conexion::consultaSimple($sql);
			echo '<script>alert("Se ha eliminado la asignación del cuestionario");</script>';
			echo "<script> location.href='cuestionarioListar.php#ANP'; </script>";
		}

		//Se utiliza para buscar un cuestionario resuelto por un determinado paciente, en base al nombre del paciente
		public static function buscarRP($cadena){
			$sql = "SELECT cuestionarioresuelto.idCuestionarioResuelto, cuestionarioresuelto.idCuestionario, cuestionarioresuelto.idPaciente, cuestionario.nombre AS nombreCuestionario, paciente.nombre AS nombrePaciente, paciente.apellidoPaterno, MAX(cuestionarioresuelto.intento) AS intentos FROM cuestionario INNER JOIN cuestionarioresuelto ON cuestionario.idCuestionario = cuestionarioresuelto.idCuestionario INNER JOIN paciente ON cuestionarioresuelto.idPaciente = paciente.idPaciente WHERE cuestionarioresuelto.estatus = '1' AND (paciente.nombre LIKE '%$cadena%' OR paciente.apellidoPaterno LIKE '%$cadena%' OR paciente.apellidoMaterno = '%$cadena%') GROUP BY cuestionarioresuelto.idPaciente, cuestionarioresuelto.idCuestionario";
			
			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}

		//Se utiliza para buscar una asignación de un cuestionario no resuelto por un determinado paciente, en base al nombre del paciente
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