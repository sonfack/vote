Cette application est basée sur le framework Codeigniter3

I. OUTILS DE DEVELLOPEMENT UTILISES


Installation : 
1. docompresser le fichier vote.zip dans votre serveru Web
2. créer un base de donnée « vote »
3. importer le fichier vote.sql
4. lancer l'application : «  serveur/vote/index.php/welcome »
5. login de l'administrateur :
1. login : admin 
2. mot de passe : admin 
6. Créer des electeurs ainsique le président de parti
7. connecter un electeur et voter 
8. connecter comme administrateur et voir le resultat des vote 


Base de données 

SQL 

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

MySQL-Workbench-gpl-5.2.44-win32
MySQL Workbench est un logiciel de gestion et d’administration de bases de données MySQL créé en 2004.Via une interface graphique intuitive, il permet entre autres, de créer, modifier ou supprimer des tables, des comptes utilisateurs, et d’effectuer toutes les opérations inhérentes à la gestion d’une base de données. C’est un logiciel libre et multiplateforme.

PHP 5.6
PHP (HypertextPreprocessor) est un langage de programmation libre, principalement utilisé pour produire des pages Web dynamiques via un serveur HTTP, mais pouvant « également fonctionner comme n’importe quel langage interprété de façon locale .PHP est un langage impératif orienté objet.moteurphp
				
Apache 2
Le logiciel libre Apache HTTP Server est un serveur http crée et maintenu au sein de la fondation Apache. C’est le serveur HTTP le plus populaire du World Wide Web. Il est distribué selon les termes de la licence Apache.

MySQL 5.6
MySQL est un système de gestion de bases de données relationnelles.il est distribué sous une double licence GPL et propriétaire.il fait partie des logiciels de gestion de base de données les plus utilisées au monde, autant par le grand public que par des professionnels en concurrence avec Oracle, Informix et Microsoft SQL Server.
			
Framework php (CodeIgniter)
CodeIgniter est un Framework libre écrit en PHP. Il suit le motif de conception MVC et s’inspire du fonctionnement de Rails.

Framework CSS (Bootstrap)
Bootstrap est une collection d’outils utile à la création de design de sites et d’applications web.C ‘est un ensemble qui contient des codes JavaScript et CSS.Il permet de construire facilement desformulaires, desboutons, des interfaces web. outils de navigations et autre élémentsinteractifs. C’est une bibliothèque libre.
				
