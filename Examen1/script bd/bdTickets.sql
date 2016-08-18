/*
Navicat MySQL Data Transfer

Source Server         : mac
Source Server Version : 50620
Source Host           : 192.168.1.70:3306
Source Database       : bdTickets

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2016-08-17 20:48:12
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `bitacciones`
-- ----------------------------
DROP TABLE IF EXISTS `bitacciones`;
CREATE TABLE `bitacciones` (
  `idBitacciones` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) DEFAULT NULL,
  `accion` varchar(45) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idBitacciones`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bitacciones
-- ----------------------------
INSERT INTO `bitacciones` VALUES ('1', '1', 'Login', '2015-11-28 10:02:47');
INSERT INTO `bitacciones` VALUES ('2', '1', 'Consulta Generados', '2015-11-28 10:02:55');
INSERT INTO `bitacciones` VALUES ('3', '1', 'Consulta Generados', '2015-11-28 10:02:57');
INSERT INTO `bitacciones` VALUES ('4', '1', 'Consulta Asignados', '2015-11-28 10:02:58');
INSERT INTO `bitacciones` VALUES ('5', '1', 'Historial Seguimiento todos', '2015-11-28 10:03:01');
INSERT INTO `bitacciones` VALUES ('6', '1', 'Historial Seguimiento 8', '2015-11-28 10:03:09');
INSERT INTO `bitacciones` VALUES ('7', '1', 'Logout', '2015-11-28 10:03:20');
INSERT INTO `bitacciones` VALUES ('8', '1', 'Login', '2015-12-02 22:37:18');
INSERT INTO `bitacciones` VALUES ('9', '1', 'Login', '2015-12-03 09:42:08');
INSERT INTO `bitacciones` VALUES ('10', '1', 'Logout', '2015-12-03 09:48:09');
INSERT INTO `bitacciones` VALUES ('11', '1', 'Login', '2015-12-03 09:49:38');
INSERT INTO `bitacciones` VALUES ('12', '1', 'Logout', '2015-12-03 09:50:34');
INSERT INTO `bitacciones` VALUES ('13', '1', 'Login', '2015-12-03 09:51:27');
INSERT INTO `bitacciones` VALUES ('14', '1', 'Logout', '2015-12-03 09:51:33');
INSERT INTO `bitacciones` VALUES ('15', '1', 'Login', '2015-12-03 09:56:52');
INSERT INTO `bitacciones` VALUES ('16', '1', 'Logout', '2015-12-03 09:57:21');
INSERT INTO `bitacciones` VALUES ('17', '1', 'Login', '2015-12-03 10:50:58');
INSERT INTO `bitacciones` VALUES ('18', '1', 'Login', '2015-12-04 11:23:06');
INSERT INTO `bitacciones` VALUES ('19', '1', 'Logout', '2015-12-04 11:24:07');
INSERT INTO `bitacciones` VALUES ('20', '1', 'Login', '2015-12-04 11:27:05');
INSERT INTO `bitacciones` VALUES ('21', '1', 'Logout', '2015-12-04 11:27:27');
INSERT INTO `bitacciones` VALUES ('22', '1', 'Login', '2015-12-04 11:30:05');
INSERT INTO `bitacciones` VALUES ('23', '1', 'Logout', '2015-12-04 11:30:14');
INSERT INTO `bitacciones` VALUES ('24', '1', 'Login', '2015-12-04 11:31:13');
INSERT INTO `bitacciones` VALUES ('25', '1', 'Logout', '2015-12-04 11:31:17');
INSERT INTO `bitacciones` VALUES ('26', '1', 'Login', '2015-12-04 11:32:58');
INSERT INTO `bitacciones` VALUES ('27', '1', 'Logout', '2015-12-04 11:33:26');
INSERT INTO `bitacciones` VALUES ('28', '1', 'Login', '2015-12-04 11:34:19');
INSERT INTO `bitacciones` VALUES ('29', '1', 'Logout', '2015-12-04 11:34:33');
INSERT INTO `bitacciones` VALUES ('30', '1', 'Login', '2015-12-04 11:38:34');
INSERT INTO `bitacciones` VALUES ('31', '1', 'Logout', '2015-12-04 11:38:38');
INSERT INTO `bitacciones` VALUES ('32', '1', 'Login', '2015-12-04 12:25:00');
INSERT INTO `bitacciones` VALUES ('33', '1', 'Logout', '2015-12-04 12:29:15');
INSERT INTO `bitacciones` VALUES ('34', '1', 'Login', '2015-12-04 14:57:55');
INSERT INTO `bitacciones` VALUES ('35', '1', 'Logout', '2015-12-04 14:58:07');
INSERT INTO `bitacciones` VALUES ('36', '1', 'Login', '2015-12-04 14:59:29');
INSERT INTO `bitacciones` VALUES ('37', '1', 'Logout', '2015-12-04 15:00:16');
INSERT INTO `bitacciones` VALUES ('38', '1', 'Consulta Generados', '2016-08-17 20:26:19');
INSERT INTO `bitacciones` VALUES ('39', '1', 'Consulta Asignados', '2016-08-17 20:26:21');
INSERT INTO `bitacciones` VALUES ('40', '1', 'Historial Seguimiento todos', '2016-08-17 20:26:22');
INSERT INTO `bitacciones` VALUES ('41', '1', 'Consulta Asignados', '2016-08-17 20:26:35');
INSERT INTO `bitacciones` VALUES ('42', '1', 'Consulta Generados', '2016-08-17 20:26:36');
INSERT INTO `bitacciones` VALUES ('43', '1', 'Consulta Asignados', '2016-08-17 20:26:41');
INSERT INTO `bitacciones` VALUES ('44', '1', 'Consulta Generados', '2016-08-17 20:27:19');
INSERT INTO `bitacciones` VALUES ('45', '1', 'Consulta Asignados', '2016-08-17 20:27:20');
INSERT INTO `bitacciones` VALUES ('46', '1', 'Historial Seguimiento todos', '2016-08-17 20:27:21');
INSERT INTO `bitacciones` VALUES ('47', '1', 'Consulta Asignados', '2016-08-17 20:27:22');
INSERT INTO `bitacciones` VALUES ('48', '1', 'Consulta Generados', '2016-08-17 20:27:22');
INSERT INTO `bitacciones` VALUES ('49', '1', 'Consulta Generados', '2016-08-17 20:28:24');
INSERT INTO `bitacciones` VALUES ('50', '1', 'Consulta Asignados', '2016-08-17 20:28:27');
INSERT INTO `bitacciones` VALUES ('51', '1', 'Consulta Generados', '2016-08-17 20:30:52');
INSERT INTO `bitacciones` VALUES ('52', '1', 'Consulta Asignados', '2016-08-17 20:30:53');
INSERT INTO `bitacciones` VALUES ('53', '1', 'Historial Seguimiento todos', '2016-08-17 20:31:22');
INSERT INTO `bitacciones` VALUES ('54', '1', 'Consulta Asignados', '2016-08-17 20:31:25');
INSERT INTO `bitacciones` VALUES ('55', '1', 'Logout', '2016-08-17 20:33:10');
INSERT INTO `bitacciones` VALUES ('56', '1', 'Login', '2016-08-17 20:34:43');
INSERT INTO `bitacciones` VALUES ('57', '1', 'Consulta Asignados', '2016-08-17 20:34:59');
INSERT INTO `bitacciones` VALUES ('58', '1', 'Historial Seguimiento todos', '2016-08-17 20:35:06');
INSERT INTO `bitacciones` VALUES ('59', '1', 'Consulta Asignados', '2016-08-17 20:35:17');
INSERT INTO `bitacciones` VALUES ('60', '1', 'Consulta Generados', '2016-08-17 20:35:21');

-- ----------------------------
-- Table structure for `ctlArea`
-- ----------------------------
DROP TABLE IF EXISTS `ctlArea`;
CREATE TABLE `ctlArea` (
  `idArea` int(11) NOT NULL AUTO_INCREMENT,
  `nombreA` varchar(45) DEFAULT NULL,
  `correoA` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idArea`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ctlArea
-- ----------------------------
INSERT INTO `ctlArea` VALUES ('1', 'Sistemas', 'chpcr_874@hotmail.com');
INSERT INTO `ctlArea` VALUES ('2', 'Recursos Humanos', 'chpcr_874@hotmail.com');
INSERT INTO `ctlArea` VALUES ('3', 'Finanzas', 'chpcr_874@hotmail.com');

-- ----------------------------
-- Table structure for `ctlDepartamento`
-- ----------------------------
DROP TABLE IF EXISTS `ctlDepartamento`;
CREATE TABLE `ctlDepartamento` (
  `idDepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombreDep` varchar(45) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `correoDep` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ctlDepartamento
-- ----------------------------
INSERT INTO `ctlDepartamento` VALUES ('1', 'Software', '1', 'chpcr_874@hotmail.com');
INSERT INTO `ctlDepartamento` VALUES ('2', 'Redes', '1', 'chpcr_874@hotmail.com');
INSERT INTO `ctlDepartamento` VALUES ('3', 'Recursos Humanos', '2', 'chpcr_874@hotmail.com');
INSERT INTO `ctlDepartamento` VALUES ('4', 'Contabilidad', '3', 'chpcr_874@hotmail.com');
INSERT INTO `ctlDepartamento` VALUES ('5', 'Compras', '3', 'chpcr_874@hotmail.com');
INSERT INTO `ctlDepartamento` VALUES ('6', 'Ventas', '3', 'chpcr_874@hotmail.com');

-- ----------------------------
-- Table structure for `ctlUsuarios`
-- ----------------------------
DROP TABLE IF EXISTS `ctlUsuarios`;
CREATE TABLE `ctlUsuarios` (
  `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsu` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `departamento` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `correoUsu` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUsuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ctlUsuarios
-- ----------------------------
INSERT INTO `ctlUsuarios` VALUES ('1', 'Olga Villalva', 'OMVC', '123', '1', '1', 'chpcr_874@hotmail.com');
INSERT INTO `ctlUsuarios` VALUES ('2', 'Luis Martinez', 'usu1', '111', '2', '1', 'chpcr_874@hotmail.com');
INSERT INTO `ctlUsuarios` VALUES ('3', 'Sofia Fernandez', 'usu2', '222', '3', '2', 'chpcr_874@hotmail.com');
INSERT INTO `ctlUsuarios` VALUES ('4', 'Alfonso Garcia', 'usu3', '333', '4', '3', 'chpcr_874@hotmail.com');
INSERT INTO `ctlUsuarios` VALUES ('5', 'Leticia Cervantes', 'usu4', '444', '5', '3', 'chpcr_874@hotmail.com');
INSERT INTO `ctlUsuarios` VALUES ('6', 'Fortunato Silva', 'usu5', '555', '6', '3', 'chpcr_874@hotmail.com');
INSERT INTO `ctlUsuarios` VALUES ('7', 'Manuel Castro', 'usu6', '666', '2', '1', 'chpcr_874@hotmail.com');
INSERT INTO `ctlUsuarios` VALUES ('8', 'Alejandro Diaz', 'usu7', '777', '3', '2', 'chpcr_874@hotmail.com');
INSERT INTO `ctlUsuarios` VALUES ('9', 'Ani Perez', 'usu8', '888', '1', '1', 'chpcr_874@hotmail.com');
INSERT INTO `ctlUsuarios` VALUES ('10', 'Diego Miranda', 'usu9', '999', '4', '3', 'chpcr_874@hotmail.com');
INSERT INTO `ctlUsuarios` VALUES ('11', 'Carla Ramirez', 'usu10', '101', '5', '3', 'chpcr_874@hotmail.com');
INSERT INTO `ctlUsuarios` VALUES ('12', 'Laura Sanchez', 'usu11', '111', '6', '3', 'chpcr_874@hotmail.com');

-- ----------------------------
-- Table structure for `oprSeguimiento`
-- ----------------------------
DROP TABLE IF EXISTS `oprSeguimiento`;
CREATE TABLE `oprSeguimiento` (
  `idSeguimiento` int(11) NOT NULL AUTO_INCREMENT,
  `ticket` int(11) DEFAULT NULL,
  `estatus` varchar(45) DEFAULT 'Registrado',
  `usuario` int(11) DEFAULT NULL,
  `observaciones` varchar(50) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idSeguimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of oprSeguimiento
-- ----------------------------
INSERT INTO `oprSeguimiento` VALUES ('1', '1', 'Registrado', '1', 'No hay suficiente dinero', '2015-11-21 07:55:46');
INSERT INTO `oprSeguimiento` VALUES ('2', '2', 'Registrado', '1', 'Faltan Facturas', '2015-11-21 10:12:22');
INSERT INTO `oprSeguimiento` VALUES ('3', '3', 'Registrado', '4', 'No hay internet en la computadora', '2015-11-21 10:25:58');
INSERT INTO `oprSeguimiento` VALUES ('4', '4', 'Registrado', '4', 'No puedo mandar un correo', '2015-11-21 10:39:04');
INSERT INTO `oprSeguimiento` VALUES ('5', '5', 'Registrado', '4', 'Necesito un asistente.', '2015-11-21 10:50:11');
INSERT INTO `oprSeguimiento` VALUES ('6', '6', 'Registrado', '4', 'Necesito un practicante', '2015-11-21 10:55:52');
INSERT INTO `oprSeguimiento` VALUES ('7', '7', 'Registrado', '1', 'Solicito un practicante del area.', '2015-11-21 14:59:27');
INSERT INTO `oprSeguimiento` VALUES ('8', '8', 'Registrado', '10', 'Tiene asuntos pendientes en contabilidad', '2015-11-21 18:06:46');
INSERT INTO `oprSeguimiento` VALUES ('9', '9', 'Registrado', '10', 'Necesito una secretaria con conocimientos basicos ', '2015-11-21 18:11:44');
INSERT INTO `oprSeguimiento` VALUES ('10', '8', 'Proceso', '1', 'Podre ir a resolver los problemas el proximo marte', '2015-11-21 20:23:00');

-- ----------------------------
-- Table structure for `oprTicket`
-- ----------------------------
DROP TABLE IF EXISTS `oprTicket`;
CREATE TABLE `oprTicket` (
  `idTicket` int(11) NOT NULL AUTO_INCREMENT,
  `asunto` varchar(45) DEFAULT NULL,
  `estatus` varchar(45) DEFAULT 'Registrado',
  `origen` int(11) DEFAULT NULL,
  `tipoDestino` varchar(45) DEFAULT NULL,
  `destino` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idTicket`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of oprTicket
-- ----------------------------
INSERT INTO `oprTicket` VALUES ('1', 'No hay suficiente dinero', 'Registrado', '1', 'Area', '3', '2015-11-21 07:55:46');
INSERT INTO `oprTicket` VALUES ('2', 'Faltan Facturas', 'Registrado', '1', 'Departamento', '4', '2015-11-21 10:12:22');
INSERT INTO `oprTicket` VALUES ('3', 'No hay internet en la computadora', 'Finalizado', '4', 'Area', '1', '2015-11-21 10:25:58');
INSERT INTO `oprTicket` VALUES ('4', 'No puedo mandar un correo', 'Finalizado', '4', 'Departamento', '1', '2015-11-21 10:39:04');
INSERT INTO `oprTicket` VALUES ('5', 'Necesito un asistente.', 'Proceso', '4', 'Area', '2', '2015-11-21 10:50:11');
INSERT INTO `oprTicket` VALUES ('6', 'Necesito un practicante', 'Registrado', '4', 'Area', '2', '2015-11-21 10:55:52');
INSERT INTO `oprTicket` VALUES ('7', 'Solicito un practicante del area.', 'Registrado', '1', 'Area', '2', '2015-11-21 14:59:27');
INSERT INTO `oprTicket` VALUES ('8', 'Tiene asuntos pendientes en contabilidad', 'Proceso', '10', 'Usuario', '1', '2015-11-21 18:06:46');
INSERT INTO `oprTicket` VALUES ('9', 'Necesito una secretaria con conocimientos bas', 'Registrado', '10', 'Departamento', '3', '2015-11-21 18:11:44');
