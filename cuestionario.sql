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
