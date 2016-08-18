/*
Navicat MySQL Data Transfer

Source Server         : mac
Source Server Version : 50620
Source Host           : 192.168.1.70:3306
Source Database       : bdAseguradora

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2016-08-17 20:47:57
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `Aseguradora`
-- ----------------------------
DROP TABLE IF EXISTS `Aseguradora`;
CREATE TABLE `Aseguradora` (
  `idAseguradora` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAseguradora`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Aseguradora
-- ----------------------------
INSERT INTO `Aseguradora` VALUES ('1', 'Axxa');
INSERT INTO `Aseguradora` VALUES ('2', 'HDI');
INSERT INTO `Aseguradora` VALUES ('3', 'Mapfre');
INSERT INTO `Aseguradora` VALUES ('4', 'Banorte');
INSERT INTO `Aseguradora` VALUES ('5', 'Banamex');
INSERT INTO `Aseguradora` VALUES ('6', 'Santander');
INSERT INTO `Aseguradora` VALUES ('7', 'Quality');
INSERT INTO `Aseguradora` VALUES ('8', 'Otra');

-- ----------------------------
-- Table structure for `Partes`
-- ----------------------------
DROP TABLE IF EXISTS `Partes`;
CREATE TABLE `Partes` (
  `idParte` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idParte`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Partes
-- ----------------------------
INSERT INTO `Partes` VALUES ('1', 'Puerta derecha');
INSERT INTO `Partes` VALUES ('2', 'Puerta izquierda');
INSERT INTO `Partes` VALUES ('3', 'Puerta derecha trasera');
INSERT INTO `Partes` VALUES ('4', 'Puerta izquierda trasera');
INSERT INTO `Partes` VALUES ('5', 'cajuela');
INSERT INTO `Partes` VALUES ('6', 'capo');
INSERT INTO `Partes` VALUES ('7', 'luces delanteras');
INSERT INTO `Partes` VALUES ('8', 'luces traseras');
INSERT INTO `Partes` VALUES ('9', 'retrovisor derecho');
INSERT INTO `Partes` VALUES ('10', 'retrovisor izquierdo');
INSERT INTO `Partes` VALUES ('11', 'parabrisas delantero');
INSERT INTO `Partes` VALUES ('12', 'parabrisas tracero');
INSERT INTO `Partes` VALUES ('13', 'motor');
INSERT INTO `Partes` VALUES ('14', 'ventana derecha');
INSERT INTO `Partes` VALUES ('15', 'ventana izquierda');
INSERT INTO `Partes` VALUES ('16', 'ventana derecha trasera');
INSERT INTO `Partes` VALUES ('17', 'ventana izquierda trasera');
INSERT INTO `Partes` VALUES ('18', 'otro');

-- ----------------------------
-- Table structure for `partesDaniadas`
-- ----------------------------
DROP TABLE IF EXISTS `partesDaniadas`;
CREATE TABLE `partesDaniadas` (
  `idPartesDaniadas` int(11) NOT NULL AUTO_INCREMENT,
  `parte` int(11) DEFAULT NULL,
  `siniestro` int(11) DEFAULT NULL,
  `poliza` int(11) DEFAULT NULL,
  `tipoDanio` varchar(45) DEFAULT NULL,
  `nivel` varchar(45) DEFAULT NULL,
  `estatus` varchar(45) DEFAULT 'En espera',
  `costo` double DEFAULT '0',
  `observaciones` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPartesDaniadas`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of partesDaniadas
-- ----------------------------
INSERT INTO `partesDaniadas` VALUES ('1', '1', '1', '1', 'Rayon', 'Medio', 'En espera', '0', 'Necesita un trabajo de pintura');
INSERT INTO `partesDaniadas` VALUES ('2', '7', '2', '4', 'Destruido', 'Medio', 'Revisando', '1500', '');

-- ----------------------------
-- Table structure for `Poliza`
-- ----------------------------
DROP TABLE IF EXISTS `Poliza`;
CREATE TABLE `Poliza` (
  `idPoliza` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `aseguradora` int(11) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `placas` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPoliza`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Poliza
-- ----------------------------
INSERT INTO `Poliza` VALUES ('1', 'Marta Torres', 'chpcr_874@hotmail.com', '1234567890', 'circunvalacion pte. 826', '1', 'Mazda', '3', 'Negro', '2013', 'lalala');
INSERT INTO `Poliza` VALUES ('2', 'Marta Torres', 'chpcr_874@hotmail.com', '1234567890', 'lala', '1', 'Mazda', '3', 'Negro', '2013', 'tatata');
INSERT INTO `Poliza` VALUES ('3', 'Alfonso Villalva', 'chpcr_874@hotmail.com', '1234567890', 'Av. Constitucion #216', '5', 'Chevrolet', 'travers', 'Arena', '2016', 'lalala');
INSERT INTO `Poliza` VALUES ('4', 'Leticia Villalva', 'chpcr_874@hotmail.com', '1234567890', 'Av. Constitucion #216', '4', 'Honda', 'City', 'Blanco', '2016', 'placaH');

-- ----------------------------
-- Table structure for `Siniestro`
-- ----------------------------
DROP TABLE IF EXISTS `Siniestro`;
CREATE TABLE `Siniestro` (
  `idSiniestro` int(11) NOT NULL AUTO_INCREMENT,
  `poliza` int(11) DEFAULT NULL,
  `ajustador` int(11) DEFAULT NULL,
  `responsable` varchar(45) DEFAULT NULL,
  `costoAprox` double DEFAULT NULL,
  `estatus` varchar(45) DEFAULT 'Registrado',
  `fechaAccidente` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `observaciones` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idSiniestro`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Siniestro
-- ----------------------------
INSERT INTO `Siniestro` VALUES ('1', '1', '1', 'Terceras personas', '15000', 'Registrado', '2015-12-09 22:52:07', 'Iba con altos indices de alcohol');
INSERT INTO `Siniestro` VALUES ('2', '4', '1', 'Accidente', '20000', 'Revisando', '2015-12-10 23:46:50', 'Malformaciones en la carretera');

-- ----------------------------
-- Table structure for `usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `tipoUsu` int(11) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Olga Maria Villalva Cervantes', null, 'OMVC', '123', '1', 'chpcr_874@hotmail.com');
INSERT INTO `usuarios` VALUES ('2', 'Juan Fernandez Lopez', null, 'JFL', '111', '3', 'chpcr_874@hotmail.com');
INSERT INTO `usuarios` VALUES ('3', 'Diana Castro Ramirez', null, 'DCR', '222', '2', 'chpcr_874@hotmail.com');
