CREATE DATABASE IF NOT EXISTS `consolata`;

USE `consolata`;
-- ----------------------------------------------------------------------------------------------
DROP TABLE IF EXISTS `mensajes_bienvenida`;
CREATE TABLE `mensajes_bienvenida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(30) DEFAULT NULL,
  `mensaje` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
-- ----------------------------------------------------------------------------------------------
DROP TABLE IF EXISTS `menu_nivel`;
CREATE TABLE `menu_nivel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `nivel_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
-- ----------------------------------------------------------------------------------------------
DROP TABLE IF EXISTS `nivel`;
CREATE TABLE `nivel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
-- ----------------------------------------------------------------------------------------------
DROP TABLE IF EXISTS `tb_menu`;
CREATE TABLE `tb_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `glosa_menu` varchar(150) DEFAULT NULL,
  `controlador` varchar(100) DEFAULT NULL,
  `accion` varchar(100) DEFAULT NULL,
  `url` varchar(150) NOT NULL,
  `orden` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
-- ----------------------------------------------------------------------------------------------
DROP TABLE IF EXISTS `tb_perfil`;
CREATE TABLE `tb_perfil` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `fecha_nacimiento` datetime DEFAULT '0000-00-00 00:00:00',
  `foto_perfil` varchar(60) DEFAULT NULL,
  `detalle_biografia` TEXT DEFAULT NULL,
  `usuario_id` int(10),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
-- ----------------------------------------------------------------------------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(120) DEFAULT NULL,
  `nick` varchar(20) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL,
  `nivel_id`int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
-- ----------------------------------------------------------------------------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE menus(
    id int(11) NOT null PRIMARY KEY AUTO_INCREMENT,
    name varchar(50) DEFAULT NULL,
    parentId int(11) DEFAULT null,
    path varchar(50) DEFAULT null,
    clase varchar(100) DEFAULT null,
    icon varchar(50) DEFAULT null,
    order_menu int(6)
)ENGINE INNODB;
-- ----------------------------------------------------------------------------------------------
DROP TABLE IF EXISTS `noticias`;
CREATE TABLE noticias (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(50) NOT NULL,
    contenido TEXT,
    id_usuario INT,
    fecha_creacion DATETIME,
    fecha_actualizacion DATETIME
) ENGINE INNODB;

-- ----------------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `inquilino`;
CREATE TABLE `inquilino`(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	dni VARCHAR(20) DEFAULT NULL,
	nombre VARCHAR(50) DEFAULT NULL,
	apellido VARCHAR(70) DEFAULT NULL,
	fecha_nacimiento DATE,
	id_prm_sexo INT(11),
	fecha_creacion DATETIME,
	fecha_modificacion DATETIME
) ENGINE INNODB;

-- ----------------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `espacio`;
CREATE TABLE `espacio`(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	glosa_espacio VARCHAR(100) DEFAULT NULL,
	capacidad int(4) DEFAULT NULL,
	id_prm_tipo int(11) DEFAULT NULL,
	fecha_creacion DATETIME,
	fecha_modificacion DATETIME
) ENGINE INNODB;

-- ----------------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `inquilino_espacio`;
CREATE TABLE `inquilino_espacio`(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	id_inquilino INT(11) DEFAULT NULL,
	id_espacio INT(11) DEFAULT NULL,
	fecha_ingreso DATETIME,
	fecha_salida DATETIME,
	fecha_creacion DATETIME,
	fecha_modificacion DATETIME
) ENGINE INNODB;

-- ----------------------------------------------------------------------------------------------
DROP TABLE IF EXISTS `prm_tipo`;
CREATE TABLE `prm_tipo`(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	glosa_tipo VARCHAR(100) DEFAULT NULL,
	restriccion_sexo TINYINT,
	fecha_creacion DATETIME,
	fecha_modificacion DATETIME
) ENGINE INNODB;
-- ----------------------------------------------------------------------------------------------
DROP TABLE IF EXISTS `prm_sexo`;
CREATE TABLE `prm_sexo`(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	glosa_sexo VARCHAR(20) DEFAULT NULL,
	abrev_sexo VARCHAR(5),
	fecha_creacion DATETIME,
	fecha_modificacion DATETIME
) ENGINE INNODB;
-- ----------------------------------------------------------------------------------------------
-- Registros
-- ----------------------------------------------------------------------------------------------
INSERT INTO `mensajes_bienvenida` VALUES ('1','Cristo.png','No tengais miedo','2017-01-28 17:31:41','0000-00-00 00:00:00'), 
('2','PapaFrancisco.png','Estamos llamados a formar las conciencias, pero no a pretender sustiruirlas','2017-01-28 17:31:41','0000-00-00 00:00:00');

INSERT INTO `usuario` VALUES ('1', 'JEMEL.DAVALILLO@GMAIL.COM','J21D','827ccb0eea8a706c4c34a16891f84e7b', 1, '2017-01-28 17:31:41','0000-00-00 00:00:00');

-- ----------------------------------------------------------------------------------------------
-- MODIFICACIONES A LAS TABLAS
-- ----------------------------------------------------------------------------------------------

ALTER TABLE `usuario` ADD FOREIGN KEY (`nivel_id`) REFERENCES `consolata`.`nivel`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `menu_nivel` ADD FOREIGN KEY (`menu_id`) REFERENCES `consolata`.`menu`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `menu_nivel` ADD FOREIGN KEY (`nivel_id`) REFERENCES `consolata`.`nivel`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `tb_perfil` ADD FOREIGN KEY (`usuario_id`) REFERENCES `consolata`.`usuario`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `noticias` ADD `imagen` VARCHAR(100) NOT NULL AFTER `contenido`;

-- tabla de servicios ofrecidos por la casa

CREATE TABLE servicio (
  id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    glosa_servicio VARCHAR(100)
)ENGINE INNODB;

-- TABLA DE SOLICITUDES
CREATE TABLE solicitud(
  id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_servicio INT(11),
    id_usuario_solicitante INT(11),
    id_usuario_validador INT(11),
    fecha_inicio DATETIME,
    fecha_fin DATETIME,
    cantidad_personas INT(11),
    fecha_creacion DATETIME,
    fecha_modificacion DATETIME
)ENGINE INNODB;

ALTER TABLE `solicitud` ADD INDEX(`id_servicio`);
ALTER TABLE `solicitud` ADD INDEX(`id_usuario_solicitante`);
ALTER TABLE `solicitud` ADD INDEX(`id_usuario_validador`);

ALTER TABLE `solicitud` ADD FOREIGN KEY (`id_servicio`) REFERENCES `consolata`.`servicio`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `solicitud` ADD FOREIGN KEY (`id_usuario_solicitante`) REFERENCES `consolata`.`inquilino`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `solicitud` ADD FOREIGN KEY (`id_usuario_validador`) REFERENCES `consolata`.`usuario`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `solicitud` ADD `parroquia` VARCHAR(150) NOT NULL AFTER `cantidad_personas`;