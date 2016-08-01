<?php 

	class cuestionariosPresentar_models{
		public static function consultarPacientes(){
			$sql = "SELECT * FROM paciente";
			$resultado = Conexion::consultaDevolver($sql);
			return $resultado;
		}

		public static function consultarCuestionarios($idPaciente){
			$sql = "SELECT cuestionarioresuelto.idCuestionarioResuelto, cuestionario.idCuestionario, cuestionario.nombre FROM  cuestionario INNER JOIN cuestionarioresuelto ON cuestionario.idCuestionario  = cuestionarioresuelto.idCuestionario INNER JOIN paciente ON paciente.idPaciente = cuestionarioresuelto.idPaciente WHERE cuestionarioresuelto.idPaciente = '$idPaciente' AND estatus = '0'";
			$resultado = Conexion::consultaDevolver($sql);
			return $resultado;
		}

		public static function consultarPaciente($idPaciente){
			$sql = "SELECT paciente.nombre, paciente.apellidoPaterno, paciente.apellidoMaterno FROM paciente WHERE idPaciente = '$idPaciente'";
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

		public static function obtenerPuntaje($arrayPregunta,$total2){
			$totalPuntaje = 0;
			for($ini = 0; $ini < $total2; $ini++){
				if(isset($_POST["opcion$ini"])){
					if($_POST["opcion$ini"]==$arrayPregunta[$ini]['respuestaCorrecta']){
						echo "Es correcto";
						$totalPuntaje += $arrayPregunta[$ini]['puntaje'];
					}else{
						echo "Es incorrecto";
					}
				}else{
					echo "Es incorrecto";
				}
			}
			return $totalPuntaje;
		}
		public static function guardarCuestionarioResuelto($idCuestionarioResuelto, $fecha, $tiempoInicio, $tiempoFin, $puntuacion){
			$sql = "UPDATE cuestionarioresuelto SET estatus='1', fecha='$fecha', tiempoInicio='$tiempoInicio', tiempoFin='$tiempoFin', puntuacion='$puntuacion' WHERE idCuestionarioResuelto = '$idCuestionarioResuelto'";
			Conexion::consultaSimple($sql);
		}
	}

?>