<?php 

	class cuestionariosEditar_models{
		//Se utiliza para mostrar todos los cuestionarios almacenados en la base de datos
		public static function listarCuestionarios(){
			$sql = "SELECT idCuestionario, nombre FROM cuestionario";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}

		//Se utiliza para recuperar todos los pacientes registrados en el sistema
		public static function consultarPacientes(){
			$sql = "SELECT idPaciente, nombre, apellidoPaterno, apellidoMaterno FROM paciente";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}

		//Se utiliza para asignar a un determinado paciente un determinado cuestionario
		//en base al id del paciente, el tiempo que tendrá disponible el paciente para presentar
		//el cuestionario y el id del cuestionario
		//Se verifica si el paciente ya tiene asignado o no el cuestionario para presentarlo
		public static function asignarPaciente($idPaciente, $tiempo, $idCuestionario){

			//Consultamos si al paciente a quien se le asignará el cuestionario ya tiene asignado este cuestionario
			$sql = "SELECT idPaciente FROM cuestionarioresuelto WHERE idPaciente = '$idPaciente' AND idCuestionario = '$idCuestionario' AND estatus = '0'";
			//Ejecutamos la consulta
			$id = Conexion::consultaDevolver($sql);
			//Contamos cuantos registros se obtuvieron
			$id = mysqli_num_rows($id);

			//Si el paciente aún no tiene asignado el cuestionario para presentarlo aunque ya lo haya presentado en anteriores ocasiones se procede a asignarle el cuestionario seleccionado
			if($id == 0){
				$sql = "SELECT MAX(intento) AS intento FROM cuestionarioresuelto WHERE idPaciente = '$idPaciente' AND idCuestionario = '$idCuestionario'";
				//Recuperamos el número de intentos que tiene el paciente con relación al cuestionario que se le quiere asignar
				$intento = Conexion::consultaDevolver($sql);
				$intento = mysqli_fetch_row($intento);
				//Se le suma 1 intento, el cual será el que se almacenará en la base de datos
				$intento = $intento[0] + 1;

				//Insertamos los datos de la asignación en la tabla cuestionarioresuelto
				$sql = "INSERT INTO cuestionarioresuelto (idCuestionarioResuelto, intento, limiteTiempo, idPaciente, idCuestionario, estatus)
				VALUES (null, '$intento', '$tiempo', '$idPaciente', '$idCuestionario', '0')";
				Conexion::consultaSimple($sql);
				echo '<script>alert("Cuestionario asignado exitosamente");</script>';
				//Redireccionamos al especialista a la vista donde se encuentran los cuestionarios no resueltos asignados
				echo "<script> location.href='cuestionarioListar.php#ANP'; </script>";
			}else{
				//Si el paciente a asignar el cuestionario ya tiene asignado el cuestionario y aún no lo ha presentado
				echo '<script>alert("El paciente seleccionado ya tiene asignado este cuestionario");</script>';
			}
		}
		//Se utiliza para eliminar un cuestiario determinado
		public static function eliminarCuestionario($idCuestionario){
			//Verificamos si el cuestionario seleccionado para eliminar no está asignado para presentar o ya se ha presentado
			$sql = "SELECT idCuestionario FROM cuestionarioresuelto WHERE idCuestionario = '$idCuestionario'";
			$id = Conexion::consultaDevolver($sql);
			$id = mysqli_num_rows($id);

			//Si el cuestionario no existe en alguna asignación lo eliminamos
			if($id == 0){
				$sql = "DELETE FROM preguntamultiple WHERE idCuestionario = '$idCuestionario'";
				Conexion::consultaSimple($sql);
				$sql = "DELETE FROM bloquepregunta WHERE idCuestionario = '$idCuestionario'";
				Conexion::consultaSimple($sql);
				$sql = "DELETE FROM cuestionario WHERE idCuestionario = '$idCuestionario'";
				Conexion::consultaSimple($sql);
				echo '<script>alert("Cuestionario eliminado");</script>';
				echo "<script> location.href='cuestionarioEditarAsignar.php'; </script>";
			}else{
				//Si el cuestionario está asignado para presentar o ya se ha presentado por algún paciente
				echo '<script>alert("Imposible eliminar cuestionario");</script>';
			}
		}

		//Es una consulta para buscar a un determinado cuestionario en base al nombre
		public static function buscarCuestionario($nombreCuestionario){
			$sql = "SELECT idCuestionario, nombre FROM cuestionario WHERE nombre LIKE '%$nombreCuestionario%'";

			$resultado = Conexion::consultaDevolver($sql);

			return $resultado;
		}

		//----FUNCIONES QUE SIRVEN PARA IMPRIMIR LA ESTRUCTURA Y LA INFORMACIÓN CONTENIDA DE UN CUESTIONARIO ESPECÍFICO
		//Recuperamos los bloques y el nombre del cuestionario
		public static function detalleCuestionarioBloques($idCuestionario){
			//Consultamos todos los bloques que corresponden a los cuestionarios
			$sql = "SELECT nombre, idBloquePregunta, instruccion FROM bloquepregunta INNER JOIN cuestionario ON bloquepregunta.idCuestionario = cuestionario.idCuestionario WHERE bloquepregunta.idCuestionario = '$idCuestionario'";

			//Ejecutamos la consulta y la almacenamos
			$resultado = Conexion::consultaDevolver($sql);

			//Contamos el número de resultados
			$total = mysqli_num_rows($resultado);

			//Creamos el arrayBloque para almacenar los datos devueltos por la consulta
			$arrayBloque = array();
			for($i=0; $i<$total; $i++){
				$bloque = mysqli_fetch_assoc($resultado);

				$arrayBloque[0]['nombre'] = $bloque['nombre'];//Sólo una ves almacenamos el nombre del cuestionario
				$arrayBloque[$i]['idBloquePregunta'] = $bloque['idBloquePregunta'];//Id del bloque
				$arrayBloque[$i]['instruccion'] = $bloque['instruccion'];//Instrucción del bloque cuestionario
			}
			//Retornamos el array que contiene a todos los bloques
			return $arrayBloque;
		}
		//Recuperamos las preguntas en base al id del cuestionario
		public static function detalleCuestionarioPreguntas($idCuestionario){
			//Consultamos las preguntas
			$sql = "SELECT bloquepregunta.idBloquePregunta, idPreguntaMultiple, pregunta, respuesta1, respuesta2, respuesta3, respuesta4, respuesta5, respuesta6, respuesta7, respuesta8, respuesta9, respuesta10, numeroOrden, respuestaCorrecta, puntaje FROM cuestionario INNER JOIN bloquepregunta ON bloquepregunta.idCuestionario = cuestionario.idCuestionario INNER JOIN preguntamultiple ON preguntamultiple.idBloquePregunta = bloquepregunta.idBloquePregunta WHERE cuestionario.idCuestionario = '$idCuestionario'";
			//Ejecutamos la consulta
			$resultado = Conexion::consultaDevolver($sql);
			//Contamos el número de registros devueltos
			$total = mysqli_num_rows($resultado);
			//Creamos el arrayPregunta para almacenar las preguntas
			$arrayPregunta = array();
			for($i=0; $i<$total; $i++){
				$pregunta = mysqli_fetch_assoc($resultado);

				$arrayPregunta[$i]['idBloquePregunta'] = $pregunta['idBloquePregunta'];
				$arrayPregunta[$i]['idPreguntaMultiple'] = $pregunta['idPreguntaMultiple'];
				$arrayPregunta[$i]['pregunta'] = $pregunta['pregunta'];
				$arrayPregunta[$i]['respuesta1'] = $pregunta['respuesta1'];
				$arrayPregunta[$i]['respuesta2'] = $pregunta['respuesta2'];
				$arrayPregunta[$i]['respuesta3'] = $pregunta['respuesta3'];
				$arrayPregunta[$i]['respuesta4'] = $pregunta['respuesta4'];
				$arrayPregunta[$i]['respuesta5'] = $pregunta['respuesta5'];
				$arrayPregunta[$i]['respuesta6'] = $pregunta['respuesta6'];
				$arrayPregunta[$i]['respuesta7'] = $pregunta['respuesta7'];
				$arrayPregunta[$i]['respuesta8'] = $pregunta['respuesta8'];
				$arrayPregunta[$i]['respuesta9'] = $pregunta['respuesta9'];
				$arrayPregunta[$i]['respuesta10'] = $pregunta['respuesta10'];
				$arrayPregunta[$i]['numeroOrden'] = $pregunta['numeroOrden'];
				$arrayPregunta[$i]['respuestaCorrecta'] = $pregunta['respuestaCorrecta'];
				$arrayPregunta[$i]['puntaje'] = $pregunta['puntaje'];
			}
			//Devolvemos el array que contiene a todas las preguntas
			return $arrayPregunta;
		}


	}

?>