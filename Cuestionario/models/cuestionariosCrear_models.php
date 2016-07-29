<?php 

	class cuestionariosCrear_models{

		public static function recuperarDatos($nombreCuestionario){
			$sql = "INSERT INTO cuestionario (nombre) VALUES ('$nombreCuestionario')";
			$idCuestionario = Conexion::consultaId($sql);
			
			$totSec = $_POST['conSeccion1'] + 1;
			
			for($i = 1; $i<$totSec; $i++){
				$instruccion = $_POST['instrucciones'.$i];
				$totPre = $_POST['conPregunta'.$i] + 1;
				$sql = "INSERT INTO bloquepregunta (idBloquePregunta,instruccion,idCuestionario)
				VALUES (null,'$instruccion','$idCuestionario')";
				$idBloque = Conexion::consultaId($sql);
				$sql = "";
				$cont = 1;
				for($j = 1; $j < $totPre; $j++){
					$pregunta = $_POST['pregunta'.$i.$j];
					$puntaje = $_POST['puntaje'.$i.$j];					
					$totOp = $_POST['conOpcion'.$i.$j] + 1;
					$datosCampos = "";					
					for($k = 1; $k < 11; $k++){
						if($k < $totOp){
							$opcion = $_POST['op'.$i.$j.$k];
							$datosCampos = $datosCampos . ",'" . $opcion . "'";
						}else{
							$datosCampos = $datosCampos . ",null";
						}					
						if($k == 1){
							$respuestaCorrecta = $_POST['op'.$i.$j.$k];
						}
					}
					if($cont == 1){
						$sql = "INSERT INTO preguntamultiple (idPreguntaMultiple,pregunta,respuesta1,respuesta2,respuesta3,respuesta4,respuesta5,respuesta6,respuesta7,respuesta8,respuesta9,respuesta10,numeroOrden,respuestaCorrecta,puntaje,idCuestionario,idBloquePregunta) 
						VALUES (null,'$pregunta'$datosCampos,'$j','$respuestaCorrecta','$puntaje','$idCuestionario','$idBloque')";
					}else{
						$sql = $sql . ",(null,'$pregunta'$datosCampos,'$j','$respuestaCorrecta','$puntaje','$idCuestionario','$idBloque')";
					}
					$cont++;		
				}
				Conexion::consultaSimple($sql);
			}
		}
	}
?>