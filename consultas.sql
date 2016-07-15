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


---INSERCIONES DE PRUEBA---
INSERT INTO paciente (idPaciente, nombre, apellidoPaterno, apellidoMaterno, numHermanos, lateralidad, gradoEscolar, fechaNacimiento, calle, numero, colonia, municipio, estado, cp, genero, foto)
VALUES(null, 'Ramiro', 'Velazques', 'Bustamante', '3', 'Zurdo', 'Secundaria', '1995-03-12', '54', '945', 'Vista', 'Puebla', 'Puebla', '56666', 'Hombre', null),
(null, 'Aurora', 'Sánchez', 'Arceo', '0', 'Diestro', 'Primaria', '1997-05-17', '89', '559', 'Garza', 'Cozumel', 'Quintana Roo', '77888', 'Mujer', null),
(null, 'Eusebia', 'Perez', 'Muñoz', '2', 'Zurdo', 'Bachiller', '1999-09-21', '56', '456', 'Paloma', 'Villa Hermosa', 'Tabasco', '55566', 'Mujer', null),
(null, 'Francisco', 'Leon', 'Peña', '1', 'Diestro', 'Primaria', '2006-02-27', '65', '897', 'Cuadrilla', 'Puebla', 'Puebla', '55555', 'Hombre', null),
(null, 'Eliezer', 'Santos', 'Morales', '2', 'Diestro','Secundaria', '2001-03-11', '54', '556', 'Escaramilla', 'Solidaridad', 'Quintana Roo', '54666', 'Hombre', null);

INSERT INTO cuestionario (idCuestionario, nombre)
VALUES (null, 'Rehabilitación auditiva'),
(null, 'Lateralidad'),
(null, 'Rehabilitación cognitiva');

INSERT INTO bloquepregunta (idBloquePregunta, instruccion, idCuestionario)
VALUES (null, 'Selecciona si es verdadero o falso el enunciado', '1'),
(null, 'Encuentra la combinación idéntica', '1'),
(null, 'Selecciona la respuesta correcta', '1'),
(null, 'Selecciona la respuesta correcta', '2'),
(null, 'Es verdadero o falso el siguiente enunciado', '3'),
(null, 'Selecciona sólo una respuesta correcta', '3');

INSERT INTO preguntamultiple (idPreguntaMultiple, pregunta, respuesta1, respuesta2, respuesta3, respuesta4, respuesta5, respuesta6, respuesta7, respuesta8, respuesta9, respuesta10, numeroOrden, respuestaCorrecta, puntaje, idCuestionario, idBloquePregunta)
VALUES (null, 'El TDAH es solamente un problema  de conducta.', 'Verdadero', 'Falso', null, null, null, null, null, null, null, null, '1', 'Verdadero', '5', '1', '1'),
(null, 'Los medicamentos son el único tratamiento para el TDAH.', 'Verdadero', 'Falso', null, null, null, null, null, null, null, null, '2', 'Falso', '5', '1', '1'),
(null, 'El TDAH es una condición médica bastante común.', 'Verdadero', 'Falso', null, null, null, null, null, null, null, null, '3', 'Verdadero', '5', '1', '1'),
(null, 'El TDAH es solamente un problema  de conducta.', 'Verdadero', 'Falso', null, null, null, null, null, null, null, null, '4', 'Falso', '5', '1', '1'),
(null, 'El TDAH es una discapacidad de aprendizaje.', 'Verdadero', 'Falso', null, null, null, null, null, null, null, null, '5', 'Falso', '5', '1', '1'),
(null, 'ESTERNOCLEIDOMASTOIDEO', 'ESTERNOCLEITOMASTOIDEO', 'ESTERNOCLEIDOMASTOIDEO', 'ESTERNOCLEIDOMASTUIDEO', 'EXTERNOCLEIDOMASTOIDEO', 'ESTERNOCLEIDOMASTOIEEO', 'ESTERNOCLEIDONASTOIDEO', 'ESTENNOCLEIDOMASTOIDEO', 'ESTIRNOCLEIDOMASTOIDEO', null, null, '1', 'ESTERNOCLEIDOMASTOIDEO', '5', '1', '2'),
(null, 'HABITUALMENTE', 'HAVITUALMENTE', 'HABITUALMENLE', 'HABITUALNENTE', 'HIBATUALMENTE', 'NABITUALMENTE', 'HABITUALHENTE', 'HOBITUALMENTE', 'HABITUALMENTE', null, null, '2', 'HABITUALMENTE', '5', '1', '2'),
(null, 'SEMICIRCUNFERENCIA', 'SEMICITCUNFERENCIA', 'SEMICIRCUNFERENCIA', 'SEMICIRCONFERENCIA', 'SEMICIRKUNFERENCIA', 'SEMICIRCUNGERENCIA', 'SEMICIRCUNFEREMCIA', 'SAMICIRCUNFERENCIA', 'SEMICIRCUNFEREMCIA', null, null, '3', 'SEMICIRCUNFERENCIA', '5', '1', '2'),
(null, 'Comer manzanas y peras es bueno para la salud', 'Sólo manzanas', 'Sólo peras', 'Ambas', null, null, null, null, null, null, null, '1', 'Falso', '5', '1', '3'),
(null, 'Al resultado de una suma y una resta se le llama "producto".', 'Sólo a la resta', 'Sólo a la suma', 'Ninguno de los dos', null, null, null, null, null, null, null, '2', 'Falso', '5', '1', '3'),
(null, 'Volar es lo mismo que', 'Correr', 'Planear en el aire', 'Llorar', null, null, null, null, null, null, null, '3', 'Planear en el aire', '5', '1', '3'),

