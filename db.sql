
DROP DATABASE IF EXISTS MyContactsDB;

CREATE DATABASE MyContactsDB;

# DROP USER  'contactuser'@'localhost';

# CREATE USER 'MyContactsDB'@'localhost' IDENTIFIED BY 'contactuser';
GRANT ALL PRIVILEGES ON MyContactsDB.* TO 'contactuser'@'localhost';
FLUSH PRIVILEGES;



CREATE TABLE IF NOT EXISTS `MyContactsDB`.`TBL_Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(125) NULL,
  `password` VARCHAR(125) NOT NULL,
  `create_time` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `update_time` DATETIME  ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `MyContactsDB`.`TBL_Contacto` (
  `idContacto` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(125) NULL,
  `apellidos` VARCHAR(125) NOT NULL,
  `telefono` VARCHAR(10) NULL,
    `mail` VARCHAR(75) NULL,
  `fechaNacimiento` DATETIME NULL,
  `idUsusario` int,
  `create_time` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `update_time` DATETIME  ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idContacto`),
  FOREIGN KEY(`idUsusario`) REFERENCES `TBL_Usuario`(`idUsuario`)
  )
ENGINE = InnoDB;


