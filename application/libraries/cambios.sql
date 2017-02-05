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




-- ----------------------------------------------------------------------------------------------
-- Registros
-- ----------------------------------------------------------------------------------------------
INSERT INTO `mensajes_bienvenida` VALUES ('1','Cristo.png','No tengais miedo','2017-01-28 17:31:41','0000-00-00 00:00:00'), 
('2','PapaFrancisco.png','Estamos llamados a formar las conciencias, pero no a pretender sustiruirlas','2017-01-28 17:31:41','0000-00-00 00:00:00');

INSERT INTO `usuario` VALUES ('1', 'JEMEL.DAVALILLO@GMAIL.COM','J21D','827ccb0eea8a706c4c34a16891f84e7b', 1, '2017-01-28 17:31:41','0000-00-00 00:00:00');

ALTER TABLE `usuario` ADD FOREIGN KEY (`nivel_id`) REFERENCES `consolata`.`nivel`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `menu_nivel` ADD FOREIGN KEY (`menu_id`) REFERENCES `consolata`.`menu`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `menu_nivel` ADD FOREIGN KEY (`nivel_id`) REFERENCES `consolata`.`nivel`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `tb_perfil` ADD FOREIGN KEY (`usuario_id`) REFERENCES `consolata`.`usuario`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
