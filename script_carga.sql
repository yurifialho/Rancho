-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema rancho
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `rancho` ;

-- -----------------------------------------------------
-- Schema rancho
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `rancho` DEFAULT CHARACTER SET utf8 ;
USE `rancho` ;

-- -----------------------------------------------------
-- Table `rancho`.`usuario_tipo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rancho`.`usuario_tipo` ;

CREATE TABLE IF NOT EXISTS `rancho`.`usuario_tipo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rancho`.`setor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rancho`.`setor` ;

CREATE TABLE IF NOT EXISTS `rancho`.`setor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rancho`.`omds`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rancho`.`omds` ;

CREATE TABLE IF NOT EXISTS `rancho`.`omds` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `sigla` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rancho`.`posto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rancho`.`posto` ;

CREATE TABLE IF NOT EXISTS `rancho`.`posto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `tipo` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rancho`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rancho`.`usuario` ;

CREATE TABLE IF NOT EXISTS `rancho`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(100) NOT NULL,
  `usuario_tipo_id` INT NOT NULL,
  `setor_id` INT NOT NULL,
  `omds_id` INT NULL,
  `posto_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_usuario_usuario_tipo`
    FOREIGN KEY (`usuario_tipo_id`)
    REFERENCES `rancho`.`usuario_tipo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_setor1`
    FOREIGN KEY (`setor_id`)
    REFERENCES `rancho`.`setor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_omds1`
    FOREIGN KEY (`omds_id`)
    REFERENCES `rancho`.`omds` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_posto1`
    FOREIGN KEY (`posto_id`)
    REFERENCES `rancho`.`posto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_usuario_usuario_tipo_idx` ON `rancho`.`usuario` (`usuario_tipo_id` ASC) VISIBLE;

CREATE INDEX `fk_usuario_setor1_idx` ON `rancho`.`usuario` (`setor_id` ASC) VISIBLE;

CREATE INDEX `fk_usuario_omds1_idx` ON `rancho`.`usuario` (`omds_id` ASC) VISIBLE;

CREATE INDEX `fk_usuario_posto1_idx` ON `rancho`.`usuario` (`posto_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `rancho`.`aranchamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rancho`.`aranchamento` ;

CREATE TABLE IF NOT EXISTS `rancho`.`aranchamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `dia` DATE NOT NULL,
  `tp_cafe` TINYINT(1) NOT NULL DEFAULT false,
  `tp_almoco` TINYINT(1) NOT NULL DEFAULT false,
  `tp_janta` TINYINT(1) NOT NULL DEFAULT false,
  `tp_ceia` TINYINT(1) NOT NULL DEFAULT false,
  `usuario_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_aranchamento_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `rancho`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_aranchamento_usuario1_idx` ON `rancho`.`aranchamento` (`usuario_id` ASC);

INSERT INTO `rancho`.`omds` (`descricao`, `sigla`) VALUES ('10 Regiao Militar', '10RM');
INSERT INTO `rancho`.`posto` (`descricao`, `tipo`) VALUES ('1 Ten', 'M');
INSERT INTO `rancho`.`setor` (`descricao`) VALUES ('Informatica');
INSERT INTO `rancho`.`usuario_tipo` (`descricao`) VALUES ('Administrador');
INSERT INTO `rancho`.`usuario` (`nome`, `login`, `senha`, `usuario_tipo_id`, `setor_id`, `omds_id`, `posto_id`) VALUES ('Administrador', 'admin', md5('admin'), '1', '1', '1', '1');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

