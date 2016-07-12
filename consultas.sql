---Tabla paciente---
--SELECT--
--Seleccionar todos los datos de todos los pacientes--
SELECT * FROM paciente
--Seleccionar a todos los datos de un paciente en específico--
SELECT * FROM paciente WHERE idPaciente = '$idPaciente'
--INSERT--
--Insertar sólo los datos del paciente--
INSERT INTO paciente (idPaciente, nombre, apellidoPaterno, apellidoMaterno, numHermanos, lateralidad, gradoEscolar, fechaNacimiento, calle, numero, colonia, municipio, estado, cp, genero, foto)
VALUES (null,'$nombre','$apellidoPaterno','$apellidoMaterno','$numHermanos','$lateralidad','$gradoEscolar','$fechaNacimiento','$calle','$numero','$colonia','$municipio','$estado','$cp','$genero',null)
--DELETE--
--Eliminar a un paciente en específico--
DELETE FROM paciente WHERE idPaciente = '$idPaciente'
--UPDATE--
--Actualizar sólo los datos del paciente--
UPDATE paciente SET nombre = '$nombre', apellidoPaterno = '$apellidoPaterno', apellidoMaterno = '$apellidoMaterno', numHermanos = '$numHermanos', lateralidad = '$lateralidad', gradoEscolar = '$gradoEscolar', fechaNacimiento = '$fechaNacimiento', 
calle = '$calle', numero = '$numero', colonia = '$colonia', municipio = '$municipio', estado = '$estado', cp = '$cp', genero = '$genero' WHERE idPaciente = '$idPaciente'
--Actualizar sólo la foto del paciente--
UPDATE paciente SET foto = '$foto' WHERE idPaciente = '$idPaciente'

---Tabla preguntamultiple---
--INSERT--
--Insertar una pregunta--
INSERT INTO preguntamultiple (idPreguntaMultiple, pregunta, respuesta1, respuesta2, respuesta3, respuesta4, respuesta5, respuesta6, respuesta7, respuesta8, respuesta9, respuesta10, numeroOrden, respuestaCorrecta, puntaje, idCuestionario, idBloquePregunta)
VALUES (null, '$pregunta', '$respuesta1', '$respuesta2', '$respuesta3', '$respuesta4', '$respuesta5', '$respuesta6', '$respuesta7', '$respuesta8', '$respuesta9', '$respuesta10', '$numeroOrden', '$respuestaCorrecta', '$puntaje', '$idCuestionario', '$idBloquePregunta')
--DELETE--
--Eliminar una pregunta--
DELETE FROM preguntamultiple WHERE idPreguntaMultiple = '$idPreguntaMultiple'
--UPDATE--
--Actualizar datos de una pregunta--
UPDATE preguntamultiple SET  pregunta = '$pregunta', respuesta1 = '$respuesta1', respuesta2 = '$respuesta2', respuesta3 = '$respuesta3', respuesta4 = '$respuesta4', respuesta5 = '$respuesta5', respuesta6 = '$respuesta6', respuesta7 = '$respuesta7', respuesta8 = '$respuesta8', respuesta9 = '$respuesta9', respuesta10 = '$respuesta10', numeroOrden = '$numeroOrden', respuestaCorrecta = '$respuestaCorrecta', puntaje = '$puntaje', idCuestionario = '$idCuestionario', idBloquePregunta = '$idBloquePregunta' WHERE idPreguntaMultiple = '$idPreguntaMultiple'

---Tabla bloquepregunta---
--INSERT--
--Insertar un bloque de preguntas--
INSERT INTO bloquepregunta (idBloquePregunta, instruccion, idCuestionario)
VALUES (null, '$instruccion', '$idCuestionario')
--DELETE--
--Eliminar un bloque de preguntas--
--Es necesario primero eliminar todas los campos de preguntas que contengan su id--
DELETE FROM bloquepregunta WHERE idBloquePregunta = '$idBloquePregunta'
--UPDATE--
--Actualizar algún bloque de preguntas--
UPDATE bloquepregunta SET instruccion = '$instruccion', idCuestionario = '$idCuestionario' WHERE idBloquePregunta = '$idBloquePregunta'

---Tabla cuestionario---
--INSERT--
--Insertar un nuevo formulario--
INSERT INTO cuestionario (idCuestionario, nombre)
VALUES (null, '$nombre')
--DELETE--
--Eliminar un formulario, esto es posible sólo cuando un formulario aún no ha sido presentado--
DELETE FROM cuestionario WHERE idCuestionario = '$idCuestionario'
--UPDATE--
--Sólo es posible actualizar el nombre del cuestionario--
UPDATE cuestionario SET nombre = '$nombre' WHERE idCuestionario = '$idCuestionario'

---Tabla cuestionarioresuelto---
--INSERT--
--Insertar un registro, esto es cuando apenas se asigna el cuestionario pero aún no está resuelto--
INSERT INTO cuestionarioresuelto (idPaciente, idCuestionario, estatus, fecha, tiempoInicio, tiempoFin, limiteTiempo, puntuacion, intento)
VALUES ('$idPaciente', '$idCuestionario', '0', null, null, null, '$limiteTiempo', null, null)
--UPDATE--
--Actualizar un cuestionario, esto es cuando se resuelve el cuestionario y se necesitan guardar los resultados--
UPDATE cuestionarioresuelto SET estatus = '1', fecha = '$fecha', tiempoInicio = '$tiempoInicio', timepoFin = '$tiempoFin', puntuacion