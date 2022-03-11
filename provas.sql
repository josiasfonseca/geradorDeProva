
CREATE SCHEMA IF NOT EXISTS `provas` DEFAULT CHARACTER SET utf8 ;
USE `provas` ;

-- -----------------------------------------------------
-- Table `mydb`.`aplicante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provas`.`aplicante` (
  `idaplicante` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idaplicante`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`prova`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provas`.`prova` (
  `idprova` INT NOT NULL AUTO_INCREMENT, 
  `aplicante_idaplicante` INT NOT NULL,
  PRIMARY KEY (`idprova`),
  INDEX `fk_prova_aplicante1_idx` (`aplicante_idaplicante` ASC) VISIBLE,
  CONSTRAINT `fk_prova_aplicante1`
    FOREIGN KEY (`aplicante_idaplicante`)
    REFERENCES `provas`.`aplicante` (`idaplicante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`perguntas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provas`.`perguntas` (
  `idperguntas` INT NOT NULL AUTO_INCREMENT,
  `pergunta` VARCHAR(255) NOT NULL,
  `dificuldade` INT NOT NULL,
  `respostas` JSON NULL,
  `tipo_pergunta` INT NOT NULL,
  `rotulo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idperguntas`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`prova_has_perguntas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `provas`.`prova_has_perguntas` (
  `prova_idprova` INT NOT NULL,
  `perguntas_idperguntas` INT NOT NULL,
  `respostas_dadas` JSON NOT NULL,
  `acertos` JSON NOT NULL,
  PRIMARY KEY (`prova_idprova`, `perguntas_idperguntas`),
  INDEX `fk_prova_has_perguntas_perguntas1_idx` (`perguntas_idperguntas` ASC) VISIBLE,
  INDEX `fk_prova_has_perguntas_prova_idx` (`prova_idprova` ASC) VISIBLE,
  CONSTRAINT `fk_prova_has_perguntas_prova`
    FOREIGN KEY (`prova_idprova`)
    REFERENCES `provas`.`prova` (`idprova`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prova_has_perguntas_perguntas1`
    FOREIGN KEY (`perguntas_idperguntas`)
    REFERENCES `provas`.`perguntas` (`idperguntas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
