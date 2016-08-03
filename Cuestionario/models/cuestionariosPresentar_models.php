<?php 

	class cuestionariosPresentar_models{
		//Se utiliza para seleccionar a todos los pacientes existentes en el sistema - cuestionarioPresentar.php
		public static function consultarPacientes(){
			$sql = "SELECT * FROM paciente";
			$resultado = Conexion::consultaDevolver($sql);
			return $resultado;
		}

		//Se utiliza para consultar todos los cuestionarios que un paciente tiene asignado para presentar - cuestionariosAsignados.php
		public static function consultarCuestionarios($idPaciente){
			$sql = "SELECT cuestionarioresuelto.idCuestionarioResuelto, cuestionario.idCuestionario, cuestionario.nombre FROM  cuestionario INNER JOIN cuestionarioresuelto ON cuestionario.idCuestionario  = cuestionarioresuelto.idCuestionario INNER JOIN paciente ON paciente.idPaciente = cuestionarioresuelto.idPaciente WHERE cuestionarioresuelto.idPaciente = '$idPaciente' AND estatus = '0'";
			$resultado = Conexion::consultaDevolver($sql);
			return $resultado;
		}

		//Se utiliza para consultar el nombre completo del paciente - cuestionariosAsignados.php
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

		//Se utiliza para obtener el puntaje total a obtener y el puntaje obtenido por el paciente con respecto al cuestionario presentado - mostrarResultados.php
		public static function obtenerPuntaje($arrayPregunta,$total2){
			//Creamos el array que almacenará el puntaje total y el puntaje obtenido por el paciente
			$puntaje = array(
				'puntajeTotal' => 0,
				'puntajeObtenido' => 0
			);

			//For que recorrerá el total de preguntas y determinará si son correctas las respuestas seleccionadas por el paciente o no, además sumará el puntaje que obtiene el paciente en cada pregunta y el puntaje maximo a obtener en cada pregunta, es decir logramos obtener el puntaje obtenido y el puntaje máximo a obtener en el cuestionario
			for($ini = 0; $ini < $total2; $ini++){
				//Verificamos que se haya seleccionado alguna opción para la pregunta
				if(isset($_POST["opcion$ini"])){
					//Comparamos la respuesta seleccionada con la respuesta correcta
					if($_POST["opcion$ini"]==$arrayPregunta[$ini]['respuestaCorrecta']){
						//Si es correcta aumentamos el puntaje obtenido
						$puntaje['puntajeObtenido'] += $arrayPregunta[$ini]['puntaje'];
					}
				}
				//Sin importar si la respuesta es correcta necesitamos sumar el valor de cada pregunta para obtener el puntaje máximo a obtener el cuestionario (puntaje total)
				$puntaje['puntajeTotal'] += $arrayPregunta[$ini]['puntaje'];
			}
			//Devolvemos el array puntaje
			return $puntaje;
		}

		//Se utiliza para almacenar los resultados obtenidos en el cuestionario, fecha de presentación, tiempo de inicio, tiempo de fin, y la puntuación obtenida por el paciente - mostrarResultados.php
		public static function guardarCuestionarioResuelto($idCuestionarioResuelto, $fecha, $tiempoInicio, $tiempoFin, $puntuacion){
			$sql = "UPDATE cuestionarioresuelto SET estatus='1', fecha='$fecha', tiempoInicio='$tiempoInicio', tiempoFin='$tiempoFin', puntuacion='$puntuacion' WHERE idCuestionarioResuelto = '$idCuestionarioResuelto'";
			Conexion::consultaSimple($sql);
		}
		//Se utiliza para saber si el cuestionario a presentar no se ha presentado, es decir, cuando un paciente le da clic a presentar cuestionario y empieza a presentarlo, el estatus cambia a presentado, con esta función nosotros evitamos que el recargue la página, pues si lo hace no podrá ver el cuestionario, debido a que estará como presentado - mostrarResultados.php
		public static function consultarCuestionarioPresentado($idCuestionarioResuelto){
			//Consultamos si el paciente ya presentó el cuestionario
			$sql = "SELECT idCuestionarioResuelto, estatus FROM cuestionarioresuelto WHERE idCuestionarioResuelto = '$idCuestionarioResuelto'";
			$resultado = Conexion::consultaDevolver($sql);
			//Si el cuestionario está presentado devuelve false
			$resultado = mysqli_fetch_assoc($resultado);
			if($resultado['estatus']==1){
				return false;
			}
			//Si el cuestionario no está presentado devuelve true
			return true;
		}

		//Se utiliza para almacenar en la base de datos que determinado paciente ya presentó determinado cuestionario en base al idCuestionarioResuelto (id de la relación paciente-cuestionario) - presentarCuestionario.php
		public static function presentar($idCuestionarioResuelto,$fecha){
			$sql = "UPDATE cuestionarioresuelto SET estatus = '1', fecha = '$fecha', tiempoInicio = '00:00:00', tiempoFin = '00:00:00', puntuacion = '0' WHERE idCuestionarioResuelto = '$idCuestionarioResuelto'";
			Conexion::consultaSimple($sql);
		}
	}

?>