(null, '2 + 2 =', '4', '6', '-2', '8', null, null, null, null, null, null, '1', '4', '5', '2', '4'),
(null, '2 * 3 * 4 / 2 =', '5', '9', '31', '12', null, null, null, null, null, null, '2', '12', '5', '2', '4'),
(null, '(10 * 5)/(2 / 2) =', '25', '12.5', '50', '0', '65', null, null, null, null, null, '3', '50', '5', '2', '4'),

(null, 'Muchos niños con TDAH son hiperactivos e inatentos al mismo tiempo.', 'Verdadero', 'Falso', null, null, null, null, null, null, null, null, '1', 'Verdadero', '5', '3', '5'),
(null, 'Más niños que niñas son diagnosticados con TDAH.', 'Verdadero', 'Falso', null, null, null, null, null, null, null, null, '2', 'Verdadero', '5', '3', '5'),
(null, 'Los medicamentos son el único tratamiento para el TDAH.', 'Verdadero', 'Falso', null, null, null, null, null, null, null, null, '3', 'Falso', '5', '3', '5'),
(null, '2 + 3 =', '4', '5', '-2', '8', null, null, null, null, null, null, '1', '5', '5', '3', '6'),
(null, '2 * 3 * 4 / 2 =', '5', '9', '31', '12', null, null, null, null, null, null, '2', '12', '5', '3', '6'),
(null, '(10 * 5)/(2 / 2) =', '25', '12.5', '50', '0', '65', null, null, null, null, null, '3', '50', '5', '3', '6');

INSERT INTO cuestionarioresuelto (idCuestionarioResuelto, estatus, fecha, tiempoInicio, tiempoFin, limiteTiempo, puntuacion, intento, idPaciente, idCuestionario) VALUES
(null, 1, '2016-07-15', '10:00:00', '11:00:00', '01:00:00', 15, 1, 1, 2),
(null, 0, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(null, 0, NULL, NULL, NULL, NULL, NULL, 1, 3, 2),
(null, 1, '2016-07-14', '06:00:00', '10:00:00', '02:00:00', 10, 1, 4, 2);

--Consultas oficiales--
--VISTA ASIGNAR/MODIFICAR CUESTIONARIO--
--Consultar el cuestionario--
SELECT idPreguntaMultiple, cue.nombre, blo.instruccion, pre.pregunta, respuesta1, respuesta2, respuesta3, respuesta4, respuesta5, respuesta6, respuesta7, respuesta8, respuesta9, respuesta10, numeroOrden, respuestaCorrecta 
FROM cuestionario cue, bloquepregunta blo, preguntamultiple pre WHERE pre.idCuestionario = '1' AND pre.idBloquePregunta = blo.idBloquePregunta AND blo.idCuestionario = cue.idCuestionario;

SELECT preguntamultipleidPreguntaMultiple, preguntamultiple.respuesta1, preguntamultiple.respuesta2, preguntamultiple.respuesta3, preguntamultiple.respuesta4, preguntamultiple.respuesta5, preguntamultiple.respuesta6, preguntamultiple.respuesta7, preguntamultiple.respuesta8, preguntamultiple.respuesta9, preguntamultiple.respuesta10, preguntamultiple.numeroOrden, preguntamultiple.respuestaCorrecta, 
INNER JOIN 

SELECT COUNT(*) AS Total_Preguntas FROM cuestionario INNER JOIN bloquepregunta ON bloquepregunta.idCuestionario = cuestionario.idCuestionario INNER JOIN preguntamultiple ON preguntamultiple.idBloquePregunta = bloquepregunta.idBloquePregunta WHERE cuestionario.idCuestionario = 1 
