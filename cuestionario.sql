-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema cuestionario
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cuestionario
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cuestionario` DEFAULT CHARACTER SET utf8 ;
USE `cuestionario` ;

-- -----------------------------------------------------
-- Table `cuestionario`.`Paciente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cuestionario`.`Paciente` (
  `idPaciente` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `apellidoPaterno` VARCHAR(100) NOT NULL,
  `apellidoMaterno` VARCHAR(100) NOT NULL,
  `numHermanos` INT NOT NULL,
  `lateralidad` VARCHAR(15) NOT NULL,
  `gradoEscolar` VARCHAR(45) NOT NULL,
  `fechaNacimiento` DATE NULL,
  `calle` VARCHAR(255) NULL,
  `numero` VARCHAR(45) NULL,
  `colonia` VARCHAR(100) NULL,
  `municipio` VARCHAR(100) NULL,
  `estado` VARCHAR(50) NULL,
  `cp` INT NULL,
  `genero` VARCHAR(10) NOT NULL,
  `foto` VARCHAR(255) NULL,
  PRIMARY KEY (`idPaciente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cuestionario`.`cuestionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cuestionario`.`cuestionario` (
  `idCuestionario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idCuestionario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cuestionario`.`bloquepregunta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cuestionario`.`bloquepregunta` (
  `idBloquePregunta` INT NOT NULL AUTO_INCREMENT,
  `instruccion` VARCHAR(300) NULL,
  `idCuestionario` INT NOT NULL,
  PRIMARY KEY (`idBloquePregunta`),
  INDEX `fk_bloquepregunta_cuestionario1_idx` (`idCuestionario` ASC),
  CONSTRAINT `fk_bloquepregunta_cuestionario1`
    FOREIGN KEY (`idCuestionario`)
    REFERENCES `cuestionario`.`cuestionario` (`idCuestionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cuestionario`.`preguntamultiple`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cuestionario`.`preguntamultiple` (
  `idPreguntaMultiple` INT NOT NULL AUTO_INCREMENT,
  `pregunta` VARCHAR(200) NOT NULL,
  `respuesta1` VARCHAR(100) NOT NULL,
  `respuesta2` VARCHAR(100) NOT NULL,
  `respuesta3` VARCHAR(100) NULL,
  `respuesta4` VARCHAR(100) NULL,
  `respuesta5` VARCHAR(100) NULL,
  `respuesta6` VARCHAR(100) NULL,
  `respuesta7` VARCHAR(100) NULL,
  `respuesta8` VARCHAR(100) NULL,
  `respuesta9` VARCHAR(100) NULL,
  `respuesta10` VARCHAR(100) NULL,
  `numeroOrden` VARCHAR(2) NOT NULL,
  `respuestaCorrecta` VARCHAR(100) NOT NULL,
  `puntaje` INT(3) NOT NULL,
  `idCuestionario` INT NOT NULL,
  `idBloquePregunta` INT NOT NULL,
  PRIMARY KEY (`idPreguntaMultiple`),
  INDEX `fk_preguntamultiple_bloquepregunta1_idx` (`idBloquePregunta` ASC),
  INDEX `fk_preguntamultiple_cuestionario1_idx` (`idCuestionario` ASC),
  CONSTRAINT `fk_preguntamultiple_bloquepregunta1`
    FOREIGN KEY (`idBloquePregunta`)
    REFERENCES `cuestionario`.`bloquepregunta` (`idBloquePregunta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_preguntamultiple_cuestionario1`
    FOREIGN KEY (`idCuestionario`)
    REFERENCES `cuestionario`.`cuestionario` (`idCuestionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cuestionario`.`cuestionarioResuelto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cuestionario`.`cuestionarioResuelto` (
  `idCuestionarioResuelto` INT NOT NULL AUTO_INCREMENT,
  `estatus` TINYINT(1) NULL,
  `fecha` DATE NULL,
  `tiempoInicio` TIME NULL,
  `tiempoFin` TIME NULL,
  `limiteTiempo` TIME NULL,
  `puntuacion` INT(3) NULL,
  `intento` INT(2) NULL,
  `idPaciente` INT NOT NULL,
  `idCuestionario` INT NOT NULL,
  PRIMARY KEY (`idCuestionarioResuelto`),
  INDEX `fk_cuestionarioResuelto_Paciente1_idx` (`idPaciente` ASC),
  INDEX `fk_cuestionarioResuelto_cuestionario1_idx` (`idCuestionario` ASC),
  CONSTRAINT `fk_cuestionarioResuelto_Paciente1`
    FOREIGN KEY (`idPaciente`)
    REFERENCES `cuestionario`.`Paciente` (`idPaciente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuestionarioResuelto_cuestionario1`
    FOREIGN KEY (`idCuestionario`)
    REFERENCES `cuestionario`.`cuestionario` (`idCuestionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
 
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
(1, 1, '2016-07-15', '10:00:00', '11:00:00', '01:00:00', 15, 1, 1, 2),
(2, 0, NULL, NULL, NULL, '00:00:15', NULL, 1, 3, 3),
(3, 0, NULL, NULL, NULL, '00:00:15', NULL, 2, 1, 3),
(4, 1, '2016-07-14', '06:00:00', '10:00:00', '02:00:00', 10, 1, 2, 2),
(5, 1, '2016-07-17', '04:00:00', '05:00:00', '02:00:00', 10, 2, 1, 2),
(6, 1, '2016-07-20', '05:00:00', '08:00:00', '03:00:00', 30, 1, 1, 3),
(7, 0, NULL, NULL, NULL, '01:15:00', NULL, 1, 2, 3),
(8, 0, NULL, NULL, NULL, '02:00:00', NULL, 2, 2, 2);