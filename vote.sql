SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `vote` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `vote` ;

-- -----------------------------------------------------
-- Table `vote`.`party`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `vote`.`party` (
  `party_id` INT NOT NULL AUTO_INCREMENT COMMENT '	' ,
  `party_name` VARCHAR(45) NULL ,
  `party_logo` VARCHAR(100) NULL ,
  `party_status` TINYINT NULL ,
  PRIMARY KEY (`party_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vote`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `vote`.`user` (
  `user_id` INT NOT NULL AUTO_INCREMENT ,
  `user_party_id` INT NULL ,
  `party_voted_id` INT NULL ,
  `user_name` VARCHAR(45) NULL ,
  `user_type` TINYINT NULL COMMENT '1 for admin\n2 for voters\n3 for parti head' ,
  `user_status` TINYINT NULL ,
  `user_password` VARCHAR(100) NULL ,
  PRIMARY KEY (`user_id`) ,
  INDEX `fk_user_parti` (`user_party_id` ASC) ,
  INDEX `fk_user_parti1` (`party_voted_id` ASC) ,
  CONSTRAINT `fk_user_parti`
    FOREIGN KEY (`user_party_id` )
    REFERENCES `vote`.`party` (`party_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_parti1`
    FOREIGN KEY (`party_voted_id` )
    REFERENCES `vote`.`party` (`party_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


INSERT INTO user (user_name, user_password, user_status, user_type)
VALUES ('admin', SHA1('admin'), 0,1 );
