<?php 

	class cuestionariosEditar_models{
		public static function listarCuestionarios(){
			$sql = "SELECT idCuestionario, nombre FROM cuestionario";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}
		public static function consultarPacientes(){
			$sql = "SELECT idPaciente, nombre, apellidoPaterno, apellidoMaterno FROM paciente";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}

		//Se utiliza para reasignar a determinado paciente un determinado cuestionario
		//nuevoIdPaciente = paciente a quien se le asignará el cuestionario
		//tiempo = el límite de tiempo que tendrá el paciente para presentar completamente el cuestionario
		//idPaciente = id del paciente a quien se le quitará el cuestionario
		//idCuestionario = id del cuestionario que será reasignado
		public static function asignarPaciente($idPaciente, $tiempo, $idCuestionario){

			//Consultamos si al paciente a quien se le asignará el cuestionario ya tiene asignado este cuestionario
			$sql = "SELECT idPaciente FROM cuestionarioresuelto WHERE idPaciente = '$idPaciente' AND idCuestionario = '$idCuestionario' AND estatus = '0'";
			//Ejecutamos la consulta
			$id = Conexion::consultaDevolver($sql);
			//Contamos cuantos registros se obtuvieron
			$id = mysqli_num_rows($id);

			//Si el nuevo paciente a quien se le asignará el cuestionario es
			//el mismo que ya tenía asignado este cuestionario, sólo modificamos el tiempo 
			if($id == 0){
				$sql = "SELECT MAX(intento) AS intento FROM cuestionarioresuelto WHERE idPaciente = '$idPaciente' AND idCuestionario = '$idCuestionario'";
				//Recuperamos el número de intentos que tiene el paciente con relación al cuestionario que se le quiere asignar
				$intento = Conexion::consultaDevolver($sql);
				$intento = mysqli_fetch_row($intento);
				//Se le suma 1 intento, el cual será el que se almacenará en la base de datos
				$intento = $intento[0] + 1;

				//echo "<script>alert('Modificacion fallida".$intento."');</script>";
				$sql = "INSERT INTO cuestionarioresuelto (idCuestionarioResuelto, intento, limiteTiempo, idPaciente, idCuestionario, estatus)
				VALUES (null, '$intento', '$tiempo', '$idPaciente', '$idCuestionario', '0')";
				Conexion::consultaSimple($sql);
				echo '<script>alert("Cuestionario asignado exitosamente");</script>';
			}else{
				echo '<script>alert("El paciente seleccionado ya tiene asignado este cuestionario");</script>';
			}
		}
		//Se utiliza para eliminar la asignación de un cuestionario no resuelto por un determinado paciente, en base al id del cuestionario y el id del paciente
		public static function eliminarCuestionario($idCuestionario){
			$sql = "SELECT idCuestionario FROM cuestionarioresuelto WHERE idCuestionario = '$idCuestionario'";
			$id = Conexion::consultaDevolver($sql);
			$id = mysqli_num_rows($id);

			if($id == 0){
				$sql = "DELETE FROM preguntamultiple WHERE idCuestionario = '$idCuestionario'";
				Conexion::consultaSimple($sql);
				$sql = "DELETE FROM bloquepregunta WHERE idCuestionario = '$idCuestionario'";
				Conexion::consultaSimple($sql);
				$sql = "DELETE FROM cuestionario WHERE idCuestionario = '$idCuestionario'";
				Conexion::consultaSimple($sql);
				echo '<script>alert("Cuestionario eliminado");</script>';
			}else{
				echo '<script>alert("Imposible eliminar cuestionario");</script>';
			}
		}
	}

?>