<?php 

	class cuestionariosCrear_models{

		public static function recuperarDatos($nombreCuestionario){
			//Inserción del nombre del cuestionario en la tabla de cuestionario
			$sql = "INSERT INTO cuestionario (nombre) VALUES ('$nombreCuestionario')";
			//Realiza la inserción del cuestionario y recupera el id del cuestionario creado
			$idCuestionario = Conexion::consultaId($sql);
			
			//Es el número total de secciones que se ingresaron en la creación del cuestionario
			$totSec = $_POST['conSeccion1'] + 1;
			
			//Inicio el ciclo para recorrer todas las secciones una por una
			for($i = 1; $i<$totSec; $i++){
				//Recupero la instrucción de la sección en la que me encuentro ahora
				$instruccion = $_POST['instrucciones'.$i];
				//Recupero el total de la preguntas que contiene la sección
				$totPre = $_POST['conPregunta'.$i] + 1;
				//Genero la consulta que me ingresará un bloque nuevo
				$sql = "INSERT INTO bloquepregunta (idBloquePregunta,instruccion,idCuestionario)
				VALUES (null,'$instruccion','$idCuestionario')";
				//Inserto el bloque y recupero su id
				$idBloque = Conexion::consultaId($sql);

				//Creo una variable que se irá concatenando para formar una consulta que insertará todas las preguntas y sus opciones
				$sql = "";
				//Indica la primera vez que se están recorriendo las opciones
				$cont = 1;

				//Inicia el ciclo para recorrer todas las preguntas del bloque en el que encuentra
				for($j = 1; $j < $totPre; $j++){
					//Se recupera la pregunta ingresada del input
					$pregunta = $_POST['pregunta'.$i.$j];
					//Se recupera el valor del select que significa el puntaje de la pregunta
					$puntaje = $_POST['conSelect'.$i.$j];
					//Se recupera el total de opciones por cada pregunta				
					$totOp = $_POST['conOpcion'.$i.$j] + 1;
					//Se utiliza para poder almacenar todos los datos ingresados como opciones de respuesta por cada pregunta
					$datosCampos = "";
					//Recuperamos el número de opción que indica la respuesta correcta establecida por el usuario
					$radioCorrecta = $_POST['radioOp'.$i.$j];
					//Ciclo que recorre todos las opciones de respuesta
					for($k = 1; $k < 11; $k++){
						//Verificando que las opciones de respuesta existan para almacenarlas o en dado que caso de que no exista almacenar valores nulos
						if($k < $totOp){
							$opcion = $_POST['op'.$i.$j.$k];
							$datosCampos = $datosCampos . ",'" . $opcion . "'";
						}else{
							$datosCampos = $datosCampos . ",null";
						}
						//Comparamos el valor del radio button para saber cual es la respuesta correcta					
						if($radioCorrecta == $k){
							$respuestaCorrecta = $_POST['op'.$i.$j.$k];
						}
					}
					//Si es la primera pregunta se genera la cabecera del script de la inserción de las preguntas
					if($cont == 1){
						$sql = "INSERT INTO preguntamultiple (idPreguntaMultiple,pregunta,respuesta1,respuesta2,respuesta3,respuesta4,respuesta5,respuesta6,respuesta7,respuesta8,respuesta9,respuesta10,numeroOrden,respuestaCorrecta,puntaje,idCuestionario,idBloquePregunta) 
						VALUES (null,'$pregunta'$datosCampos,'$j','$respuestaCorrecta','$puntaje','$idCuestionario','$idBloque')";
					//Si no es la primera pregunta no guardes la cabecera, sólo almacena los datos de ingresados de las preguntas
					}else{
						$sql = $sql . ",(null,'$pregunta'$datosCampos,'$j','$respuestaCorrecta','$puntaje','$idCuestionario','$idBloque')";
					}
					//Aumentamos el contador para indicar que no es la primera pregunta
					$cont++;
				}
				//Para cada sección ingresamos todos los datos de las preguntas, tanto la pregunta como tal como sus opciones, la respuesta correcta
				Conexion::consultaSimple($sql);
			}
		}
	}
?>